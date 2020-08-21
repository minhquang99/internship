$('document').ready(function(){

 $(":button").click(function(){


      var obj ='';
      var url = $(this).attr('data-url');

      function getproduct(data){
        data.forEach(function(item){


         obj = '<img id ="img-quickview" src ="http://localhost:8888/shopnuochoa-0/public/upload/product/'+item.product_image+'">'
         +'<p class="quick">' + ' <b style="color:#FF7F50;">' + 'ID : ' + ' </b>' + item.product_id + '</p>'
         + '<p class="quick" id ="name-pd">' + '<b style="color:#FF7F50;">'+'Name : '+'</b>' + item.product_name + '</p>'
         + '<p class="quick" id ="name-cate">' + '<b style="color:#FF7F50;">'+'Category : ' + ' </b>' + item.category_name  + '</p>'
         + '<p class="quick" id ="name-brand">' + '<b style="color:#FF7F50;">'+ 'Brand : ' + '</b>'+ item.brand_name + '</p>'
         + '<p class="quick" id ="name-price">' + '<b style="color:#FF7F50;">'+ 'Price : ' + '</b>'+ item.product_price + ' VND'+ '</p>'
         + '<p class="quick" id ="name-des">' + '<b style="color:#FF7F50;">'+ 'Description : ' + '</b>'+ item.product_des + '</p>'
         + '<input type="number" id="quantyquick" class="quantyquick" value="1" min="0" max="99999" >'
         +  '<a onclick="AddCartQuanty('+ item.product_id +')" href="javascript:" id="addtocart" type="button" class="btn btn-default add-to-cart"  name="add-to-cart" "><i class="fa fa-shopping-cart"></i>Add to cart</a>';

         $('#modal-body').html(obj);


     });
    }

    $.ajax({
        url : url,
        type : 'get',
        dataType : 'json',
        success : function(response){
          console.log(response);
          getproduct(response.product);


      },
      error : function(jqXHR, textStatus, errorThrown){

      }

  });

      //$('#myModal').modal('show');

    });//////////quickview ajax
    


});