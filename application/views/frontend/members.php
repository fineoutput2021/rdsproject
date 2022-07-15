<style>
    .b-diw > ul{
        background-color: #39345a;

    }
    .b-diw > ul>li
    {
        padding: 5px 20px;
        color: white;
    } 
    .b-diw > ul>li.active
    {
        background-color: #f36727;
        border-radius: 0px;
    }
    .b-diw > ul>li>a:hover 
    {
        color: white;
    }
 

</style>

<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                       <h1>CIVIL LIST OF RDS OFFICERS</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End breadcrumb area-->

<!--Start civil list-->
<section class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr class="">
                                <th>SR. No.</th>
                                <th colspan="2">Name Of Officer <br>Hometown</th>
                                <th>Birth Date</th>
                                <th colspan="2">Present Post</th>
                                <th>Order Date /Join Date</th>
                            </tr>
                        </thead>
                        <tbody>
<?php $i=1; foreach($members_data->result() as $member) { ?>
                            <tr>
                                <td class="text-center">
                                  <?=$i?>
                                   </td>
                                <td colspan="2">
                                    <a href="<?=base_url()?>Home/officer_details/<?=base64_encode($member->id)?>" style="color:#ed6f36;"><?=$member->name?></a><br>
                              <?=$member->home_town?>
                                </td>
                                <td>
                                  <?=$member->dob?>
                                </td>
                                <td colspan="2">
                                    <?=$member->post?><?if(!empty($member->district)){echo ", ".$member->district;}?>
                                </td>
                                <td>
                                    <?=$member->join_date?>
                                </td>
                            </tr>
<?php $i++; } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
          <div class="b-diw" style="list-style-type:none;display: flex;justify-content: center;">
          <?php echo $links; ?>
          </div>
        </div>
    </div>
</section>
<!--End cart area-->
