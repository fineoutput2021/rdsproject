<div class="content-wrapper">
<section class="content-header">
<h1>
Add New Member
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url() ?>dcadmin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo base_url() ?>dcadmin/Member/view_member"><i class="fa fa-arrow-left" aria-hidden="true"></i> View Member </a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Member</h3>
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
  <form action="<?php echo base_url() ?>dcadmin/member/add_member_data/<?php echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
    <div class="table-responsive">
      <table class="table table-hover">


        <tr>
          <td> <strong>Name</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="name" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Image</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="file" name="image" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>DOB</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="date" name="dob" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Home Town</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="home_town" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Qualification</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="qualification" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>District</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="district" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Post</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="post" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Email</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="email" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Passsword</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" name="password" class="form-control" placeholder="" required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>phone</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="text" onkeydown="if(event.key==='.'){event.preventDefault();}" oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" maxlength="10" name="phone" class="form-control" placeholder=""
              required value="" />
          </td>
        </tr>
        <tr>
          <td> <strong>Member</strong> <span style="color:red;">*</span></strong> </td>
          <td>
            <input type="radio" id="Executive Council" name="exe" value="1" onclick="change(1)">
            <label for="executive council">Executive Council</label>
            <input type="radio" id="Member" name="exe" value="2" checked onclick="change(2)">
            <label for="member">Member</label>
          </td>
        </tr>
        <tr id="post"></tr>
        <!-- <tr id="start"></tr>
        <tr id="change"></tr> -->
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
<script>
function change(x){
if(x==1){
$('#post').html('<td><strong>Name of post</strong><span style="color:red;">*</span></strong></td><td><input type="text" name="post" class="form-control" placeholder="" required value="" /></td>');
// $('#start').html('<td><strong>start Date</strong><span style="color:red;">*</span></strong></td><td><input type="date" name="start" class="form-control" placeholder="" required value="" /></td>');
}else{
$('#post').html('');
// $('#start').html('');
}
}
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
