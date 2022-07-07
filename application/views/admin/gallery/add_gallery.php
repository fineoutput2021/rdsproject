<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add New Image
    </h1>
    <ol class="breadcrumb">
     <li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
     <li><a href="<?php echo base_url() ?>dcadmin/Gallery/view_gallery"><i class="fa fa-arrow-left" aria-hidden="true"></i> View Gallery Images</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Add New Image</h3>
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
              <form action="<?php echo base_url() ?>dcadmin/Gallery/add_gallery_data/<?php echo base64_encode(1);?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <tr>
                      <td> <strong>Heading</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="text" name="heading" class="form-control" placeholder="" required value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image2</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image2" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image3</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image3" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image4</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image4" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image5</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image5" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td> <strong>Image6</strong> <span style="color:red;">*</span></strong> </td>
                      <td>
                        <input type="file" name="image6" class="form-control" placeholder="" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <input type="submit" class="btn custom_btn" value="save">
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


<script type="text/javascript" src="<?php echo base_url() ?>assets/gallery/ajaxupload.3.5.js"></script>
<link href="<?php echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
