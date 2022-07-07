<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
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
<div class="container main-project-area style3 mt-3">
    <div class="row">
      <?php $i=1; foreach($gallery_data->result() as $data) { ?>
        <div class="col-md-6">
            <!--Main Slider-->
            <div id="carouselExampleIndicators<?=$i?>" class="carousel slide" data-ride="carousel">

                <a href="<?=base_url()?>Home/gallery_slider/<?=base64_encode($data->id)?>"><div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="<?=base_url().$data->image?>" alt="First slide">
                    </div>
                    <?if(!empty($data->image2)){?>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?=base_url().$data->image2?>" alt="Second slide">
                    </div>
                    <?}?>
                      <?if(!empty($data->image3)){?>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?=base_url().$data->image3?>" alt="Third slide">
                    </div>
                    <?}?>
                      <?if(!empty($data->image4)){?>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?=base_url().$data->image4?>" alt="Fourth slide">
                    </div>
                    <?}?>
                      <?if(!empty($data->image5)){?>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?=base_url().$data->image5?>" alt="Fifth slide">
                    </div>
                    <?}?>
                      <?if(!empty($data->image6)){?>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="<?=base_url().$data->image6?>" alt="Sixth slide">
                    </div>
                    <?}?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators<?=$i?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators<?=$i?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><p class=" text-center pt-3" style="color:purple;"><?=$data->heading?></p></a>
<!--End Main Slider-->

        </div>
        <?php $i++; } ?>
    </div>
</div>
