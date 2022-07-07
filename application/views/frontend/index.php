
        <!--Main Slider-->
        <section class="main-slider">
            <div class="container-fluid p-0">

                <!--Main Slider-->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

          <!-- <a href="gallery_slider.html"> -->
            <div class="carousel-inner">
            <?php $i=1; foreach($slider_data->result() as $slider) { ?>
              <div class="carousel-item <?if($i==1){echo 'active';}?>">
                <img class="d-block w-100" src="<?=base_url().$slider->image?>" alt="First slide">
              </div>
              <?php $i++; } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </p>
      <!-- </a> -->

        </div>
    <!--End Main Slider-->

            <!-- </div>
            <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
                <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                    <ul>
                        <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689"
                            data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-rotate="0" data-saveperformance="off" data-slotamount="default"
                            data-thumb="<?=base_url()?>assets/frontend/images/slides/gandiji.jpg" data-title="Slide Title"
                            data-transition="parallaxvertical">

                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="<?=base_url()?>assets/frontend/images/slides/gandiji.jpg">
                        </li> -->


                        <!-- <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1687"
                            data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-rotate="0" data-saveperformance="off" data-slotamount="default"
                            data-thumb="<?=base_url()?>assets/frontend/images/slides/kkt.png" data-title="Slide Title"
                            data-transition="parallaxvertical">

                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="<?=base_url()?>assets/frontend/images/slides/kkt.png">
                        </li> -->

                       <!--  <li data-description="Slide Description" data-easein="default" data-easeout="default"
                            data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688"
                            data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-rotate="0" data-saveperformance="off" data-slotamount="default"
                            data-thumb="<?=base_url()?>assets/frontend/images/slides/Army_Day.Webp" data-title="Slide Title"
                            data-transition="parallaxvertical">
                            <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10"
                                data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina=""
                                src="<?=base_url()?>assets/frontend/images/slides/Army_Day.Webp">
                        </li> -->

                    </ul>
                </div>
            </div>
        </section>
        <!--End Main Slider-->
        <style>
            .card {
  /* position: absolute; */
  height: 350px;
  width: 100%;
  max-width: 850px;
  margin: auto;
  background-color: #ffffff;
  border-radius: 25px;
  box-shadow: 10px 0 50px rgba(0, 0, 0, 0.5);

}

.card .inner_part {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 0 0 30px;
  height: 350px;
  position: absolute;
}

#slideImg:checked ~ .inner_part {
  padding: 0;
  transition: .1s ease-in;
}

.inner_part .img {
  height: 260px;
  width: 260px;
  overflow: hidden;
  flex-shrink: 0;
  border-radius: 20px;
  box-shadow: 0 10px 50px rgba(0,0,0,0.2);
}

#slideImg:checked ~ .inner_part .img {
 height: 350px;
 width: 850px;
 z-index: 99;
 transition: .3s .2s ease-in;
}

.img img {
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
  transition: .6s;
}

#slide_1:checked ~ .inner_part .img_1,
#slide_2:checked ~ .inner_part .img_2,
#slide_3:checked ~ .inner_part .img_3 {
  opacity: 1;
  transition-delay: .2s;
}

.content {
  padding: 0 20px 0 35px;
  width: 530px;
  margin-left: 50px;
  opacity: 0;
  transition: .6s;
}

#slideImg:checked ~ .inner_part .content {
  display: none;
}

#slide_1:checked ~ .inner_part .content_1,
#slide_2:checked ~ .inner_part .content_2,
#slide_3:checked ~ .inner_part .content_3 {
  opacity: 1;
  margin-left: 0;
  z-index: 100;
  transition-delay: .3s;
}

.content .title {
  font-size: 30px;
  font-weight: 700;
  color: #0d0925;
  margin: 0 0 20px 0;
}

.content .text {
  font-size: 19px;
  color: #4e4a67;
  margin: 0 auto 30px auto;
  line-height: 1.5em;
  text-align: justify;
}

.content button {
  padding: 15px 20px;
  border: none;
  font-size: 16px;
  color: #fff0e6;
  font-weight: 600;
  letter-spacing: 1px;
  border-radius: 50px;
  cursor: pointer;
  outline: none;
  background: #000000;
  float: right;
}

.content button:hover {
  background: #cecece;
  color: #000000;
}

.slider {
  position: absolute;
  bottom: 25px;
  left: 55%;
  transform: translateX(-50%);
  z-index: 1;
}

#slideImg:checked ~ .slider {
  display: none;
}

.slider .slide {
  position: relative;
  height: 10px;
  width: 50px;
  background: #d9d9d9;
  border-radius: 5px;
  display: inline-flex;
  margin: 0 3px;
  cursor: pointer;
}


.slider .slide:before {
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  height: 100%;
  width: -100%;
  background: #000000;;
  border-radius: 10px;
  transform: scaleX(0);
  transition: transform .6s;
  transform-origin: left;
}

#slide_1:checked ~ .slider .slide_1:before,
#slide_2:checked ~ .slider .slide_2:before,
#slide_3:checked ~ .slider .slide_3:before {
  transform: scaleX(1);
  width: 100%;
}

input {
  display: none;
}
        </style>


<!-- birthday -->
<!-- <canvas id="canvas"></canvas> -->
<div >
    <iframe style="width: 1px; min-width: 100%;" scrolling="no" width="100%" height="500px" frameborder="0" sandbox="allow-scripts allow-forms allow-same-origin" src="birth.html" frameborder="0"></iframe>

</div>



        <!--========================================kalam====================================-->

        <div class="sec-title mt-4 pl-3">
            <div class="title text-center"><span>अध्यक्ष की कलम से</span></div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-lg-6 pb-2">
                <img src="<?=base_url()?>assets/frontend/images\slides\gandiji.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <p class="" style="text-align: justify;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa blanditiis dicta iusto fugit assumenda ipsa ea deleniti inventore magni provident ab, eveniet fugiat necessitatibus, facilis ipsum excepturi error repudiandae aut! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo dolorem voluptates deleniti voluptatem quos. Excepturi ipsam, accusamus natus aut necessitatibus quae saepe velit hic ullam distinctio molestiae voluptatibus recusandae incidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint commodi hic quaerat itaque nulla incidunt. Ipsam blanditiis id minus, vel a unde asperiores itaque vitae! Facilis temporibus enim eligendi consequuntur.</p>
            </div>
        </div>
    </div>
        <!--========================================kalam====================================-->

        <!--=================================banner===================================-->
        <div class="container-fluid mt-5">
            <img src="<?=base_url()?>assets/frontend/images\slides\maple-1079235__480.webp" alt="" class="">
        </div>



        <!--=======================================heading====================================-->
        <div class=" text-center mt-5 mb-5" style="font-size:10px;">
            <h6>RAJASTHAN PRASHASNIK SEVA PARISHAD</h6><br>
            <h2>WELCOME TO THE OFFICIAL WEBSITE OF R.D.S. ASSOCIATION</h2><br>
            <a href="#">
                <h6 style="color:red;">HELP TO OPERATE THIS WEBSITE</h6>
            </a>
        </div>
        <!---==========================================news===========================================-->

        <!-- news -->
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title">
                        <div class="title text-center"><span>LATEST NEWS</span></div>
                    </div>
                    <div style="border:1px solid #39345a; width:100%;height: auto;">
                        <div class=" input-box text-right align-self-end"
                            style="width: 100%; margin-left:0px; background-color:#39345a;"><a
                                href="news_field.html"><button style="background-color:#ed6f36; padding:0px 10px;"
                                    class="text-white align-self-end bts">View All</button></a></div>
                        <marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="up" scrollamount="1"
                            diraction="up" style="width:100%;height:350px;">
                            <?php $i=1; foreach($news_data->result() as $news) { ?>
                            <p style="text-align:center;"><a href="<?=base_url().$news->file?>" target="_blank" rel="noreferrer" style="color:black;"><?=$news->news_heading?></a>
                            </p>
<?php $i++; } ?>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
        <!-- news end -->
        <div class="container">
            <div class="mt-5">
                <div class="row rto">
                    <div class="col-xl-6">
                        <div class="about-title">
                            <div class="sec-title">
                                <div class="title text-center"><span>RDS ASSOCIATION</span></div>
                            </div>
                            <p style="text-align: justify; font-size:13px;">RDS Association is an organization of
                                serving members of Rajasthan Administrative Service. An officer becomes member of the
                                association as soon as he joins the service. The association has played a very vital and
                                positive role in betterment of service conditions.</p>
                            <p style="text-align: justify; font-size:13px;">The Objectives of the association are to
                                work for the benefit, welfare and development of the members for their social, cultural
                                and professional development. It also carry on activities for the extension of knowledge
                                in the field of administration, finance, management and other allied subjects.

                                Since the members of the association are serving at senior levels in their respective
                                places of postings, they interact with people from different walks of life, it is the
                                endeavor of this association to make the views of eminent persons known to its members.
                                The Association is also sensitive to public aspirations about development activities in
                                the State. Activities of the association are therefore aimed at achieving the larger
                                objective of providing excellence in Governance.</p>
                        </div>
                    </div>

                    <div class="col-xl-6 pb-2" style="padding-top:80px;">
                        <img src="<?=base_url()?>assets/frontend/images\slides\gandiji.jpg" class="img-fluid">
                        <!-- <div class="video-holder-box wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <img src="<?=base_url()?>assets/frontend/images/resources/video-gallery.jpg" alt="Awesome Image">
                                <div class="icon-holder">
                                    <div class="icon">
                                        <div class="inner">
                                            <a class="html5lightbox" title="Screwer Video Gallery" href="https://www.youtube.com/watch?v=p25gICT63ek">
                                                <span class="flaticon-music-player-play"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   -->
                    </div>



                </div>
            </div>

        </div>
        </section>
        <!-- <hr style="height:2px;border-width:0;color:gray;background-color:gray">
 -->
        <!--End about Area-->


        <!--Start Featured project area-->
        <section class="latest-project-area">
            <div class="container-fluid" style="overflow:hidden;">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="sec-title clr-white">
                            <div class="title text-center"><span>VIDEO STREAM</span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="latest-project">
                            <div class="latest-project-carousel owl-carousel owl-theme">
                                <!--Start single featured project-->
                                <?php $i=1; foreach($video_data->result() as $video) { ?>
                                <div class="single-project-style1">
                                    <div class="video-holder-box wow slideInLeft" data-wow-delay="0ms"
                                        data-wow-duration="1500ms">
                                        <div class="img-holder">
                                            <img src="<?=base_url()?>assets/frontend/images/resources/video-gallery.jpg" alt="Awesome Image">
                                            <div class="icon-holder">
                                                <div class="icon">
                                                    <div class="inner">
                                                        <a class="html5lightbox" title="Screwer Video Gallery"
                                                            href="<?=$video->link?>">
                                                            <span class="flaticon-music-player-play"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; } ?>
                                <!--End single featured project-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-box text-center pt-5">
                <a href="<?=base_url()?>Home/all_video"><button class="btn-one" type="submit">View All</button></a>
            </div>
        </section>
        <!--End Featured project area-->






        <!--Start Call Us area-->
        <section class="call-us-area">
            <!--     <div class="call-us-bg" style="background-image: url(<?=base_url()?>assets/frontend/images/parallax-background/call-us-bg.jpg);"></div>
 -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="sec-title ">
                            <div class="title text-center"><span>WRITE US!</span></div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 lkt rev">
                    <div class="col-xl-4 col-lg-5" rev>
                        <div class="contact-info-box">
                            <ul>
                                <li>
                                    <div class="icon">
                                        <span class="icon-mobile-phone"></span>
                                    </div>
                                    <div class="title">
                                        <h3>Troll Free Number</h3>
                                        <span>+91-141-2703692</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-email"></span>
                                    </div>
                                    <div class="title">
                                        <h3>Send us an e-mail.</h3>
                                        <span>info@rdsassociation.com</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-time-and-date"></span>
                                    </div>
                                    <div class="title">
                                        <h3>Working Hours</h3>
                                        <span>Mon - Sat: 9:00 - 19:00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-time-and-date"></span>
                                    </div>
                                    <div class="title">
                                        <h3>Working Hours</h3>
                                        <span>Mon - Sat: 9:00 - 19:00</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="find-map-box">
                                <div class="icon">
                                    <span class="icon-location"></span>
                                </div>
                                <div class="text">
                                    <a class="btn-two" href="#">Find Us on Map<span
                                            class="icon-thin-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="contact-form">
                            <form  name="contact_form" class="default-form" action="<?=base_url()?>Home/contact_form_submit" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <input type="text" name="name" value="" placeholder="First Name" required="">
                                            <div class="icon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <input type="text" name="last" value="" placeholder="Last Name" required="">
                                            <div class="icon">
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <input type="email" name="email" value="" placeholder="Email Address" required="">
                                            <div class="icon">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-box">
                                            <input type="text" name="phone" value="" maxlength="10" minlength="10" placeholder="Phone" onkeypress="return isNumberKey(event)">
                                            <div class="icon">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-box">
                                            <textarea name="message" placeholder="Your Message..." required=""></textarea>
                                            <div class="icon">
                                                <i class="fa fa-comment" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="text-align: -webkit-center">
                                        <div class="button-box">
                                            <button class="btn-one" type="submit" data-loading-text="Please wait..." style="width:40%; height: 50px;">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End Call Us area-->
