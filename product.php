<?php
session_start();
$product_id = $_GET['id'];
$productExists = false;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product name</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slider/flickity.min.css" media="screen">
</head>

<body>
    <?php require_once('header.php'); ?>

    <main id="single-product-main">

        <?php
        if ($productExists == false) {
            $shop_1 = json_decode(file_get_contents("shops/shop_1.txt"));
            foreach ($shop_1 as $item) {
                if ($item->id == $product_id) {
                    $productExists = true;
        ?>

                    <section class="singleProduct">

                        <div class="product-images" data-flickity='{ "prevNextButtons": false, "pageDots": false }'>
                            <div class="image-cell">
                                <img src="<?= "https://coderspage.com/2021-F-Web-Dev-Images/$item->image" ?>" alt="">
                            </div>
                        </div>

                        <div class="singleProduct__info">
                            <h1 class="singleProduct__info__title">
                                <?= $item->title ?>
                            </h1>
                            <h3 class="singleProduct__info__price">DKK <?= $item->price ?>.-</h3>
                            <div class="singleProduct__info__description">
                                <h4>About this item</h4>
                                <p><?= $item->description ?></p>
                            </div>
                        </div>

                        <div class="singleProduct__edit">
                            <?php if (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "1") { ?>
                                <button class="btn create-account-btn">Edit product</button>
                                <button class="btn delete-btn">Delete product</button>
                                <p>Can't edit or delete google products.</p>
                            <?php } elseif (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "0") { ?>
                                <button class="btn create-account-btn" disabled>Edit product</button>
                                <button class="btn delete-btn" disabled>Delete product</button>
                                <p>Verify your profile to access this functionality.</p>
                                <p>Can't edit or delete google products.</p>
                            <?php } else { ?>
                                <button class="btn create-account-btn" disabled>Edit product</button>
                                <button class="btn delete-btn" disabled>Delete product</button>
                                <p>Create a profile to access this functionality.</p>
                                <p>Can't edit or delete google products.</p>
                            <?php } ?>
                        </div>

                    </section>

        <?php }
            }
        } ?>

        <?php
        if ($productExists == false) {
            $shop_2 = json_decode(file_get_contents("shops/shop_2.txt"));
            foreach ($shop_2 as $item) {
                if ($item->id == $product_id) {
                    $productExists = true;
        ?>

                    <section class="singleProduct">

                        <div class="product-images" data-flickity='{ "prevNextButtons": false, "pageDots": false }'>
                            <div class="image-cell">
                                <img src="<?= "https://coderspage.com/2021-F-Web-Dev-Images/$item->image" ?>" alt="">
                            </div>
                        </div>

                        <div class="singleProduct__info">
                            <h1 class="singleProduct__info__title">
                                <?= $item->title_en ?>
                            </h1>
                            <h3 class="singleProduct__info__price">DKK <?= $item->price ?>.-</h3>
                            <div class="singleProduct__info__description">
                                <h4>About this item</h4>
                                <p><?= $item->description ?></p>
                            </div>
                        </div>

                        <div class="singleProduct__edit">
                            <?php if (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "1") { ?>
                                <button class="btn create-account-btn">Edit product</button>
                                <button class="btn delete-btn">Delete product</button>
                                <p>Can't edit or delete google products.</p>
                            <?php } elseif (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "0") { ?>
                                <button class="btn create-account-btn" disabled>Edit product</button>
                                <button class="btn delete-btn" disabled>Delete product</button>
                                <p>Verify your profile to access this functionality.</p>
                                <p>Can't edit or delete google products.</p>
                            <?php } else { ?>
                                <button class="btn create-account-btn" disabled>Edit product</button>
                                <button class="btn delete-btn" disabled>Delete product</button>
                                <p>Create a profile to access this functionality.</p>
                                <p>Can't edit or delete google products.</p>
                            <?php } ?>
                        </div>

                    </section>

        <?php }
            }
        } ?>

        <?php
        if ($productExists == false) {
            $productExists = true;
            require_once('./private/globals.php');
            try {
                $db = _db();
            } catch (Exception $ex) {
                _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
            }
            try {
                //prepare the statement
                $product_stmt = $db->prepare("SELECT * FROM products WHERE item_id=:item_id");
                $product_stmt->bindValue(":item_id", $product_id);
                //execute the statement
                $product_stmt->execute();
                //fetch result
                $product = $product_stmt->fetch();

                if ($product) {
                    //prepare the statement
                    $image_stmt = $db->prepare("SELECT * FROM images WHERE item_id=:item_id");
                    $image_stmt->bindValue(":item_id", $product_id);
                    //execute the statement
                    $image_stmt->execute();
                    //fetch result
                    $images = $image_stmt->fetchAll();
                } ?>
                <section class="singleProduct">

                    <div class="product-images">
                        <?php
                        foreach ($images as $image) {
                        ?>
                            <div class="image-cell">
                                <img src="product-images/<?= $image['image_name'] ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>

                    <div class="singleProduct__info">
                        <h1 class="singleProduct__info__title">
                            <?= $product['item_name'] ?>
                        </h1>
                        <h3 class="singleProduct__info__price">DKK <?= $product['item_price'] ?>.-</h3>
                        <div class="singleProduct__info__description">
                            <h4>About this item</h4>
                            <p><?= $product['item_description'] ?></p>
                        </div>
                    </div>

                    <div class="singleProduct__edit">
                        <?php if (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "1") { ?>
                            <button class="btn create-account-btn" id="edit-btn">Edit product</button>
                            <button class="btn delete-btn delete-btn-functional" data-id="<?= $product_id ?>" onclick="deleteProduct(this.dataset.id)">Delete product</button>
                        <?php } elseif (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "0") { ?>
                            <button class="btn create-account-btn" disabled>Edit product</button>
                            <button class="btn delete-btn" disabled>Delete product</button>
                            <p>Verify your profile to access this functionality.</p>
                        <?php } else { ?>
                            <button class="btn create-account-btn" disabled>Edit product</button>
                            <button class="btn delete-btn" disabled>Delete product</button>
                            <p>Create a profile to access this functionality.</p>
                        <?php } ?>
                    </div>

                </section>
        <?php
            } catch (Exception $ex) {
                _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
                exit();
            }
        }
        ?>

        <div class="editProduct">
            <img class="close" src="images/close-icon.svg" alt="">
            <form onsubmit="return false;" enctype="multipart/form-data" id="editProductForm" data-id="<?= $product_id ?>">
                <label for="item_name">Item name</label>
                <input type="text" name="item_name" minlength="5" required value="<?= $product['item_name'] ?>">
                <label for="price">Item price</label>
                <input type="number" name="price" min="1.00" step="1" required value="<?= $product['item_price'] ?>" />
                <label for="description">Item description</label>
                <textarea rows="4" cols="50" name="description" minlength="20" maxlength="2000" required><?= $product['item_description'] ?></textarea>
                <label for="images[]">Upload item image/-s</label>
                <div class="upload-extra">
                    <input type="file" name="images[]" id="images" multiple />
                    <span>Max upload size 8MB</span>
                </div>
                <label for="delete-images">Choose image/-s to delete</label>
                <div class="delete-images">
                    <?php foreach ($images as $image) { ?>
                        <input type="checkbox" name="photos[]" value="<?= $image['image_id'] ?>" id="checbox<?= $image['image_id'] ?>">
                        <label for="checbox<?= $image['image_id'] ?>"><img src="product-images/<?= $image['image_name'] ?>"></label>
                    <?php } ?>
                </div>
                <input class="yellow-btn btn" type="submit" value="Submit changes">
            </form>
        </div>

    </main>


    <script src="js/script.js"></script>
    <script src="js/slider/flickity.pkgd.min.js"></script>
</body>

</html>