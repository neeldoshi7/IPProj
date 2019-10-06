<?php
require "connection.php";

$p_name = $_POST["prod_name"];
$p_description = $_POST["prod_desc"];
$amount = $_POST["prod_amount"];
$image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);;

$mysqlquery4 = "insert into products(p_name , p_description , amount , image ) values ('{$p_name}','{$p_description}','{$amount}','{$img}')";

if($conn->query($mysqlquery4) === TRUE){
  echo "Insert successful";

  include 'testprofile.php';
}
else {
  echo "Error : ". $mysqlquery4 . "<br>" . $conn->error;

}
$conn->close();

 ?>
