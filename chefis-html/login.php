<?php include("header.php");?>
       <style>
    header, footer{
        display: none;
    }
</style>
    <!-- Modal -->
    <div class="login-page">
    <div class="row no-gutters align-items-center h-100">
        <div class="col-12 col-sm-12 col-md-8 col-lg-5">
           <div class="login-part">
              <div class="">
                  <a href="index.php"><img src="assets/images/logo.png" alt=""></a>
              </div>
              
               <h1 class="text-white">Hey there,<br>
<b>Welcome to Chefis.</b></h1>
              <form class="login-box">
                    <div class="form-group">
                        <input type="text" class="form-control email-text" placeholder="Email Address "> </div>
                        <hr>
                    <div class="form-group ">
                        <input type="text" class="form-control pass-text" placeholder="Password"> </div>
                    <button type="button" class="btn btn-lg btn-block text-left">Log in <span class="ml-auto float-right"><img src="assets/images/rightarrow.png" alt=""></span></button>
                </form>
                <a href="" class="forgot text-left d-block text-white"> Forgot Password?</a> 
                <div class="create-box">
                    <h6>Don’t have an account?</h6>
                    <a href="">Create Account</a>
                </div>
           </div>
            
        </div>
        <div class="col-md-7">
            
        </div>
    </div>
    </div>
    <?php include("footer.php");?>