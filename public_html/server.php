<?php
require_once __DIR__ . "/database.php";
session_start();
ob_start();
// variable declaration
$firstname = "";
$lastname = "";
$username = "";
$email = "";
$captcha_1 = "";
$captcha_2 = "";
$errors = array();
// $codeEnter = "";
$_SESSION['success'] = "";
/*HTTPS Integration*/
if (empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on") {
  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
  exit();
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
// receive all input values from the form
  //Protection against sql injection
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $captcha_1 = $_SESSION['digit'];
  $captcha_2 = $_POST['CaptchaEnter'];
// form validation: ensure that the form is correctly filled
  if (empty($firstname)) {
    array_push($errors, "First Name is required");
  }
  if (empty($lastname)) {
    array_push($errors, "Last Name is required");
  }
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($captcha_1 != $captcha_2) {
    array_push($errors, "Captcha is incorrect");
  }
// If email is the same as the username then push error (to avoid spamming)
  if ($email == $username) {
    array_push($errors, "Username and Email can't be the same");
  }
// If username already exists in the database then push error
  $query = "SELECT * FROM users WHERE username='$username'";
  $results = mysqli_query($db, $query);
  if ($row = mysqli_fetch_assoc($results)) {
    array_push($errors, "That username is already taken");
  }
// if chosen password doesn't match with the confirmation of the pasw then error
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
// register user if there are no errors in the form
  if (count($errors) == 0) {
    $code = rand(0, 99999);
    $valid = 0;
    $password = md5($password_1); //encrypt the password before saving in the database
    $query = "INSERT INTO users (firstname, lastname, username, email, password, code, valid)
          VALUES('$firstname', '$lastname', '$username', '$email', '$password', '$code', '$valid')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $to = $email;
    $subject = "GreCarpool Account Verification";
    $message = "
Thank you for registering with us!
Please activate your account with the code provided in this email!
Heres your code : " . $code . "
";
    $header = "From: er42fv@gre.ac.uk" . "\r\n";
    mail($to, $subject, $message, $header);
    header('location:validation.php');
  }
}
// ...
// LOGIN USER
if (isset($_POST['login_user'])) {
//sql injection protection
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
//if fields are empty then error
  if ((empty($username)) and (empty($password))) {
    array_push($errors, "Username is required");
    array_push($errors, "Password is required");
  }
//if theres no erros then proceed
  if (count($errors) == 0) {
//hash password
    $password = md5($password);
//perform query to the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
//if user exists in the database then login
    if (mysqli_num_rows($results) == 1) {
      if (isset($_POST['remember'])) {
        setcookie('username', $_POST['username'], time() + 60 * 20, 'https://stuweb.cms.gre.ac.uk/~ep6562v/login.php');
      }
      $_SESSION['username'] = $username;
//                        $_SESSION['success'] = "You are now logged in";
      header('location: profile.php');
//however if the user has not activated his/her account then send them to the validation page
      $query = "SELECT * FROM users WHERE username='$username' AND valid='1'";
      $results = mysqli_query($db, $query);
      if (!$row = mysqli_fetch_assoc($results)) {
        $_SESSION['username'] = $username;
        header('location:validation.php');
      }
//if username and password are incorrect then push error
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
//VALIDATION
//puts code and username into variables. checks to see if the username and code match a user, if not send error, if found change the users valid field to 1 to allow login.
if (isset($_POST['code'])) {
  $code = $_POST['code'];
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username='$username' AND code='$code'";
  $results = mysqli_query($db, $query);
  if ($row = mysqli_fetch_assoc($results)) {
    $query = "UPDATE users SET valid='1' WHERE username='$username'";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: profile.php');
  } else {
    array_push($errors, "Active your account using the code from the email.");
  }
}
//USER POST
$msg = "";
if (isset($_POST['insert'])) {
//the path where to store the uploaded image
  $target = "css/images/" . basename($_FILES['image']['name']);
  $target2 = "css/images/" . basename($_FILES['image_other']['name']);
  $target3 = "css/images/" . basename($_FILES['image_other2']['name']);
  $image = $_FILES['image']['name'];
  $image_other = $_FILES['image_other']['name'];
  $image_other2 = $_FILES['image_other2']['name'];
//get all submited data from the form
  $username = $_SESSION['username'];
  $startingpoint = $_POST['startingpoint'];
  $destination = $_POST['destination'];
  $time = $_POST['time'];
  $days = implode(',', $_POST['days']);
  $provide = implode(',', $_POST['provide']);
  $car = $_POST['car'];
  $cost = $_POST['cost'];
//errors
  if (empty($startingpoint)) {
    array_push($errors, "Starting Point is required");
  }
  if (empty($destination)) {
    array_push($errors, "Destination is required");
  }
  if (empty($time)) {
    array_push($errors, "Time is required");
  }
  if (empty($days)) {
    array_push($errors, "Days are required");
  }
  if (empty($provide)) {
    array_push($errors, "Option is required");
  }
  if (empty($car)) {
    array_push($errors, "Type of Car is required");
  }
  if (empty($cost)) {
    array_push($errors, "Cost is required");
  }
//if no erros then do this
  if (count($errors) == 0) {
//insert data into database
    $query = "INSERT INTO routes (ID, username, startingpoint, destination, time, days, provide, car, cost, image, image_other, image_other2) VALUES (NULL, '$username', '$startingpoint', '$destination', '$time', '$days', '$provide', '$car', '$cost', '$image', '$image_other', '$image_other2')";
    mysqli_query($db, $query);
//move uploaded image to the folder: images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    }
    if (move_uploaded_file($_FILES['image_other']['tmp_name'], $target2)) {
    }
    if (move_uploaded_file($_FILES['image_other2']['tmp_name'], $target3)) {
    }
    header('location: display_post.php');
  }
}
if (isset($_GET['logout'])) {
  session_destroy();
  header("location: index.php");
}
