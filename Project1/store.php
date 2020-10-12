<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php

    function GoToCheckout() {
        header("Location: /project1/checkout.php");
    }

    if (isset($_GET['click']) && isset($_GET['data'])) {
        GoToCheckout();
    }
    
    include 'mysqli_connect.php';

    $conn = OpenCon();

    $sql = "SELECT * FROM bookinventory";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<div class='container'>";
            echo "<h1 class='text-center'>Book Store Inventory ( TO DO show qunatity and price as well)</h1>";
            echo "<div class='table-responsive'>";
                echo "<table class='table'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Id</th>";
                            echo "<th>BookName</th>";
                            echo "<th>Quantity</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                            $id = $row['Id'];
                            $bookName = $row['BookName'];
                            $price = $row['BookPrice'];
                            $quantity = $row['Quantity'];
                            $data = array("Id"=>$id, "bookName"=>$bookName, "price"=>$price,"quantity"=>$quantity);
                            $encodedData = json_encode($data);
                            $textData = urlencode($encodedData);
                            echo "<td>" . $row['Id'] . "</td>";
                            echo "<td><a href='store.php?click=true&data=$textData'>" . $row['BookName'] . "</a></td>";
                            echo "<td>". $row['Quantity'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
            echo "</div>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    CloseCon($conn);

?>

</body>
</html>