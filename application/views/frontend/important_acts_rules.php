<!--Start breadcrumb area-->

<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                    <h1>IMPORTANT ACTS AND RULES</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->

<!--Start Single sidebar-->

    <div class="single-service-sidebar">
        <div class="single-sidebar">

            <ul class="our-brochures"><div class="row">
              <?php
                if(!empty($important_data->row())){
               $i=1; foreach($important_data->result() as $important_acts_and_rules) { ?>
                <div class="col-md-6">
                <li>
                    <div class="icon-holder">
                        <span class="<?if (strpos($important_acts_and_rules->pdf_link, '.pdf')) {echo 'icon-document-1'; }else{echo 'icon-text';}?>"></span>
                    </div>
                    <div class="title-holder">
                        <h3><?=$important_acts_and_rules->name?></h3>
                        <a class="btn-other" href="<?=$important_acts_and_rules->pdf_link?>" target="_blank" rel="noreferrer">Download<span class="icon-thin-right-arrow"></span></a>
                    </div>
                </li>
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

        <!--End Single sidebar-->
