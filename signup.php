<?php

require "connection.php";

$name = $_POST["sname"];
$email = $_POST["semail"];
$pno = $_POST["spno"];
$pass = $_POST["spass"];

$mysqlquery = "insert into user(name , email , phoneno , password ) values ('{$name}','{$email}','{$pno}','{$pass}')";

if($conn->query($mysqlquery) === TRUE){
  echo "Insert successful";
  include 'profile.html';
}
else {
  echo "Error : ". $mysqlquery . "<br>" . $conn->error;

  echo '<script language="javascript">';
  echo 'alert("User already exists")';
  echo '</script>';

  include "signup.html";
}
$conn->close();

 ?>
