<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Update Important Acts&Rules
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>dcadmin/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="<?php echo base_url() ?>dcadmin/Important_Acts_Rules/view_important_acts_rules"><i class="fa fa-arrow-left" aria-hidden="true"></i> View Important Acts&Rules </a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Update Important Acts&Rules</h3>
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
              <form action="<?php echo base_url() ?>dcadmin/Important_Acts_Rules/add_important_acts_rules_data/<? echo base64_encode(2); ?>/<?=$id?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">

                    <tr>
                      <td> <strong>Name</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="name" class="form-control" placeholder="" required value="<?=$important_acts_rules->name?>" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Type</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                          <input type="radio" id="pdf" name="type" value="1" <?if($important_acts_rules->type==1){ echo "Checked";}?> onclick="change(1)">
                        <label for="pdf">PDF</label>
                          <input type="radio" id="link" name="type" value="2" <?if($important_acts_rules->type==2){ echo "Checked";}?> onclick="change(2)">
                        <label for="link">Link</label>
                      </td>
                    </tr>
                    <tr id="change">
                      <?if($important_acts_rules->type==1){?>
                      <td> <strong>File</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="pdf_link" class="form-control" placeholder="" required />
                      </td>
                    <?}else{?>
                      <td> <strong>Link</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="url" name="pdf_link" class="form-control" placeholder="" required value="<?=$important_acts_rules->pdf_link?>" />
                      </td>
                      <?}?>
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
<script>

function change(x){
if(x==1){
$('#change').html('<td><strong>File</strong><span style="color:red;">*</span></strong></td><td><input type="file" name="pdf_link" class="form-control" placeholder="" required /></td>');
}else{
$('#change').html('<td><strong>Link</strong><span style="color:red;">*</span></strong></td><td><input type="url" name="pdf_link" class="form-control" placeholder="" required  value="<?=$important_acts_rules->pdf_link?>" /></td>');
}
}
</script>

<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<? echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
