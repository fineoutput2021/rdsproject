
<!--Start breadcrumb area-->

<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                    <h1>PAID AMOUNT LIST</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!-- Detail Area Start -->




<!--Start civil list-->
<section class="cart-area p-0 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <?if(!empty($paid_data->row())){?>
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr class="text-center">
                                <th >SR. No.</th>
                                <th>Year</th>
                                <th>Amount</th>
                                <th>Paid Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                          <?php $i=1; foreach($paid_data->result() as $data) { ?>
                            <tr>
                                <td>
                                    <?=$i?>
                                   </td>
                                <td>
                                  <?=$data->title?>
                                </td>
                                <td>
                                    ₹<?=$data->amount?>
                                </td>
                                <td>
                              <?
                                $newdate = new DateTime($data->pay_date);
                                echo $newdate->format('F j, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                                ?>
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
