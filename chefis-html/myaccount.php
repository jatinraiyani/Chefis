<?php include("headerlogin.php");?>
    <!-- Modal -->
    <div id="wrapper" class="myaccount-page">
        <section class="order-hd mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav tabs-left bg-white flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical"> <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-users" aria-hidden="true"></i> Profile</a> <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Orders</a> <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-heart" aria-hidden="true"></i> My favorites</a> <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#addresstabs" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-map-marker" aria-hidden="true"></i> Addresses</a> </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content bg-white p-3" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="text-white">Profile</h5></div>
                                        <div class="col-md-6 text-right">
                                            <button class="btn-red p-2 rounded" data-toggle="modal" data-target="#profile-edit">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 bg-white">
                                        <div class="panel panel-default w-100 mb-4 mt-3">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4"><img src="assets/images/chefs-user2.jpg" class="img-fluid" alt=""></div>
                                                            <div class="col-md-8">
                                                                <ul class="address-list">
                                                                    <li><span>Email</span> ashtonlauren@email.com</li>
                                                                    <li><span>Password</span>******</li>
                                                                    <li><span>First Name</span>Ashton</li>
                                                                    <li><span>Last Name</span> Lauren </li>
                                                                    <li><span>Mobile Number</span>+1 123 456 7890</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="panel-heading">
                                    <h5 class="text-white">Order</h5> </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-12 ">
                                        <div class="row no-gutters mb-3">
                                            <div class="col-md-12 order-header mb-3 ">
                                                <div class="row  pl-3 pr-3">
                                                    <div class="col-md-6"> <a href="ordersview.php" class="bg-white p-2">Zydaskd515asd140</a> </div>
                                                    <div class="col-md-6 text-right"> <a href="ordersview.php" class="btn-red rounded p-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Track</a> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="media">
                                                            <div class="order-img-past mr-3"> <img class="img-fluid rounded" src="assets/images/pro/Burger1.jpg" alt=""> </div>
                                                            <div class="media-body">
                                                                <h4 class="mb-2">Burger King</h4>
                                                                <h5 class="mt-0 mb-0">Chicken Kebab Bon...</h5>
                                                                <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni totam nostrum ad mollitia, ex numquam quas officiis, </p>
                                                                <div class="prise-cart">$15.35</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">Delivered on Sat, Mar 16th '19</div>
                                                    <div class="col-md-3"><i class="fa fa-star" aria-hidden="true"></i> Rate & Review Product</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 border-top mt-3 pt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Ordered On Thu, Mar 14th'19</p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <div><b>Order Total $119</b></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row no-gutters mb-3">
                                            <div class="col-md-12 order-header mb-3">
                                                <div class="row pl-3 pr-3">
                                                    <div class="col-md-6"> <a href="ordersview.php" class="bg-white p-2">Zydaskd515asd140</a> </div>
                                                    <div class="col-md-6 text-right"> <a href="ordersview.php" class="btn-red rounded p-2"><i class="fa fa-map-marker" aria-hidden="true"></i> Track</a> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="media">
                                                            <div class="order-img-past mr-3"> <img class="img-fluid rounded" src="assets/images/pro/Burger1.jpg" alt=""> </div>
                                                            <div class="media-body">
                                                                <h4 class="mb-2">Burger King</h4>
                                                                <h5 class="mt-0 mb-0">Chicken Kebab Bon...</h5>
                                                                <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni totam nostrum ad mollitia, ex numquam quas officiis, </p>
                                                                <div class="prise-cart">$15.35</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">Delivered on Sat, Mar 16th '19</div>
                                                    <div class="col-md-3"><i class="fa fa-star" aria-hidden="true"></i> Rate & Review Product</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="media">
                                                            <div class="order-img-past mr-3"> <img class="img-fluid rounded" src="assets/images/pro/Burger1.jpg" alt=""> </div>
                                                            <div class="media-body">
                                                                <h4 class="mb-2">Burger King</h4>
                                                                <h5 class="mt-0 mb-0">Chicken Kebab Bon...</h5>
                                                                <p class="mb-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni totam nostrum ad mollitia, ex numquam quas officiis, </p>
                                                                <div class="prise-cart">$15.35</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">Delivered on Sat, Mar 16th '19</div>
                                                    <div class="col-md-3"><i class="fa fa-star" aria-hidden="true"></i> Rate & Review Product</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 border-top mt-3 pt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>Ordered On Thu, Mar 14th'19</p>
                                                    </div>
                                                    <div class="col-md-6 text-right">
                                                        <div><b>Order Total $119</b></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="panel-heading">
                                    <h5 class="text-white"> My favorites</h5> </div>
                                <div class="bestdishes">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bestdishes-box" onclick="window.location='chefdetail.php';">
                                                <div class="bestdishes-img"> <img src="assets/images/pro/Burger.webp" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>Burger King</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock-o" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box" onclick="window.location='chefdetail.php';">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">40 - 50 min</div> <img src="assets/images/pro/product1.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>Pav Bhaji)</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box" onclick="window.location='chefdetail.php';">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">20 - 30 min</div> <img src="assets/images/pro/product2.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>McDonald's</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box" onclick="window.location='chefdetail.php';">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">30 - 40 min</div> <img src="assets/images/pro/product3.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>Subway</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">30 - 40 min</div> <img src="assets/images/pro/product4.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>Crunch</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">30 - 40 min</div> <img src="assets/images/pro/product5.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6> The Sandwich Shop</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">30 - 40 min</div> <img src="assets/images/pro/product6.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>Sizzling Culture</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bestdishes-box">
                                                <div class="bestdishes-img">
                                                    <div class="min-delivery">30 - 40 min</div> <img src="assets/images/pro/product7.jpg" class="img-fluid" alt="">
                                                    <div class="favorites"> <i class="fa fa-heart" aria-hidden="true"></i> </div>
                                                </div>
                                                <div class="bestdishes-info">
                                                    <h6>The Tadka Corner</h6>
                                                    <p class="text-grey">Starter</p>
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="review-box"><span class="icon-star _537e4"></span><span>4.3</span></div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mindelivery"><i class="fa fa-clock" aria-hidden="true"></i> 30 - 40 min</div>
                                                        </div>
                                                        <div class="col-4 text-right ">
                                                            <div class="prise">$45.50 </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="addresstabs" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="text-white">Manage Addresses</h5> </div>
                                        <div class="col-6 text-right">
                                            <button class="btn-red p-2 rounded" data-toggle="modal" data-target="#add-address">Add Address</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="address-box">
                                            <h4><i class="fa fa-home" aria-hidden="true"></i> Work</h4> <address>
                                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti molestiae maxime perspiciatis cum, quasi perferendis cupiditate mollitia, optio eligendi voluptate ipsa suscipit iure autem quisquam explicabo reiciendis sed repellendus.
                                                  </address>
                                            <ul class="list">
                                                <li><a href="" class="btn-red p-2 rounded">Edit</a></li>
                                                <li><a href="" class="btn p-2 rounded">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="address-box">
                                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Other</h4> <address>
                                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti molestiae maxime perspiciatis cum, quasi perferendis cupiditate mollitia, optio eligendi voluptate ipsa suscipit iure autem quisquam explicabo reiciendis sed repellendus.
                                                  </address>
                                            <ul class="list">
                                                <li><a href="" class="btn-red p-2 rounded">Edit</a></li>
                                                <li><a href="" class="btn p-2 rounded">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade myaccount-modal" id="add-address" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col">
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>dasdsdas</option>
                            <option>dasdsdas</option>
                            <option>dasdsdas</option>
                            <option>dasdsdas</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <textarea name="" id="" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col">
                            <input type="text" placeholder="First Name" class="form-control"> </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade myaccount-modal" id="profile-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="avatar-wrapper-profile"> <img class="profile-pic" src="assets/images/user-avatar-placeholder.png" alt="" />
                            <div class="upload-button">Change Images</div>
                            <input class="file-upload" type="file" accept="image/*" /> </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="email" placeholder="Email" class="form-control"> </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="password" placeholder="Password" class="form-control"> </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="text" placeholder="First Name" class="form-control"> </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col">
                                <input type="text" placeholder="Mobile Numbe" class="form-control"> </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php");?>
        <script>
        </script>
        <script>
            $(function () {
                var inputs = $('.input');
                var paras = $('.description-flex-container').find('p');
                $(inputs).click(function () {
                    var t = $(this)
                        , ind = t.index()
                        , matchedPara = $(paras).eq(ind);
                    $(t).add(matchedPara).addClass('active');
                    $(inputs).not(t).add($(paras).not(matchedPara)).removeClass('active');
                });
            });
        </script>