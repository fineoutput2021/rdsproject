<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="inner-content clearfix">
          <div class="title text-center">
            <h1>IMPORTANT WEBSITES</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Start civil list-->
<section class="cart-area p-0">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <?php
            if(!empty($important_website_data->row())){?>
              <div class="table-outer">
          <table class="cart-table">
            <thead class="cart-header">
              <tr class="">
                <th>#</th>
                <th colspan="6">Name of Department</th>
                <th>Link</th>

              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($important_website_data->result() as $important_website) { ?>
              <tr>
                <td>
                  <?=$i?>
                </td>
                <td colspan="6">
                  <?=$important_website->name?>
                </td>
                <td>
                  <a href="<?=$important_website->url?>" target="_blank" rel="noreferrer" style="color:#ed6f36;">Click Here</a>
                </td>

              </tr>
              <?php $i++; } ?>

            </tbody>
          </table>

        </div>
      <?  }else{?>
              <div class="text-center w-100 p-5">
                <h3>No Data Found</h3>
              </div>
              <?} ?>
      </div>
    </div>
  </div>
</section>
<!--End cart area-->
