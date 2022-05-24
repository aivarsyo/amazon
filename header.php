<div id="trans-cover"></div>

    <header id="products-header">
        <a href="./">
            <img src="images/logo.png" alt="logo">
        </a>
        <div class="dropdown">
            <div class="dropdown__button">
            <?php if(isset($_SESSION['user_first_name'])){ ?>
                <p>Hello, <?= $_SESSION['user_first_name'] ?></p>
                <?php } else{?>
                <p>Hello, Stranger</p>
                <?php } ?>
                <p>Account <img src="icons/down-arrow.png" alt="down-arrow"></p>
            </div>
            <div class="dropdown__content">
            <?php if(isset($_SESSION['user_first_name'])){ ?>
                <div class="dropdown__content__links">
                    <p>Your Account</p>
                    <a href="account/account">Account</a>
                    <a href="./add-product">Add a product</a>
                    <a href="signout.php">Sign out</a>
                </div>
                <?php } else{?>
                    <div class="dropdown__content__login">
                    <a href="signin" class="btn create-account-btn yellow-conf">Sign in</a>
                    <div>
                        <span>New customer?</span>
                        <a class="blue-link" href="register">Start here.</a>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </header>
