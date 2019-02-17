<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title>Home</title>
        <!-- Bootstrap core CSS -->
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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" name="submit-search" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="container">
            <div class="starter-template">
                <p> This website uses cookies!</p>
                <h1>Available Routes</h1>
                <p class="lead">You can type in either starting point, destination, time or days in the <strong>search</strong></p>
                <p class="lead">If you want more information about the journey's, then please register!</p>
            </div>
            <?php
require_once __DIR__ . "/database.php";
$query = "SELECT * FROM routes";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)) {
  ?>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Starting Point</th>
                        <th>Destination</th>
                        <th>Days Of Travel</th>
                        <th>Time</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo "<p>" . $row['startingpoint'] . "</p>"; ?></td>
                        <td><?php echo "<p>" . $row['destination'] . "</p>"; ?></td>
                        <td><?php echo "<p>" . $row['days'] . "</p>"; ?></td>
                        <td><?php echo "<p>" . $row['time'] . "</p>"; ?></td>
                        <td><?php echo "<img class='img-fluid2'   src='css/images/" . $row['image'] . "' >"; ?></td>
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