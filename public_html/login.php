<?php require 'server.php'?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!--    <link href="css/style.css" rel="stylesheet" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <img src="css/images/logo.png" class="img-nav" alt="logo"  width="40" height="50">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="starter-template">
                <h1>Login</h1>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <form method="post" action="login.php">
                        <?php require 'errors.php';?>
                        <div>
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username = isset($_COOKIE['username']) ? $_COOKIE['username'] : ""; ?>" required />
                        </div>
                        <br>
                        <div>
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <br>
                        <div>
                            <input type="checkbox" name="remember" value="1"/> Remember Me
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn" name="login_user">Login</button>
                        </div>
                        <br>
                        <p>
                            Not yet a member? <a href="register.php">Sign up</a>
                        </p>
                    </form>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>