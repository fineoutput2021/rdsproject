<?php

if (! defined('BASEPATH')) {
exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Letters_Memorandum extends CI_finecontrol
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
public function view_letters_memorandum()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 // echo SITE_NAME;
 // echo $this->session->userdata('image');
 // echo $this->session->userdata('position');
 // exit;

 $this->db->select('*');
 $this->db->from('tbl_letters_memorandum');
 //$this->db->where('id',$usr);
 $data['letters_memorandum_data']= $this->db->get();

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/letters_memorandum/view_letters_memorandum');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=======================add_letter&memorandum=============================\\
public function add_letters_memorandum()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/letters_memorandum/add_letters_memorandum');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
            public function add_letters_memorandum_data($t,$iw="")

              {

                if(!empty($this->session->userdata('admin_data'))){


            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if($this->input->post())
            {
              // print_r($this->input->post());
              // exit;
              $this->form_validation->set_rules('title', 'title', 'required|xss_clean|trim');
  $this->form_validation->set_rules('type', 'type', 'required|xss_clean|trim');
$type=$this->input->post('type');
  if ($type==2) {
      $this->form_validation->set_rules('pdf_link', 'pdf_link', 'required|xss_clean|trim');
      $nnnn1=$this->input->post('pdf_link');
  }
              if($this->form_validation->run()== TRUE){
                $title=$this->input->post('title');

                if ($type==1) {
                    $img1='pdf_link';
                    $file_check=($_FILES['pdf_link']['error']);
                    if ($file_check!=4) {
                        $image_upload_folder = FCPATH . "assets/uploads/letters_memorandum/";
                        if (!file_exists($image_upload_folder)) {
                            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                        }
                        $new_file_name="letters_memorandum".date("Ymdhms");
                        $this->upload_config = array(
                                           'upload_path'   => $image_upload_folder,
                                           'file_name' => $new_file_name,
                                           'allowed_types' =>'pdf',
                                           'max_size'      => 25000
                                   );
                        $this->upload->initialize($this->upload_config);
                        if (!$this->upload->do_upload($img1)) {
                            $upload_error = $this->upload->display_errors();
                            // echo json_encode($upload_error);

                            $this->session->set_flashdata('emessage', $upload_error);
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $file_info = $this->upload->data();

                            $videoNAmePath = "assets/uploads/letters_memorandum/".$new_file_name.$file_info['file_ext'];
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
                if ($typ==1) {
                    $data_insert = array('title'=>$title,
              'type'=>$type,
                'pdf_link'=>$nnnn1,
                'ip' =>$ip,
                'added_by' =>$addedby,
                'is_active' =>1,
                'date'=>$cur_date

                );




          $last_id=$this->base_model->insert_table("tbl_letters_memorandum",$data_insert,1) ;
          if($last_id!=0){
          $this->session->set_flashdata('smessage','Data inserted successfully');
          redirect("dcadmin/Letters_Memorandum/view_letters_memorandum","refresh");
                  }
          }
          if ($typ==2) {
              $idw=base64_decode($iw);

                          $this->db->select('*');
              $this->db->from('tbl_letters_memorandum');
              $this->db->where('id',$idw);
              $act_data= $this->db->get()->row();

              if(empty($nnnn1)){
                $nnnn1=$act_data->pdf_link;
              }

              $data_insert = array('title'=>$title,
  'type'=>$type,
          'pdf_link'=>$nnnn1,
        );
            $this->db->where('id', $idw);
            $last_id=$this->db->update('tbl_letters_memorandum', $data_insert);

          }


                              if($last_id!=0){
                              $this->session->set_flashdata('smessage','Data updated successfully');
                              redirect("dcadmin/Letters_Memorandum/view_letters_memorandum","refresh");
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
          public function update_letters_memorandum($idd)
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
                  $this->db->from('tbl_letters_memorandum');
                  $this->db->where('id', $id);
                  $data['letters_memorandum']= $this->db->get()->row();


                  $this->load->view('admin/common/header_view', $data);
                  $this->load->view('admin/letters_memorandum/update_letters_memorandum');
                  $this->load->view('admin/common/footer_view');
              } else {
                  redirect("login/admin_login", "refresh");
              }
          }

          public function delete_letters_memorandum($idd)
          {
              if (!empty($this->session->userdata('admin_data'))) {
                  $data['image_name']=$this->load->get_var('image_name');

                  $id=base64_decode($idd);

                  if ($this->load->get_var('position')=="Super Admin") {
                      $this->db->from('tbl_letters_memorandum');
                      $this->db->where('id', $id);
                      $dsa= $this->db->get();
                      $da=$dsa->row();

                      $zapak=$this->db->delete('tbl_letters_memorandum', array('id' => $id));
                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Letters&Memorandum deleted successfully');
                          redirect("dcadmin/Letters_Memorandum/view_letters_memorandum", "refresh");
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
                  $this->load->view('admin/gallery/view_gallery');
              }
          }

          public function updateletters_memorandumStatus($idd, $t)
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
                      $zapak=$this->db->update('tbl_letters_memorandum', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Status updated successfully');
                          redirect("dcadmin/Letters_Memorandum/view_letters_memorandum", "refresh");
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
                      $zapak=$this->db->update('tbl_letters_memorandum', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Status updated successfully');
                          redirect("dcadmin/Letters_Memorandum/view_letters_memorandum", "refresh");
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
