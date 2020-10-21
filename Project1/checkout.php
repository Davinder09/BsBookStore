<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    #formDiv {
      width: 70%;
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
</head>
<body>
<?php
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $paymentMethod = $_POST['paymentMethod'];
    if(isset($_COOKIE['Book'])) {
      $decodedCocokie = urldecode($_COOKIE['Book']);
      $bookCookie = json_decode($decodedCocokie, true);
      $bookId = $bookCookie["Id"];
    }

    //insert new order
    include 'mysqli_connect.php';

    $conn = OpenCon();

    $newOrderSql = "INSERT INTO bookinventoryorder (FirstName, LastName, PaymentMethod, BookId)
    VALUES ('$firstName', '$lastName', '$paymentMethod', $bookId)";

    if ($conn->query($newOrderSql) === TRUE) {
      //update quantity
      $updateInventorySql = "UPDATE bookinventory SET Quantity = Quantity - 1
      WHERE Id = $bookId";

      if ($conn->query($updateInventorySql) === TRUE) {
        echo '<script>alert("Order Placed.")</script>'; 
      } else {
        echo "Error: " . $updateInventorySql . "<br>" . $conn->error;
      }

    } else {
      echo '<script>alert("Order failed! Please try again!")</script>';
    }

    CloseCon($conn);    
  }
  
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">BS Book Store</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="store.php">Book Store</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container" id="formDiv">
    <form action="checkout.php" method="POST">
        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Your first name" required>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
          if (!empty($_POST['firstname'])) {
            $name = $_POST['firstname'];
          } else {
            $name = NULL;
            echo '<span class="error">Please enter your first name</span> <br/>';
          }
        }
        
        ?>


        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" placeholder="Your last name" required>

        <label for="payment">Payment Method</label>
        <select id="payment" name="paymentMethod">
          <option value="credit">Credit</option>
          <option value="debit">Debit</option>
          <option value="cash">Cash</option>
        </select>
      
        <input type="submit" value="Submit">
    </form>
</div>

<footer class="container-fluid text-center">
  <p>Davinder Singh</p>
</footer>

</body>
</html>
