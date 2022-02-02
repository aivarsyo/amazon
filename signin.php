<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign-In</title>
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
            <div class="log__inner__fail log__inner__general" style="display: none;"> 
                <img src="icons/error.png" alt="error">
                <span>Invalid link.</span>
            </div>
            <form onsubmit="return false" id="signin-form" class="login-and-reg-form">
                <h1>Sign-In</h1>
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <div class="password-separator">
                    <label for="password">Password</label>
                    <a class="blue-link" href="forgot-password/forgot-password.php">Forgot your password?</a>
                </div>
                <input type="password" name="password" required minlength="6" maxlength="20">
                <input class="yellow-btn btn" type="submit" value="Sign-In">

                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </form>

            <div id="new-to-amazon">
                <span></span>
                <p>New to Amazon?</p>
                <span></span>
            </div>

            <a href="./register.php" class="btn create-account-btn">Create your Amazon account</a>
        </section>
    </main>

    <script src="js/script.js"></script>
</body>

</html>