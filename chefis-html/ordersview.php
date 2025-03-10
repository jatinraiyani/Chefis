<?php include("headerlogin.php");?>
    <!-- Modal -->
    <div id="wrapper" class="myaccount-page">
        <section class="order-hd mt-5">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-12">
                        <h2>Order View</h2> </div>
                </div>
            
    
            
                <div class="row ">
                 <div class="col-md-4">
                     <div class="delivery-address bg-white p-3">
                            <h4>Delivery Address</h4> 
                            <h5 class="m-0">Ashton Lauren</h5>
                            <address class="m-0">
                               45th George Avenue,Martin Road, California
                            </address>
                            <p><b>Phone</b>02845664</p>
                     </div>
                    </div>
                     <div class="col-md-4">
                         <div class="your-reward bg-white p-3">
                                 <h4>Your Rewards</h4> 
                                 <ul class="star-review mt-4">
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star-half-o" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                      
                                 </ul>
                         </div>
                     </div>
                      <div class="col-md-4">
                         <div class="more-actions bg-white p-3">
                                 <h4>More actions</h4> 
                                 <div class="row    mt-4 align-items-center">
                                     <div class="col-6">
                                         <button class="btn-lg btn-red"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                     </div>
                                     <div class="col-6 text-right">
                                         <button class="btn btn-sm">Request Invoice</button>
                                     </div>
                                 </div>
                         </div>
                     </div>
                 </div> 
                   <div class="row bg-white p-3 no-gutters mt-4">
                   <div class="col-md-4 pr-3">
                       <div class="media">
                                 <div class="order-img-past mr-3">
                                  <img class="img-fluid rounded" src="assets/images/pro/Burger1.jpg" alt="">
                                  </div>
                                  <div class="media-body">
                                    <h4 class="mb-2">Burger King</h4>
                                    <h5 class="mt-0 mb-0">Chicken Kebab Bon...</h5>
                                    <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni totam nostrum ad mollitia, ex numquam quas officiis, </p>
                                    <div class="prise-cart">$15.35</div>
                                  </div>
                                </div>
                                <div class="delivered-date mt-3">
                                   <i class="fa fa-truck" aria-hidden="true"></i> Delivered On Sat, Mar 16th'19
                                </div>
                   </div>
                   <div class="col-md-5">
                           
<div class="flex-parent">
	<div class="input-flex-container">
		<div class="input">
			<span data-year="" data-info="Ordered "></span>
		</div>
		<div class="input">
			<span data-year="" data-info="Packed "></span>
		</div>
		<div class="input active">
			<span data-year="" data-info="Shipped"></span>
		</div>
		<div class="input">
			<span data-year="" data-info="Delivered"></span>
		</div>

	</div>
	<div class="description-flex-container">
		<p>Your item has been Ordered successful</p>
		<p>Your item has been Packed</p>
		<p class="active">Your item has been Shipped</p>
		<p>Your item has been delivered.</p>
		
	</div>
</div>



                   </div>
<div class="col-md-3 pl-3">
    <div class="price mt-3">
        <h6>$145</h6>
    </div>
    <div class="text-theme"><i class="fa fa-star" aria-hidden="true"></i> Rate & Review Product</div>
</div>
               <div class="col-md-12 ">
                   <hr class="mt-4 ">
                   <div class="row mt-3 justify-content-end">
                       <div class="col-md-3 ">
                           <h5>Total : $145</h5>
                       </div>
                   </div>
                   
               </div>
                </div>
                 
                </div>
            
        </section>
    </div>
    <?php include("footer.php");?>
        <script>
            $(function(){
	var inputs = $('.input');
	var paras = $('.description-flex-container').find('p');
	$(inputs).click(function(){
		var t = $(this),
				ind = t.index(),
				matchedPara = $(paras).eq(ind);
		
		$(t).add(matchedPara).addClass('active');
		$(inputs).not(t).add($(paras).not(matchedPara)).removeClass('active');
	});
});
        </script>