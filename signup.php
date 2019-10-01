<?php

require "connection.php";

$name = $_POST["sname"];
$email = $_POST["semail"];
$pno = $_POST["spno"];
$pass = $_POST["spass"];

$mysqlquery = "insert into user(name , email , phoneno , password ) values ('{$name}','{$email}','{$pno}','{$pass}')";

if($conn->query($mysqlquery) === TRUE){
  echo "Insert successful";
}
else {
  echo "Error : ". $mysqlquery . "<br>" . $conn->error;
}
$conn->close();

header("Location: https://auctionsite.000webhostapp.com/profile.html");

exit;

 ?>
