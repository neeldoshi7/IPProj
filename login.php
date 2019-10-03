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
      session_unset();
      echo "Session variables are unset.incorrect password";
      echo "Email " . $_SESSION["email"] . ".<br>";
      echo "Password " . $_SESSION["password"] . ".";
    }
  else{
      $_SESSION["email"] = $email;
      $_SESSION["password"] = $pass;
      echo "Session variables are set.";
      echo "Email " . $_SESSION["email"] . ".<br>";
      echo "Password " . $_SESSION["password"] . ".";
      include 'profile.html';

      
    }
}
else {
  echo '<script language="javascript">';
  echo 'alert("User doest not exist")';
  echo '</script>';
  session_unset();
  echo "Session variables are unset.no user";
  echo "Email " . $_SESSION["email"] . ".<br>";
  echo "Password " . $_SESSION["password"] . ".";
}

$conn->close();

 ?>
