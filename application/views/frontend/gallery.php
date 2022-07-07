<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(images/slides/photo4.jpg );">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                    <h1>GALLERY</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->


<!--===========================slider ========================-->
<div class="container main-project-area style3 ">
    <div class="row">
      <?php $i=1; foreach($gallery_data->result() as $data) { ?>
        <div class="col-md-6">
            <!--Main Slider-->
            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">

                <a href="gallery_slider.html"><div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images\slides\gandiji.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images\slides\gandiji.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images\slides\gandiji.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
      <p class=""><p class=" text-center pt-3" style="color:purple;">WORK LIFE BALANCE BY DR. NANDITEST NILAY</p>
    </p></a>
<!--End Main Slider-->

        </div>
        <?php $i++; } ?>
        <div class="col-md-6">

            <div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">

                <a href="gallery_slider.html"><div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="images\slides\gandiji.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images\slides\gandiji.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images\slides\gandiji.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators4" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators4" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              <p class=""><p class=" text-center pt-3" style="color:purple;">WORK LIFE BALANCE BY DR. NANDITEST NILAY</p>
            </p></a>
        </div>
    </div>
</div>
