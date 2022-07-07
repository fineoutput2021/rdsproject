
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(images/slides/photo4.jpg );">
  <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="inner-content clearfix">
                  <div class="title text-center">
                     <h1>MAGAZINE</h1>
                  </div>
              </div>
          </div>
      </div>
</div>
</section>
<!--End breadcrumb area-->

<!-- Magzine Area Start -->

<div class="container-fluid  mt-5 mb-5">
  <div class="container">
  <div class="row">
  <?php $i=1; foreach($magazine_data->result() as $magazine) { ?>
    <div class="col-md-4 pb-3">
      <div style="border:1px solid grey;">
      <img src="<?=base_url().$magazine->file?>" class="img-fluid">
      <h6  class="mt-2 text-center"><a href="<?=base_url().$magazine->file?>" style="color: black;"><?=$magazine->name?></a></h6>
      <p style="color:black;text-align:center;"><?=$magazine->description?></p>
    </div>
    </div>
<?php $i++; } ?>
</div>
  </div>
</div>

<!-- Magzine Area End -->
