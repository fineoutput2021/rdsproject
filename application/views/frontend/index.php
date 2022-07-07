<!--Main Slider-->

<section class="main-slider">
  <div class="container-fluid p-0">

    <!--Main Slider-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

      <!-- <a href="gallery_slider.html"> -->
      <div class="carousel-inner">
        <?php $i=1; foreach ($slider_data->result() as $slider) { ?>
        <div class="carousel-item <?if ($i==1) {
    echo 'active';
}?>">
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
  </div>
</section>
<!--End Main Slider-->

<!-- birthday -->
<!-- <div>
  <iframe style="width: 1px; min-width: 100%;" scrolling="no" width="100%" height="500px" frameborder="0" sandbox="allow-scripts allow-forms allow-same-origin" src="birth.html" frameborder="0"></iframe>
</div> -->

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
      <p class="" style="text-align: justify;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa blanditiis dicta iusto fugit assumenda ipsa ea deleniti inventore magni provident ab, eveniet fugiat necessitatibus, facilis ipsum
        excepturi error repudiandae aut! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo dolorem voluptates deleniti voluptatem quos. Excepturi ipsam, accusamus natus aut necessitatibus quae saepe velit hic ullam distinctio molestiae
        voluptatibus recusandae incidunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint commodi hic quaerat itaque nulla incidunt. Ipsam blanditiis id minus, vel a unde asperiores itaque vitae! Facilis temporibus enim eligendi
        consequuntur.</p>
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
  <h2>WELCOME TO THE OFFICIAL WEBSITE OF R.D.S. ASSOCIATION</h2>
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
        <div class=" input-box text-right align-self-end" style="width: 100%; margin-left:0px; background-color:#39345a;"><a href="<?=base_url()?>Home/all_news"><button style="background-color:#ed6f36; padding:0px 10px;"
              class="text-white align-self-end bts">View
              All</button></a></div>
        <marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="up" scrollamount="5" diraction="up" style="width:100%;height:350px;">
          <?php $i=1; foreach ($news_data->result() as $news) { ?>
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
            <?php $i=1; foreach ($video_data->result() as $video) { ?>
            <div class="single-project-style1">
              <div class="video-holder-box wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="img-holder">
                  <img src="<?=base_url()?>assets/frontend/images/resources/video-gallery.jpg" alt="Awesome Image">
                  <div class="icon-holder">
                    <div class="icon">
                      <div class="inner">
                        <a class="html5lightbox" title="Screwer Video Gallery" href="<?=$video->link?>">
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
                <h3>Contact Number</h3>
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
          </ul>
          <!-- <div class="find-map-box">
                                <div class="icon">
                                    <span class="icon-location"></span>
                                </div>
                                <div class="text">
                                    <a class="btn-two" href="#">Find Us on Map<span
                                            class="icon-thin-right-arrow"></span></a>
                                </div>
                            </div> -->
        </div>
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="contact-form">
          <form name="contact_form" class="default-form" action="<?=base_url()?>Home/contact_form_submit" method="post">
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
