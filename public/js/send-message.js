$(document).ready(function(){  
    //send message
    $(".send").click(function(){
      var receiver_id = $('#txtComments').attr('value');
      var body = $('#btn-input').val()
        $.ajax({
            type:"post",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
               "receiver_id":receiver_id,
               "body":body
            },
            url:"/start-conversation",
            success:function(data){
              // $("#order-detail").append(data);  
            }
          })
          location.reload(true);

    });

    //send message2
    $("#show").click(function(){
      var ad_id = $('#ad_id').attr('value');
      var message = $('#message').val()
      var receiver_id = $('#receiver_id').attr('value');
        $.ajax({
            type:"post",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
               "ad_id":ad_id,
               "message":message,
               "receiver_id":receiver_id
            },
            url:"/sendtosaller",
            success:function(data){
              $("#order-detail").append(data); 
            }
          })
    }); 

    // save add
    $(".save-add").click(function(){
      var user_id = $('.user_id').attr('value');
      var advertisement_id = $('#advertisement_id').val();
        $.ajax({
            type:"post",
            data:{
              "_token":$('meta[name="csrf-token"]').attr('content'),
               "user_id":user_id,
               "advertisement_id":advertisement_id
            },
            url:"/saveadd",
            success:function(data){
              $("#saveadd").append(data); 
            }
          })
    });
    


    $("#show").click(function(){
      $(".hide").hide();
    });

    $("#saveaddlove").click(function(){
      $("#saveaddlove").hide();
    });

});

const btn = document.getElementById('show-phonenumber');

btn.addEventListener('click', () => {
  btn.style.display = 'none';

  const box = document.getElementById('box');  
  box.style.display = 'block';
});

function myFunction() {
  document.getElementById("panel").style.display = "block";
}

const mainImg = document.querySelector(".main-img2");
const img = document.getElementsByClassName("span2");
function getImg(ele){
  mainImg.style.backgroundImage = "none";
  for(let i=0;i<img.length;i++){
    img[i].classList.add("effect");
    img[i].style.backgroundImage = `url(${ele.src})`;
    img[i].style.backgroundPosition = `${-60*i}px 0`;
  }
  setTimeout(()=>{
    for(let i=0;i<img.length;i++){
      img[i].classList.remove("effect");
    }
  },600);
}