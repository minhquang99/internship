@extends('welcome') 
@section('detail')
@foreach ($detail_product as $key => $detail)
<div class="features_items"><!--detail_items-->
    <h2 class="title text-center">DETAIL PRODUCTS</h2>
    
    <div class="col-sm-6">
      <div class="product-image-wrapper">
        <img style="height: 500px; width: 400px;" src="{{URL::to('public/upload/product/'.$detail->product_image)}}">
    </div>
    
</div>

<div class="col-sm-6" >
   <div class="sub">
      <p><strong>Name Product : {{ $detail->product_name }}
      </strong></p>
      
  </div>

  <div class="sub">
      <p><strong>Category Product : {{ $detail->category_name}}</strong></p>

  </div>

  <div class="sub">
      <p><strong>Brand Product : {{ $detail->brand_name}}</strong></p>

  </div>

  <div class="sub">
      <p><strong>Price : {{number_format($detail->product_price).' '.'VND'}}</strong></p>

  </div>

  <div class="sub">
      <p><strong>Description : {{$detail->product_des}}</strong></p>

  </div>

  <input type="number" id="quantyquick" class="quanty" value="1" min="1" max="999" >
 <a onclick="AddCartQuanty({{$detail->product_id}})" href="javascript:" id="detail-add-to-cart" type="button" class="btn btn-default add-to-cart"  name="add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

  
</div>


</div>
@endforeach
@endsection 
