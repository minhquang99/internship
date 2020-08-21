
  function AddCartQuanty(id){
    var quanty = $('input#quantyquick').val();
    var url = 'http://localhost:8888/shopnuochoa-0/Add-Cart-Quanty/'+id+'/'+quanty;
    $.ajax({
      url : url,
      type : 'GET',
    }).done(function(response){
      console.log(response);
      RenderCart(response);
      alertify.success('Đã thêm vào giỏ hàng!');
  });
  }//////Thêm hàng có số lượng
  
  function AddCart(id){
    var url = 'http://localhost:8888/shopnuochoa-0/Add-Cart/' + id;
    $.ajax({
        url : url,
        type: 'GET',
    }).done(function(response){
      console.log(response);
      RenderCart(response);
      alertify.success('Đã thêm vào giỏ hàng!');
  });
    
}//Thêm 1 món hàng

$("#change-item-cart").on("click", ".si-close button" , function(){
    //console.log($(this).data("id"));
    var id = $(this).data("id");
    var url = 'http://localhost:8888/shopnuochoa-0/Delete-Item-Cart/' + id;
    $.ajax({
        url : url,
        type: 'GET',
    }).done(function(response){
      //console.log(response);
      RenderCart(response);
      alertify.success('Đã xóa sản phẩm!');
  });

});//////Xóa hàng đã thêm

function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    //console.log($("#total-quanty-cart").val());
    $("#total-quanty-show").text($("#total-quanty-cart").val());
    if($("#total-quanty-cart").val() === undefined){
      $("#total-quanty-show").text(0);
    }
} /////Giao diện Cart
