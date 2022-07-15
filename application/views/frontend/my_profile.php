
<!--Start breadcrumb area-->
<section class="breadcrumb-area" style="background-image: url(<?=base_url()?>assets/frontend/images/slides/photo4.jpg );">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="inner-content clearfix">
                    <div class="title text-center">
                       <h1>MY PROFILE</h1>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!-- Detail Area Start -->

<div class="container mt-5 mb-3">


    <table border="1" style="border-color:#000;">
     <tbody class="right">
       <tr class="photo">
         <td class="text-center" colspan="3"><img src="<?=base_url().$member_data->image?>" width="85px" class="center"></td>
       </tr>
        <tr class="changecolor ">
            <th width="15%">&nbsp;&nbsp;Name</th>
            <td width="65%">&nbsp;&nbsp;<?=$member_data->name?></td>
            <td rowspan="3" class="text-center photo1" >
              <?if(!empty($member_data->image)){?>
              <img src="<?=base_url().$member_data->image?>" class="img-fluid" style="width:80%;" alt="Member Image">
              <?}else{?>
              <img src="<?=base_url()?>assets/frontend/images/user.png" style="width:80%;" alt="Member Image">
              <?}?>
            </td>
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
            <td width="65%"  colspan="3">&nbsp;&nbsp; <?=$member_data->qualification?></td>

        </tr>
        <tr class="changecolor">
            <th width="15%">&nbsp;&nbsp;Present Posting</th>
            <td width="65%" colspan="3">&nbsp;&nbsp; <?=$member_data->post?></td>

        </tr>
        <tr class="changecolor">
            <th width="15%" >&nbsp;&nbsp;Email</th>
            <td width="65%"  colspan="2">&nbsp;&nbsp;<?=$member_data->email?></td>
        </tr>
        <tr class="changecolor">
            <th width="15%" >&nbsp;&nbsp;Mobile No.</th>
            <td width="65%"  colspan="2">&nbsp;&nbsp;<?=$member_data->phone?></td>
        </tr>
        <tr></tr>
     </tbody>
    </table>
    <table border="1" style="border-color:#000;">
        <tbody  class="">
            <tr class="changecolor">
                <th width="60%" >&nbsp;&nbsp;Total Due Amount : ₹<?=$total_pending?></th>
                <td></td>
                <td width="100%"  class="text-center d-flex ktr" rowspan="2"><a class="col-6" href="<?=base_url()?>Home/view_all_paid/<?=base64_encode($member_data->id)?>"><input type="button" value="Paid Amount List" class="buttons bts" style="margin:2px 4px" mr-2></a><a class="col-6" href="<?=base_url()?>Home/view_all_dues/<?=base64_encode($member_data->id)?>"><input type="button" value="Due Amount List" class="buttons bts" style="margin:2px 4px"></a></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- <div class="row justify-content-center mb-5">
    <p>TOTAL:-</p>
    <input type="button" value="submit" class="buttons">&nbsp;
    <input type="button" value="Reset" class="buttons">
</div> -->
