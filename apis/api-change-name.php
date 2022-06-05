<?php
session_start();
// connect to DB
require_once('../private/globals.php');
//validate user_id
if (!isset($_SESSION['user_id'])) {
    send_400('Log in to change your name');
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

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
    //define user id from session
    $user_id = $_SESSION['user_id'];

    $q = $db->prepare("UPDATE users SET user_first_name=:user_first_name, user_last_name=:user_last_name WHERE user_id=:user_id");
    $q->bindValue(":user_first_name", $_POST['first_name']);
    $q->bindValue(":user_last_name", $_POST['last_name']);
    $q->bindValue(":user_id", $user_id);
    $q->execute();

    header('Content-Type: application/json');
    $response = ["info" => "user name changed"];
    echo json_encode($response);
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
