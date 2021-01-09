<meta charset="utf-8">
<?php
$connect = mysql_connect("localhost", "root", "clwm+dhfl");
mysql_set_charset("utf8", $connect);
mysql_select_db("escaperoom", $connect);

if($connect) {
  echo "Failed to connect to MySQL";
}
else {
  echo "Connected to mysql!!";
}

$sql = "insert into user ({$_POST['InputEmail']}, {$_POST['FirstName']}, {$_POST['LastName']}, {$_POST['InputPassword']})";
$result = mysql_query($sql, $connect);

if($result) {
  echo "inserted successfully";
}
else {
  echo "Error inserting a row";
}

mysqli_close($connect);
 ?>
