<?php
require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = \Dotenv\Dotenv::create(__DIR__ . "/../");
$dotenv->load();

// TODO move over to PDO
$db = mysqli_connect(
  $_ENV["DB_SERVER"],
  $_ENV["DB_USERNAME"],
  $_ENV["DB_PASSWORD"],
  $_ENV["DB_SCHEMA"]
);

if (!db) {
  die("Could not connect to database: " . mysqli_connect_error());
}
