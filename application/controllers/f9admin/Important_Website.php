<?php

if (! defined('BASEPATH')) {
exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Important_Website extends CI_finecontrol
{
public function __construct()
{
parent::__construct();
$this->load->model("login_model");
$this->load->model("admin/base_model");
$this->load->library('user_agent');
$this->load->library('upload');
}
//============================view_member==========================\\
public function view_important_website()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 // echo SITE_NAME;
 // echo $this->session->userdata('image');
 // echo $this->session->userdata('position');
 // exit;

 $this->db->select('*');
 $this->db->from('tbl_important_website');
 //$this->db->where('id',$usr);
 $data['important_website_data']= $this->db->get();

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/important_website/view_important_website');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=======================add_letter&memorandum=============================\\
public function add_important_website()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/important_website/add_important_website');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
            public function add_important_website_data($t,$iw="")

              {

                if(!empty($this->session->userdata('admin_data'))){


            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if($this->input->post())
            {
              // print_r($this->input->post());
              // exit;
              $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
              $this->form_validation->set_rules('url', 'url', 'required|xss_clean|trim');

              if($this->form_validation->run()== TRUE)
              {
                $name=$this->input->post('name');
                $url=$this->input->post('url');

                  $ip = $this->input->ip_address();
          date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("Y-m-d H:i:s");

                  $addedby=$this->session->userdata('admin_id');

          $typ=base64_decode($t);
          if($typ==1){

          $data_insert = array('name'=>$name,
                    'url'=>$url,
                    'ip' =>$ip,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date

                    );





          $last_id=$this->base_model->insert_table("tbl_important_website",$data_insert,1) ;
          if($last_id!=0){
          $this->session->set_flashdata('smessage','Data inserted successfully');
          redirect("dcadmin/Important_Website/view_important_website","refresh");

                  }

          }
          if($typ==2){

   $idw=base64_decode($iw);

// $this->db->select('*');
//     $this->db->from('tbl_minor_category');
//    $this->db->where('name',$name);
//     $damm= $this->db->get();
//    foreach($damm->result() as $da) {
//      $uid=$da->id;
// if($uid==$idw)
// {
//
//  }
// else{
//    echo "Multiple Entry of Same Name";
//       exit;
//  }
//     }

          $data_insert = array('name'=>$name,
                    'url'=>$url,
                    );

            $this->db->where('id', $idw);
            $last_id=$this->db->update('tbl_important_website', $data_insert);

          }


                              if($last_id!=0){
                              $this->session->set_flashdata('smessage','Data updated successfully');
                              redirect("dcadmin/Important_Website/view_important_website","refresh");
                                      }
                                      else
                                      {
                                   $this->session->set_flashdata('emessage','Sorry error occured');
                                     redirect($_SERVER['HTTP_REFERER']);
                                      }
              }
            else{
$this->session->set_flashdata('emessage',validation_errors());
     redirect($_SERVER['HTTP_REFERER']);
            }

            }
          else{
$this->session->set_flashdata('emessage','Please insert some data, No data available');
     redirect($_SERVER['HTTP_REFERER']);
          }
          }
          else{
      redirect("login/admin_login","refresh");
          }
          }
          public function update_important_website($idd)
          {
              if (!empty($this->session->userdata('admin_data'))) {
                  $data['image_name']=$this->load->get_var('image_name');

                  // echo SITE_NAME;
                  // echo $this->session->userdata('image');
                  // echo $this->session->userdata('position');
                  // exit;
                  $id=base64_decode($idd);
                  $data['id']=$idd;

                  $this->db->select('*');
                  $this->db->from('tbl_important_website');
                  $this->db->where('id', $id);
                  $data['important_website']= $this->db->get()->row();


                  $this->load->view('admin/common/header_view', $data);
                  $this->load->view('admin/important_website/update_important_website');
                  $this->load->view('admin/common/footer_view');
              } else {
                  redirect("login/admin_login", "refresh");
              }
          }

          public function delete_important_website($idd)
          {
              if (!empty($this->session->userdata('admin_data'))) {
                  $data['image_name']=$this->load->get_var('image_name');

                  $id=base64_decode($idd);

                  if ($this->load->get_var('position')=="Super Admin") {
                      $this->db->from('tbl_important_website');
                      $this->db->where('id', $id);
                      $dsa= $this->db->get();
                      $da=$dsa->row();

                      $zapak=$this->db->delete('tbl_important_website', array('id' => $id));
                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Important Website deleted successfully');
                          redirect("dcadmin/Important_Website/view_important_website", "refresh");
                      } else {
                          echo "Error";
                          exit;
                      }
                  } else {
                      $data['e']="Sorry You Don't Have Permission To Delete Anything.";
                      // exit;
                      $this->load->view('errors/error500admin', $data);
                  }
              } else {
                  $this->load->view('admin/Important_Website/view_important_website');
              }
          }

          public function updateimportant_websiteStatus($idd, $t)
          {
              if (!empty($this->session->userdata('admin_data'))) {
                  $data['image_name']=$this->load->get_var('image_name');

                  // echo SITE_NAME;
                  // echo $this->session->userdata('image');
                  // echo $this->session->userdata('position');
                  // exit;
                  $id=base64_decode($idd);

                  if ($t=="active") {
                      $data_update = array(
              'is_active'=>1

              );

                      $this->db->where('id', $id);
                      $zapak=$this->db->update('tbl_important_website', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Status updated successfully');
                          redirect("dcadmin/Important_Website/view_important_website", "refresh");
                      } else {
                          echo "Error";
                          exit;
                      }
                  }
                  if ($t=="inactive") {
                      $data_update = array(
               'is_active'=>0

               );

                      $this->db->where('id', $id);
                      $zapak=$this->db->update('tbl_important_website', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Status updated successfully');
                          redirect("dcadmin/Important_Website/view_important_website", "refresh");
                      } else {
                          $data['e']="Error Occured";
                          // exit;
                          $this->load->view('errors/error500admin', $data);
                      }
                  }
              } else {
                  $this->load->view('admin/login/index');
              }
          }
}
