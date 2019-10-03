<?php
require "connection.php";

$email = $_POST["lemail"];
$pass = $_POST["lpass"];

$mysqlquery2 = "select password from user where email = '$email'";

$result = $conn->query($mysqlquery2);

if ($result === false) { die(mysqli_error($conn)); }

if($result->num_rows === 1){
  $row = $result->fetch_assoc();
  if($row["password"] != $pass){
      echo '<script language="javascript">';
      echo 'alert("Incorrect password")';
      echo '</script>';
    }
  else{
      inlude 'profile.html';
    }
}
else {
  echo '<script language="javascript">';
  echo 'alert("User doest not exist")';
  echo '</script>';
}

$conn->close();

 ?>
