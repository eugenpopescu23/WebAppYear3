<?php require 'server.php'?>
<?php
require_once __DIR__ . "/database.php";
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username' AND valid='1'";
$result = mysqli_query($db, $query);
if (isset($_SESSION['username']) && $row = mysqli_fetch_assoc($result)): ?>
<!DOCTYPE html>
<html>
  <head>
    <title>All Posts</title>
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
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="display_post.php">Your Posts</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="all_posts.php">All Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.php">Create Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?logout">Logout</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search_login.php" method="post">
          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" name="submit_search" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="container">
      <div class="starter-template">
        <h1>All Posts</h1>
      </div>
      <br>
      <?php
require_once __DIR__ . "/database.php";
$query = "SELECT * FROM routes";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)) {
  ?>
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Username</th>
            <th>Starting Point</th>
            <th>Destination</th>
            <th>Days Of Travel</th>
            <th>Time</th>
            <th>Cost</th>
            <th>Provide</th>
            <th>Car</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo "<p>" . $row['username'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['startingpoint'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['destination'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['days'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['time'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['cost'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['provide'] . "</p>"; ?></td>
            <td><?php echo "<p>" . $row['car'] . "</p>"; ?></td>
            <td><?php echo "<img class='img-fluid2'  src='css/images/" . $row['image'] . "' >"; ?></td>
            <td><?php echo "<img class='img-fluid2'  src='css/images/" . $row['image_other'] . "' >"; ?></td>
            <td><?php echo "<img class='img-fluid2'  src='css/images/" . $row['image_other2'] . "' >"; ?></td>
          </tr>
        </tbody>
      </table>
      <?php
}
?>
    </div>
  </body>
</html>
<?php else: ?>
<?php header("location: login.php");?>
<?php endif?>