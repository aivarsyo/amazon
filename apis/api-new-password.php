<?php
session_start();
// connect to DB
require_once('../private/globals.php');
//validate user_id
if (!isset($_SESSION['user_id'])) {
    send_400('Log in to change your password');
}

// password validate

if (!isset($_POST['current_password'])) {
    send_400('current password required');
}
if (strlen($_POST['current_password']) < _PASSWORD_MIN_LEN) {
    send_400('current password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['current_password']) > _PASSWORD_MAX_LEN) {
    send_400('current password max ' . _PASSWORD_MAX_LEN . ' characters');
}

if (!isset($_POST['new_password'])) {
    send_400('new password required');
}
if (strlen($_POST['new_password']) < _PASSWORD_MIN_LEN) {
    send_400('new password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['new_password']) > _PASSWORD_MAX_LEN) {
    send_400('new password max ' . _PASSWORD_MAX_LEN . ' characters');
}

if (!isset($_POST['repeat_password'])) {
    send_400('repeat password required');
}
if (strlen($_POST['repeat_password']) < _PASSWORD_MIN_LEN) {
    send_400('repeat password min ' . _PASSWORD_MIN_LEN . ' characters');
}
if (strlen($_POST['repeat_password']) > _PASSWORD_MAX_LEN) {
    send_400('repeat password max ' . _PASSWORD_MAX_LEN . ' characters');
}

// passwords should match

if ($_POST['new_password'] !== $_POST['repeat_password']) {
    send_400('New password should match');
}

// hash the password
$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
//
//define user id from session
$user_id = $_SESSION['user_id'];

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    //prepare the statement
    $user_stmt = $db->prepare("SELECT * FROM users WHERE user_id=:user_id");
    $user_stmt->bindValue(":user_id", $user_id);
    //execute the statement
    $user_stmt->execute();
    //fetch result
    $user = $user_stmt->fetch();
  

      $current_password = $_POST['current_password'];
      //verify password
      if (password_verify($current_password, $user['user_password'])) {
  
        $q = $db->prepare("UPDATE users SET user_password=:user_password WHERE user_id=:user_id");
        $q->bindValue(":user_password", $new_password);
        $q->bindValue(":user_id", $user_id);
        $q->execute();
    
        header('Content-Type: application/json');
        $response = ["info" => "user password changed"];
        echo json_encode($response);
  
      } else {
        send_400("Current password is incorrect");
      }
  } catch (Exception $ex) {
    http_response_code(500);
    echo 'System under maintainance';
    exit();
  }

  function send_400($error_message)
  {
    //$response = ["info" => $error_message];
    //echo json_encode($response);
    //http_response_code(400);
    _res(400, ['info' => $error_message]);
    exit();
  }
