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
                        <span>Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="social-icons pull-right">
        <ul class="nav navbar-nav" style="margin-right: 200px;">
            <span>{{$user->name}}</span>
            <a href="{{URL::to('/logout')}}"> Đăng Xuất</a>
        </ul>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="">
                <div>
                    <h5 style="text-align: center; margin-bottom: 10px;"><b>THÔNG TIN VÀ THANH TOÁN</b></h5>
                    <?php
                        $msg = Session::get('msg');
                        echo "<p style='color:green; text-align:center'>$msg</p>";
                        Session::put('msg', null);
                    ?>
                </div>
                @if(isset($fails))
                <span>{{$fails}}</span>
                <br>
                @endif

                <form action="{{URL::to('/save-order')}}" method="post">
                    {{ csrf_field() }}
                    Tên: <input style="margin-left: 100px; width: 350px;" type="text" class="ggg" name="shipping_name" placeholder="" required=""><br>
                    Số điện thoại: <input style="margin-left: 30px; margin-top: 10px; width: 350px;" type="text" class="ggg" name="phone" placeholder="" required="">
                    @error('phone')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <br>
                    Địa chỉ: <input style="margin-left: 75px; margin-top: 10px; width: 350px;height: 50px;" type="text" class="ggg" name="address" placeholder="" required=""><br><br>
                    <input style="margin-left: 200px;" type="submit" value="Đặt hàng" name="register">
                </form>
            </div>
            <div class="col-lg-6" id="list-cart">
                <div>
                    <h5 style="text-align: center;"><b>ĐƠN HÀNG CỦA BẠN</b></h5>
                </div>
                <br>
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name" style="text-align: center;">Product Name</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                    <!-- <th>Quantity</th>
                                    
                                    <th>Save</th>
                                    <th>Delete</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                @if(Session::has("Cart") != null)
                                @foreach(Session::get('Cart')->products as $item)
                                <tr>
                                    <td class="cart-pic first-row"><img style="width: 100px; height: 100px;" src="public/upload/product/{{$item['productInfo']->product_image}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5 style="text-align: center;">{{$item['productInfo']->product_name}}</h5>
                                    </td>
                                    <td >
                                        <a style="height: 30px;width: 30px;" id="quanty-item-{{$item['productInfo']->product_id}}" type="text" value="">x.{{$item['quanty']}}</a>
                                    </td>
                                    <td class="total-price first-row">{{number_format($item['price'])}}đ</td>
                                    <!-- <td class="total-price first-row">{{number_format($item['price'])}}đ</td> -->
                                    <!-- <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="quanty-item-{{$item['productInfo']->product_id}}" type="text" value="{{$item['quanty']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format($item['price'])}}đ</td>
                                    <td class="close-td first-row"><i class="ti-save" onclick="SaveListItemCart({{$item['productInfo']->product_id}});"></i></td>
                                    <td class="close-td first-row"><i class="ti-close" onclick="DeleteListItemCart({{$item['productInfo']->product_id}});"></i></td> -->
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>    
                    </div>
                    <div class="proceed-checkout">
                        @if(Session::has("Cart") != null)
                        <ul>
                         <li class="subtotal">Tổng số sản phẩm <span>{{Session::get('Cart')->totalQuanty}}</span></li> 
                         <li class="cart-total">Tổng tiền <span>{{number_format(Session::get('Cart')->totalPrice)}}</span></li>
                     </ul>
                     @else
                     <h4 style="color: red;">Bạn chưa có sản phẩm nào!</h4>
                     @endif

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
<script type="text/javascript">
    function DeleteListItemCart(id){
        console.log(id);
        $.ajax({
         url : 'Delete-Item-List-Cart/' +id,
         type: 'GET',
     }).done(function(response){
       RenderListCart(response);
       alertify.success('Đã xóa sản phẩm!');
   });
 }
 function SaveListItemCart(id){
    $.ajax({
     url : 'Save-Item-List-Cart/' +id +'/' +$("#quanty-item-" + id).val(),
     type: 'GET',
 }).done(function(response){
   RenderListCart(response);
   alertify.success('Đã cập nhật sản phẩm!');
});
}

function RenderListCart(response){
 $("#list-cart").empty();
 $("#list-cart").html(response);

 var proQty = $('.pro-qty');
 proQty.prepend('<span class="dec qtybtn">-</span>');
 proQty.append('<span class="inc qtybtn">+</span>');
 proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
        var newVal = parseFloat(oldValue) + 1;
    } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}

</script>
</body>

</html>