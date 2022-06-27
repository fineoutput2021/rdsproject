<div class="content-wrapper">
<section class="content-header">
   <h1>
   Letters&Memorandum
  </h1>
  <ol class="breadcrumb">
   <li><a href="<?php echo base_url() ?>dcadmin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo base_url() ?>dcadmin/Letters_Memorandum/view_letters_memorandum"><i class="fa fa-arrow-left" aria-hidden="true"></i> View letters&memorandum </a></li>

  </ol>
</section>
	<section class="content">
	<div class="row">
     <div class="col-lg-12">
			   <a class="btn btn-info cticket" href="<?php echo base_url() ?>dcadmin/Letters_Memorandum/add_letters_memorandum" role="button" style="margin-bottom:12px;"> Add letters&memorandum</a>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View letters&memorandum</h3>
                          </div>
                             <div class="panel panel-default">

                             			  <? if(!empty($this->session->flashdata('smessage'))){ ?>
                             			        <div class="alert alert-success alert-dismissible">
                             			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             			    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                             			  <? echo $this->session->flashdata('smessage'); ?>
                             			  </div>
                             			    <? }
                             			     if(!empty($this->session->flashdata('emessage'))){ ?>
                             			     <div class="alert alert-danger alert-dismissible">
                             			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             			  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                             			<? echo $this->session->flashdata('emessage'); ?>
                             			</div>
                             			  <? } ?>


                          <div class="panel-body">
                              <div class="box-body table-responsive no-padding">
                              <table class="table table-bordered table-hover table-striped" id="userTable">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>Title</th>
                                          <th>Link</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php $i=1; foreach($letters_memorandum_data->result() as $data) { ?>
                <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $data->title ?></td>
                    <td><?php echo $data->link ?></td>

                      <td><?php if($data->is_active==1){ ?>
<p class="label bg-green" >Active</p>

<?php } else { ?>
<p class="label bg-yellow" >Inactive</p>


<?php		}   ?>
</td>
            <td>
<div class="btn-group" id="btns<?php echo $i ?>">
<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
<ul class="dropdown-menu" role="menu">

<?php if($data->is_active==1){ ?>
<li><a href="<?php echo base_url() ?>dcadmin/Letters_Memorandum/updateletters_memorandumStatus/<?php echo base64_encode($data->id) ?>/inactive">Inactive</a></li>
<?php } else { ?>
<li><a href="<?php echo base_url() ?>dcadmin/Letters_Memorandum/updateletters_memorandumStatus/<?php echo base64_encode($data->id) ?>/active">Active</a></li>
<?php		}   ?>
<li><a href="<?php echo base_url() ?>dcadmin/Letters_Memorandum/update_letters_memorandum/<?php echo base64_encode($data->id) ?>">Edit</a></li>
<li><a href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Delete</a></li>
</ul>
</div>
</div>

<div style="display:none" id="cnfbox<?php echo $i ?>">
<p> Are you sure delete this </p>
<a href="<?php echo base_url() ?>dcadmin/Letters_Memorandum/delete_letters_memorandum/<?php echo base64_encode($data->id); ?>" class="btn btn-danger" >Yes</a>
<a href="javasript:;" class="cans btn btn-default" mydatas="<?php echo $i ?>" >No</a>
</div>
</td>
        </tr>
<?php $i++; } ?>
    </tbody>
</table>






                              </div>
                          </div>
                      </div>

                      </div>

                  </div>
                  </div>
      </section>
    </div>


<style>
label{
margin:5px;
}
</style>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">

$(document).ready(function(){
// $('#userTable').DataTable({
//          responsive: true,
//          // bSort: true
//  });

$(document.body).on('click', '.dCnf', function() {
var i=$(this).attr("mydata");
console.log(i);

$("#btns"+i).hide();
$("#cnfbox"+i).show();

});

$(document.body).on('click', '.cans', function() {
var i=$(this).attr("mydatas");
console.log(i);

$("#btns"+i).show();
$("#cnfbox"+i).hide();
})

});

</script>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/rs.js"></script>	  -->
