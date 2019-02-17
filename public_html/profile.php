<?php
session_start();
ob_start();
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <img src="css/images/logo.png" class="img-nav" alt="logo"  width="40" height="50">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_post.php">Your Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all_posts.php">All Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="post.php">Create Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="starter-template">
                <h1>My Profile</h1>
            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <!-- logged in user information -->
                    <?php
require_once __DIR__ . "/database.php";
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username' AND valid='1'";
$result = mysqli_query($db, $query);
if (isset($_SESSION['username']) && $row = mysqli_fetch_assoc($result)): ?>
                    <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p><br>
                    <p>If you would like to add your commute journey, press the button bellow</p>
                    <div>
                        <button onclick="window.location.href='/~ep6562v/post.php'"  class="btn" name="create_post" href="post.php">Create Post</button>
                    </div>
                    <br>
                    <div>
                        <button onclick="window.location.href='/~ep6562v/display_post.php'" class="btn" name="display_post" href="display_post.php">Display Post</button>
                    </div>
                    <?php else: ?>
                    <?php header("location: login.php");?>
                    <?php endif?>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>