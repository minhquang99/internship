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
