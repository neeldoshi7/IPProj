<?php require "connection.php";
session_start();
$email = $_SESSION["email"];
$mysqlquery3 = "select name from user where email = '$email'";
$result = $conn->query($mysqlquery3);

if($result->num_rows === 1){
  $row = $result->fetch_assoc();
  $_SESSION["name"]=$row["name"];
  echo $_SESSION["name"];
}
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
            <a class="nav-link" href="about.html">About Us <span class="sr-only">(current)</span> </a>
          </li>

          <li class="nav-item">
            <a class="nav-link logout" href="about.html">Log Out <span class="sr-only">(current)</span> </a>
          </li>

        </ul>

        <!-- <li class="nav-item">
          <a class="nav-link logout" href="about.html">Log Out <span class="sr-only">(current)</span> </a>
        </li> -->

      </div>
    </nav>
<br />
    <div class="container">
      <h1><b>Profile</b></h>
    </div>
    <hr />
<br /><br />
    <div class="container">
<h2>Welcome <?php echo
 $_SESSION["name"];
 ?></h2>
    </div>

    <div class="">
      <?php include 'connection.php';
      echo "Hey";

      ?>
    </div>
  </body>
</html>
