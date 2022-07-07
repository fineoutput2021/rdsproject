<div class="content-wrapper">
<section class="content-header">
<h1>
Add New Magazine
</h1>
<ol class="breadcrumb">
 <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
 <li><a href="<?php echo base_url() ?>dcadmin/magazine/view_magazine"><i class="fa fa-arrow-left" aria-hidden="true"></i>View Magazine</a></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Magazine</h3>
</div>

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
    <div class="col-lg-10">
       <form action="<?php echo base_url() ?>dcadmin/Magazine/add_magazine_data/<? echo base64_encode(1); ?>" method="POST" id="slide_frm" enctype="multipart/form-data">
    <div class="table-responsive">
        <table class="table table-hover">

<tr>
                    <td> <strong>Name</strong>  <span style="color:red;">*</span></strong> </td>
                    <td>
<input type="text" name="name"  class="form-control" placeholder="" required value="" />
                  </td>
</tr>
<tr>
                    <td> <strong>Description</strong>  <span style="color:red;">*</span></strong> </td>
                    <td>
  <textarea name="description" id="editor1"></textarea>
                  </td>
</tr>
<tr>
                    <td> <strong>File</strong>  <span style="color:red;">*</span></strong> </td>
                    <td>
<input type="file" name="file"  class="form-control" placeholder="" required value="" />
                  </td>
</tr>
<tr>
                    <td> <strong>Image</strong> </strong> </td>
                    <td>
<input type="file" name="image"  class="form-control" placeholder=""  value="" />
                  </td>
</tr>
<tr>
<td colspan="2" >
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
      <script>
        CKEDITOR.replace('editor1');
      </script>


<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<? echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
