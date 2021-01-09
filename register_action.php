<meta charset="utf-8">
<?php
$connect = mysqli_connect("localhost", "cheeseduck", "Wlwm+dhfl16", "db");

if(!$connect) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;


if ($result = mysqli_query($connect, "insert into user ({$_POST['InputEmail']}, {$_POST['FirstName']}, {$_POST['LastName']}, {$_POST['InputPassword']})", MYSQLI_USE_RESULT)) {

    /* Note, that we can't execute any functions which interact with the
       server until result set was closed. All calls will return an
       'out of sync' error */
    if (!mysqli_query($connect, "SET @a:='this will not work'")) {
        printf("Error: %s\n", mysqli_error($connect));
    }
    mysqli_free_result($result);
}

mysqli_close($connect);

 ?>
