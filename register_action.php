<meta charset="utf-8">
<?php
$connect = mysqli_connect("118.67.128.69:3306", "cheeseduck", "Wlwm+dhfl16", "db");

if(!$connect) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

echo "Success: A proper connection to MySQL was made! The db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($connect) . PHP_EOL;

$sql = "insert into user ({$_POST['InputEmail']}, {$_POST['FirstName']}, {$_POST['LastName']}, {$_POST['InputPassword']})";

if ($result = mysqli_query($connect, $sql)) {
    echo "I'm here!!!!";
    /* Note, that we can't execute any functions which interact with the
       server until result set was closed. All calls will return an
       'out of sync' error */
    if (!mysqli_query($connect, "SET @a:='this will not work'")) {
        printf("Error: %s\n", mysqli_error($connect));
    }
    mysqli_free_result($result);
}
else echo "Failed!!";

mysqli_close($connect);

 ?>
