
function add_product_list_obj(product_list_obj){
  $('.products ul').empty();
  for(var i = 0; i < product_list_obj.length; i++){
    $('.products ul').append('<li>'+product_list_obj[i].title+' ('+product_list_obj[i].price+'$) '+product_list_obj[i].added+'<button type="button" class="btn btn-primary modal-button" data-toggle="modal" data-target="#modal">Купить</button></li>');
  }
}
$(document).ready(function(){
  
  //Получаем товары по выбраной категории
  $('.categories ul li').click(function(){
  		var category_id = this.className;
      params = window.location.search;
      if(params.indexOf('category_id=') > -1)
      {
          str = params.match(/category_id=[0-9]+/)[0];
          str = str.replace(/[0-9]+/, category_id);
          params = params.replace(/category_id=[0-9]+/, str);
      }
      else{
        if(params==''){
            params = '?category_id='+category_id;
        }
        else{
          params = params + '&category_id='+category_id;
        }
      }
  		var baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
      var newUrl = baseUrl + params;
      history.pushState(null, null, newUrl);
      $.ajax({url: "/ajax/"+params, success: function(data){
                var products = JSON.parse(data);
                $('.products ul').empty();
                for(var i = 0; i < products.length; i++){
                  $('.products ul').append('<li>'+products[i]['title']+' ('+products[i]['price']+'$) '+products[i]['added']+'<button type="button" class="btn btn-primary modal-button" data-toggle="modal" data-target="#modal">Купить</button></li>');
                }
              }});
  });
  $("button.sort").click(function(e){
      e.preventDefault();
      var sort_by = $('select.sort').children("option:selected").val();
      params = window.location.search;
      if(params.indexOf('sort_by=') > -1)
      {   
          var last_cond = params.match(/abc|price|date/)[0];
          params = params.replace(/abc|price|date/, sort_by);
      }
      else{
        if(params==''){
            params = '?sort_by='+sort_by;
        }
        else{
          params = params + '&sort_by='+sort_by;
        }
      }
      var baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
      var newUrl = baseUrl + params;
      history.pushState(null, null, newUrl);
      $.ajax({url: "/ajax/"+params, success: function(data){
                var products = JSON.parse(data);
                $('.products ul').empty();
                for(var i = 0; i < products.length; i++){
                  $('.products ul').append('<li>'+products[i]['title']+' ('+products[i]['price']+'$) '+products[i]['added']+'<button type="button" class="btn btn-primary modal-button" data-toggle="modal" data-target="#modal">Купить</button></li>');
                }
              }});
      
  });




  
});