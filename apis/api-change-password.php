<?php

// connect to DB
require_once('../private/globals.php');
//validate key and user_id
if (!isset($_COOKIE['key']) || strlen($_COOKIE['key']) != 32 || !isset($_COOKIE['user_id'])) {
    send_400('Invalid key');
  }

// password validate

if (!isset($_POST['password'])) {
    send_400('Password is required');
}
if (strlen($_POST['password']) < _PASSWORD_MIN_LEN) {
    send_400('Password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['password']) > _PASSWORD_MAX_LEN) {
    send_400('Password max ' . _PASSWORD_MAX_LEN . ' characters');
}

if (!isset($_POST['password_repeat'])) {
    send_400('Repeat password required');
}
if (strlen($_POST['password_repeat']) < _PASSWORD_MIN_LEN) {
    send_400('Repeat password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['password_repeat']) > _PASSWORD_MAX_LEN) {
    send_400('Repeat password max ' . _PASSWORD_MAX_LEN . ' characters');
}

if($_POST['password_repeat'] !== $_POST['password']){
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
    //define key and user id from cookies that are stored when opening a link from email
    $verification_key = $_COOKIE['key'];
    $user_id = $_COOKIE['user_id'];

    //prepare the statement
    $user_stmt = $db->prepare("SELECT * FROM users WHERE user_id=:user_id");
    $user_stmt->bindValue(":user_id", $user_id);
    //execute the statement
    $user_stmt->execute();
    //fetch result
    $user = $user_stmt->fetch();


    if ($user['user_ver_key'] == $verification_key) {
        $db->beginTransaction();

        $q = $db->prepare("UPDATE users SET user_ver_key=:user_ver_key, user_password=:user_password WHERE user_id=:user_id");
        $q->bindValue(":user_ver_key", '');
        $q->bindValue(":user_id", $user_id);
        $q->bindValue(":user_password", $password);
        $q->execute();

        //delete cookies
        setcookie('key', '', 1, '/');
        setcookie('user_id', '', 1, '/');

        $db->commit();
    
        header('Content-Type: application/json');
        $response = ["info" => "password changed"];
        echo json_encode($response);
    } else{
        $db->rollback();
        send_400("Couldn't change the password.");
    }
    
} catch (Exception $ex) {
    $db->rollback();
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
