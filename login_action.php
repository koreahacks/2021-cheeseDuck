<?php
session_start();

// initializing variables
$id    = "";
$password = "";
$errors = array();

// connect to the database
include 'db_connect.php';

if(!$connect) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

if (isset($_POST['login_user'])) {
 $id = mysqli_real_escape_string($connect, $_POST['InputId']);
 $password = mysqli_real_escape_string($connect, $_POST['InputPassword']);

 if (empty($id)) {
   array_push($errors, "ID is required");
 }
 if (empty($password)) {
   array_push($errors, "Password is required");
 }

 if (count($errors) == 0) {
   $password = md5($password);
   $query = "SELECT * FROM user WHERE id='$id' AND password='$password'";
   $results = mysqli_query($connect, $query);
   if (mysqli_num_rows($results) == 1) {
     $_SESSION['id'] = $id;
     $_SESSION['success'] = "You are now logged in";
     header('location: index.php');
   }else {
     array_push($errors, "Wrong username/password combination");
   }
 }

 if (count($errors) > 0) include 'errors.php';
}

?>
