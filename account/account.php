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
    <title>Account</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require_once('header.php'); ?>

    <main id="add-product">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <section>
                <h1>Account information</h1>

                <div class="account-info">
                    <div class="account-info__row">
                        <div>
                            <h3>Name:</h3>
                            <p><?php echo $user['user_first_name']; echo "\r\n"; echo $user['user_last_name']; ?></p>
                        </div>

                        <a href="change-name" class="btn create-account-btn">Edit</a>
                    </div>

                    <div class="account-info__row">
                        <div>
                            <h3>Email:</h3>
                            <p><?= $user['user_email']; ?></p>
                        </div>

                        <a href="change-email" class="btn create-account-btn">Edit</a>
                    </div>

                    <div class="account-info__row">
                        <div>
                            <h3>Mobile Phone number:</h3>
                            <p>+45 <?= $user['user_phone']; ?></p>
                        </div>

                        <a href="" class="btn create-account-btn">Edit</a>
                    </div>

                    <div class="account-info__row">
                        <div>
                            <h3>Password:</h3>
                            <p>********</p>
                        </div>

                        <a href="change-password" class="btn create-account-btn">Edit</a>
                    </div>
                </div>

            </section>

        <?php } else { ?>
            <section class="add-prod-container" style="width: 350px;">
                <div class="log" style="display: block;">
                    <section class="log__inner">
                        <div class="log__inner__fail log__inner__general">
                            <img src="../icons/error.png" alt="error">
                            <span>Sign in to access your account information.</span>
                        </div>
                    </section>
                <?php } ?>
    </main>


    <script src="../js/script.js"></script>
</body>

</html>