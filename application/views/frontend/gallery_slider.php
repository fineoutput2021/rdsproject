<!--Main Slider-->
<div >
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <?if(!empty($gallery_data->image2)){?>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <?}?>
      <?if(!empty($gallery_data->image3)){?>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <?}?>
      <?if(!empty($gallery_data->image4)){?>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <?}?>
      <?if(!empty($gallery_data->image5)){?>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <?}?>
      <?if(!empty($gallery_data->image6)){?>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      <?}?>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?=base_url().$gallery_data->image?>" alt="First slide">
      </div>
      <?if(!empty($gallery_data->image2)){?>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url().$gallery_data->image2?>" alt="Second slide">
      </div>
      <?}?>
        <?if(!empty($gallery_data->image3)){?>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url().$gallery_data->image3?>" alt="Third slide">
      </div>
      <?}?>
        <?if(!empty($gallery_data->image4)){?>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url().$gallery_data->image4?>" alt="Fourth slide">
      </div>
      <?}?>
        <?if(!empty($gallery_data->image5)){?>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url().$gallery_data->image5?>" alt="Fifth slide">
      </div>
      <?}?>
        <?if(!empty($gallery_data->image6)){?>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?=base_url().$gallery_data->image6?>" alt="Sixth slide">
      </div>
      <?}?>
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

<!--End Main Slider-->
