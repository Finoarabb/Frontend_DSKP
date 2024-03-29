<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/login.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/logo_bps.png">
    <title>SISTEM INFORMASI AGENDA DAN DISPOSISI SURAT</title>
    <style type="text/css"></style>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <!-- <form class="login" action='/login' method="post"> -->
                <form class="login" action='/login' method="post">
                    <div>
                        <!-- <h2 style="color:#4b9d48; font-family: Raleway, sans-serif; margin-bottom:10px;">SIAGENPOS</h2> -->
                        <h2 style="color:#4b9d48; font-family: arial; margin-bottom:5px;">SIAGENPOS</h2>
                        <h6 style="color:#4b9d48; font-family: arial;">SISTEM INFORMASI AGENDA</h6>
                        <h6 style="color:#4b9d48; font-family: arial;"> DAN DISPOSISI SURAT</h6>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="username" placeholder="Username">
                        <br />

                        <?php
                        if (!empty($username)) {
                            echo '<p class="invalid-feedback">' . $username . '</p>';
                        }
                        ?>

                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Password">
                        <?php
                        if (!empty($password))
                            echo '<p class="invalid-feedback">'.$password.'</p>';
                        // 
                        ?>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Log In Now</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h4 style="margin-block: 1em;"><img class="img-rounded" src="img/logo_bps.png" style="width: 50%;"></h4>
                </div>
                <div class="social-login-name">
                    <h3 style="margin-block: 1em; font-family: arial; font-size:11px; margin-bottom:11px;"> <i> BADAN PUSAT STATISTIK </i></h3>
                    <h3 style="margin-block: 1em; font-family: arial; font-size:11px;"><i>KABUPATEN PASURUAN</i></h3>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>

</html>