<?php
require "connection.php";

$p_name = $_POST["prod_name"];
$p_description = $_POST["prod_desc"];
$amount = $_POST["prod_amount"];
$image = $_POST["prod_img"];

$mysqlquery4 = "insert into product(p_name , p_description , amount , image ) values ('{$p_name}','{$p_description}','{$amount}','{$image}')";

 ?>
