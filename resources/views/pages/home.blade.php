@extends('welcome') 
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach($data as $value)
                        <div class="col-sm-4" >
                            <div class="product-image-wrapper">
                                <div class="single-products">

                                        
                                        <div class="productinfo text-center">
                                            <img  src="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="" />
                                            <h2>{{number_format($value->product_price).''.'VND'}}</h2>
                                            <p>{{$value->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> 
                                        
                                </div>
                                     </div> 
                                     
                        </div>    
                    </div>
                     @endforeach
                     {!! $data->links() !!}
                     
</div>
@endsection 


<!-- @foreach($all_product as $key => $product)
                        <div class="col-sm-4" >
                            <div class="product-image-wrapper">
                                <div class="single-products">

                                        
                                        <div class="productinfo text-center">
                                            <img  src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="" />
                                            <h2>{{number_format($product->product_price).''.'VND'}}</h2>
                                            <p>{{$product->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> 
                                        
                                </div>
                                     </div> 
                                     
                        </div>    
                    </div>
                     @endforeach
                     <div>
                                        
                                    @foreach($data as $value)
                                       
                                    @endforeach
                                    {!! $data->links() !!}
                            </div> -->