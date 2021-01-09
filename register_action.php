<meta charset="utf-8">
<?php
// initializing variables
$email = "";
$fname = "";
$lname = "";
$errors = array();

// connect to the database
include 'db_connect.php';

if(!$connect) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

//echo "Success: A proper connection to MySQL was made! The db database is great." . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($connect) . PHP_EOL;

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($connect, $_POST['InputEmail']);
  $fname = mysqli_real_escape_string($connect, $_POST['FirstName']);
  $lname = mysqli_real_escape_string($connect, $_POST['LastName']);

  $password_1 = mysqli_real_escape_string($connect, $_POST['InputPassword']);
  $password_2 = mysqli_real_escape_string($connect, $_POST['RepeatPassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Last name is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
  $result = mysqli_query($connect, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    array_push($errors, "Same email already exists");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user VALUES ('$email', '$fname', '$lname', '$password')";

  	mysqli_query($connect, $query);
  	header('location: login.php');
  }
  else include 'errors.php';
}
 ?>
