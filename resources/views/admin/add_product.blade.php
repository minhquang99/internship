@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thuong hieu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach 
                                                                            </select> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh muc</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Gia</label>
                                    <textarea class="form-control" name="product_price" id="exampleInputPassword1" placeholder="Mo ta"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Hinh anh</label>
                                    <input type="file" name="product_image">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Mo ta</label>
                                    <textarea class="form-control" name="product_des" id="exampleInputPassword1" placeholder="Mo ta"></textarea>
                                </div>
                            
                                <button type="submit" class="btn btn-info">Thêm san pham</button>
                           </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>

@endsection