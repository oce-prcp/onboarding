<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="connexion.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Inscription</title>
</head>
<body>
    <div class="parent clearfix">
            <div class="bg-illustration">
                <img src="../onboarding/img/logo-cuisine.png" alt="logo">
                <div class="burger-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <!-- Login -->
            <div class="login">
                <div class="container">
                    <h1  class="txt-login-register">Sign-in to access to<br />your account</h1>
                    <div class="login-form">
                        <form action="./request.php" method="POST">
                            <input name="username" type="username" placeholder="username">
                            <input name="mail" type="email" placeholder="E-mail Address">
                            <input type="hidden" name="action" value="inscription">
                            <input name="password" type="password" placeholder="Password">

                            <div class="remember-form">
                                <input type="checkbox">
                            <span>Remember me</span>
                            </div>

                            <div class="forget-pass">
                                <a href="#">Forgot Password ?</a>
                            </div>
                            <button type="submit">SIGN-IN</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <script src="script.js"></script>
</body>
</html>