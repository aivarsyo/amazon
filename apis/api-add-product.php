<?php
define("MAX_SIZE", "9000");
require_once('../private/globals.php');

// validate name

if (!isset($_POST['name'])) {
    send_400('Item name is required');
}

if (strlen($_POST['name']) < 5) {
    send_400('Item name must be at least 5 characters');
}

// validate price

if (!isset($_POST['price'])) {
    send_400('Item price is required');
}

if (empty($_POST['price']) || $_POST['price'] < 0) {
    send_400('Item price is invalid');
}

// validate description

if (!isset($_POST['description'])) {
    send_400('Item description is required');
}

if (strlen($_POST['description']) < 20) {
    send_400('Item description must be at least 20 characters');
}

if (strlen($_POST['description']) > 2000) {
    send_400("Item description can't exceed 2000 characters");
}

// validate file

if (!isset($_FILES['images'])) {
    send_400('Item image is required');
}

if ($_FILES['images']['tmp_name'][0] == "") {
    send_400('No images were selected for uploading');
}

if (filesize($_FILES['images']) > (MAX_SIZE * 1024)) {
    send_400('Max upload size for all images can not exceed 8MB');
}

// connect db

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    $db->beginTransaction();

    $q = $db->prepare('INSERT INTO products VALUES(:item_id, :item_name, :item_price, :item_description)');
    $q->bindValue(":item_id", null);
    $q->bindValue(":item_name", $_POST['name']);
    $q->bindValue(":item_price", $_POST['price']);
    $q->bindValue(":item_description", $_POST['description']);
    $q->execute();
    $item_id = $db->lastinsertid();

    header('Content-Type: application/json');
    $response = ["info" => "Item added successfully", "item_id" => $item_id];
    echo json_encode($response);
} catch (Exception $ex) {
    $db->rollback();
    http_response_code(500);
    echo 'System under maintainance';
    exit();
}

//set the image extentions
$valid_formats = array("jpg", "png", "gif", "jpeg");
$uploaddir = "../product-images/"; //image upload directory

try {
    foreach ($_FILES['images']['name'] as $name => $value) {
        $filename = stripslashes($_FILES['images']['name'][$name]);
        $size = filesize($_FILES['images']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if (in_array($ext, $valid_formats)) {
            if ($size < (MAX_SIZE * 1024)) {
                $image_name = $filename;
                $newname = $uploaddir . $image_name;

                if (move_uploaded_file($_FILES['images']['tmp_name'][$name], $newname)) {

                    //insert in database

                    $insert = $db->prepare('INSERT INTO images VALUES(:image_id, :image_name, :item_id)');
                    $insert->bindValue(":image_id", null); // the db will give this automatically
                    $insert->bindValue(":image_name", $image_name);
                    $insert->bindValue(":item_id", $item_id);
                    $insert->execute();
                } else {
                    $db->rollback();
                    send_400('You have exceeded the size limit for uploading images');
                }
            } else {
                $db->rollback();
                send_400('You have exceeded the size limit for uploading images');
            }
        } else {
            $db->rollback();
            send_400('Unknown extension for an image you are trying to upload');
        }
    }

    $db->commit();
} catch (Exception $ex) {
    $db->rollback();
    http_response_code(500);
    echo 'System under maintainance';
    exit();
}

function getExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

function send_400($error_message)
{
  //$response = ["info" => $error_message];
  //echo json_encode($response);
  //http_response_code(400);
  _res(400, ['info' => $error_message]);
  exit();
}
