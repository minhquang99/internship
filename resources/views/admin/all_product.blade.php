@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Thương hiệu</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody id="myTable">
         @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->product_name }}</td>
            <td>{{ $pro->brand_name }}</td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->product_price }}</td>
            <td> <img src="public/upload/product/{{ $pro->product_image }}" height="100" width="100"></td>
            <td>{{ $pro->product_des }}</td>
            <td>
              <a href="{{URL::to('edit-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="font-size: 30px;"></i></a>
            </td>
            <td>
              <<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::to('delete-product/'.$pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>



<div style="text-align: right; margin-top: 5px">
  {!! $all_product->links() !!}
</div>
@endsection