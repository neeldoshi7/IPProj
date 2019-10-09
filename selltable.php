<?php
session_start();
require "connection.php";


$email = $_SESSION["email"];
$p_name = $_POST["prod_name"];
$p_description = $_POST["prod_desc"];
$amount = $_POST["prod_amount"];
$image = $_FILES['prod_img']['tmp_name'];
// echo "image " . $image;
$img = addslashes(file_get_contents($image));

$mysqlquery4 = "insert into products(p_name , p_description , seller , buyer , amount , image , sold) values ('{$p_name}','{$p_description}', '{$email}', ' ', '{$amount}','{$img}', false)";

if($conn->query($mysqlquery4) === TRUE){
  echo "Insert successful";
}
else {
  echo "Error : " . "<br>" . $conn->error;

}
$conn->close();

 ?>
