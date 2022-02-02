<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add a product</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once('header.php'); ?>

    <main id="add-product">
        <?php if (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "1") { ?>
            <section class="add-prod-container">
                <h1>Add new product</h1>
                <div class="error-message">
                    <img src="icons/exclamation-mark.png" alt="error">
                    <span>Passwords should match</span>
                </div>

                <form onsubmit="return false" enctype="multipart/form-data" id="addProduct">
                    <label for="name">Item name</label>
                    <input type="text" name="name" minlength="5" required>
                    <label for="price">Item price</label>
                    <input type="number" name="price" min="1.00" step="1" required />
                    <label for="description">Item description</label>
                    <textarea rows="4" cols="50" name="description" minlength="20" maxlength="2000" required></textarea>
                    <label for="images[]">Upload item image/-s</label>
                    <div class="form-group file-area">
                        <input type="file" name="images[]" id="images" required multiple />
                        <div class="file-dummy">
                            <div class="success">Your files are selected</div>
                            <div class="default">Please select some files</div>
                        </div>
                        <span>Max upload size 8MB</span>
                    </div>
                    <input class="yellow-btn btn" type="submit" value="Upload">
                </form>
            </section>
        <?php } elseif (isset($_SESSION['user_first_name']) && $_SESSION['user_is_verified'] == "0") { ?>
            <section class="add-prod-container" style="width: 350px;">
                <div class="log" style="display: block;">
                    <section class="log__inner">
                        <div class="log__inner__neutral log__inner__general">
                            <img src="icons/neutral-error.png" alt="neutral-error">
                            <span>Verify your account to add new products.</span>
                        </div>
                    </section>
                <?php } else { ?>
                    <section class="add-prod-container" style="width: 350px;">
                        <div class="log" style="display: block;">
                            <section class="log__inner">
                                <div class="log__inner__fail log__inner__general">
                                    <img src="icons/error.png" alt="error">
                                    <span>Sign in or create an account to add new products.</span>
                                </div>
                            </section>
                        <?php } ?>
    </main>


    <script src="js/script.js"></script>
</body>

</html>