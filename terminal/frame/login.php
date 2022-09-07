<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>GoMobile - Creative Mobile Template</title>
    <link rel="stylesheet" href="vendor/swiper/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="css2-1.css?family=Raleway:wght@300;400;500;600;800&display=swap" rel="stylesheet">
</head>

<body>

    <div class="page page--login" data-page="login">

        <!-- HEADER -->
        <header class="header header--fixed">
            <div class="header__inner">
                <div class="header__icon"><a href="splash.html"><img src="../assets/images/icons/gray/arrow-back.svg"
                            alt="" title=""></a></div>
            </div>
        </header>

        <div class="login">
            <div class="login__content">
                <h2 class="login__title">Login to your account</h2>
                <div class="login-form">
                    <form method="post" action="index.php">
                        <div class="login-form__row">
                            <label class="login-form__label">Username</label>
                            <input type="text" name="usr" value="" class="login-form__input required">
                        </div>
                        <div class="login-form__row">
                            <label class="login-form__label">Password</label>
                            <input type="password" name="pwd" value="" class="login-form__input required">
                        </div>
                        <div class="login-form__row">
                            <button type="submit" name="submit" class="login-form__submit button button--blue button--full" value="user-login">SIGN IN</button>
                        </div>
                    </form>
                    <div class="login-form__forgot-pass"><a href="forgot-password.html">Forgot Password?</a></div>
                </div>
            </div>
        </div>



    </div>
    <!-- PAGE END -->

    <script src="vendor/jquery/jquery-3.5.1.min.js"></script>
    <script src="vendor/jquery/jquery.validate.min.js"></script>
    <script src="vendor/swiper/swiper.min.js"></script>
    <script src="js/jquery.custom.js"></script>
</body>

</html>