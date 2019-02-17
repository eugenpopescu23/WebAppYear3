<?php require 'server.php'?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body onLoad="ChangeCaptcha()">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <img src="css/images/logo.png" class="img-nav" alt="logo"  width="40" height="50">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="starter-template">
                <h1>Register</h1>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form method="post" action="register.php">
                        <?php require 'errors.php';?>
                        <div>
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                        </div>
                        <div>
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                        <div>
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" class="form-control" name="password_1">
                        </div>
                        <div >
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="password_2">
                        </div>
                        <br>
                        <div>
                            <p><img src="captcha.php" width="180" height="40" border="1" alt="CAPTCHA"></p>
                        </div>
                        <div>
                            <input placeholder="Enter Captcha" class="form-control" name="CaptchaEnter" id="CaptchaEnter" size="20" maxlength="6" />
                        </div>
                        <br>
                        <div >
                            <button type="submit" class="btn" name="reg_user">Register</button>
                        </div>
                        <br>
                        <p>
                            Already a member? <a href="login.php">Sign in</a>
                        </p>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>