<?php
session_start();

//connect db
require_once('../private/globals.php');
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}
// get all products from mysql db
try {
    $q = $db->prepare('SELECT * FROM users WHERE user_id=:user_id');
    $q->bindValue(":user_id", $_SESSION['user_id']);
    //execute the statement
    $q->execute();
    //fetch result
    $user = $q->fetch();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change email</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require_once('header.php'); ?>

    <main id="add-product">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <section>
                <h1>Change your email</h1>
                <div class="error-message">
                    <img src="../icons/exclamation-mark.png" alt="error">
                    <span>Passwords should match</span>
                </div>

                <div class="account-info">
                    <p>Current email address: <?= $user['user_email']; ?><br><br>
                        Enter the new email address you would like to associate with your account below. We will send a verification email to that address.</p>
                    <form onsubmit="return false" id="change-email-form">
                        <div>
                            <label for="email">New email address</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
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
                            <span>Sign in to change your email.</span>
                        </div>
                    </section>
                <?php } ?>
    </main>


    <script src="../js/script.js"></script>
</body>

</html>