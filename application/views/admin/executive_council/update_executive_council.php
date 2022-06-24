<div class="content-wrapper">
<section class="content-header">
<h1>
Update Executive Council
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url() ?>dcadmin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo base_url() ?>dcadmin/Executive_Council/view_executive_council"><i class="fa fa-arrow-left" aria-hidden="true"></i> View Executive Council </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update Executive Council</h3>
</div>

<?php if (!empty($this->session->flashdata('smessage'))) { ?>
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-check"></i> Alert!</h4>
<?php echo $this->session->flashdata('smessage'); ?>
</div>
<?php }
                                 if (!empty($this->session->flashdata('emessage'))) { ?>
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<h4><i class="icon fa fa-ban"></i> Alert!</h4>
<?php echo $this->session->flashdata('emessage'); ?>
</div>
<?php } ?>


<div class="panel-body">
<div class="col-lg-10">
  <form action="<?php echo base_url() ?>dcadmin/Executive_Council/add_executive_council_data/<?php echo base64_encode(2); ?>/<?$id?>" method="POST" id="slide_frm" enctype="multipart/form-data">
    <div class="table-responsive">
      <table class="table table-hover">

        <tr>
          <td> <strong>Designation</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="designation" class="form-control" placeholder="" required value="<?=$executive_council->designation?>" />
          </td>
        </tr>
      <tr>
        <td> <strong>Select Post</strong> <span style="color:red;">*</span></strong> </td>
        <td>

          <select name="select_post"  class="form-control">
<option <?if($executive_council->select_post=="President"){echo "selected";}?> value="President">President</option>
<option <?if($executive_council->select_post=="Executive President"){echo "selected";}?> value="Executive President">Executive President</option>
<option <?if($executive_council->select_post=="General Secretary"){echo "selected";}?> value="General Secretary">General Secretary</option>
<option <?if($executive_council->select_post=="Senior Vice President"){echo "selected";}?> value="Senior Vice President">Senior Vice President</option>
<option <?if($executive_council->select_post=="Vice President"){echo "selected";}?> value="Vice President">Vice President</option>
<option <?if($executive_council->select_post=="Treasurer"){echo "selected";}?> value="Treasurer">Treasurer</option>
<option <?if($executive_council->select_post=="Chief Advisor"){echo "selected";}?> value="Chief Advisor">Chief Advisor</option>
<option <?if($executive_council->select_post=="Secretary"){echo "selected";}?> value="Secretary">Secretary</option>
<option <?if($executive_council->select_post=="Chief Editor"){echo "selected";}?> value="Chief Editor">Chief Editor</option>
<option <?if($executive_council->select_post=="General Secretary"){echo "selected";}?> value="General Secretary">General Secretary</option>
<option <?if($executive_council->select_post=="Joint Secretary"){echo "selected";}?> value="Joint Secretary">Joint Secretary</option>
<option <?if($executive_council->select_post=="Auditor"){echo "selected";}?> value="Auditor">Auditor</option>
<option <?if($executive_council->select_post=="Advisor Commitee"){echo "selected";}?> value="Advisor Commitee">Advisor Commitee</option>

        </td>
      </tr>

        <tr>
          <td> <strong>Name</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="name" class="form-control" placeholder="" required value="<?=$executive_council->name?>" />
          </td>
        </tr>
        <tr>
          <td> <strong>DOB</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="date" name="dob" class="form-control" placeholder="" required value="<?=$executive_council->dob?>" />
          </td>
        </tr>
        <tr>
          <td> <strong>Home Town</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="home_town" class="form-control" placeholder="" required value="<?=$executive_council->home_town?>" />
          </td>
        </tr>
        <tr>
          <td> <strong>Qualification</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="qualification" class="form-control" placeholder="" required value="<?=$executive_council->qualification?>" />
          </td>
        </tr>
        <tr>
          <td> <strong>Present Posting</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="present_posting" class="form-control" placeholder="" required value="<?=$executive_council->present_posting?>" />
          </td>

        </tr>

        <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-success" value="save">
          </td>
        </tr>
      </table>
    </div>

  </form>

</div>



</div>

</div>

</div>
</div>
</section>
</div>
<!-- <script> -->
// $(function(){
// var dtToday = new Date();
//
// var month = dtToday.getMonth() + 1;
// var day = dtToday.getDate();
// var year = dtToday.getFullYear();
// if(month < 10) // month='0' + month.toString(); // if(day < 10) // day='0' + day.toString(); // // var maxDate=ye // ar + '-' + month + '-' + day; // // alert(maxDate); // // $('#dob') // }); <!-- // </script> -->

<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
