<?php
session_start();
$product_id = $_GET['id'];

define("MAX_SIZE", "9000");
require_once('../private/globals.php');

// validate that product id is passed, user is singed in and verified

if (empty($product_id)) {
    send_400('Invalid link');
}

if (!isset($_SESSION['user_first_name'])) {
    send_400('You need to sign in to edit a product');
}

if ($_SESSION['user_is_verified'] !== "1") {
    send_400('You need to verify your account to edit a product');
}

// validate name

if (!isset($_POST['item_name'])) {
    send_400('Item name is required');
}

if (strlen($_POST['item_name']) < 5) {
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

// connect db

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

// insert product info

try {
    $db->beginTransaction();
    $product_stmt = $db->prepare("UPDATE products SET item_name=:item_name, item_price=:item_price, item_description=:item_description WHERE item_id=:item_id");
    $product_stmt->bindValue(":item_name", $_POST['item_name']);
    $product_stmt->bindValue(":item_price", $_POST['price']);
    $product_stmt->bindValue(":item_description", $_POST['description']);
    $product_stmt->bindValue(":item_id", $product_id);
    $product_stmt->execute();
} catch (Exception $ex) {
    $db->rollback();
    http_response_code(500);
    echo 'System under maintainance';
    exit();
}

// images upload if files selected


if (file_exists($_FILES['images']['tmp_name'][0])) {
    //set the image extentions
    $valid_formats = array("jpg", "png", "gif", "jpeg");
    $uploaddir = "../product-images/"; //image upload directory
    //echo $_FILES['images'];
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
                        $insert->bindValue(":item_id", $product_id);
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
    } catch (Exception $ex) {
        $db->rollback();
        http_response_code(500);
        echo 'System under maintainance';
        exit();
    }
}

// delete images selected
// at first check if any of checkboxes selected

if (in_array(!'', $_POST['photos'])) {

    try {

        foreach ($_POST['photos'] as $photo) {

            //delete selected images from directory
            //prepare the statement
            $file_stmt = $db->prepare("SELECT image_name FROM images WHERE image_id=:image_id");
            $file_stmt->bindValue(":image_id", $photo);
            //execute the statement
            $file_stmt->execute();
            //fetch result
            $image_name_delete = $file_stmt->fetch();

            unlink("../product-images/$image_name_delete[image_name]");


            // delete image from db
            $photo_stmt = $db->prepare("DELETE FROM images WHERE image_id = :image_id");
            $photo_stmt->bindValue(":image_id", $photo);
            $photo_stmt->execute();
        }
    } catch (Exception $ex) {
        $db->rollback();
        http_response_code(500);
        echo 'System under maintainance';
        exit();
    }
}

try {
    header('Content-Type: application/json');
    $response = ["info" => "Item edited successfully"];
    echo json_encode($response);
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
    ob_end_clean();
    http_response_code(400);
    $response = ["info" => $error_message];
    echo json_encode($response);
    //echo $error_message;
    exit();
}
