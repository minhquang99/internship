<div class="cart-table">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th class="p-name">Product Name</th>
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
                <td class="cart-pic first-row"><img style="height: 150px; width: 150px;" src="public/upload/product/{{$item['productInfo']->product_image}}" alt=""></td>
                <td class="cart-title first-row">
                    <h6 style="text-align: center;">{{$item['productInfo']->product_name}}</h6>
                </td>
                <td class="p-price first-row">{{number_format($item['productInfo']->product_price)}}</td>
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
         </ul>
         @else
         <h4 style="color: red;">Bạn chưa có sản phẩm nào!</h4>
         @endif
         @if(isset($user))
         <a href="{{URL::to('/thanh-toan')}}" class="proceed-btn">THANH TOÁN</a>
         @else
         <a onclick="return confirm('Bạn cần phải đăng nhập để thanh toán!')" href="{{URL::to('/login')}} " class="proceed-btn">THANH TOÁN</a>
         @endif
     </div>
 </div>
</div>