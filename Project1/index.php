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
  </style>
</head>
<body>

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
  <div class="container text-center">
    <h1>BS Book Store</h1>      
    <p>BS Book Store is more than just a great bookstore. It is a vital part of the 
    region’s cultural, social, and political community. Multiple generations of book lovers have visited 
    our website, and we look forward to meeting many more generations to come. We’re deeply thankful 
    to our loyal customers for recognizing the value of a place like BS Book Store, 
    and for making it possible for us to continue doing what we love.</p>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <h3>Book Genres</h3><br>
  <div class="row">
    <div class="col-sm-3">
      <p>Comics</p>
      <img src="./images/comics.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Poetry</p>
      <img src="./images/poetry.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>Science Fiction</p>
      <img src="./images/science.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Internat Technology</p>
      <img src="./images/coding.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>Davinder Singh</p>
</footer>

</body>
</html>
