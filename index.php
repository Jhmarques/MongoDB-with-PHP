
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>E-BookStore</title>
<meta name= "viewport" content = "width = device-width, initial-scale = 1.0, user-scalable = yes">
<link rel="stylesheet" type="text/css" href="/Mongo/style.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<noscript>For full functionality of this page it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com" target="_blank"> instructions how to enable JavaScript in your web browser</a></noscript>
</head>

<?php
    include "init.php";
    include "modals.php";
    
    
    if(isset($_SESSION["user_id"])) {
        $userData = $userClass->userData($_SESSION["user_id"]);
    }
?>

<body>

<!--navigation-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WW Online Bookstore</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>

      <li><a <?php
        echo isset($_SESSION['admin_id']) ? "data-toggle='modal' data-target='#adminModal'" : "";       
      ?>href="#">Admin Panel</a></li>
      <li><a <?php
        echo isset($_SESSION['user_id']) ? "" : "data-toggle='modal' data-target='#registerModal'";       
      ?> href="#">Register</a></li>
      <li><a <?php
        echo isset($_SESSION['user_id']) ? "" : "data-toggle='modal' data-target='#loginModal'";       
      ?> href="#"> Login </a></li>
      <li><a href="#" ><span id="cart" class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge" id="shopcart"> </span>
      </span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php 
            echo isset($userData) ? $userData->username : '';
          ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
   
    <form method="post"  class="navbar-form navbar-left" action="">
      <div class="form-group">
      <div class="ui-widget">
        <input type="text" class="form-control" placeholder="Search" name="search" list="languages" id="searchBar">        
      <button type="submit" class="btn btn-success" name="search_call"><span class="glyphicon glyphicon-search"></span></button>
      </div>
      </div>
   
    </form>    
           
  </div>
</nav>
<!--end of navigation bar-->



<!--left side bar categories-->
<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4 >Categories</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1"></a></li>
        <li><a href="#"> All </a></li>
      </ul><br>
    </div>
<!--end left side bar categories-->


<!--arrows - pagination-->
 <div  id="arrowsContainer" >
    <div id="arrows">
     <a class="btn btn-info btn-lg" href="#" >
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a> 
        <a class="btn btn-info btn-lg" style="float:right;" href="#" >
          <span class="glyphicon glyphicon-chevron-right"></span> 
        </a>
    </div>
</div>


<!--footer-->
      <div class = "footer" style="margin-top: 100px; height:40px;" > 
				<p> João Marques. Copyright &copy; 2020 </p>
			</div>
		
	</div>
</body>
</html>







