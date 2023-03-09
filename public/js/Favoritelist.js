$(document).ready(function () {

    $(".love").click(function() {
       var ad = $(this).data('value');
        $.ajax({ 
           type:"post",
           data:{
             "_token":$('meta[name="csrf-token"]').attr('content'),
              "ad":ad
           },
           url:"/favorit-list",  
           success:function(data){
            //  $("#favoritlist").append(data); 
           //   location.reload(true);
           }
         })
   });



});