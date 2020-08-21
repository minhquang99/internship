 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thomscrent Perfume</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/searchajax.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/quickview.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/cart.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/detailproduct.css')}}">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <h4>Laravel's Perfume Shop</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav" style="margin-top: 9px;">
                                @if(isset($user))
                                    @if($user->level==0)
                                        <ul class="nav top-menu">
                                            <li class="dropdown" style="margin-top: -7px;">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="show-user">
                                                    <i class="fa fa-user"></i>
                                                    <span class="username">{{ $user->name }}</span>
                                                    <b class="caret"></b>
                                                </a>
                                                <ul class="dropdown-menu extended logout">
                                                    <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="nav top-menu">
                                            <li class="dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="show-user">
                                                    <i class="fa fa-user"></i>
                                                    <span class="username">{{ $user->name }}</span>
                                                    <b class="caret"></b>
                                                </a>
                                                <ul class="dropdown-menu extended logout">
                                                    <li><a href="{{URL::to('/dashboard')}}"><i class=" fa fa-suitcase"></i>Admin-Area</a></li>
                                                    <li><a href="{{URL::to('/logout')}}" ><i class="fa fa-key"></i> Log Out</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    @endif
                                    @else
                                    <a href="{{URL::to('/login')}}" id="show-user"><i class=" fa fa-user"></i>
                                        <span>Login</span></a>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="col-sm-12 text-right">
            <ul class="nav-right">
                <li class="cart-icon">
                    <a href="">
                    <i class="fa fa-shopping-cart" style="font-size: 40px;"></i>
                    @if(Session::has("Cart"))
                    <span id="total-quanty-show">{{Session::get('Cart')->totalQuanty}}</span>
                    @else
                    <span id="total-quanty-show">0</span>
                    @endif
                    </a>
                <div class="cart-hover">
                    <div id="change-item-cart">
                        @if(Session::has("Cart") != null)
                        <div class="select-items">
                            <table>
                                <tbody>
                                   @foreach(Session::get('Cart')->products as $item)
                                   <tr>
                                    <td class="si-pic"><img style="width: 100px; height: 100px;" src="{{URL::to('public/upload/product/')}}/{{$item['productInfo']->product_image}}" alt=""></td>
                                    <td class="si-text">
                                        <div class="product-selected">
                                            <p>{{number_format($item['productInfo']->product_price)}}đ x {{$item['quanty']}}</p>
                                            <h6>{{$item['productInfo']->product_name}}</h6>
                                        </div>
                                    </td>
                                    <td class="si-close">
                                        <button data-id="{{$item['productInfo']->product_id}}" >X</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="select-total">
                        <span>total:</span>
                        <h5>{{number_format(Session::get('Cart')->totalPrice)}} ₫</h5>
                        <input hidden="" id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}">

                        </div>
                        @endif
                    </div>

                    <div class="select-button">
                        <a href="{{url('/List-Cart')}}" class="primary-btn view-card">XEM CHI TIẾT</a>
                        <!-- <a href="#" class="primary-btn checkout-btn">CHECK OUT</a> -->
                    </div>
                </div>
            </li>
        </ul>
    </div>        

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">

                    </div>
                    <div class="col-sm-4 ">
                        <div class="container">
                            <div class="col-sm-3">

                                <!-- user login dropdown start-->
                                
                                
                                <!-- user login dropdown end -->
                                <!--- user info end-->
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Product<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($brand as $key => $br)
                                        <li><a href="{{URL::to('/brand',$br->brand_id)}}">{{$br->brand_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 

                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                     <div class="search_box pull-right" style="position: relative;">
                        <input id="search" type="text" placeholder="Search" style="width: 400px;" />
                        <div id="search_result">

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div><!--/header-bottom-->


        
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <img style="width: 1100px; height: 350px;" src="{{URL::to('public/frontend/images/nen.jpg')}}">
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Brands</h2>

                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach($brand as $key => $brand)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/brand',$brand->brand_id)}}" >{{$brand->brand_name}} </a></h4>
                            </div>
                        </div>
                        @endforeach  
                    </div><!--/category-products-->
                    <div class="left-sidebar">
                        <h2>CATEGORY</h2>

                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/cate',$cate->category_id)}}" >{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach


                        </div><!--/category-products-->

                    </div>
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                @yield('content')
                @yield('detail')

            </div>

        </div>
    </div>
</section>   
<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">All rights reserved.</p>

            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.sc')}}rollUp.min.js"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
<script src="{{asset('public/frontend/js/quickview.js')}}"></script>
<script src="{{asset('public/frontend/js/searchajax.js')}}"></script>
<script src="{{asset('public/frontend/js/addcart.js')}}"></script>



</body>
</html>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  
