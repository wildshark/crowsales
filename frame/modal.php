    <!-- Login Popup -->
    <div class="popup popup-login">
        <div class="content-block">
            <h4>LOGIN</h4>
            <div class="loginform">
                <form id="LoginForm" method="post" action="index.php">
                    <input type="text" name="username" value="" class="form_input required" placeholder="username" />
                    <input type="password" name="password" value="" class="form_input required"
                        placeholder="password" />
                    <div class="forgot_pass"><a href="#" data-popup=".popup-forgot" class="open-popup">Forgot
                            Password?</a></div>
                    <button type="submit" name="submit" class="form_submit" value="sign-in"> SIGN IN</button>
                </form>
                <div class="signup_bottom">
                    <p>Don't have an account?</p>
                    <a href="#" data-popup=".popup-signup" class="open-popup">SIGN UP</a>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup popup-signup">
        <div class="content-block">
            <h4>REGISTER</h4>
            <div class="loginform">
                <form id="RegisterForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="Username" />
                    <input type="text" name="Email" value="" class="form_input required" placeholder="Email" />
                    <input type="password" name="Password" value="" class="form_input required"
                        placeholder="Password" />
                    <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN UP" />
                </form>
                <h5>- OR REGISTER WITH A SOCIAL ACCOUNT -</h5>
                <div class="signup_social">
                    <a href="http://www.facebook.com/" class="signup_facebook external">FACEBOOK</a>
                    <a href="http://www.twitter.com/" class="signup_twitter external">TWITTER</a>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Forgot Password Popup -->
    <div class="popup popup-forgot">
        <div class="content-block">
            <h4>FORGOT PASSWORD</h4>
            <div class="loginform">
                <form id="ForgotForm" method="post">
                    <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
                    <input type="submit" name="submit" class="form_submit" id="submit" value="RESEND PASSWORD" />
                </form>
                <div class="signup_bottom">
                    <p>Check your email and follow the instructions to reset your password.</p>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="#" class="close-popup"><img src="images/icons/black/menu_close.png" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Social Icons Popup -->
    <div class="popup popup-social">
        <div class="content-block">
            <h4>Social Share</h4>
            <p>Share icons solution that allows you share and increase your social popularity.</p>
            <ul class="social_share">
                <li><a href="http://twitter.com/" class="external"><img src="images/icons/black/twitter.png" alt=""
                            title="" /><span>TWITTER</span></a></li>
                <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/black/facebook.png"
                            alt="" title="" /><span>FACEBOOK</span></a></li>
                <li><a href="http://plus.google.com/" class="external"><img src="images/icons/black/gplus.png" alt=""
                            title="" /><span>GOOGLE</span></a></li>
                <li><a href="http://www.dribbble.com/" class="external"><img src="images/icons/black/dribbble.png"
                            alt="" title="" /><span>DRIBBBLE</span></a></li>
                <li><a href="http://www.linkedin.com/" class="external"><img src="images/icons/black/linkedin.png"
                            alt="" title="" /><span>LINKEDIN</span></a></li>
                <li><a href="http://www.pinterest.com/" class="external"><img src="images/icons/black/pinterest.png"
                            alt="" title="" /><span>PINTEREST</span></a></li>
            </ul>
            <div class="close_popup_button"><a href="#" class="close-popup"><img src="images/icons/black/menu_close.png"
                        alt="" title="" /></a></div>
        </div>
    </div>