<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,900|Roboto+Slab:100,300,400,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/js/dishes/about.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/vieworder.scss">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>Chefis</title>
</head>
<header>
    <?php
        function chk_active($p){
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($actual_link, $p) !== false) {
                return true;
            }
            else{
                return false;
            }
        }
    ?>
        <nav class="navbar navbar-expand-md header-box">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" alt="logo"></a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item "> <a class="nav-link <?php if(chk_active('index')){echo" active ";} ?>" href="index.php">Home</a> </li>
                        <li class="nav-item "> <a class="nav-link <?php if(chk_active('cheflist')){echo" active ";} ?>e" href="cheflist.php" id="aboutbttn">Chef list</a> </li>
                        
                        <li class="nav-item"> <a class="nav-link <?php if(chk_active('aboutus')){echo" active ";} ?>" href="aboutus.php">About us</a> </li>
                        
                        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-user-circle-o" aria-hidden="true"></i> Ashton Lauren
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item <?php if(chk_active('myaccount')){echo" active ";} ?>" href="myaccount.php">Profile</a>
<a class="nav-link <?php if(chk_active('myfavorites')){echo" active ";} ?>" href="myaccount.php">My favorites</a>
    <a class="nav-link <?php if(chk_active('orders')){echo" active ";} ?>" href="myaccount.php" id="privatejets">Orders</a> 
  
      <a class="dropdown-item" href="index.php">Logout</a>
    </div>
  </li>
                    </ul>
                    
                    <!--end shopping-cart -->
                </div>
            </div>
        </nav>
        <!-- Modal -->
</header>

<body>