<?php
session_start();
require "connection.php";
echo "<h3> PHP List All Session Variables</h3>";
    foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";

print_r($_SESSION['pid_sold']);
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
      <h1><b>List</b></h>
    </div>
    <hr />
<br /><br />


<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
    <th>Sell</th>
  </tr>
  <?php
  $pid_selling = $_SESSION['pid_selling'];

  foreach ($pid_selling as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdr">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>
      <td>
        <form action="listview.php">
          <input type="submit" name="sell" value="sell" onclick="sell()"/>
        </form>
        <?php
        function sell() {
          echo "yayyyyyy";
        }?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
  ?>
</table>
<?php
}
?>


<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
  </tr>
  <?php
  $pid_bidding = $_SESSION['pid_bidding'];
  foreach ($pid_bidding as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdd">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
  ?>
</table>
<?php
}
?>


<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
  </tr>
  <?php
  $pid_sold = $_SESSION['pid_sold'];
  foreach ($pid_sold as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdd">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
  ?>
</table>
<?php
}
?>

<table border="1">
  <tr>
    <th>Product ID</th>
    <th>Name</th>
    <th>Amount</th>
    <th>Image</th>
  </tr>
  <?php
  $pid_bought = $_SESSION['pid_bought'];
  foreach ($pid_bought as $value) {
    $pid = $value;

  $mysqlquery4 = "select * from `product` where p_id = '{$pid}'";
  $result = $conn->query($mysqlquery4);

if (!$result) {
trigger_error('Invalid query: ' . $conn->error);
}
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>
      <tr>
      <td class="tdd">
        <?php
        print($row["p_id"]);
        ?>
      </td>
      <td>
        <?php
        print($row["p_name"]);
        ?>
       </td>
      <td>
        <?php
        print($row["base_amount"]);
        ?>
      </td>
      <td>
        <?php
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="100"/>'
        ?>
      </td>

  </tr>
  <?php
    }
  }else {
    print 'null';
  }
  ?>
</table>
<?php
}
?>

  </body>
</html>
