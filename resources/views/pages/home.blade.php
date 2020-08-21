@extends('welcome') 
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

<?php
        echo Session::get('user_id');
        echo Session::get('order_id');
    ?>
<div class="features_items"><!--features_items-->
  <h2 class="title text-center">Features Items</h2>
  @foreach($data as $value)
  <div class="col-sm-4" >
   <div class="product-image-wrapper"> 
    <div class="single-products">


      <div class="productinfo text-center">


        <a href="{{URL::to('/detail-product'.'/'.$value->product_id)}}">
          <img  src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" />
          <h2>{{number_format($value->product_price).''.'VND'}}</h2>
          <p>{{$value->product_name}}</p>
        </a>

        <a onclick="AddCart({{$value->product_id}})" href="javascript:" id="add-to-cart" type="button" class="btn btn-default add-to-cart"  name="add-to-cart" data-url = "{{ route('show_cart', $value->product_id) }}"><i class="fa fa-shopping-cart"></i>Add to cart</a>



        <button type="button" id="quickview" class="btn btn-default add-to-cart quickview" data-toggle="modal" data-target="#myModal"  data-url = "{{ route('view', $value->product_id) }}" >
          Quick View
        </button> 

      </div>
    </div> 
    {{ csrf_field() }} 
  </div>    
</div>

@endforeach
<div style="text-align: center;">
  {!! $data->links() !!}
</div>


</div>
@include('pages.view')  





@endsection 


