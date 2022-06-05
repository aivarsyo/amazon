<?php
session_start();
//connect db
require_once('./private/globals.php');
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}
// get all products from mysql db
try {
    $q = $db->prepare('SELECT * FROM products');
    $q->execute();
    $products = $q->fetchAll();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Products</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('header.php'); ?>

    <main id="products-main">

        <section class="products">

            <?php
            foreach ($products as $product) {
                try {
                    //product to check
                    $product_id = $product['item_id'];
                    //prepare the statement
                    $image_stmt = $db->prepare("SELECT * FROM images WHERE item_id=:item_id");
                    $image_stmt->bindValue(":item_id", $product_id);
                    //execute the statement
                    $image_stmt->execute();
                    //fetch result
                    $image = $image_stmt->fetch();
                } catch (Exception $ex) {
                    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
                }
            ?>
                <a href="product?id=<?= $product_id ?>" class="product">
                    <div class="product__image">
                        <img src="product-images/<?= $image['image_name'] ?>" alt="product-image">
                    </div>
                    <p class="product__title"><?= $product['item_name'] ?></p>
                    <p class="product__price"><sup>DKK</sup><?= $product['item_price'] ?>.-</p>
                </a>
            <?php } ?>

        </section>
    </main>


    <script src="js/script.js"></script>
</body>

</html>