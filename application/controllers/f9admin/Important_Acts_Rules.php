<?php

if (! defined('BASEPATH')) {
exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Important_Acts_Rules extends CI_finecontrol
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
public function view_important_acts_rules()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 // echo SITE_NAME;
 // echo $this->session->userdata('image');
 // echo $this->session->userdata('position');
 // exit;

 $this->db->select('*');
 $this->db->from('tbl_important_acts_rules');
 //$this->db->where('id',$usr);
 $data['important_acts_rules_data']= $this->db->get();

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/Important_Acts_Rules/view_important_acts_rules');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=======================add_letter&memorandum=============================\\
public function add_important_acts_rules()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/Important_Acts_Rules/add_important_acts_rules');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
            public function add_important_acts_rules_data($t,$iw="")

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
              $this->form_validation->set_rules('type', 'type', 'required|xss_clean|trim');
              $type=$this->input->post('type');
              if($type==2){
                $this->form_validation->set_rules('pdf_link', 'pdf_link','required|xss_clean|trim');
                $nnnn1=$this->input->post('pdf_link');
              }
            // if(empty($iw)){
            //     $this->form_validation->set_rules('name', 'Minor Name', 'required|xss_clean|is_unique[tbl_minor_category.name]');
            // }
            // else{
            //      $this->form_validation->set_rules('name', 'Minor Name', 'required|xss_clean');
            // }
              if($this->form_validation->run()== TRUE)
              {
                $name=$this->input->post('name');

                if($type==1){
                  $img1='pdf_link';
                  $file_check=($_FILES['pdf_link']['error']);
                  if ($file_check!=4) {
                           $image_upload_folder = FCPATH . "assets/uploads/important_acts_rules/";
                                       if (!file_exists($image_upload_folder))
                                       {
                                           mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                                       }
                                       $new_file_name="important_acts_rules".date("Ymdhms");
                                       $this->upload_config = array(
                                               'upload_path'   => $image_upload_folder,
                                               'file_name' => $new_file_name,
                                               'allowed_types' =>'pdf',
                                               'max_size'      => 25000
                                       );
                                       $this->upload->initialize($this->upload_config);
                                       if (!$this->upload->do_upload($img1))
                                       {
                                           $upload_error = $this->upload->display_errors();
                                           // echo json_encode($upload_error);

                             $this->session->set_flashdata('emessage',$upload_error);
                               redirect($_SERVER['HTTP_REFERER']);
                                       }
                                       else
                                       {

                                           $file_info = $this->upload->data();

                                           $videoNAmePath = "assets/uploads/important_acts_rules/".$new_file_name.$file_info['file_ext'];
                                           $nnnn1=base_url().$videoNAmePath;
                                           // echo json_encode($file_info);
                                       }
                  }
                }

                  $ip = $this->input->ip_address();
          date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("Y-m-d H:i:s");

                  $addedby=$this->session->userdata('admin_id');

          $typ=base64_decode($t);
          if($typ==1){

          $data_insert = array('name'=>$name,
          'type'=>$type,
                    'pdf_link'=>$nnnn1,
                    'ip' =>$ip,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date

                    );


          $last_id=$this->base_model->insert_table("tbl_important_acts_rules",$data_insert,1) ;
          if($last_id!=0){
          $this->session->set_flashdata('smessage','Data inserted successfully');
          redirect("dcadmin/Important_Acts_Rules/view_important_acts_rules","refresh");
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
            'type'=>$type,
                    'pdf_link'=>$nnnn1,

                  );

            $this->db->where('id', $idw);
            $last_id=$this->db->update('tbl_important_acts_rules', $data_insert);

          }

                              if($last_id!=0){
                              $this->session->set_flashdata('smessage','Data updated successfully');
                              redirect("dcadmin/Important_Acts_Rules/view_important_acts_rules","refresh");
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
          public function update_important_acts_rules($idd)
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
                  $this->db->from('tbl_important_acts_rules');
                  $this->db->where('id', $id);
                  $data['important_acts_rules']= $this->db->get()->row();


                  $this->load->view('admin/common/header_view', $data);
                  $this->load->view('admin/important_acts_rules/update_important_acts_rules');
                  $this->load->view('admin/common/footer_view');
              } else {
                  redirect("login/admin_login", "refresh");
              }
          }

          public function delete_important_acts_rules($idd)
          {
              if (!empty($this->session->userdata('admin_data'))) {
                  $data['image_name']=$this->load->get_var('image_name');

                  $id=base64_decode($idd);

                  if ($this->load->get_var('position')=="Super Admin") {
                      $this->db->from('tbl_important_acts_rules');
                      $this->db->where('id', $id);
                      $dsa= $this->db->get();
                      $da=$dsa->row();

                      $zapak=$this->db->delete('tbl_important_acts_rules', array('id' => $id));
                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Important Acts&Rules deleted successfully');
                          redirect("dcadmin/important_acts_rules/view_important_acts_rules", "refresh");
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
                  $this->load->view('admin/important_acts_rules/view_important_acts_rules');
              }
          }

          public function updateimportant_acts_rulesStatus($idd, $t)
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
                      $zapak=$this->db->update('tbl_important_acts_rules', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Status updated successfully');
                          redirect("dcadmin/Important_Acts_Rules/view_important_acts_rules", "refresh");
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
                      $zapak=$this->db->update('tbl_important_acts_rules', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Status updated successfully');
                          redirect("dcadmin/Important_Acts_Rules/view_important_acts_rules", "refresh");
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
