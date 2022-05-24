<?php

// connect to DB
// include / require
require_once('../private/globals.php');

// email validate

if (!isset($_POST['email'])) {
    send_400('Email is required');
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    send_400('Email is invalid');
}

// name validate

if (!isset($_POST['first_name'])) {
    send_400('first name is required');
}

if (strlen($_POST['first_name']) < 2) {
    send_400('first name min 2 characters');
}

if (strlen($_POST['first_name']) > 20) {
    send_400('first name max 20 characters');
}

// last name validate

if (!isset($_POST['last_name'])) {
    send_400('last name is required');
}

if (strlen($_POST['last_name']) < 2) {
    send_400('last name min 2 characters');
}

if (strlen($_POST['last_name']) > 20) {
    send_400('last name max 20 characters');
}

// phone validate

if (!isset($_POST['phone'])) {
    send_400('phone number is required');
}

if (strlen($_POST['phone']) < 8) {
    send_400('phone min 8 digits');
}

if (strlen($_POST['phone']) > 8) {
    send_400('phone max 8 digits');
}

// password validate

if (!isset($_POST['password'])) {
    send_400('password required');
}
if (strlen($_POST['password']) < _PASSWORD_MIN_LEN) {
    send_400('password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['password']) > _PASSWORD_MAX_LEN) {
    send_400('password max ' . _PASSWORD_MAX_LEN . ' characters');
}

if (!isset($_POST['password_again'])) {
    send_400('password required');
}
if (strlen($_POST['password_again']) < _PASSWORD_MIN_LEN) {
    send_400('password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['password_again']) > _PASSWORD_MAX_LEN) {
    send_400('password max ' . _PASSWORD_MAX_LEN . ' characters');
}

// passwords should match

if ($_POST['password'] !== $_POST['password_again']) {
    send_400('Passwords should match');
}

// hash the password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//


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
        $_subject = 'Verify your new Amazon account';
        $verification_key = bin2hex(random_bytes(16));

        //insert data in the DB
        $q = $db->prepare('INSERT INTO users VALUES(:user_id, :user_first_name, :user_last_name, :user_email, :user_phone, :user_password, :user_ver_key, :user_is_verified)');
        $q->bindValue(":user_id", null); // the db will give this automatically
        $q->bindValue(":user_first_name", $_POST['first_name']);
        $q->bindValue(":user_last_name", $_POST['last_name']);
        $q->bindValue(":user_email", $_POST['email']);
        $q->bindValue(":user_phone", $_POST['phone']);
        $q->bindValue(":user_password", $password);
        $q->bindValue(":user_ver_key", $verification_key);
        $q->bindValue(":user_is_verified", 0);
        $q->execute();
        $user_id = $db->lastinsertid();

        // email verification

        // get php template
        $template = file_get_contents('../email-templates/verify-email.php');
        // i need to somehow pass the variable
        $link = '$link';
        // let's send that link with a template to a new file
        /* file_put_contents('../email-templates/verify-email-transfer.php', "<?php $link = 'http://localhost:8888/amazon/verify-email.php?key=$verification_key&user_id=$user_id';?>
        $template"); */
        file_put_contents('../email-templates/verify-email-transfer.php', "<?php $link = 'https://aivars-dev.com/not-amazon/verify-email.php?key=$verification_key&user_id=$user_id';?>
            $template");
        // we execute our function and get a final product as html
        file_put_contents('../email-templates/verify-email-transfer.html', phpToHtml());
        // lets define a message and send that email
        $_message = file_get_contents('../email-templates/verify-email-transfer.html');
        require_once(__DIR__ . "/../private/send_email.php");
        //

        // sends sms
        $phone_data = ['api_key' => '08c8a494-c3bf-4927-906a-2b8c7bd76d9e', 'to_phone' => $_POST['phone'], 'message' => 'Thank you for creating Amazon account. Your account is now linked with this phone number.'];
        $ch = curl_init("https://fatsms.com/send-sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $phone_data);
        $sms_response = curl_exec($ch);
        curl_close($ch);

        header('Content-Type: application/json');
        $response = ["info" => "user created", "user_id" => $user_id];
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
    include("../email-templates/verify-email-transfer.php");
    $php_to_html = ob_get_clean();
    return $php_to_html;
}
