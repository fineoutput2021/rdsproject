<div class="content-wrapper">
<section class="content-header">
<h1>
Update Video
</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url() ?>dcadmin/Home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo base_url() ?>dcadmin/Video/view_video"><i class="fa fa-arrow-left" aria-hidden="true"></i> View video </a></li>
<!-- <li class="active">View video</li> -->
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-lg-12">

          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> update video</h3>
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
                     <form action="<?php echo base_url() ?>dcadmin/Video/add_video_data/<? echo base64_encode(2); ?>/<?=$id?>" method="POST" id="slide_frm" enctype="multipart/form-data">
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <!-- <tr>
                          <td> <strong>Image</strong> <span style="color:red;"></span></strong> </td>
                          <td>
                            <input type="file" name="image" class="form-control" placeholder=""/>
                            <img id="slide_img_path" height=50 width=100 src="<?php echo base_url().$video->image ?>">
                          </td>
                        </tr> -->
				<tr>
                                  <td> <strong>Link</strong>  <span style="color:red;"></span></strong> </td>
                                  <td>
						<input type="url" name="link"  class="form-control" placeholder="" required value="<?=$video->link?>" />
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


<script type="text/javascript" src="<?php echo base_url() ?>assets/slider/ajaxupload.3.5.js"></script>
<link href="<? echo base_url() ?>assets/cowadmin/css/jqvmap.css" rel='stylesheet' type='text/css' />
