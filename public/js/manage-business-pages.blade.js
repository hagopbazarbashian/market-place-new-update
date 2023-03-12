

    $(".my-checkbox").click(function() {
      
        var data = $(this).data('value');
         $.ajax({ 
            type:"post",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
               "data":data
            },
            url:"/send-to-business-page",  
            success:function(data){
              $("#page").append(data); 
              $('#page').empty().append(data);
            //   location.reload(true);
            }
          })
});