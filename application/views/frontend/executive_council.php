<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                       <h1>EXECUTIVE COUNCIL</h1>

                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->
<!--Start team area-->
<section class="team-area">
    <div class="container">
        <div class="row">
          <?php $i=1; foreach($executive_data->result() as $officers) { ?>
            <!--Start single item member-->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="single-team-member">
                   <a href="<?=base_url()?>Home/officer_details/<?=base64_encode($officers->id)?>"><div class="img-holder">
                     <?if(!empty($officers->image)){?>
                        <img src="<?=base_url().$officers->image?>" alt="Member Image">
                        <?}else{?>
                          <img src="<?=base_url()?>assets/frontend/images/user.png" alt="Member Image">
                          <?}?>
                    </div>
                    <div class="name text-center">
                        <h3><?=$officers->name?></h3>
                        <p class="adi2"><?=$officers->officers_designation?></p>
                    </div>
                    <div class="name text-center overlay-content">
                        <h3><?=$officers->name?></h3>
                        <p class="adi"><?=$officers->post?>, <?=$officers->district?>, <?=$officers->phone?></p></a>
                    </div>
                </div>
            </div>
            <?php $i++; } ?>
            <!--End single item member-->
        </div>
    </div>
</section>
<!--End team area-->
