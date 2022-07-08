<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="inner-content clearfix">
          <div class="title text-center">
            <h1>MAGAZINES</h1>
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
      <?php
  if(!empty($magazine_data->row())){
  $i=1; foreach($magazine_data->result() as $magazine) { ?>
      <div class="col-md-4 pb-3">
        <div style="border:1px solid grey;">
          <?if(!empty($magazine->image)){?>
          <img src="<?=base_url().$magazine->image?>" alt="Member Image" class="img-fluid">
          <?}else{?>
          <img src="<?=base_url()?>assets/frontend/images/user.png" alt="Member Image" class="img-fluid">
          <?}?>
          <h6 class="mt-2 text-center"><a href="<?=base_url().$magazine->file?>" target="_blank" rel="noreferrer" style="color: black;"><?=$magazine->name?></a></h6>
          <p style="color:black;text-align:center;"><?=$magazine->description?></p>
        </div>
      </div>
      <?php $i++; }
}else{?>
      <div class="text-center w-100">
        <h3>No Data Found</h3>
      </div>
      <?} ?>
    </div>
  </div>
</div>

<!-- Magzine Area End -->
