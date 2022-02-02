<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require_once('header.php'); ?>

    <main id="add-product">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <section>
                <h1>Change your password</h1>
                <div class="error-message">
                    <img src="../icons/exclamation-mark.png" alt="error">
                    <span>Passwords should match</span>
                </div>

                <div class="account-info">
                    <p>To change the password for your Amazon account, use this form.</p>
                    <form onsubmit="return false" id="change-password-form">
                        <div>
                            <label for="current_password">Current password</label>
                            <input type="password" name="current_password" required minlength="6" maxlength="20">
                        </div>
                        <div>
                            <label for="new_password">New password</label>
                            <input type="password" name="new_password" required minlength="6" maxlength="20">
                        </div>
                        <div>
                            <label for="repeat_password">Repeat new password</label>
                            <input type="password" name="repeat_password" required minlength="6" maxlength="20">
                        </div>
                        <input class="yellow-btn btn" type="submit" value="Save changes">
                    </form>
                </div>

            </section>

        <?php } else { ?>
            <section class="add-prod-container" style="width: 350px;">
                <div class="log" style="display: block;">
                    <section class="log__inner">
                        <div class="log__inner__fail log__inner__general">
                            <img src="../icons/error.png" alt="error">
                            <span>Sign in to change your password.</span>
                        </div>
                    </section>
                <?php } ?>
    </main>


    <script src="../js/script.js"></script>
</body>

</html>