<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header id="signin-header">
        <a href="./"><img src="images/logo.png" alt="logo"></a>
    </header>

    <main id="signin-main">
        <section id="signin-container">
            <form onsubmit="return false" id="register-form" class="login-and-reg-form">
                <h1>Create account</h1>
                <div class="error-message">
                    <img src="icons/exclamation-mark.png" alt="error">
                    <span>Passwords should match</span>
                </div>
                <label for="first_name">First name</label>
                <input type="text" name="first_name" minlength="2" required>
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" minlength="2" required>
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <label for="phone">Mobile phone number</label>
                <input type="tel" name="phone" minlength="8" maxlength="8" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                <label for="password">Password</label>
                <input type="password" name="password" required minlength="6" maxlength="20" placeholder="At least 6 characters" class="register-password">
                <div class="pass-info">
                    <img src="icons/info.png" alt="info-icon">
                    <span>Password must be at least 6 characters.</span>
                </div>
                <label for="password_again">Re-enter password</label>
                <input type="password" name="password_again" required minlength="6" maxlength="20">
                <input class="yellow-btn btn" type="submit" value="Create your Not Amazon account">

                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

                <div class="page-divider"></div>
                <div>
                    <span>Already have an account?</span>
                    <a class="blue-link" href="./signin.php">Sign-In</a>
                </div>
            </form>

            <div class="log">
                <section class="log__inner">
                    <div class="log__inner__success log__inner__general">
                        <img src="icons/success.png" alt="success">
                        <span>Success! You are now registered on Amazon. Check your email for a verification message.</span>
                    </div>
                    <a href="./signin.php" class="btn create-account-btn">Sign In</a>
                </section>


            </div>

        </section>
    </main>

    <script src="js/script.js"></script>
</body>

</html>