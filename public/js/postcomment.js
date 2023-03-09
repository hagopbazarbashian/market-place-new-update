$(".comment-now").click(function() {
   var advertisement_id = $('.advertisement_id').attr('value');
   var comment = $('.textarea').val();
//    var ad_name = $('.ad_name').attr('value');
   
    $.ajax({ 
       type:"post",
       data:{
         "_token":$('meta[name="csrf-token"]').attr('content'),
          "advertisement_id":advertisement_id,
          "comment":comment
        //   "ad_name":ad_name
       },
       url:"/comment",  
       success:function(data){
         $("#showcomment").append(data); 
       //   location.reload(true);
       }
     })
});


$(".show-all-comments").click(function() {
  $(".like-logo").hide();
    var advertisement_id = $('.advertisement_id').attr('value');
    var comment = $('.textarea').val();
    var ad_name = $('.ad_name').attr('value');
    
     $.ajax({ 
        type:"get",
        data:{
          "_token":$('meta[name="csrf-token"]').attr('content'),
           "advertisement_id":advertisement_id,
           "comment":comment,
           "ad_name":ad_name
        },
        url:"/show-all-comment",  
        success:function(data){
          $("#showcomment").append(data); 
        //   location.reload(true);
        }
      })
 });