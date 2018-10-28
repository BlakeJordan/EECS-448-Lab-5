<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "b588j425", "10096498", "b588j425");
$user_id = $_POST["UserId"];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if (!empty($user_id)) {
  $query = "INSERT INTO Users(user_id) VALUES ('" . $user_id . "')";
  if ($mysqli->query($query) === TRUE) {
    echo "User Successfully Added to Database<br>";
  }
  else {
    echo "User ID must be unique<br>";
  }
}
else {
  echo "User ID Cannot be Empty<br>";
}

/* close connection */
$mysqli->close();
?>
