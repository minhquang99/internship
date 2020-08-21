
function DeleteListItemCart(id){
        console.log(id);
        $.ajax({
           url : 'Delete-Item-List-Cart/' +id,
           type: 'GET',
       }).done(function(response){
         RenderListCart(response);
             alertify.success('Đã xóa sản phẩm!');
         });
   }
   function SaveListItemCart(id){
    $.ajax({
       url : 'Save-Item-List-Cart/' +id +'/' +$("#quanty-item-" + id).val(),
       type: 'GET',
   }).done(function(response){
     RenderListCart(response);
             alertify.success('Đã cập nhật sản phẩm!');
         });
}

function RenderListCart(response){
   $("#list-cart").empty();
   $("#list-cart").html(response);

   var proQty = $('.pro-qty');
   proQty.prepend('<span class="dec qtybtn">-</span>');
   proQty.append('<span class="inc qtybtn">+</span>');
   proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
        var newVal = parseFloat(oldValue) + 1;
    } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
}
