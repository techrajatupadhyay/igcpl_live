<?php "$this->load->view('header');"?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
<!-- Latest compiled and minified CSS -->
<!-- https://xstore.8theme.com/demos/hosting/-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">
 
 <style>
    #slider-text{
  padding-top: 40px;
  display: block;
}
#slider-text .col-md-6{
  overflow: hidden;
}

#slider-text h2 {
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 400;
  font-size: 30px;
  letter-spacing: 3px;
  margin: 30px auto;
  padding-left: 40px;
}
#slider-text h2::after{
  border-top: 2px solid #c7c7c7;
  content: "";
  position: absolute;
  bottom: 35px;
  width: 100%;
  }

#itemslider h4{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 400;
  font-size: 12px;
  margin: 10px auto 3px;
}
#itemslider h5{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bold;
  font-size: 12px;
  margin: 3px auto 2px;
}
#itemslider h6{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 300;;
  font-size: 10px;
  margin: 2px auto 5px;
}
.badge {
  background: #b20c0c;
  position: absolute;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  line-height: 31px;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 300;
  font-size: 14px;
  border: 2px solid #FFF;
  box-shadow: 0 0 0 1px #b20c0c;
  top: 5px;
  right: 25%;
}
#slider-control img{
  padding-top: 60%;
  margin: 0 auto;
}
@media screen and (max-width: 992px){
#slider-control img {
  padding-top: 70px;
  margin: 0 auto;
}
}

.carousel-showmanymoveone .carousel-control {
  width: 4%;
  background-image: none;
}
.carousel-showmanymoveone .carousel-control.left {
  margin-left: 5px;
}
.carousel-showmanymoveone .carousel-control.right {
  margin-right: 5px;
}
.carousel-showmanymoveone .cloneditem-1,
.carousel-showmanymoveone .cloneditem-2,
.carousel-showmanymoveone .cloneditem-3,
.carousel-showmanymoveone .cloneditem-4,
.carousel-showmanymoveone .cloneditem-5 {
  display: none;
}
@media all and (min-width: 768px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -50%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 50%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-1 {
    display: block;
  }
}
@media all and (min-width: 768px) and (transform-3d), all and (min-width: 768px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(50%, 0, 0);
    transform: translate3d(50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
  }
}
@media all and (min-width: 992px) {
  .carousel-showmanymoveone .carousel-inner > .active.left,
  .carousel-showmanymoveone .carousel-inner > .prev {
    left: -16.666%;
  }
  .carousel-showmanymoveone .carousel-inner > .active.right,
  .carousel-showmanymoveone .carousel-inner > .next {
    left: 16.666%;
  }
  .carousel-showmanymoveone .carousel-inner > .left,
  .carousel-showmanymoveone .carousel-inner > .prev.right,
  .carousel-showmanymoveone .carousel-inner > .active {
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner .cloneditem-2,
  .carousel-showmanymoveone .carousel-inner .cloneditem-3,
  .carousel-showmanymoveone .carousel-inner .cloneditem-4,
  .carousel-showmanymoveone .carousel-inner .cloneditem-5,
  .carousel-showmanymoveone .carousel-inner .cloneditem-6  {
    display: block;
  }
}
@media all and (min-width: 992px) and (transform-3d), all and (min-width: 992px) and (-webkit-transform-3d) {
  .carousel-showmanymoveone .carousel-inner > .item.active.right,
  .carousel-showmanymoveone .carousel-inner > .item.next {
    -webkit-transform: translate3d(16.666%, 0, 0);
    transform: translate3d(16.666%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.active.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev {
    -webkit-transform: translate3d(-16.666%, 0, 0);
    transform: translate3d(-16.666%, 0, 0);
    left: 0;
  }
  .carousel-showmanymoveone .carousel-inner > .item.left,
  .carousel-showmanymoveone .carousel-inner > .item.prev.right,
  .carousel-showmanymoveone .carousel-inner > .item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
    left: 0;
  }
}

 </style>
  

</head>































<body>
<!--Item slider text-->
<h1 class="text-center"> Product Slider</h1>
<ul>
  <li>Auto Slide</li>
  <li>Stop On Hover</li>
  <li>Slide One Item</li>
</ul>
<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>NEW COLLECTION</h2>
    </div>
  </div>
</div>

<!-- Item slider-->
 <section id="ft-service" class="ft-service-section">
         <div class="container">
            <div class="ft-service-content">
               <div class="row">
                  <div class="col-lg-3 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                     <div class="ft-service-text-area">
                        <div class="ft-section-title headline pera-content">
                           <span class="sub-title">What We  Do</span>
                           <h2>We work as your Channel Partner 
                         across India to co-ordinate your business concerns and maintain your cash-flow </h2>
                        </div>
                        <div class="ft-btn">
                           <a class="d-flex justify-content-center align-items-center" href="<?php echo base_url(); ?>Home">Download  Mobile App</a>
                        </div>
                     </div>
                  </div>
                 
                  <div class="col-lg-9 ">
                     <div class="ft-service-slider-area carousel-showmanymoveone">
                        <div class="ft-service-slider-wrapper item">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">

          <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-2">
             <div class="ft-item-innerbox  " id="itemslider" data-wow-delay="200ms" data-wow-duration="1000ms">
                              <div class="ft-service-slider-item">
                                 <div class="ft-service-inner-img">
                                    <img src="<?php echo base_url(); ?>assets/img/service/service1.jpg" alt="" class="service" style="height: 200px; width: 100%;">
                                 </div>
                                 <div class="ft-service-inner-text headline pera-content position-relative">
                                    <h3><a href="service-single.php">Marketing and Coordination </a></h3>
                                    <p>at Buyer's doorstep for Sellers on GeM</p>
                                    <a class="service-more" href="">G-Laabh <span>+</span></a>
                                    <div class="ft-service-serial position-absolute">
                                       1
                                    </div>
                                 </div>
                              </div>
                           </div>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
             <div class="ft-item-innerbox " id="itemslider" data-wow-delay="400ms" data-wow-duration="1000ms">
                              <div class="ft-service-slider-item">
                                 <div class="ft-service-inner-img">
                                    <img src="<?php echo base_url(); ?>assets/img/service/service2.jpg" alt="" class="service" style="height: 200px; width: 100%;">
                                 </div>
                                 <div class="ft-service-inner-text headline pera-content position-relative">
                                    <h3><a href="service-single.php">Logistic Support and Physical Store</a></h3>
                                    <p>for Sellers on GeM/non GeM across India</p>
                                    <a class="service-more" href="">G-Plus <span>+</span></a>
                                    <div class="ft-service-serial position-absolute">
                                       2
                                    </div>
                                 </div>
                              </div>
                           </div>>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
               <div class="ft-item-innerbox  " id="itemslider" data-wow-delay="600ms" data-wow-duration="1000ms">
                              <div class="ft-service-slider-item">
                                 <div class="ft-service-inner-img ">
                                    <img src="<?php echo base_url(); ?>assets/img/service/service1.jpg" alt="" class="service" style="height: 200px; width: 100%;">
                                 </div>
                                 <div class="ft-service-inner-text headline pera-content position-relative">
                                    <h3><a href="service-single.php">GeM Hosting and releted Services</a></h3>
                                    <p>for Buyers and Sellers intending to do business on GeM</p>
                                    <a class="service-more" href="">G-Cafe <span>+</span></a>
                                    <div class="ft-service-serial position-absolute">
                                       3
                                    </div>
                                 </div>
                              </div>
                           </div>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
              <a href="#"><img src="https://images.unsplash.com/photo-1531925470851-1b5896b67dcd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=91fe0ca1b5d72338a8aac04935b52148&auto=format&fit=crop&w=500&q=60" class="img-responsive center-block"></a> <div class="ft-item-innerbox " id="itemslider" data-wow-duration="1500ms">
                              <div class="ft-service-slider-item">
                                 <div class="ft-service-inner-img">
                                    <img src="<?php echo base_url(); ?>assets/img/service/service2.jpg" alt="" class="service" style="height: 200px; width: 100%;">
                                 </div>
                                 <div class="ft-service-inner-text headline pera-content position-relative">
                                    <h3><a href="service-single.php">Cashflow Management </a></h3>
                                    <p>Services/Bill discounting for Buyers on GeM on most competitive Prices</p>
                                    <a class="service-more" href="">G-Cash <span>+</span></a>
                                    <div class="ft-service-serial position-absolute">
                                       4
                                    </div>
                                 </div>
                              </div>
                           </div>
              
            </div>
          </div>



        

        </div>

        <div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
      </div>
      </div>
    </div>
  </div>
</div>

  </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
         </div>
      </section>
<!-- Item slider end-->
<br/><br/>
<footer class="bg-info">
  <p class="text-center">
  &copy; <a href="https://www.facebook.com/maruf.al.bashir" target="_blank" >Maruf-Al Bashir 2020</a>
  </p>
</footer>

<script type="text/javascript">
  $(document).ready(function(){

$('#itemslider').carousel({ interval: 300 });

$('.carousel-showmanymoveone .item').each(function(){
var itemToClone = $(this);

for (var i=1;i<6;i++) {
itemToClone = itemToClone.next();

if (!itemToClone.length) {
itemToClone = $(this).siblings(':first');
}

itemToClone.children(':first-child').clone()
.addClass("cloneditem-"+(i))
.appendTo($(this));
}
});
});

</script>

</body>
</html>