<?php
session_start();
$product_id = $_GET['id'];
// connect to DB
require_once('../private/globals.php');

if(empty($product_id)){
    send_400('Invalid link');
}

if (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "1") {

    try {
        $db = _db();
    } catch (Exception $ex) {
        _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
    }

    // get all image names for product

    try{
    //prepare the statement
    $file_stmt = $db->prepare("SELECT * FROM images WHERE item_id=:item_id");
    $file_stmt->bindValue(":item_id", $product_id);
    //execute the statement
    $file_stmt->execute();
    //fetch result
    $files = $file_stmt->fetchAll();
    }catch (Exception $ex) {
        http_response_code(500);
        echo 'System under maintainance';
        exit();
    }

    try {
        $db->beginTransaction();

        $product_stmt = $db->prepare("DELETE FROM products WHERE item_id = :item_id");
        $product_stmt->bindValue(":item_id", $product_id);
        $product_stmt->execute();

        $img_stmt = $db->prepare("DELETE FROM images WHERE item_id = :item_id");
        $img_stmt->bindValue(":item_id", $product_id);
        $img_stmt->execute();

        // delete product images from directory

        foreach($files as $file){
            unlink("../product-images/$file[image_name]");
        }

        $db->commit();

        header('Content-Type: application/json');
        $response = ["info" => "Product is deleted"];
        echo json_encode($response);
    } catch (Exception $ex) {
        $db->rollback();
        http_response_code(500);
        echo 'System under maintainance';
        exit();
    }

} elseif(isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "0"){
    $db->rollback();
    send_400('Verify your account to delete a product.');
} else{
    $db->rollback();
    send_400('Create an account to delete a product.');
}

function send_400($error_message)
{
  //$response = ["info" => $error_message];
  //echo json_encode($response);
  //http_response_code(400);
  _res(400, ['info' => $error_message]);
  exit();
}