<?php
require "connection.php";

$p_name = $_POST["prod_name"];
$p_description = $_POST["prod_desc"];
$amount = $_POST["prod_amount"];
$image = $_FILES['prod_img']['name'];
echo "inage" . $image;
$img = addslashes(file_get_contents($image));

$mysqlquery4 = "insert into products(p_name , p_description , seller, buyer, amount , image , sold ) values ('{$p_name}','{$p_description}', "aa" , "bb", '{$amount}','{$img}', true)";

if($conn->query($mysqlquery4) === TRUE){
  echo "Insert successful";
}
else {
  echo "Error : ". $mysqlquery4 . "<br>" . $conn->error;

}
$conn->close();

 ?>
