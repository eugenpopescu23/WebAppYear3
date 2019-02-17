<?php require 'server.php' ?>

            <?php  
            $db = mysqli_connect('mysql.cms.gre.ac.uk', 'ep6562v', '!Playboy1401', 'mdb_ep6562v');
            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username='$username' AND valid='1'";
            $result = mysqli_query($db, $query);    
    
            if (isset($_SESSION['username']) && $row =  mysqli_fetch_assoc($result)) : ?>
    

<html>

<head>
<title>Create Post</title>
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
                      <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="display_post.php">Your Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_posts.php">All Posts</a>
                </li>
                <li class="nav-item active">
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
            <h1>Create Post</h1>
    </div>
          <div class="row">
         <div class="col-sm-4"></div>
     <div class="col-sm-4">
 <form method="post" action="post.php" enctype="multipart/form-data">

                <?php include 'errors.php'; ?>
        <div >
            <label>Starting Point</label>
            <input type="text" class="form-control" name="startingpoint" >
        </div>
        <div >
            <label>Destination</label>
            <input type="text"class="form-control" name="destination" >
        </div>
        <div >
            <label>Travel Time:</label>
            <input type="time"  class="form-control" name="time" >
        </div>
     <div >
            <label>Model of your car?</label>
            <input type="text" class="form-control" name="car"  >
        </div>

        <div >
            <label>Cost, in case you provide a lift.</label>
            <input type="text" class="form-control" name="cost">
        </div>
        <div>
            <label>Days Of Travel:</label> <br>
            <input type="checkbox" name="days[]" value="Monday"/>Monday
            <input type="checkbox" name="days[]" value="Tuesday"/>Tuesday<br>
            <input type="checkbox" name="days[]" value="Wednesday"/>Wednesday
            <input type="checkbox" name="days[]" value="Thursday"/>Thursday<br>
            <input type="checkbox" name="days[]" value="Friday"/>Friday
            <input type="checkbox" name="days[]" value="Saturday"/>Saturday
            <input type="checkbox" name="days[]" value="Sunday"/>Sunday
        </div>
     <br>
       <div>
            <label>Will you provide a lift?</label><br>
            <input type="checkbox" name="provide[]" value="Yes" />Yes
            <input type="checkbox" name="provide[]" value="No"/>No
     </div>
     <br>
     <div >
            <label>Insert Car Picture... (Not Needed)</label>
         
            <input type="file"  name="image" multiple accept="image/x-png,image/gif,image/jpeg">
     
     </div>
      <div >
            <label>Insert any other pictures below... (Not Needed)</label>
         
            <input type="file"  name="image_other" multiple accept="image/x-png,image/gif,image/jpeg">
            <input type="file" name="image_other2" multiple accept="image/x-png,image/gif,image/jpeg">
          
     
     </div>
     <br>
            <input type="submit" class="btn" name="insert" value="insert">
        
    </form>
        </div>
              <div class="col-sm-4"></div>
    </div>
    </div>
    </body>
</html>

        <?php else : ?>
            <?php header("location: login.php"); ?>
        <?php endif?>
