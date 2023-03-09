@extends('layouts.app')
@section('content')
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");


/* -----------------company----------------------- */
.company {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.company-info {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.img {
  width: 100%;
  margin: 1rem 0rem 0rem 2rem;
}

.img img {
  width: 96%;
}

.company-info {
  width: 100%;
  margin-right: 4rem;
}

.company-info span {
  font-size: 22px;
  font-weight: bold;
}

.company-info span .our {
  color: #ffdc0e;
}

.company-info p{
  font-size:13px;
}
/* ----------------------------------------------- */

.team {
  display: flex;
  justify-content: center;
}

.team span {
  font-size: 2.5rem;
  font-weight: bold;
  border-bottom: 4px solid #ffdc0e;
}

.container2 {
     display: flex;
    flex-wrap: wrap;
}

.card {
  position: relative;
  background: #fff;
  max-width: 350px;
  width: 350px;
  margin: 20px;
  border-radius: 2px;
  box-shadow: 0 5px 25px rgb(1 1 1 / 10%);
}

.card-image {
  max-height: 50vh;
  overflow: hidden;
}

.card-image img {
  max-width: 100%;
  height: auto;
  visibility: hidden;
}

.card-title span {
  visibility: hidden;
}

.yellow-surname {
  color: #ffdc0e;
}

.card-description span {
  visibility: hidden;
}

.card-mediaIcons a i {
  visibility: hidden;
}

.card-info {
  position: relative;
  color: #222;
  padding: 20px;
}

.card-info h3 {
  font-size: 1.4em;
  font-weight: 700;
  margin-bottom: 10px;
}

.card-info h4 {
  font-size: 1rem;
  font-weight: normal;
}

.card-info a {
  text-decoration: none;
  color: navy;
}

.card-info p {
  font-size: 1em;
  margin-bottom: 15px;
}

.card-info .card-mediaIcons {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-info .card-mediaIcons a {
  color: #999;
  font-size: 1.4em;
  margin: 0 10px;
  width: 40px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-decoration: none;
  border-radius: 50%;
  transition: color 0.3s ease;
}

.card-info .card-mediaIcons a:hover {
  color: #222;
}

.card-mediaIcons a img {
  width: 40px;
}

.loading {
  position: relative;
  background: #e2e2e2;
  overflow: hidden;
}

.loading:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    90deg,
    transparent,
    rgba(255, 255, 255, 0.2),
    transparent
  );
  transform: translateX(-100%);
  animation: loading 1.5s infinite;
}

.info {
  font-size: 1.2rem;
  font-weight: 500;
}

@keyframes loading {
  100% {
    transform: translateX(100%);
  }
}


/* ---------------------------------------------------------------------------- */
</style>
 <div class="company">
    <div class="img">
      <img src="{{asset('/img/jack-pops-low-resolution-color-logo.png')}}" alt="" />
    </div>
    <div class="company-info">
      <span>Jack Pops</span>
      <p>
        Jack Pops is an online marketplace where individuals and businesses can buy and sell a variety of products and services. With its user-friendly interface, customers can easily navigate through the site and find what they're looking for. Jack Pops provides a platform for businesses to reach a wider audience, and for customers to have access to a diverse range of products and services at competitive prices. Whether you're looking for unique, handcrafted items or top-brand products, Jack Pops has it all!.
      </p>
    </div>
  </div>
  <!-- ---------------------------------------------------------------------------------------------------------------------- -->
  <!-- ----------------------------------------------------team-------------------------------------------------------------- -->
  <!--<div class="team"><span>OUR TEAM</span></div>-->
  <!--<div class="container2">-->
  <!--  <div class="card">-->
  <!--    <div class="card-image loading"><img src="https://images.pexels.com/photos/39866/entrepreneur-startup-start-up-man-39866.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" /></div>-->
  <!--    <div class="card-info">-->
  <!--      <h3 class="card-title loading"><span>Yash <span class="yellow-surname">Falke</span></span></h3>-->
  <!--      <p class="card-description loading">-->
  <!--        <span class="personal-info">-->
  <!--          <span class="info">Graphic Designing Head</span> <br>-->
  <!--          Pursuing IT Engineering (VIT Mumbai) <br>-->
  <!--          Email: <a href="mailto:'yashfalke77@gmail.com'">yashfalke77@gmail.com</a>-->
  <!--        </span>-->
  <!--      </p>-->
  <!--      <div class="card-mediaIcons">-->
  <!--        <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>-->
  <!--        <a href="{% url 'viewprofile' 9 %}" class="loading" target="on_blank"><i><img-->
  <!--              src="https://raw.githubusercontent.com/pico-india/main-django/main/static/PICO-LOGO-SHORT.png" alt="Pico"></a></i>-->
  <!--        <a href="https://www.instagram.com/yashfalke77/" class="loading" target="on_blank"><i-->
  <!--            class="fab fa-instagram"></i></a>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  <div class="card">-->
  <!--    <div class="card-image loading"><img src="https://media.istockphoto.com/photos/portrait-of-handsome-latino-african-man-picture-id1007763808?k=20&m=1007763808&s=612x612&w=0&h=q4qlV-99EK1VHePL1-Xon4gpdpK7kz3631XK4Hgr1ls=" alt="" /></div>-->
  <!--    <div class="card-info">-->
  <!--      <h3 class="card-title loading"><span>Harsh <span class="yellow-surname">Sunwani</span></span></h3>-->
  <!--      <p class="card-description loading">-->
  <!--        <span class="personal-info">-->
  <!--          <span class="info">Web Developing Head</span> <br>-->
  <!--          Pursuing IT Engineering (VIT Mumbai) <br>-->
  <!--          Email: <a href="mailto:'harshsunwani11@gmail.com'">harshsunwani11@gmail.com</a>-->
  <!--        </span>-->
  <!--      </p>-->
  <!--      <div class="card-mediaIcons">-->
  <!--        <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>-->
  <!--        <a href="{% url 'viewprofile' 7 %}" class="loading" target="on_blank"><i><img-->
  <!--              src="https://raw.githubusercontent.com/pico-india/main-django/main/static/PICO-LOGO-SHORT.png" alt="Pico"></i></a>-->
  <!--        <a href="https://www.instagram.com/harshsunwani/" class="loading" target="on_blank"><i-->
  <!--            class="fab fa-instagram"></i></a>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  <div class="card">-->
  <!--    <div class="card-image loading"><img src="https://images.pexels.com/photos/837358/pexels-photo-837358.jpeg?auto=compress&cs=tinysrgb&w=600" alt="" /></div>-->
  <!--    <div class="card-info">-->
  <!--      <h3 class="card-title loading"><span>Nikhil <span class="yellow-surname">Jaiswal</span></span></h3>-->
  <!--      <p class="card-description loading">-->
  <!--        <span class="personal-info">-->
  <!--          <span class="info">Marketing and Publicity Head</span> <br>-->
  <!--          Pursuing IT Engineering (VIT Mumbai) <br>-->
  <!--          Email: <a href="mailto:'nikjaiswal21@gmail.com'">nikjaiswal21@gmail.com</a>-->
  <!--        </span>-->
  <!--      </p>-->
  <!--      <div class="card-mediaIcons">-->
  <!--        <a href="#" class="loading" target="on_blank"><i class="fab fa-facebook-f"></i></a>-->
  <!--        <a href="{% url 'viewprofile' 6 %}" class="loading" target="on_blank"><i><img-->
  <!--              src="https://raw.githubusercontent.com/pico-india/main-django/main/static/PICO-LOGO-SHORT.png" alt="Pico"></a></i>-->
  <!--        <a href="#" class="loading" target="on_blank"><i class="fab fa-instagram"></i></a>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
@endsection