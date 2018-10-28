<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "b588j425", "10096498", "b588j425");
/* check connection */
if (isset($_POST['submit'])) {
  $SelectedUser = $_POST["SelectedUser"];
  $UserPosts = "SELECT * FROM Posts WHERE author_id='$SelectedUser'";
  if ($result = $mysqli->query($UserPosts))
  {
    echo "<h1>Posts By $SelectedUser:</h1><br>";
    while ($row = $result->fetch_assoc())
    {
      $PostContent = $row["content"];
      echo "$PostContent <br>";
    }
  }
  else {
    echo "Error fetching users";
  }
}
/* close connection */
$mysqli->close();
?>
