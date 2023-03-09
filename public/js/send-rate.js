$(document).ready(function(){  

    //send rate
    $("input").click(function(){
    var adid = $('.adid').attr('value');
    var insert=[];
    $('.get_value').each(function(){
    if($(this).is(":checked"))
    {
    insert.push($(this).attr('data-id'));
     }
     });
     insert=insert.toString();
        $.ajax({
            type:"post",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
               "insert":insert,
               "adid":adid
            },
            url:"/sendrate",
            success:function(data){
              $(".com").append(data); 
            }
          })
    });
    
    


});

