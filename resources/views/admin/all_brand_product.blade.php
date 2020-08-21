  @extends('admin_layout')
  @section('admin_content')
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê Thương hiệu sản phẩm
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
              <th>Tên danh mục</th>
              <th>Hiển thị</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody id="myTable">
           @foreach($all_brands_product as $key => $brand_pro)
           <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $brand_pro->brand_name }}</td>
            <td><span class="text-ellipsis">
              <?php
              if($brand_pro->brand_status==0)
              {
                echo 'Ẩn';
              }
              else
              {
                echo 'Hiển thị';
              }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-brand/'.$brand_pro->brand_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="font-size: 30px;"></i></a>
            </td>
            <td>
             <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::to('delete-brand/'.$brand_pro->brand_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">


    </footer>
  </div>
</div>
@endsection