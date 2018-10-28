<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "b588j425", "10096498", "b588j425");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

  $users = "SELECT * FROM Users";

  if ($result = $mysqli->query($users))
  {
    echo "<h1>Users</h1><br>";
    while ($row = $result->fetch_assoc())
    {
      $user_id = $row["user_id"];
      echo "$user_id <br>";
    }
  }
else {
  echo "Error fetching users";
}

/* close connection */
$mysqli->close();
?>
