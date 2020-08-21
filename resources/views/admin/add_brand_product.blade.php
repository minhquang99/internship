@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
                        </header>
                        @if(isset($success))
                        <span style="color: green; padding-left: 200px;">{{$success}}</span>
                        @endif
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Ten danh muc" required="">
                                    @error('brand_product_name')
                                    <span style="color: red;">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" name="brand_product_des" id="exampleInputPassword1" placeholder="Mo ta" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="brand_product_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                                                            </select>
                                </div>
                            
                                <button type="submit" class="btn btn-info">Thêm danh mục</button>
                           </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection