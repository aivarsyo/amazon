<?php

require_once('../private/globals.php');

// Validate
if (!isset($_POST['email'])) {
  _res(400, ['info' => 'Email is required']);
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  _res(400, ['info' => 'Email is invalid']);
}

// Validate the password
if (!isset($_POST['password'])) {
  _res(400, ['info' => 'Password is required']);
}
if (strlen($_POST['password']) < _PASSWORD_MIN_LEN) {
  _res(400, ['info' => 'Password min ' . _PASSWORD_MIN_LEN . ' characters']);
}
if (strlen($_POST['password']) > _PASSWORD_MAX_LEN) {
  _res(400, ['info' => 'Password max ' . _PASSWORD_MAX_LEN . ' characters']);
}

try {
  $db = _db();
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
  //user to check
  $email = $_POST['email'];
  //prepare the statement
  $user_stmt = $db->prepare("SELECT * FROM users WHERE user_email=:user_email");
  $user_stmt->bindValue(":user_email", $_POST['email']);
  //execute the statement
  $user_stmt->execute();
  //fetch result
  $user = $user_stmt->fetch();


  //if user exists, proceed
  if ($user) {
    $password = $_POST['password'];
    //verify password
    if (password_verify($password, $user['user_password'])) {

      // Success
      session_start();
      $_SESSION['user_first_name'] = $user['user_first_name'];
      $_SESSION['user_is_verified'] = $user['user_is_verified'];
      $_SESSION['user_id'] = $user['user_id'];
      _res(200, ['info' => 'success login']);

    } else {
      send_400("Your password is incorrect");
    }
  } else {
    send_400("We cannot find an account with that email address");
  }
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
  exit();
}

function send_400($error_message)
{
  $response = ["info" => $error_message];
  echo json_encode($response);
  http_response_code(400);
  exit();
}
