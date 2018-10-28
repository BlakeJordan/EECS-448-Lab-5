<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "b588j425", "10096498", "b588j425");
$username = $_POST["username"];
$content = $_POST["content"];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if (!empty($username) && !empty($content)) {

  $check_user = "SELECT * FROM Users WHERE user_id='$username'";
  $check_user_result = $mysqli->query($check_user);

  if (mysqli_num_rows($check_user_result) === 0) {
    echo "Error - username does not exist";
  }
  else {
    $query = "INSERT INTO Posts(content, author_id) VALUES ('$content', '$username')";
    if ($mysqli->query($query) === TRUE) {
      echo "Successfully Posted";
    }
  }
}
else {
  echo "Error - one or more empty fields";
}

/* close connection */
$mysqli->close();
?>
