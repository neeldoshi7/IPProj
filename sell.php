<?php
session_start();
require "connection.php";
echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";



  echo "IN SELLLLLL";
  $pid = $_SESSION['pid'];
  $q = "select * from product_bidding where p_id like '{$pid}'";
  $r = $conn->query($q);
  if($r->num_rows == 1){
    $row = $r->fetch_assoc();
    $buyer_email = $row['bidder_email'];
    $seller_email = $row['seller_email'];
    $amount = $row['amount'];
  }



  $q1 = "update product set sold = 1 where p_id like '{$pid}'";
  $q2 = "delete from product_bidding where p_id like '{$pid}'";
  $q3 = "insert into product_bought (p_id, email, amount) values ('{$pid}', '{$buyer_email}', '{$amount}')";
  $q4 = "delete from product_selling where p_id likr '{$pid}'";
  $q5 = "insert into product_sold (p_id, email, amount) values ('{$pid}', {'$seller_email'}, '{$amount}')";
  $r1 = $conn->query($q1);
  $r2 = $conn->query($q2);
  $r3 = $conn->query($q3);
  $r4 = $conn->query($q4);
  $r5 = $conn->query($q5);

?>
