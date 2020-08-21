@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($edit_pro as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product/'.$value->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$value->product_name}}" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                        @if($brand->brand_id == $value->brand_id)
                                        <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                        
                                        @endforeach 
                                                                            </select> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                        @if($cate->category_id == $value->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                        @endforeach
                                                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá</label>
                                    <textarea class="form-control" name="product_price" id="exampleInputPassword1" required="">{{$value->product_price}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input type="file" name="product_image" required="">
                                    <img src="{{URL::to('public/upload/product/'.$value->product_image)}}" height="100" width="100">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" name="product_des" id="exampleInputPassword1" required="">{{$value->product_des}}</textarea>
                                </div>
                            
                                <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                           </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            
        </div>

@endsection