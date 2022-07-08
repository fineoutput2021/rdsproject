  <!--Start breadcrumb area-->
  <section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content clearfix">
            <div class="title text-center">
              <h1>All Videos</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End breadcrumb area-->

  <!--Start Choose area style2-->
  <section class="choose-area style2 mt-5">
    <div class="container">
      <div class="row">
        <!--Start Single Choose Item-->
        <?php $i=1; foreach ($video_data->result() as $video) { ?>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
          <div class="video-holder-box wow slideInLeft mt-3" data-wow-delay="0ms" data-wow-duration="1500ms">
            <iframe width="100%" height="315" src="<?=$video->link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
        </div>
        <?php $i++; } ?>
        <!--End Single Choose Item-->

      </div>
    </div>
  </section>
  <!--End Choose area style2-->
