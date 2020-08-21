@extends('welcome')
@section('content')

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="{{asset('public/frontend/js/searchajax.js')}}"></script>

<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head><!--/head-->


<div id="feat" class="features_items"><!--features_items-->

  <h2 class="title text-center">Features Items</h2>
  @foreach($databrand as $value)

  <div class="col-sm-4" >
   <div class="product-image-wrapper"> 
    <div class="single-products">


      <div class="productinfo text-center">
        <a href="{{URL::to('/detail-product',$value->product_id)}}">
          <img style="height: 300px; width: 200px;"  src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" />
          <h2>{{number_format($value->product_price).''.'VND'}}</h2>
          <p>{{$value->product_name}}</p>
        </a>

        <a onclick="AddCart({{$value->product_id}})" href="javascript:" id="add-to-cart" type="button" class="btn btn-default add-to-cart"  name="add-to-cart" data-url = "{{ route('show_cart', $value->product_id) }}"><i class="fa fa-shopping-cart"></i>Add to cart</a> 


        <button type="button" id="quickview" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal"  data-url = "{{ route('view',$value->product_id) }}" >
          Quick View
        </button>


        <div id="myModal"  class="modal fade" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document" style="width: 800px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: left;">DETAIL PRODUCT</h4>
              </div>

              <div id="modal-body" style="height:500px;">


              </div>
              <div class="modal-footer">

              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->

      </div>
    </div> 
    {{ csrf_field() }} 
  </div>    
</div>
@endforeach
</div>
<div style="text-align: center;"> {!! $databrand->links() !!} </div>

@endsection 
