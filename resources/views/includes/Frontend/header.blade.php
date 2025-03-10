<header>
    <nav class="navbar navbar-expand-md header-box">
        <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{URL::to('public/Frontassets/images/logo.png')}}"
                                                                 alt="logo"></a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link {{Request::is('/') ? 'active' : '' }}" href="{{URL::to('/')}}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{Request::is('chef-list') ? 'active' : '' }}"
                           href="{{URL::to('chef-list')}}" id="aboutbttn">
                            Chef list
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{Request::is('about-us') ? 'active' : '' }}" href="{{URL::to('about-us')}}">
                            About us
                        </a>
                    </li>


                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item tab-profile {{Request::is('my-account') ? 'active' : '' }}"
                                   href="{{URL::to('my-account')}}">Profile</a>
                                <a class="nav-link tab-profile {{Request::is('my-account#favorite') ? 'active' : '' }}"
                                   href="{{URL::to('my-account')}}#favorite">My favorites</a>
                                <a class="nav-link tab-profile {{Request::is('my-account#orders') ? 'active' : '' }}"
                                   href="{{URL::to('my-account')}}#orders" id="privatejets">Orders</a>

                                <a class="dropdown-item" href="{{URL::to('logout')}}">Logout</a>
                            </div>
                        </li>
                    @else

                        <li class="nav-item">
                            <a class="btn nav-link login-btn {{Request::is('login') ? 'active' : '' }}"
                               href="{{URL::to('login')}}">
                                Login
                            </a>
                        </li>

                    @endif
                    <li class="nav-item">
                        <a href="#" class=" nav-link" id="cart" role="button">
                            <img src="{{URL::to('public/Frontassets/images/card.svg')}}" width="30" alt="">
                            <span class="item-count cart-items" id="cartSpan"></span>
                        </a>
                    </li>
                </ul>
                <div class="shopping-cart">
                    <div class="shopping-cart-items">
                        <h3>My Cart</h3>
                        <div class="cart_value_items">
                            <div class="media" id="media">
                                No Item Found.
                            </div>
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
                                    <h6>$ <span class="cart-total"></span></h6></div>
                            </div>
                        </div>
                    </div>
                    <!--end shopping-cart-header --><a href="{{URL::to('checkout')}}" class="btn btn-fill d-block">Checkout</a>
                </div>
                <!--end shopping-cart -->
            </div>
        </div>
    </nav>
    <!-- Modal -->
</header>
