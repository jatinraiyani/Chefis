<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('front_title') - Chefis</title>
    <link rel="shortcut icon" href="{{URL::to('public/Frontassets/images/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,900|Roboto+Slab:100,300,400,700"
          rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/progressively.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/js/dishes/about.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/styles.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/vieworder.css')}}">
    <link rel="stylesheet" href="{{URL::to('public/Frontassets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('public/Adminassets/vendors/css/extensions/sweetalert.css')}}">
    @yield('front_css')
    <title>Chefis</title>
</head>

@include('includes.Frontend.header')

<body>
<div id="wrapper">
    @yield('content')
</div>

@include('includes.Frontend.footer')
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            <div class="modal-body">
                <h2 class="text-center">Log In</h2>
                <p class="text-center">Please log in to your account to
                    <br> continue with Chefis</p>
                <form class="mt-5" id="loginform">
                   <div class="form-group print-error-msg-login"><ul></ul></div>
                    <div class="form-group">
                        <input type="text" class="form-control email-text" name="user_email" placeholder="Email Address "> </div>
                    <div class="form-group ">
                        <input type="password" class="form-control pass-text" name="user_password" placeholder="Password"> </div>
                    <button type="button" class="btn btn-lg btn-block" id="loginsubmitBtn">Log in</button>
                </form> <a href="" class="forgot" data-dismiss="modal" data-toggle="modal" data-target="#forgot">Forgot Password?</a> </div>
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
                     <form class="" id="signupform">
                       <div class="form-group print-error-msg-login"><ul></ul></div>
                     <div class="form-group row">
                       <div class="col-12"> <input type="text" id="username" class="form-control user-text" placeholder="First Name"> </div>

                        </div>

                        <div class="form-group ">
                        <input type="text" class="form-control phone-text" id="userphone" placeholder="Mobile"> </div>

                    <div class="form-group">
                        <input type="text" class="form-control email-text" id="useremail" placeholder="Email Address "> </div>

                    <div class="form-group ">
                        <input type="password" class="form-control pass-text" id="userpassword" placeholder="Password"> </div>

                    <div class="form-group ">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">i agree with terms and conditions</label>
                    </div>
                  </div>
                    <button type="button" id="registersubmitbtn" class="btn btn-lg btn-block text-left">Sign up <span class="ml-auto float-right"><img src="{{URL::to('public/Frontassets/images/rightarrow.png')}}" alt=""></span></button>
                </form>

                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content login-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div class="text-center"><img src="{{URL::to('public/Frontassets/images/oops.png')}}" class="ml-auto"
                                              alt=""></div>
                <h2 class="text-center">Oops....</h2>
                <p class="text-center">don’t provide our service on this
                    location. Please enter your email we’ll inform
                    you once we arrive</p>
                <form class="mt-5">
                    <div class="form-group">
                        <input type="text" class="form-control email-text" placeholder="Email Address "></div>
                    <a type="button" class="btn btn-lg btn-block">Log in</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{URL::to('public/Frontassets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/progressively.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/popper.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::to('public/Frontassets/js/custom.js')}}"></script>
<script src="{{URL::asset('public/Adminassets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="{{URL::to('public/Frontassets/js/DateTimePicker.css')}}">
<script src="{{URL::to('public/Frontassets/js/DateTimePicker.js')}}"></script>

<script>
    $(document).ready(function(){

      // clear cart div after order successful start
              var cookiess = getCookie("cartdata");
              console.log(cookiess);
              if (!cookiess || cookiess === '[null]') {
               localStorage.removeItem('chef_id');
               localStorage.removeItem('cartdata');

                // $('#media').replaceWith('<div class="media text-center">No Item Found.</div>');
                // $('.cart-items').text(0);
                // $('.cart-total').text(0.00);
              }
   // clear cart div after order successful end

            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

    });

    (function () {
        $("#cart").on("click", function () {
          // check if cart is null then don't open checkout page start
          var cook = getCookie("cartdata");
              if(cook){
                cook = JSON.parse(getCookie("cartdata"));
              }
              if(cook && cook[0] != null) {
                $(".shopping-cart").fadeToggle("fast");
              } else {
                event.preventDefault();
                swal("Please Add Atleast One Product in Cart..!");
              }
          // check if cart is null then don't open checkout page end
        });
    })();

    function setCookie(cname, cvalue, exdays) {
        if (getCookie(cname) == "") {
            deleteCookie(cname);
        }
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1)
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length)
            }
        }
        return "";
    }

    function deleteCookie(cname) {
        document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;'
    }

    var site_url = "{{URL::to('/')}}";
    // progressively.init();
    function showlogin(type)
    {
      if(type == 1)
      {
         $(".print-error-msg-login").find("ul").html('');
         document.getElementById("loginform").reset();
         $('#login').modal('show');
      }
      if(type == 2)
      {
         $(".print-error-msg-login").find("ul").html('');
         document.getElementById("signupform").reset();
         $('#signup').modal('show');
      }

    }
</script>
@yield('front_js')
<script>
$(document).mouseup(function (e){
  var container = $(".shopping-cart"); // YOUR CONTAINER SELECTOR

  if (!container.is(e.target) // if the target of the click isn't the container...
      && container.has(e.target).length === 0) // ... nor a descendant of the container
  {
    container.hide();
  }
});
var ID = function () {
  // Math.random should be unique because of its seeding algorithm.
  // Convert it to base 36 (numbers + letters), and grab the first 9 characters
  // after the decimal.
  return Math.random().toString(36).substr(2, 9);
};
function resetaddtocart(){
    $('#addtocatstatus').val(0);
}
 $(document).on('click', '.add_cart', function () {
       var chef_id = $(this).data('chef');
       var cart = localStorage.cartdata;

       var newCart = localStorage.chef_id;
       if (newCart) {
           if (newCart != chef_id) {
               swal("Alert", "Item can be added must be the same chef!", "warning");
               return false;
           }
       }

        var addonscount = $(this).data('addonscount');
        var id = $(this).data('id');

        if(addonscount > 0)
        {
            console.log($('#addtocatstatus').val());
            if($('#addtocatstatus').val() != 1)
            {
             $('#itemsuggestions').val('');
             var ptype = $(this).data('prodtype');
            $.ajax({
                url: "{{URL::to('get-adons')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                beforeSend: function () {
                    $(".chef_section").css('display', 'block');
                },
                success: function (data) {
                    var data = data.value;
                    console.log(data);
                    $('#item_name').text(data.item_name);
                    $('#item_description').text(data.item_description);
                    $('#item_price').text(data.finalprice);
                    $('#item_images').attr('src', data.item_image);
                    $('#amount').text(data.finalprice);
                    var html = '';
                    var addtocartbtn = '';
                    if(data.adons.length > 0){
                        $('.extra_choise').css('display','block');
                    } else {
                        $('.extra_choise').css('display','none');
                    }
                    $.each(data.adons, function( i, item ) {
                        console.log(item.box_validation);
                        if(item.box_validation == 'yes')
                        {
                            html +=' <h5 class="addon-title">'+item.title+'*</h5>';
                        }else {
                            html +=' <h5 class="addon-title">'+item.title+'</h5>';
                        }

                        html +='<input type="hidden" class="boxtype" value="'+item.box_type+'" data-itemid="'+item.id+'" data-boxvalidation="'+item.box_validation+'" data-boxtitle="'+item.title+'" />';
                        $.each(item.subadons,function (v,value) {
                            html +='<div class="d-flex justify-content-between d-flex-wrap mb-2">\n' +
                                '<div class="addon-check">\n' +
                                '<input type="'+item.box_type+'" name="'+item.id+'option" value="10" class="subadons_data" id="'+item.id+'option'+v+'" data-value="'+value.id+'" data-name="'+value.name+'"  data-price="'+value.price+'" " data-id="'+v+'">\n' +
                                '<label for="option'+v+'">'+value.name+'</label>\n' +
                                '</div>\n' +
                                '<div class="addon-price">$'+value.price+'</div>\n' +
                                '</div>'
                        });
                    });

                addtocartbtn += '<button data-my="mybtn" data-addondcount="'+addonscount+'" data-prodtype ="'+ptype+'" data-id="'+data.id+'" data-name="'+data.item_name+'" data-image="'+data.item_image+'" data-price="'+data.finalprice+'" data-chef="'+data.chef_id+'"  class="btn continue-btn m-auto bg-green text-center add_cart add_cart2">Add to Cart - $<span id="amount">'+data.finalprice+'</span></button>';

                    //$('.add_cart').attr({'data-id':data.id,'data-name':data.item_name,'data-image':data.item_image,'data-price':data.item_price,'data-chef':data.chef_id});

                    $('.adons').html(html);
                    $('#addtocartbtn').html(addtocartbtn);

                },
                complete: function () {
                    $(".chef_section").css('display', 'none');
                    setTimeout(function(){
                        $('.nearbychefs .progressive--not-loaded').addClass('progressive--is-loaded').removeClass('progressive--not-loaded');
                    },1400);
                    $("#item_details").modal('toggle');
                    $('#addtocatstatus').val(1);


                }

            });
            }

            return false;

        }
        var popupaddoncount = $(this).data('addondcount');
        var name = $(this).data('name');
        var image = $(this).data('image');
        if(popupaddoncount > 0)
        {
          var price = $('#productprice').val();
          var adprice = $('#addonsprice').val();
          var itemsuggestions = $('#itemsuggestions').val();
        }else{
          var price = $(this).data('price');
          var adprice = 0;
          var itemsuggestions = '';
        }
        console.log(price);
        var adonsname = $(this).data('adonsname');
        var prodtype = $(this).data('prodtype');

        var datacart = [];
        var radiovalidation = 0;
        if(popupaddoncount > 0)
        {
          $(".boxtype").each(function() {

              var boxvalidation = $(this).data('boxvalidation');
              console.log(boxvalidation);
              if(boxvalidation == "yes")
              {
                      var boxtype = $(this).val();

                          var radioname = $(this).data('itemid');
                          var title = $(this).data('boxtitle');
                          if ($('input[name='+ radioname +'option]:checked').length == 0) {
                                 // at least one of the radio buttons was checked
                                 //swal("Alert", "Addons is Required ", "warning");
                                 //return false;
                                 //console.log(radiovalidation);
                                 radiovalidation = 1;
                                 console.log(radiovalidation)
                          }

              }


          });
        }

        if(radiovalidation == 1)
            {
                swal("Alert", "Addons is Required ", "warning");
                return false;

            }
        var addonstatus;

        if(popupaddoncount > 0)
        {
            var adons = $(this).data('adons');
            addonstatus = true;
        }else{
            var adons = 0;
            addonstatus = false;
        }



        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = new Array();
        }

        var is_cart = new Array();
        var totalqty = 0;
        var totalprice = 0;
        for (var i = 0; i < cart.length; i++) {
            var cart_id = cart[i][0]['id'];
            var adstatus = cart[i][0]['addonstatus'];
            var cartprodtype = cart[i][0]['prodtype'];
                if(cartprodtype != prodtype)
                {
                    swal("Alert", "You can't add on demand and scheduled itam at same time !", "warning");
                    return false;
                }
                if(cartprodtype == 2 && prodtype == 2)
                {
                    swal("Alert", "You can't add more than one scheduled itam.!", "warning");
                    return false;
                }
                if(cart_id === id && adstatus == true && cartprodtype == prodtype)
                {

                    if(addonstatus == true)
                    {
                        console.log('update qty');
                        console.log(adons);
                        var cartaddondata = cart[i][0]['adons'];
                        console.log(cartaddondata);

                        if (adons.toString().includes(',')) {
                            var frontaddonsdata = adons.split(',');
                            var fisarray = true;

                        }else{

                            var frontaddonsdata = adons;
                            var fisarray = false;
                        }
                        if (cartaddondata.toString().includes(',')) {
                            var addonsdata = cart[i][0]['adons'].split(',');
                            var cisarray = true;

                        }else{

                            var addonsdata = cartaddondata;
                            var cisarray = false;
                        }

                        if(cisarray == true && fisarray == true)
                        {
                                var check = addonsdata.equals(frontaddonsdata) === true;
                                console.log(check);
                                if(check)
                                    {
                                        cart[i][0]['qty'] = cart[i][0]['qty'] + 1;
                                        is_cart.push('yes');
                                    }else{
                                        is_cart.push('no');
                                    }
                        }
                        if(cisarray == false && fisarray == false)
                        {
                            if(addonsdata == frontaddonsdata)
                            {
                                cart[i][0]['qty'] = cart[i][0]['qty'] + 1;
                                is_cart.push('yes');

                            }else{
                                is_cart.push('no');
                            }
                        }



                    }


                }
                else if(cart_id === id && adstatus == false)
                {
                    if(addonstatus == false)
                    {
                        cart[i][0]['qty'] = cart[i][0]['qty'] + 1;
                        is_cart.push('yes');
                    }
                    else
                    {
                        is_cart.push('no');
                    }

                }
                else
                {

                    is_cart.push('no');

                }





            totalqty += cart[i][0]['qty'];
            totalprice += cart[i][0]['qty'] * cart[i][0]['price'];
        }

        if ($.inArray('yes', is_cart) == -1 || cart.length == 0) {
            datacart.push({
                tmpid : ID(),
                prodtype : prodtype,
                id: id,
                name: name,
                image: image,
                price: price,
                chef_id: chef_id,
                qty: 1,
                adons: adons,
                adprice: adprice,
                adonsname: adonsname,
                addonstatus : addonstatus,
                itemsuggestions : itemsuggestions
            });
            cart.push(datacart);
            totalqty += 1;
            totalprice += price;

            localStorage.chef_id = chef_id;

        }


        localStorage.cartdata = JSON.stringify(cart);

        setCookie("cartdata", JSON.stringify(cart), 15);
        cartData();

        //$('.cart-items').text(totalqty);
        //$('.cart-total').text(totalprice.toFixed(2));
        $('#item_details').modal('hide');
        $('#addtocatstatus').val(0);
        toastr.success('Item is added into your cart!');


        // location.reload();
    });

    $(document).ready(function () {
        // Warn if overriding existing method
        if(Array.prototype.equals)
            console.warn("Overriding existing Array.prototype.equals. Possible causes: New API defines the method, there's a framework conflict or you've got double inclusions in your code.");
        // attach the .equals method to Array's prototype to call it on any array
        Array.prototype.equals = function (array) {
            // if the other array is a falsy value, return
            if (!array)
                return false;

            // compare lengths - can save a lot of time
            if (this.length != array.length)
                return false;

            for (var i = 0, l=this.length; i < l; i++) {
                // Check if we have nested arrays
                if (this[i] instanceof Array && array[i] instanceof Array) {
                    // recurse into the nested arrays
                    if (!this[i].equals(array[i]))
                        return false;
                }
                else if (this[i] != array[i]) {
                    // Warning - two different object instances will never be equal: {x:20} != {x:20}
                    return false;
                }
            }
            return true;
        }
        // Hide method from for-in loops
        Object.defineProperty(Array.prototype, "equals", {enumerable: false});
        cartData();
    });

    function cartData() {
        var cart = localStorage.cartdata;
        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = new Array();
        }

        var html = '';
        var totalqty = 0;
        var totalprice = 0;

        if (cart.length > 0) {
            $.each(cart, function (i, item) {
                var value = item[0];

                html += '<div class="media"><div class="mr-3 cart-img"> <img class="img-fluid" src="' + value.image + '" alt=""> </div>' +
                    '<div class="media-body"><h5 class="mt-0 mb-0">' + value.name + '</h5><div class="prise-cart">$' + value.price + '</div>' +
                    '</div><div class="input-group"> <span class="input-group-btn"><button type="button" id="qtymins" class="quantity-left-minus btn-number"  data-type="minus" ' +
                    'data-field="" data-tmpid="'+value.tmpid+'" data-id="' + value.id + '">-</button></span><input type="text" id="quantity" name="quantity" class="form-control input-number" value="' + value.qty + '" min="1" max="20" readonly> ' +
                    '<span class="input-group-btn"><button type="button" class="quantity-right-plus btn-number" id="qtyplus" data-tmpid="'+value.tmpid+'" data-id="' + value.id + '" data-type="plus" data-field="">+</button></span></div></div>';

                totalqty += value.qty;
                totalprice += value.qty * value.price;
            });
            $('#cartSpan').show();
        } else {
            html += '<div class="media text-center">No Item Found.</div>';
            $('.cart-items').text(0);
            $('.cart-total').text(0.00);
            $('#cartSpan').hide();
        }
        $('.cart-items').text(totalqty);
        $('.cart-total').text(totalprice.toFixed(2));
        $('.cart_value_items').html(html);
    }


    function removeqty(id) {
        var cart = localStorage.cartdata;

        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = new Array();
        }

        var totalqty = 0;
        var totalprice = 0;

        for (var i = 0; i < cart.length; i++) {
            var cart_id = cart[i][0]['tmpid'];
            if (cart_id === id) {
                cart[i][0]['qty'] = cart[i][0]['qty'] - 1;
            }
            if (cart[i][0]['qty'] == 0) {
                delete cart[i];
            } else {
                totalqty += cart[i][0]['qty'];
                totalprice += cart[i][0]['qty'] * cart[i][0]['price'];
            }

        }

        var filtered = cart.filter(function (el) {
            return el != null;
        });

        localStorage.cartdata = JSON.stringify(filtered);
        setCookie("cartdata", JSON.stringify(cart), 15);
        cartData();
        var pageURL = $(location).attr("pathname");
        if(pageURL == '/checkout' || pageURL =='/chefis/checkout'){
            checkoutCartData();
        }
        if (totalqty == 0) {
            localStorage.removeItem('chef_id');
        }
        $('.cart-items').text(totalqty);
        $('.cart-total').text(totalprice.toFixed(2));
    }

    function increaseqty(id) {
        var cart = localStorage.cartdata;

        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = new Array();
        }

        var totalqty = 0;
        var totalprice = 0;

        for (var i = 0; i < cart.length; i++) {
            var cart_id = cart[i][0]['tmpid'];
            if (cart_id === id) {
                cart[i][0]['qty'] = cart[i][0]['qty'] + 1;
            }
            totalqty += cart[i][0]['qty'];
            totalprice += cart[i][0]['qty'] * cart[i][0]['price'];
        }

        localStorage.cartdata = JSON.stringify(cart);
        setCookie("cartdata", JSON.stringify(cart), 15);
        cartData();

        var pageURL = $(location).attr("pathname");
        if(pageURL == '/checkout' || pageURL =='/chefis/checkout'){
            checkoutCartData();
        }

        $('.cart-items').text(totalqty);
        $('.cart-total').text(totalprice.toFixed(2));
    }

    $(document).on('click', '#qtyplus', function () {
        var id = $(this).data('tmpid');
        increaseqty(id);
    });

    $(document).on('click', '#qtymins', function () {
        var id = $(this).data('tmpid');
        removeqty(id);
    });


</script>
<script>
    $(document).ready(function () {
        $('.custom-radio').on('click', function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
<script>
$(document).ready(function() {

    $("#loginsubmitBtn").click(function(e) {


        var email = $("input[name='user_email']").val();
        var password = $("input[name='user_password']").val();

        $.ajax({
            url: "{{URL::to('ajax-login')}}",
            type: "POST",
            data: {
                "email": email,
                "password": password,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {

                if(data.status == 1)
                {
                  location.reload();
                }else {
                    printErrorMsg2(data.error);
                }


            },
            error: function (data) {
              console.log(data.responseJSON);
              printErrorMsg(data.responseJSON);
            }
        });

    });
    $("#registersubmitbtn").click(function(e){

      if($("#customCheck1").prop('checked') == false){
          swal("Alert", "Please Checked Terms & Conditions !", "warning");
          return false;
      }
      var username = $("#username").val();
      var userphone = $("#userphone").val();
      var useremail = $("#useremail").val();
      var password = $("#userpassword").val();
      $.ajax({
          url: "{{URL::to('ajax-register')}}",
          type: "POST",
          data: {
              "name": username,
              "phone_number" : userphone,
              "email" : useremail,
              "password": password,
              "_token": "{{ csrf_token() }}",
          },
          success: function(data) {

              if(data.status == 1)
              {
                location.reload();
              }else {
                  printErrorMsg2(data.error);
              }


          },
          error: function (data) {
            console.log(data.responseJSON);
            printErrorMsg(data.responseJSON);
          }
      });

    });
    function printErrorMsg2(msg) {
        $(".print-error-msg-login").find("ul").html('');
        $(".print-error-msg-login").css('display', 'block');
        $.each(msg, function(key, value) {
            console.log(value);
            $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
        });
    }
    function printErrorMsg(msg) {
        $(".print-error-msg-login").find("ul").html('');
        $(".print-error-msg-login").css('display', 'block');
        $.each(msg.errors, function(key, value) {
            console.log(value);
            $(".print-error-msg-login").find("ul").append('<li>' + value + '</li>');
        });
    }
});

// open help popup start
$('#helpSupport').click(function(){
  swal('Call (55) 67020423 or Email comida@chefis.app');

});
// open help popup end
</script>
</body>

</html>
