	@extends('admin_layout')
  @section('admin_content')
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê Hóa đơn
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th>Mã hóa đơn</th>
              <th>Tên khách hàng</th>
              <th>Ngày đặt hàng</th>
              <th>Tổng tiền</th>
              <th>Trạng thái đơn hàng</th> 
              <th></th>       
            </tr>
          </thead>
          <tbody id="myTable">
           @foreach($all_payment as $value => $pro)
           <tr>
            <td>{{ $pro->order_id}}</td>
            <td>{{ $pro->shipping_name}}</td>    
            <td>{{$pro->shipping_date}}</td>        
            <td>{{ $pro->order_total}}</td>
            <td>{{ $pro->order_status}}</td>   
            <td><a href="{{URL::to('/order-detail/'.$pro->order_id)}}">Xem chi tiết</a></td>        
          </tr>

          @endforeach
        </tbody>
      </table>
      
    </div>
    
  </div>
</div>
@endsection