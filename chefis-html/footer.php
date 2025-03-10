<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="footer-title">Company</h4>
                <ul class="footer-menu">
                    <li><a href="">Chefis Home</a></li>
                    <li><a href="">Chef List</a></li>
                    <li><a href="">My Favorites</a></li>
                    <li><a href="">Orders History</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href="">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="footer-title">Contact</h4>
                <ul class="footer-menu">
                    <li><a href="">Help & Support</a></li>
                    <li><a href="">Partner with us</a></li>
                    <li><a href="">Ride with us</a></li>
                    <li><a href="">Ask a Question</a></li>
                    <li><a href="">Career</a></li>
                    <li><a href="">FAQs</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="footer-title">Legal</h4>
                <ul class="footer-menu">
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Refund & Cancellation</a></li>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Cookies Policy</a></li>
                    <li><a href="">Offer Terms</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="footer-title">Subscribe our Newsletter</h4>
                <form class="subscribe-form">
                    <input class="form-control" type="text" placeholder="Email Address">
                    <input type="submit" class="btn" value="Subscribe"> </form>
            </div>
        </div>
        <hr class="foter-hr">
        <p class="text-center copyright">© 2019 Chefis. All Rights Reserved</p>
    </div>
</footer>
<!-- Button trigger modal -->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <div class="modal-body">
                <h2 class="text-center">Log In</h2>
                <p class="text-center">Please log in to your account to
                    <br> continue with Chefis</p>
                <form class="mt-5">
                    <div class="form-group">
                        <input type="text" class="form-control email-text" placeholder="Email Address "> </div>
                    <div class="form-group ">
                        <input type="text" class="form-control pass-text" placeholder="Password"> </div>
                    <button type="button" class="btn btn-lg btn-block" onclick="window.location='myaccount.php';">Log in</button>
                </form> <a href="" class="forgot" data-dismiss="modal"  data-toggle="modal" data-target="#forgot">Forgot Password?</a> </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <div class="modal-body">
                <h2 class="text-center">Hey there,</h2>
                <p class="text-center">Welcome to Chefis.</p>
                     <form class="">
                     <div class="form-group row">
                       <div class="col-12">     <input type="text" class="form-control user-text" placeholder="First Name"> </div>
                       
                        </div>
                          
                            <div class="form-group row">
                            <div class="col-12">     <input type="text" class="form-control user-text" placeholder="Last Name"> </div>
                         </div>
                            
                        <div class="form-group ">
                        <input type="text" class="form-control phone-text" placeholder="Mobile"> </div>
                         <hr>
                    <div class="form-group">
                        <input type="text" class="form-control email-text" placeholder="Email Address "> </div>
                           
                    <div class="form-group ">
                        <input type="password" class="form-control pass-text" placeholder="Password"> </div>
                                  
                    <div class="form-group ">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">i agree with terms and conditions</label>
                    </div>
                  </div>
                    <button type="button" class="btn btn-lg btn-block text-left">Sign up <span class="ml-auto float-right"><img src="assets/images/rightarrow.png" alt=""></span></button>
                </form>
                
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <div class="modal-body">
               <div class="text-center"><img src="assets/images/oops.png" class="ml-auto" alt=""></div>
                <h2 class="text-center">Oops....</h2>
                <p class="text-center">don’t provide our service on this
location. Please enter your email we’ll inform
you once we arrive</p>
                <form class="mt-5">
                    <div class="form-group">
                        <input type="text" class="form-control email-text" placeholder="Email Address "> </div>
                  
                    <a type="button" class="btn btn-lg btn-block" >Log in</a>
                </form></div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/progressively.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})</script>
<script>
    (function () {
        $("#cart").on("click", function () {
            $(".shopping-cart").fadeToggle("fast");
        });
    })();
    //    $(document).ready(function () {
    //        var quantitiy = 0;
    //        $('.quantity-right-plus').click(function (e) {
    //            e.preventDefault();
    //            var quantity = parseInt($('.input-number').val());
    //            $('.input-number').val(quantity + 1);
    //        });
    //        $('.quantity-left-minus').click(function (e) {
    //            e.preventDefault();
    //            var quantity = parseInt($('.input-number').val());
    //            if (quantity > 0) {
    //                $('.input-number').val(quantity - 1);
    //            }
    //        });
    //    });
</script>
</body>

</html>