
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <!-- <li class="active">Dashboard</li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="<?=base_url()?>dcadmin/Member/view_member">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Members</span>
                  <span class="info-box-number"><?$this->db->select('*');
                  $this->db->from('tbl_member');
                  $count_team = $this->db->count_all_results();
                  echo $count_team;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <a href="<?=base_url()?>dcadmin/Magazine/view_magazine">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-book" aria-hidden="true"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">RDS Magazine</span>
                  <span class="info-box-number"><?$this->db->select('*');
                  $this->db->from('tbl_magazine');
                  $count_team = $this->db->count_all_results();
                  echo $count_team;
                  ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
</span>
                <div class="info-box-content">
                  <span class="info-box-text">News Letter</span>
                  <span class="info-box-number"><?$this->db->select('*');
                  $this->db->from('tbl_news');
                  $count_team = $this->db->count_all_results();
                  echo $count_team;
                  ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
