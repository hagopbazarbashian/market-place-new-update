$(document).ready(function () {
    $('#category').change(function () {
      var id = $(this).val();

      $('#subCategory').find('option').not(':first').remove();

      $.ajax({
         url:'/cashier/increasequantity/' +id,
         type:'get',
         dataType:'json',
         success:function (response) {
             var len = 0;
             if (response.data != null) {
                 len = response.data.length;
             }

             if (len>0) {
                 for (var i = 0; i<len; i++) {
                      var id = response.data[i].id;
                      var name = response.data[i].name;

                      var option = "<option value='"+id+"'>"+name+"</option>"; 

                      $("#subCategory").append(option);
                 }
             }
         }
      })
    }); 


    $('#subCategory').change(function () {
      var id = $(this).val();

      $('#childCategory').find('option').not(':first').remove();

      $.ajax({
         url:'/cashier/increasequantity2/' +id,
         type:'get',
         dataType:'json',
         success:function (response) {
             var len = 0;
             if (response.data != null) {  
                 len = response.data.length;
             }

             if (len>0) {
                 for (var i = 0; i<len; i++) {
                      var id = response.data[i].id;
                      var name = response.data[i].name;

                      var option = "<option value='"+id+"'>"+name+"</option>"; 

                      $("#childCategory").append(option);
                 }
             }
         }
      })
    }); 


    
 });