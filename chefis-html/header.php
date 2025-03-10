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
                        <li class="nav-item"> <a class="btn nav-link login-btn" role="button" data-toggle="modal" data-target="#login">Login</a> </li>
                        <li class="nav-item">
                            <a href="#" class=" nav-link" id="cart" role="button"><img src="assets/images/card.svg" alt=""><span class="item-count">2</span> </a>
                        </li>
                    </ul>
                    <div class="shopping-cart">
                        <div class="shopping-cart-items">
                            <h3>My Cart</h3>
                            <div class="media">
                                <div class="mr-3 cart-img"> <img class="img-fluid" src="assets/images/cart.jpg" alt=""> </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Chicken Kebab Bon...</h5>
                                    <p class="mb-0">Starter </p>
                                    <div class="prise-cart">$15.35</div>
                                </div>
                                <div class="input-group"> <span class="input-group-btn">
                                         <button type="button" class="quantity-left-minus  btn-number"  data-type="minus" data-field="">
                                          -
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="20"> <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn-number" data-type="plus" data-field="">
                                            +
                                        </button>
                                    </span> </div>
                            </div>
                            <div class="media">
                                <div class="mr-3 cart-img"> <img class="img-fluid" src="assets/images/cart.jpg" alt=""> </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Chicken Kebab Bon...</h5>
                                    <p class="mb-0">Starter </p>
                                    <div class="prise-cart">$15.35</div>
                                </div>
                                <div class="input-group"> <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus  btn-number"  data-type="minus" data-field="">
                                          -
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="20"> <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn-number" data-type="plus" data-field="">
                                            +
                                        </button>
                                    </span> </div>
                            </div>
                        </div>
                        <div class="shopping-cart-header">
                            <div class="shopping-cart-total">
                                <div class="row">
                                    <div class="col-8">
                                        <h6 class="mb-0">Subtotal :</h6>
                                        <p>Extra Charge may Apply</p>
                                    </div>
                                    <div class="col-4 text-right">
                                        <h6>$35.35</h6></div>
                                </div>
                            </div>
                        </div>
                        <!--end shopping-cart-header --><a href="checkout.php" class="btn btn-fill d-block">Checkout</a> </div>
                    <!--end shopping-cart -->
                </div>
            </div>
        </nav>
        <!-- Modal -->
</header>

<body>