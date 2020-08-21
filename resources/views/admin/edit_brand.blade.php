@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">
                          @foreach($edit_brand as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$value->brand_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" value="{{$value->brand_name}}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" name="brand_product_des" id="exampleInputPassword1" required="">{{$value->brand_des}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="brand_product_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                                                            </select>
                                </div>
                            
                                <button type="submit" class="btn btn-info">Cập nhật thương hiệu</button>
                           </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            
        </div>
@endsection