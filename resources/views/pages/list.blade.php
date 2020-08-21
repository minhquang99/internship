<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng của bạn</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="public/test/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="public/test/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{URL::to('/trang-chu')}}"><i class="fa fa-home"></i> Home</a>
                        
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-icons pull-right">
        <ul class="nav navbar-nav" style="margin-right: 200px;">
          @if(isset($user))
          <span>{{$user->name}}</span>
          <a href="{{URL::to('/logout')}}"> Đăng Xuất</a>
          @else
          <a href="{{URL::to('/login')}}"> Đăng Nhập</a>
          @endif 
        </ul>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="list-cart">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name" style="text-align: center;">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Save</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(Session::has("Cart") != null)
                                @foreach(Session::get('Cart')->products as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img style="width: 150px; height: 150px;" src="public/upload/product/{{$item['productInfo']->product_image}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5 style="text-align: center;">{{$item['productInfo']->product_name}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{number_format($item['productInfo']->product_price)}}
                                    </td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-item-{{$item['productInfo']->product_id}}" type="text" value="{{$item['quanty']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($item['price'])}}đ</td>
                                    <td class="close-td first-row"><i class="ti-save" onclick="SaveListItemCart({{$item['productInfo']->product_id}});"></i></td>
                                    <td class="close-td first-row"><i class="ti-close" onclick="DeleteListItemCart({{$item['productInfo']->product_id}});"></i></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>    
                    </div>
                    <div class="row">
                        <div class="col-lg-4 offset-lg-8">
                            <div class="proceed-checkout">
                                @if(Session::has("Cart") != null)
                                  <ul>
                                    <li class="subtotal">Tổng số sản phẩm <span>{{Session::get('Cart')->totalQuanty}}</span></li> 
                                    <li class="cart-total">Tổng tiền <span>{{number_format(Session::get('Cart')->totalPrice)}}</span></li>
                                    @if(isset($user))
                                    <a href="{{URL::to('/thanh-toan')}}" class="proceed-btn">THANH TOÁN</a>
                                    @else
                                    <a onclick="return confirm('Bạn cần phải đăng nhập để thanh toán!')" href="{{URL::to('/login')}} " class="proceed-btn">THANH TOÁN</a>
                                    @endif
                                  </ul>
                                @else
                                  <h4 style="color: red;">Bạn chưa có sản phẩm nào!</h4>
                                @endif
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Shopping Cart Section End -->	

   <!-- Footer Section Begin -->
   <footer class="footer-section">
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="public/test/js/jquery-3.3.1.min.js"></script>
<script src="public/test/js/bootstrap.min.js"></script>
<script src="public/test/js/jquery-ui.min.js"></script>
<script src="public/test/js/jquery.countdown.min.js"></script>
<script src="public/test/js/jquery.nice-select.min.js"></script>
<script src="public/test/js/jquery.zoom.min.js"></script>
<script src="public/test/js/jquery.dd.min.js"></script>
<script src="public/test/js/jquery.slicknav.js"></script>
<script src="public/test/js/owl.carousel.min.js"></script>
<script src="public/test/js/main.js"></script>
<script src="{{asset('public/frontend/js/list.js')}}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</body>

</html>