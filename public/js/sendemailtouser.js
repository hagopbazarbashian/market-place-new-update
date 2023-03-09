$(document).ready(function(){  
    //send message    
    $(".send_mail_to_user").click(function(){
      var send_email_to_user = $('#send-mail').attr('value');
        $.ajax({
            type:"post",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
               "send_email_to_user":send_email_to_user,
            },
            url:"/send-email-to-user-click",
            success:function(data){
              // $("#order-detail").append(data);  
            }
          })

    });

});