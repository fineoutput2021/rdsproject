<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="inner-content clearfix">
          <div class="title text-center">
            <h1>All News</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Start civil list-->
<section class="cart-area pb-2">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="table-outer">
          <table class="cart-table cart-tablee">
            <thead class="cart-header">
              <tr class="">
                <th width="80%">All News</th>
                <th width="20%" style="text-align:center;">Date</th>
              </tr>
            </thead>
            <tbody class="align">
              <?php $i=1; foreach ($news_data->result() as $data) { ?>
              <tr>
                <td> <a href="<?=base_url().$data->file?>" target="_blank" rel="noreferrer" style="color:#ed6f36;"><?=$data->news_heading?></a> </td>
                <td class="tfx">
                  <?php
                                  $newdate = new DateTime($data->date);
                                  echo $newdate->format('d/m/y');
                                  ?>
                </td>
              </tr>
              <?php $i++; } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>
<!--End cart area-->
