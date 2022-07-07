<!--Start breadcrumb area-->

<section class="breadcrumb-area" style="background-image: url(images/slides/photo4.jpg );">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                    <h1>LETTERS AND MEMORANDUM</h1>
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

        <ul class="our-brochures">   <div class="row">
          <?php $i=1; foreach($letters_data->result() as $letters_and_memorandum) { ?>
            <div class="col-md-6">
            <li>
                <div class="icon-holder">
                    <span class="icon-text"></span>
                </div>
                <div class="title-holder">
                    <h3><?=$letters_and_memorandum->title?></h3>
                    <a class="btn-other" href="<?=$letters_and_memorandum->link?>">Download<span class="icon-thin-right-arrow"></span></a>
                </div>
            </li></div>
<?php $i++; } ?>
            </div>


    </div>
    </div>

    <!--End Single sidebar-->
