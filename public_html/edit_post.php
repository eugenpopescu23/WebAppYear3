<?php require 'server.php'?>
<?php require 'errors.php';?>
<?php
require_once __DIR__ . "/database.php";
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username' AND valid='1'";
$result = mysqli_query($db, $query);
if (isset($_SESSION['username']) && $row = mysqli_fetch_assoc($result)): ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <style type="text/css">
    body {
    padding-top: 5rem;
    }
    .starter-template {
    padding: 3rem 1.5rem;
    text-align: center;
    }
    .img-fluid2{
    max-width: 300px;
    height: auto;
    }
    .img-nav{
    margin-right: 10px;
    }
    </style>
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
        <h1>Edit Post</h1>
      </div>
      <?php
if (isset($_POST['ID'])) {
  $_SESSION['PostID'] = $_POST['ID'];
}
require_once __DIR__ . "/database.php";
$query = "SELECT * FROM routes WHERE ID=' " . $_SESSION['PostID'] . "'";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)) {
  ?>
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <form  action="" method="post" enctype="multipart/form-data">
            <?php
echo "<img class='img-fluid2' src='css/images/" . $row['image'] . "' >";
  echo "<img class='img-fluid2'  src='css/images/" . $row['image_other'] . "' />";
  echo "<img class='img-fluid2' src='css/images/" . $row['image_other2'] . "' />";
  echo "<br>";
  echo "<br>";
  echo "<div class='fileinput'>";
  echo "<input type=file name=image accept=image/x-png,image/gif,image/jpeg >";
  echo "<input type=file name=image_other accept=image/x-png,image/gif,image/jpeg >";
  echo "<input type=file name=image_other2 accept=image/x-png,image/gif,image/jpeg >";
  echo "<br>";
  echo "<br>";
  echo "<div>";
  echo "<p>User: " . $row['username'] . "</p>";
  echo "<p>Starting Point:<input class='form-control' type=text name=startingpoint value=" . $row['startingpoint'] . " >";
  echo "<p>Destination: <input type=text class='form-control'name=destination value=" . $row['destination'] . " >";
  echo "<p>Time: <input type=time class='form-control' name=time value=" . $row['time'] . " >";
  echo "<p>Days of Travel:  <input type=text class='form-control'name=days value=" . $row['days'] . " >";
  echo "<p>Provide: <input type=text class='form-control' name=provide value=" . $row['provide'] . " >";
  echo "<p>Car: <input type=text class='form-control'name=car value=" . $row['car'] . " >";
  echo "<p>Cost: <input type=text class='form-control'name=cost value=" . $row['cost'] . " >";
  echo "</div>";
  ?>
                            <div>
                              <button type="submit" class="btn" name="finishedit_post">Edit Post</button>
                            </div>
                            <br>
                            <div>
                              <button class=btn type="submit" name="delete_image">Delete Pic</button>
                              <button type="submit" class=btn name="delete_image2">Delete Pic 2</button>
                              <button type="submit" class=btn name="delete_image3">Delete Pic 3</button>
                            </div>
                          </form>
                        </div>
                        <div class="col-sm-4"></div>
                      </div>
                    </div>
                    <?php
}
?>
                    <?php
// if edit post pressed update the post
if (isset($_POST['finishedit_post'])) {
  $image = $_FILES['image']['name'];
  $image_other = $_FILES['image_other']['name'];
  $image_other2 = $_FILES['image_other2']['name'];
  $target = "css/images/" . basename($_FILES['image']['name']);
  $target2 = "css/images/" . basename($_FILES['image_other']['name']);
  $target3 = "css/images/" . basename($_FILES['image_other2']['name']);
  if (isset($_POST['startingpoint'])) {
    $startingpoint = $_POST['startingpoint'];
    if (isset($_POST['destination'])) {
      $destination = $_POST['destination'];
      if (isset($_POST['time'])) {
        $time = $_POST['time'];
        if (isset($_POST['days'])) {
          $days = $_POST['days'];
          if (isset($_POST['provide'])) {
            $provide = $_POST['provide'];
            if (isset($_POST['car'])) {
              $car = $_POST['car'];
              if (isset($_POST['cost'])) {
                $cost = $_POST['cost'];
                //if image upload not empty
                if (!empty($_FILES['image']['name'])) {
                  $sql = "UPDATE routes SET image='$image' WHERE ID=' " . $_SESSION['PostID'] . "'";
                  mysqli_query($db, $sql);
                }
                if (!empty($_FILES['image_other']['name'])) {
                  $sql = "UPDATE routes SET image_other='$image_other' WHERE ID=' " . $_SESSION['PostID'] . "'";
                  mysqli_query($db, $sql);
                }
                if (!empty($_FILES['image_other2']['name'])) {
                  $sql = "UPDATE routes SET image_other2='$image_other2' WHERE ID=' " . $_SESSION['PostID'] . "'";
                  mysqli_query($db, $sql);
                }
              }
            }
          }
        }
      }
    }
  }
  $query = "UPDATE routes SET startingpoint='$startingpoint', destination='$destination', time='$time', days='$days', provide='$provide', car='$car', cost='$cost' WHERE ID=' " . $_SESSION['PostID'] . "'";
  mysqli_query($db, $query);
  header('location: display_post.php');
}
// Delete the image if the delete button is pressed
if (isset($_POST['delete_image'])) {
  $query = "UPDATE routes SET image= null WHERE ID=' " . $_SESSION['PostID'] . "'";
  if (mysqli_query($db, $query)) {
    header('location: display_post.php');
  }
}
if (isset($_POST['delete_image2'])) {
  $query = "UPDATE routes SET image_other= null WHERE ID=' " . $_SESSION['PostID'] . "'";
  if (mysqli_query($db, $query)) {
    header('location: display_post.php');
  }
}
if (isset($_POST['delete_image3'])) {
  $query = "UPDATE routes SET image_other2= null WHERE ID=' " . $_SESSION['PostID'] . "'";
  if (mysqli_query($db, $query)) {
    header('location: display_post.php');
  }
}
?>
                  </body>
                </html>
                <?php else: ?>
                <?php header("location: login.php");?>
                <?php endif?>