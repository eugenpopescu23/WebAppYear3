<?php require 'server.php' ?>
        <?php  
        $db = mysqli_connect('mysql.cms.gre.ac.uk', 'ep6562v', '!Playboy1401', 'mdb_ep6562v');
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username='$username' AND valid='1'";
        $result = mysqli_query($db, $query);    
    
        if (isset($_SESSION['username']) && $row =  mysqli_fetch_assoc($result)) : ?>
<html>
    <head>
    <title>Search Results</title>
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
           h2{
               text-align: center;
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
                <li class="nav-item ">
                    <a class="nav-link" href="all_posts.php"> Back to All Posts</a>
                </li>
            </ul>
        </div>
    </nav>
        <div class="container">
        <div class="starter-template">
            <h1>Search Results</h1>
         </div>
<form>
            <?php

            if(isset($_POST['submit_search'])) {
    
                $search = mysqli_real_escape_string($db, $_POST['search']);
     

                $query = "SELECT * FROM routes WHERE destination LIKE '%$search%' OR startingpoint LIKE '%$search%' OR days LIKE '%$search%' OR time LIKE '%$search%'";
                $result = mysqli_query($db, $query);
                $queryResult = mysqli_num_rows($result);
        
                if($queryResult > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
           <td><?php echo "<p>".$row['username']."</p>"; ?></td>
        <td><?php echo "<p>".$row['startingpoint']."</p>"; ?></td>
        <td><?php echo "<p>".$row['destination']."</p>"; ?></td>
        <td><?php echo "<p>".$row['days']."</p>"; ?></td>
          <td><?php echo "<p>".$row['time']."</p>"; ?></td>
            <td><?php echo "<p>".$row['cost']."</p>"; ?></td>
           <td><?php echo "<p>".$row['provide']."</p>"; ?></td>
          <td><?php echo "<p>".$row['car']."</p>"; ?></td>
        
          <td><?php echo "<img class='img-fluid2'  src='css/images/".$row['image']."' >"; ?></td>
          <td><?php echo "<img class='img-fluid2'  src='css/images/".$row['image_other']."' >"; ?></td>
          <td><?php echo "<img class='img-fluid2'  src='css/images/".$row['image_other2']."' >"; ?></td>
      </tr>
    </tbody>

  
         </table>
                        <?php
                    } 
                }else {
                    echo "<h2>There are no results matching your search!</h2>";
                }
            }
            ?>
        
</form>
        </div>
    </body>
</html>
    <?php else : ?>
        <?php header("location: login.php"); ?>
    <?php endif?>
