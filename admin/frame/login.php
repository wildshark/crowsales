<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("header.php")?>
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <form method="post" action="index.php">
                            <div class="form-login">
                                <label>Username</label>
                                <div class="form-addons">
                                    <input type="text" name="username" placeholder="Enter your username">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <div class="alreadyuser">
                                    <h4><a href="#?page=reset" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" name="submit" value="user-login" class="btn btn-login">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>
    <?php include("js.php")?>
</body>

</html>