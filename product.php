<?php
session_start();
require "connection.php";
echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";


$_SESSION['pid'] = $_COOKIE['pid'];
echo $_SESSION['pid']."aaa";

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="myStyle.css"></link>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="myScript.js">

</script>
    <title>Auction Site</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">Auction Site</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="index.html">Home </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.html">Login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="signup.html">SignUp</a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="about.html">About Us <span class="sr-only">(current)</span> </a>
          </li>

        </ul>
      </div>
    </nav>
<br />
    <div class="container">
      <h1><b>Product</b></h>


<?php
$pid = $_SESSION["pid"];
$mysqlquery9 = "select * from product where p_id='{$pid}'";
$result = $conn->query($mysqlquery9);

if ($result === false) { die(mysqli_error($conn)); }

if($result->num_rows === 1){
  $row = $result->fetch_assoc();
}
?>
<div>
<?php
echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
?>
</div>
<h3><?php echo $row["p_name"] ?></h3>
<h4><?php echo $row["p_description"] ?></h4>
<h4><?php echo $row["seller"] ?></h4>
<h4><?php
if($row["bid_amount"]==0){
  $amount = $row["base_amount"];
  echo "Base Amount : ";
}
else{
  $amount = $row["bid_amount"];
  echo "Last Bid : ";
}
 echo $amount ?></h4>

 <!-- <script type="text/javascript"> -->
 <?php
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['checkBid']))
    {
        checkBid();
    }

 function checkBid(){
$bid_amount = "<script>document.write(bid_amount.value)</script>";
 // console.log(typeof val);
 // console.log(bid_amount.value);
 if((bid_amount.value<=$amount)){
   echo '<script language="javascript">';
   echo 'alert("Increase Bid Amount")';
   echo '</script>';
 }
 else{

   echo "something";

   echo "mm".$bid_amount;
   $qq = "update product set bid_amount = '{$bid_amount}' where p_id like '{$pid}'";
   $q1 = "select p_id from product_bidding where seller_email like '{$row['seller']}' and bidder_email like '{$_SESSION['email']}'";
   $res = $conn->query($q1);
   if($res->num_rows > 0){
     echo "is in";
     $q2 = "update product_bidding set amount='{$bid_amount}' where seller_email like '{$row['seller']}' and bidder_email like '{$_SESSION['email']}'";
     $res2 = $conn->query($q2);
   }
   else{
     echo "in here".$pid;
     $q3 = "insert into product_bidding (p_id, seller_email, bidder_email, amount) values ('{$pid}', '{$row['seller']}', '{$_SESSION['email']}', '{$bid_amount}'";
   }
   echo '<script language="javascript">';
   echo 'alert("BID placed")';
   echo '</script>';
 }
 }
 ?>
 <!-- </script> -->


<h4>Bid : <h4>
  <form action="profile.php" method="post">
  <input type="number" name="bid_amount" value="" id="bid_amount"></input>
  <!-- <input type="submit" class="btn btn-primary" value="BID" onclick="checkBid()"> -->
<button name="checkBid" onclick="checkBid()">BID</button>
</form>
</div>
<hr />
  </body>

</html>
