<?php
session_start();
// connect to DB
require_once('../private/globals.php');
//validate user_id
if (!isset($_SESSION['user_id'])) {
    send_400('Log in to change your email');
}

// email validate

if (!isset($_POST['email'])) {
    send_400('Email is required');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    send_400('Email is invalid');
}

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {

    //email to check
    $email = $_POST['email'];
    //prepare the statement
    $stmt = $db->prepare("SELECT * FROM users WHERE user_email=:user_email");
    $stmt->bindValue(":user_email", $email);
    //execute the statement
    $stmt->execute();
    //fetch result
    $user = $stmt->fetch();
    if ($user) {
        // email already exists
        send_400("User with this email already exists");
    } else {
        // email does not exist

        // email verification
        $_to_email = $email;
        $_subject = 'Verify your new email address';
        $verification_key = bin2hex(random_bytes(16));

        //define user id from session
        $user_id = $_SESSION['user_id'];

        $q = $db->prepare("UPDATE users SET user_ver_key=:user_ver_key WHERE user_id=:user_id");
        $q->bindValue(":user_ver_key", $verification_key);
        $q->bindValue(":user_id", $user_id);
        $q->execute();

        // email verification

        // get php template
        $template = file_get_contents('../email-templates/verify-new-email.php');
        // i need to somehow pass the variable
        $link = '$link';
        // let's send that link with a template to a new file
        file_put_contents('../email-templates/verify-new-email-transfer.php', "<?php $link = 'http://localhost:8888/amazon/verify-new-email.php?key=$verification_key&user_id=$user_id&user_email=$email';?>
        $template");
        // we execute our function and get a final product as html
        file_put_contents('../email-templates/verify-new-email-transfer.html', phpToHtml());
        // lets define a message and send that email
        $_message = file_get_contents('../email-templates/verify-new-email-transfer.html');
        require_once(__DIR__ . "/../private/send_email.php");
        //

        header('Content-Type: application/json');
        $response = ["info" => "email sent"];
        echo json_encode($response);
    }
} catch (Exception $ex) {
    http_response_code(500);
    echo 'System under maintainance';
    exit();
}

function send_400($error_message)
{
    http_response_code(400);
    $response = ["info" => $error_message];
    echo json_encode($response);
    //echo $error_message;
    exit();
}

// this converts php to html
function phpToHtml()
{
    ob_start();
    include("../email-templates/verify-new-email-transfer.php");
    $php_to_html = ob_get_clean();
    return $php_to_html;
}
