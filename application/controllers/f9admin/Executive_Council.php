<?php

if (! defined('BASEPATH')) {
exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Executive_Council extends CI_finecontrol
{
public function __construct()
{
parent::__construct();
$this->load->model("login_model");
$this->load->model("admin/base_model");
$this->load->library('user_agent');
$this->load->library('upload');
}
//============================view_executive_council==========================\\
public function view_executive_council()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 // echo SITE_NAME;
 // echo $this->session->userdata('image');
 // echo $this->session->userdata('position');
 // exit;

 $this->db->select('*');
 $this->db->from('tbl_executive_council');
 //$this->db->where('id',$usr);
 $data['executive_council_data']= $this->db->get();

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/executive_council/view_executive_council');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=======================add_executive_council=============================\\
public function add_executive_council()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');



 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/executive_council/add_executive_council');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=============================add_executive_council_data=========================\\
public function add_executive_council_data($t, $iw="")
{
if (!empty($this->session->userdata('admin_data'))) {
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $this->load->helper('security');
 if ($this->input->post()) {
     // print_r($this->input->post());
     // exit;
     $this->form_validation->set_rules('designation', 'designation', 'required');
     $this->form_validation->set_rules('select_post', 'select_post', 'required');
     $this->form_validation->set_rules('select_district', 'select_district', 'required');
     $this->form_validation->set_rules('name', 'name', 'required');
     $this->form_validation->set_rules('dob', 'dob', 'required');
     $this->form_validation->set_rules('home_town', 'home_town', 'required');
     $this->form_validation->set_rules('qualification', 'qualification', 'required');
     $this->form_validation->set_rules('present_posting', 'present_posting', 'required');





     if ($this->form_validation->run()== true) {
       $designation=$this->input->post('designation');
       $select_post=$this->input->post('select_post');
       $select_district=$this->input->post('select_district');
         $name=$this->input->post('name');
         $dob=$this->input->post('dob');
         $home_town=$this->input->post('home_town');
         $qualification=$this->input->post('qualification');
         $present_posting=$this->input->post('present_posting');

         $ip = $this->input->ip_address();
         date_default_timezone_set("Asia/Calcutta");
         $cur_date=date("Y-m-d H:i:s");
         $addedby=$this->session->userdata('admin_id');

         $typ=base64_decode($t);
         $last_id = 0;
         if ($typ==1) {


             $data_insert = array(  'designation'=>$designation,
               'select_post'=>$select_post,
            'name'=>$name,
            'dob'=>$dob,
            'home_town'=>$home_town,
            'qualification'=>$qualification,
            'present_posting'=>$present_posting,
               'ip' =>$ip,
               'added_by' =>$addedby,
               'is_active' =>1,
               'date'=>$cur_date
               );


             $last_id=$this->base_model->insert_table("tbl_executive_council", $data_insert, 1) ;
             $this->session->set_flashdata('smessage', 'Data inserted successfully');
             redirect("dcadmin/Executive_Council/view_executive_council", "refresh");
         }
         if ($typ==2) {
             $idw=base64_decode($iw);


             $this->db->select('*');
             $this->db->from('tbl_executive_council');
             $this->db->where('id', $idw);
             $dsa=$this->db->get();
             $da=$dsa->row();



             $data_insert = array(
               'designation'=>$designation,
               'select_post'=>$select_post,
               'select_district'=>$select_district,
            'name'=>$name,
            'dob'=>$dob,
            'home_town'=>$home_town,
            'qualification'=>$qualification,
            'present_posting'=>$present_posting,

               );
             $this->db->where('id', $idw);
             $last_id=$this->db->update('tbl_executive_council', $data_insert);
         }
         if ($last_id!=0) {
             $this->session->set_flashdata('smessage', 'Data updated successfully');
             redirect("dcadmin/Executive_Council/view_executive_council", "refresh");
         } else {
             $this->session->set_flashdata('emessage', 'Sorry error occured');
             redirect($_SERVER['HTTP_REFERER']);
         }
     } else {
         $this->session->set_flashdata('emessage', validation_errors());
         redirect($_SERVER['HTTP_REFERER']);
     }
 } else {
     $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
     redirect($_SERVER['HTTP_REFERER']);
 }
} else {
 redirect("login/admin_login", "refresh");
}
}
//===============================update_executive_council=========================\\
public function update_executive_council($idd)
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 // echo SITE_NAME;
 // echo $this->session->userdata('image');
 // echo $this->session->userdata('position');
 // exit;

 $id=base64_decode($idd);
 $data['id']=$idd;

 $this->db->select('*');
 $this->db->from('tbl_executive_council');
 $this->db->where('id', $id);
 $data['executive_council']= $this->db->get()->row();


 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/executive_council/update_executive_council');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=========================delete_executive_council=======================\\
public function delete_executive_council($idd)
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['image_name']=$this->load->get_var('image_name');

 $id=base64_decode($idd);

 if ($this->load->get_var('position')=="Super Admin") {
     $this->db->from('tbl_executive_council');
     $this->db->where('id', $id);
     $dsa= $this->db->get();
     $da=$dsa->row();

     $zapak=$this->db->delete('tbl_executive_council', array('id' => $id));
     if ($zapak!=0) {
         $this->session->set_flashdata('smessage', 'Executive Council deleted successfully');
         redirect("dcadmin/executive_council/view_executive_council", "refresh");
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
 $this->load->view('admin/executive_council/view_executive_council');
}
}

public function updateexecutive_councilStatus($idd, $t)
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
     $zapak=$this->db->update('tbl_executive_council', $data_update);

     if ($zapak!=0) {
         $this->session->set_flashdata('smessage', 'Status updated successfully');
         redirect("dcadmin/Executive_Council/view_Executive_council", "refresh");
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
     $zapak=$this->db->update('tbl_executive_council', $data_update);

     if ($zapak!=0) {
         $this->session->set_flashdata('smessage', 'Status updated successfully');
         redirect("dcadmin/Executive_Council/View_executive_council", "refresh");
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
