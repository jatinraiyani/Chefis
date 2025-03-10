<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if(Auth::user()->hasRole('admin'))
                <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{URL::to('admin/')}}">
                            <i class="ft ft-monitor"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">
                        Dashboard
                    </span>
                        </a>
                    </li>
                <li class=" nav-item has-sub {{ Request::is('admin/user') ? 'active' : '' || Request::is('admin/user/*') ? 'active' : '' || Request::is('admin/user-admin/*') ? 'active' : '' || Request::is('admin/user-chef/*') ? 'active' : '' || Request::is('admin/user-driver/*') ? 'active' : '' }}">
                    <a href="#"><i class="ft ft-users"></i>
                        <span class="menu-title">Users</span>
                    </a>
                    <ul class="menu-content">
                        <!-- <li class="{{Request::is('admin/user-admin') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/user-admin')}}">
                                <i class="ft ft-user"></i> List Admin Users</a>
                        </li> -->
                        <li class="{{Request::is('admin/user-chef') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/user-chef')}}">
                                <i class="ft ft-user"></i> List Chef Users</a>
                        </li>
                        <li class="{{Request::is('admin/user') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/user')}}">
                                <i class="ft ft-user"></i> List Users</a>
                        </li>
                        <li class="{{Request::is('admin/user-driver') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/user-driver')}}">
                                <i class="ft ft-user"></i> List Driver Users</a>
                        </li>
                    </ul>
                </li>
                {{--<li class=" nav-item has-sub {{Request::is('admin/category') ? 'active' : '' || Request::is('admin/category/*') ? 'active' : '' }}">--}}
                    {{--<a href="#"><i class="ft ft-sliders"></i>--}}
                        {{--<span class="menu-title">Category</span></a>--}}
                    {{--<ul class="menu-content">--}}
                        {{--<li class="{{Request::is('admin/category') ? 'active' : '' }}">--}}
                            {{--<a class="menu-item" href="{{URL::to('admin/category')}}">--}}
                                {{--<i class="icon icon-vector"></i> List Category</a>--}}
                        {{--</li>--}}
                        {{--<li class="{{Request::is('admin/role/create') ? 'active' : '' }}">--}}
                            {{--<a class="menu-item" href="{{URL::to('admin/category/create')}}">--}}
                                {{--<i class="icon icon-anchor"></i> Add Category</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class=" nav-item has-sub {{Request::is('admin/cuisine') ? 'active' : '' || Request::is('admin/cuisine/*') ? 'active' : '' }}">
                    <a href="#"><i class="ft ft-sunset"></i>
                        <span class="menu-title">Cuisines</span></a>
                    <ul class="menu-content">
                        <li class="{{Request::is('admin/cuisine') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/cuisine')}}">
                                <i class="icon icon-vector"></i> List Cuisines</a>
                        </li>
                        <li class="{{Request::is('admin/role/create') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/cuisine/create')}}">
                                <i class="icon icon-anchor"></i> Add Cuisine</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item has-sub {{Request::is('admin/item') ? 'active' : '' || Request::is('admin/item/*') ? 'active' : '' }}">
                    <a href="#"><i class="ft ft-grid"></i>
                        <span class="menu-title">Items</span></a>
                    <ul class="menu-content">
                        <li class="{{Request::is('admin/item') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/item')}}">
                                <i class="icon icon-vector"></i> List Items</a>
                        </li>
                        <li class="{{Request::is('admin/item/create') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/item/create')}}">
                                <i class="icon icon-anchor"></i> Add Item</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item {{Request::is('admin/order') ? 'active' : '' || Request::is('admin/order/*') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/order')}}">
                        <i class="ft ft-shopping-cart"></i>
                        <span class="menu-title">Orders</span></a>
                </li>
                <li class=" nav-item {{Request::is('admin/payment') ? 'active' : '' || Request::is('admin/payment/*') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/payment')}}">
                        <i class="ft ft-credit-card"></i>
                        <span class="menu-title">Payments</span></a>
                </li>
                <li class=" nav-item {{Request::is('admin/feedback') ? 'active' : '' || Request::is('admin/feedback/*') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/feedback')}}">
                        <i class="ft ft-phone-call"></i>
                        <span class="menu-title">Feedback</span></a>
                </li>
                <li class=" nav-item {{Request::is('admin/rating-review') ? 'active' : '' || Request::is('admin/rating-review/*') ? 'active' : '' }}">
                    <a href="{{URL::to('admin/rating-review')}}">
                        <i class="ft ft-star"></i>
                        <span class="menu-title">Ratings & Reviews</span></a>
                </li>
                <li class=" nav-item has-sub {{Request::is('admin/area') ? 'active' : '' || Request::is('admin/area/*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-map-marker"></i>
                        <span class="menu-title">Area To Explore</span></a>
                    <ul class="menu-content">
                        <li class="{{Request::is('admin/area') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/area')}}">
                                <i class="icon icon-vector"></i> List Area</a>
                        </li>
                        <li class="{{Request::is('admin/promo/create') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/area/create')}}">
                                <i class="icon icon-anchor"></i> Add Area</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item has-sub {{Request::is('admin/promo') ? 'active' : '' || Request::is('admin/promo/*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-map-marker"></i>
                        <span class="menu-title">Promocode</span></a>
                    <ul class="menu-content">
                        <li class="{{Request::is('admin/promo') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/promo')}}">
                                <i class="icon icon-vector"></i> List Promo</a>
                        </li>
                        <li class="{{Request::is('admin/promo/create') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('admin/promo/create')}}">
                                <i class="icon icon-anchor"></i> Add Promo</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item {{Request::is('admin/cms') ? 'active' : '' || Request::is('admin/cms/*') ? 'active' : '' }}">
                <a href="{{URL::to('admin/cms')}}">
                    <i class="ft ft-settings"></i>
                    <span class="menu-title">CMS</span></a>
            </li>
            @elseif(Auth::user()->hasRole('chef'))
                <li class="nav-item {{ Request::is('chef-admin') ? 'active' : '' }}">
                    <a href="{{URL::to('chef-admin/')}}">
                        <i class="ft ft-monitor"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">
                        Dashboard
                    </span>
                    </a>
                </li>
                {{--<li class=" nav-item has-sub {{Request::is('chef-admin/category') ? 'active' : '' || Request::is('chef-admin/category/*') ? 'active' : '' }}">--}}
                    {{--<a href="#"><i class="ft ft-sliders"></i>--}}
                        {{--<span class="menu-title">Category</span></a>--}}
                    {{--<ul class="menu-content">--}}
                        {{--<li class="{{Request::is('chef-admin/category') ? 'active' : '' }}">--}}
                            {{--<a class="menu-item" href="{{URL::to('chef-admin/category')}}">--}}
                                {{--<i class="icon icon-vector"></i> List Category</a>--}}
                        {{--</li>--}}
                        {{--<li class="{{Request::is('chef-admin/role/create') ? 'active' : '' }}">--}}
                            {{--<a class="menu-item" href="{{URL::to('chef-admin/category/create')}}">--}}
                                {{--<i class="icon icon-anchor"></i> Add Category</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li class=" nav-item has-sub {{Request::is('chef-admin/item') ? 'active' : '' || Request::is('chef-admin/item/*') ? 'active' : '' }}">
                    <a href="#"><i class="ft ft-grid"></i>
                        <span class="menu-title">Items</span></a>
                    <ul class="menu-content">
                        <li class="{{Request::is('chef-admin/item') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('chef-admin/item')}}">
                                <i class="icon icon-vector"></i> List Items</a>
                        </li>
                        <li class="{{Request::is('chef-admin/role/create') ? 'active' : '' }}">
                            <a class="menu-item" href="{{URL::to('chef-admin/item/create')}}">
                                <i class="icon icon-anchor"></i> Add Item</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item {{Request::is('chef-admin/order') ? 'active' : '' || Request::is('chef-admin/order/*') ? 'active' : '' }}">
                    <a href="{{URL::to('chef-admin/order')}}">
                        <i class="ft ft-shopping-cart"></i>
                        <span class="menu-title">Orders</span></a>
                </li>
                {{--<li class=" nav-item {{Request::is('chef-admin/payment') ? 'active' : '' || Request::is('chef-admin/payment/*') ? 'active' : '' }}">--}}
                    {{--<a href="{{URL::to('chef-admin/payment')}}">--}}
                        {{--<i class="ft ft-credit-card"></i>--}}
                        {{--<span class="menu-title">Payments</span></a>--}}
                {{--</li>--}}
            @endif

        </ul>
    </div>
</div>
