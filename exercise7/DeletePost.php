<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "b588j425", "10096498", "b588j425");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(isset($_POST['postsToDelete']))
{
  $postsToDelete = $_POST['postsToDelete'];
  foreach($postsToDelete as $post_id)
  {
    $query = "DELETE FROM Posts WHERE post_id = " . $post_id;
    $mysqli->query($query);
    echo "Post with Id " . $post_id . " successfully deleted.<br>";
  }
}

else {
  echo "Error: No Posts Selected";
}


/* close connection */
$mysqli->close();
?>
