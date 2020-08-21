 $('document').ready(function(){
    $('input#search').keyup(function(){

        var ask = $(this).val().toUpperCase();
        if ( ask != ''){

           var rsl = '';
           function search(data){
            data.forEach(function(item){
                var i = item.product_id;
                rsl += '<a id="search-ajax" href="http://localhost:8888/shopnuochoa-0/detail-product/'+i+'">'+'<div id="name-search">'+ item.product_name +'<br>'+'<h6 id="price-search">'+'Price :'+ parseInt(item.product_price) +' VND'+'</h6>' 
                + '<img id="img-search" src = "http://localhost:8888/shopnuochoa-0/public/upload/product/'+item.product_image+'">' 
                +'</div>' +'</a>'+ '<br>';
            });
            $('#search_result').fadeIn();
            $('#search_result').html(rsl);
            $(document).click(function(){
                $('#search_result').fadeOut();

            });

        }
        $.ajax({
            url : 'http://localhost:8888/shopnuochoa-0/search',
            type : 'get',
            data : { 'search' : ask },
            dataType : 'json',
            success : function (response){
             search(response.search_result); 

         },
         error : function (jqXHR, textStatus, errorThrown){

         }
     });

        }// condition
        else {
            $('#search_result').fadeOut();
        }

    });///search-ajax{}

});