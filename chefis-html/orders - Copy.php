<?php include("header.php");?>
    <!-- Modal -->
    <div id="wrapper">
        <section class="order-hd mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Order</h2> </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <table id="cart" class="table table-hover table-condensed table-view-order">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-3 col-sm-2 hidden-xs"><img src="assets/images/pro/Burger1.jpg" alt="..." class="img-fluid" /></div>
                                    <div class="col-9 col-sm-10 align-self-center">
                                        <h4 class="nomargin">2 Crispy Veg Supreme</h4>
                                        <p>25% OFF On 2 Burgers</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price" class="">$1.99</td>
                            <td data-th="Quantity" class="">
                                <input type="number" class="form-control text-center" value="1"> </td>
                            <td data-th="Subtotal" class="text-center">1.99</td>
                            <td class="actions" data-th="" colspan="">
                                <button class="delete-btn btn-sm d-none d-md-block"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-3 col-sm-2 hidden-xs"><img src="assets/images/pro/Burger1.jpg" alt="..." class="img-fluid" /></div>
                                    <div class="col-9 col-sm-10 align-self-center">
                                        <h4 class="nomargin">2 Crispy Veg Supreme</h4>
                                        <p>25% OFF On 2 Burgers</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price" class="">$1.99</td>
                            <td data-th="Quantity" class="">
                                <input type="number" class="form-control text-center" value="1"> </td>
                            <td data-th="Subtotal" class="text-center">1.99</td>
                            <td class="actions" data-th="" colspan="">
                                <button class="delete-btn btn-sm d-none d-md-block"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-3 col-sm-2 hidden-xs"><img src="assets/images/pro/Burger1.jpg" alt="..." class="img-fluid" /></div>
                                    <div class="col-9 col-sm-10 align-self-center">
                                        <h4 class="nomargin">2 Crispy Veg Supreme</h4>
                                        <p>25% OFF On 2 Burgers</p>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price" class="">$1.99</td>
                            <td data-th="Quantity" class="">
                                <input type="number" class="form-control text-center" value="1"> </td>
                            <td data-th="Subtotal" class="text-center">1.99</td>
                            <td class="actions" data-th="" colspan="">
                                <button class="delete-btn btn-sm d-none d-md-block"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                            <td colspan="2" class="hidden-xs"></td>
                            <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>
    <?php include("footer.php");?>
        <script>
        </script>