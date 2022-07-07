

  <!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(images/slides/photo4.jpg );">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                       <h1>Videos</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->

<!--Start Call To Action area-->
<!-- <section class="call-to-action-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="call-to-action">
                    -->
                   <!--  <div class="video-holder-box2 wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="icon-holder">
                            <div class="icon">
                                <div class="inner">
                                    <a class="html5lightbox" title="Screwer Video Gallery" href="#">
                                        <span class="flaticon-music-player-play"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Call To Action area-->

<!--Start Choose area style2-->
<section class="choose-area style2">
    <div class="container">
        <div class="row">
            <!--Start Single Choose Item-->
            <?php $i=1; foreach($video_data->result() as $video) { ?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                 <div class="video-holder-box wow" data-wow-delay="0ms" data-wow-duration="1500ms">
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
            <!--End Single Choose Item-->

        </div>
    </div>
</section>
<!--End Choose area style2-->


<!--Start Subscribe area-->
<!-- <section class="subscribe-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="subscribe-title">
                    <h3>Subscribe your e-mail to get latest news & updates.</h3>
                </div>
            </div>
            <div class="col-xl-5">
                <form class="subscribe-form" action="#">
                    <input type="email" name="email" placeholder="Your Email Address...">
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>  -->
<!--End Subscribe area-->


<!--Start footer area-->
