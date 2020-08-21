@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                          @foreach($edit_cate as $key => $value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$value->category_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" value="{{$value->category_name}}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" name="category_product_des" id="exampleInputPassword1" required="">{{$value->category_des}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="category_product_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                                                            </select>
                                </div>
                            
                                <button type="submit" class="btn btn-info">Cập nhật danh mục</button>
                           </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            
        </div>
@endsection