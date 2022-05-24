<?php
session_start();
if (isset($_SESSION['user_name'])) {
    header('Location:products');
    exit();
}
require_once('../private/globals.php');

// define variables from url
$verification_key = $_GET['key'];
$user_id = $_GET['user_id'];
//set the key and user_id in cookies, so that it can be used in the other file
setcookie('key', $verification_key, time() + 600, "/");
setcookie('user_id', $user_id, time() + 600, "/");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header id="signin-header">
        <a href="../"><img src="../images/logo.png" alt="logo"></a>
    </header>

    <main id="signin-main">
        <section id="signin-container">

            <section class="log__inner log-full-width">
                <div class="log__inner__fail log__inner__general">
                    <img src="../icons/error.png" alt="error">
                    <span>Invalid link</span>
                </div>
            </section>

            <?php
            // TODO: Verify the key (must be 32 characters)
            if (!isset($_GET['key']) || strlen($_GET['key']) != 32 || !isset($_GET['user_id'])) {
                echo '<section class="log__inner log-full-width" style="display:block;">
        <div class="log__inner__fail log__inner__general">
            <img src="../icons/error.png" alt="error">
            <span>Invalid link</span>
        </div>
    </section>';
                http_response_code(400);
                exit();
            }

            try {
                $db = _db();
            } catch (Exception $ex) {
                _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
            }

            try {
                //prepare the statement
                $user_stmt = $db->prepare("SELECT * FROM users WHERE user_id=:user_id");
                $user_stmt->bindValue(":user_id", $user_id);
                //execute the statement
                $user_stmt->execute();
                //fetch result
                $user = $user_stmt->fetch();


                if ($user['user_ver_key'] !== $verification_key) {
                    echo '<section class="log__inner log-full-width" style="display:block;">
          <div class="log__inner__fail log__inner__general">
              <img src="../icons/error.png" alt="error">
              <span>Link has expired</span>
          </div>
      </section>';
                    http_response_code(400);
                    exit();
                }
            } catch (Exception $ex) {
                _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
                exit();
            }
            ?>

            <form onsubmit="return false" id="change-pass-form" class="login-and-reg-form">
                <h1>Change password</h1>
                <div class="error-message">
                    <img src="../icons/exclamation-mark.png" alt="error">
                    <span>Passwords should match</span>
                </div>
                <label for="password">New password</label>
                <input type="password" name="password" required>
                <label for="password_repeat">Repeat new password</label>
                <input type="password" name="password_repeat" required>
                <input class="yellow-btn btn" type="submit" value="Change password">
            </form>

            <div class="log">
                <section class="log__inner">
                    <div class="log__inner__success log__inner__general">
                        <img src="../icons/success.png" alt="success">
                        <span>Password is succesfully changed.</span>
                    </div>
                    <a href="../signin.php" class="btn create-account-btn">Sign In</a>
                </section>


            </div>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>

<?php
function send_400($error_message)
{
    $response = ["info" => $error_message];
    echo json_encode($response);
    http_response_code(400);
    //echo $error_message;
    exit();
}
?>