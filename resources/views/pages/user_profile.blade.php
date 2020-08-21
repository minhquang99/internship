
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Perfume</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/searchajax.css')}}">
</head><!--/head-->

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
                        <div class="social-icons pull-right" style="margin-top: 9px;font-size: 15px;">
                            <a href="{{URL::to('/user-profile')}}" style="margin-right: 10px;">
                                <?php
                                    $name = Session::get('user_name');
                                    if($name){
                                        echo "Xin chào " .$name. "!";
                                        ?>
                                            <a href="{{URL::to('/logout')}}" style="margin-left: 5px;"> Đăng Xuất</a>
                                        <?php
                                    }else{
                                        ?>
                                            <a href="{{URL::to('/user-login')}}" style="margin-left: 5px;"> Đăng Nhập</a>
                                        <?php
                                    }
                                ?>   
                            </a>
                            <a href="{{URL::to('/register')}}" style="margin-left: 5px;"> Đăng Ký</a>                        
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
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
                                <li class="">
                                    <a href="{{URL::to('/san-pham')}}">Product<i></i></a>
                                </li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right" style="position: relative;">
                            <input id="search" type="text" placeholder="Search" style="width: 400px;" />
                            <div id="search_result" style="position: absolute; z-index: 1; top:40px; border: 2px; background-color: rgb(242, 242, 242); width: 400px;" >
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <div class="features_items" id="myTable"><!--features_items-->
	 	<h2 class="title text-center" style="font-size: 27px;">Lịch sử đặt hàng</h2>
			<div class="product-image-wrapper"> 
			<div class="single-products">
			<div class="productinfo text-left" >
				<div style="text-align: center; font-size: 18px;">
			    @foreach($history_order as $key => $value)
                    <table>
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$value->order_id}}</td>
                                <td>{{$value->product_name}}</td>
                                <td>{{$value->product_price}}</td>
                                <td>{{$value->product_sales_quantity}}</td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
                </div>
			 </div>
			</div>  
			</div>
	</div>
</body>
</html>