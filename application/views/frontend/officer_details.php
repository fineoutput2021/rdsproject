<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="inner-content clearfix">
          <div class="title text-center">
            <h1>OFFICER DETAILS</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Detail Area Start -->

<div class="container mb-2">

  <h3 style="color: black;text-transform: uppercase;background: #ed6f36;color: #fff;" class="pt-3 pb-3 text-center">&nbsp;&nbsp;&nbsp;&nbsp;Service History of RDS Officer</h3>
  <table border="1" style="border-color:#000;">
    <tbody class="right">
      <tr class="photo">
        <td class="text-center" colspan="3"><img src="<?=base_url().$member_data->image?>" width="85px" class="center"></td>
      </tr>
      <tr class="changecolor ">
        <th width="15%">&nbsp;&nbsp;Name</th>
        <td width="65%">&nbsp;&nbsp;<?=$member_data->name?></td>
        <td rowspan="3" class="text-center photo1">
          <?if(!empty($member_data->image)){?>
          <img src="<?=base_url().$member_data->image?>" class="img-fluid" style="width:80%;" alt="Member Image">
          <?}else{?>
          <img src="<?=base_url()?>assets/frontend/images/user.png" style="width:80%;" alt="Member Image">
          <?}?>
      </tr>
      <tr class="changecolor">
        <th width="15%">&nbsp;&nbsp;Date Of Birth</th>
        <td width="65%">&nbsp;&nbsp;<?=$member_data->dob?></td>
      </tr>
      <tr class="changecolor">
        <th width="15%">&nbsp;&nbsp;Home Town</th>
        <td width="65%">&nbsp;&nbsp; <?=$member_data->home_town?></td>
      </tr>
      <tr class="changecolor">
        <th width="15%">&nbsp;&nbsp;Qualifications</th>
        <td width="65%" colspan="3">&nbsp;&nbsp; <?=$member_data->qualification?></td>

      </tr>
      <tr class="changecolor">
        <th width="15%">&nbsp;&nbsp;Present Posting</th>
        <td width="65%" colspan="3">&nbsp;&nbsp; <?=$member_data->post?>, <?=$member_data->district?></td>

      </tr>
      <tr class="changecolor">
        <th width="15%">&nbsp;&nbsp;Email</th>
        <td width="65%" colspan="2">&nbsp;&nbsp;<?=$member_data->email?></td>
      </tr>
      <tr class="changecolor">
        <th width="15%">&nbsp;&nbsp;Mobile No.</th>
        <td width="65%" colspan="2">&nbsp;&nbsp;<?=$member_data->phone?></td>
      </tr>
      <tr></tr>
      <tr></tr>
    </tbody>
  </table>
</div>

<?if(!empty($posting_data->row())){?>
<!--Start civil list-->
<section class="cart-area p-0">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="table-outer">
          <table class="cart-table">
            <thead class="cart-header">
              <tr class="">
                <th>SR. No.</th>
                <th colspan="4">Name Of Post Held By Officer</th>
                <th>Date(From)</th>
                <th>Date(to)</th>
              </tr>
            </thead>
            <tbody>
              <?php
               $i=1; foreach($posting_data->result() as $post) { ?>
              <tr>
                <td>
                  <?=$i?>
                </td>

                <td colspan="4">
                  <?=$post->name?>
                </td>
                <td>
                  <?=$post->date_from?>
                </td>
                <td><?if(!empty($post->date_to)){echo $post->date_to;}else{echo 'Present';}?>
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
<?}?>
<!--End cart area-->
