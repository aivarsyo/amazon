<?php
session_start();
require_once('private/globals.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verification</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header id="signin-header">
        <img src="images/amazon-logo.png" alt="logo">
    </header>
    <main id="signin-main">
        <section id="signin-container">

            <div class="log" style="display: block;">
                <section class="log__inner">

                        <?php
                        // TODO: Verify the key (must be 32 characters)
                        if (!isset($_GET['key']) || strlen($_GET['key']) != 32 || !isset($_GET['user_id'])) {
                            http_response_code(400);
                            echo '
                                <div class="log__inner__fail log__inner__general">
                                    <img src="icons/error.png" alt="error">
                                    <span>Invalid link.</span>
                                ';
                                exit();
                        }

                        try {
                            $db = _db();
                        } catch (Exception $ex) {
                            _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
                        }

                        try {

                            $verification_key = $_GET['key'];
                            $user_id = $_GET['user_id'];
                            $user_email = $_GET['user_email'];

                            //prepare the statement
                            $user_stmt = $db->prepare("SELECT * FROM users WHERE user_id=:user_id");
                            $user_stmt->bindValue(":user_id", $user_id);
                            //execute the statement
                            $user_stmt->execute();
                            //fetch result
                            $user = $user_stmt->fetch();


                            if ($user['user_ver_key'] == $verification_key) {
                                //delete verification key
                                $verify_user = $db->prepare("UPDATE users SET user_ver_key=:user_ver_key, user_email=:user_email WHERE user_id=:user_id");
                                $verify_user->bindValue(":user_ver_key", '');
                                $verify_user->bindValue(":user_id", $user_id);
                                $verify_user->bindValue(":user_email", $user_email);
                                $verify_user->execute();

                                echo '
                                <div class="log__inner__success log__inner__general">
                                    <img src="icons/success.png" alt="success">
                                    <span>Success! You have verified your email, you can now sign in.</span>
                                ';
                            }  else {
                                echo '
                                <div class="log__inner__fail log__inner__general">
                                    <img src="icons/error.png" alt="error">
                                    <span>Link has expired.</span>
                                ';
                                http_response_code(400);
                                exit();
                            }
                        } catch (Exception $ex) {
                            _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
                            exit();
                        }
                        ?>
                    </div>
                    <a href="./signin.php" class="btn create-account-btn">Sign In</a>
                </section>


            </div>
        </section>
    </main>
</body>

</html>

<?php

function send_400($error_message)
{
  //$response = ["info" => $error_message];
  //echo json_encode($response);
  //http_response_code(400);
  _res(400, ['info' => $error_message]);
  exit();
}

function send_200($message)
{
    $response = ["info" => $message];
    echo json_encode($response);
    http_response_code(200);
}
?>