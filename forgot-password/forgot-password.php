<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Password Assistance</title>
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
                    <span>We're sorry. We weren't able to identify you given the information provided.</span>
                </div>
            </section>


            <form onsubmit="return false" id="forgot-pass-form" class="login-and-reg-form">
                <h1>Password assistance</h1>
                <p>Enter the email address associated with your Not Amazon account.</p>
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <input class="yellow-btn btn" type="submit" value="Send email">

                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </form>

            <div class="log">
                <section class="log__inner">
                    <div class="log__inner__success log__inner__general">
                        <img src="../icons/success.png" alt="success">
                        <span>We have sent you an email with a link to change the password.</span>
                    </div>
                    <a href="../signin.php" class="btn create-account-btn">Sign In</a>
                </section>


            </div>
        </section>
    </main>

    <script src="../js/script.js"></script>
</body>

</html>