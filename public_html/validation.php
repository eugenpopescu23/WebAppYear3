<?php include('server.php') ?>
 <?php  
    $db = mysqli_connect('mysql.cms.gre.ac.uk', 'ep6562v', '!Playboy1401', 'mdb_ep6562v');
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$username' AND valid='0'";
    $result = mysqli_query($db, $query);    
    
    if (isset($_SESSION['username']) && $row =  mysqli_fetch_assoc($result)): ?>
    
<!DOCTYPE html>
<html>
    <head>
    <title>GreCarpool Login</title>
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
           .error {
    font-size: 20px;
    margin: 0px auto;
    padding: 10px;
    border: 1px solid #a94442;
    color: #a94442;
    background: #f2dede;
    border-radius: 5px;
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
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
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
            <h1>Verify Your Account Here!</h1>
        </div>
         <div class="row">
         <div class="col-sm-4"></div>
<div class="col-sm-4">
        <form action="validation.php" method="POST">
        <?php include('errors.php'); ?>
            <div>
        <input type="text" class="form-control" name="code" placeholder="Code from email"><br>
            </div>
            <div >
        <button type="submit" class="btn">Activate</button>
            </div>
        </form>
          </div>
          <div class="col-sm-4"></div>
             </div>
    </div>
    </body>
</html>
<?php else : ?>
<?php header ("location: profile.php"); ?>
<?php endif?>
