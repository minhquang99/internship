	@extends('admin_layout')
  @section('admin_content')
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Chi tiết hóa đơn
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Mã hóa đơn</th>
              <th>Tên sản phẩm</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>        
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach($all_detail as $key => $value)
            <tr>
             <th>{{ $value->order_id}}</th>
             <th>{{ $value->product_name}}</th>
             <th>{{ $value->product_price}}</th>
             <th>{{ $value->product_sales_quantity}}</th>
           </tr>    
           @endforeach
         </tbody>
       </table>
       
     </div>
     
   </div>
 </div>
 @endsection