<?php

if (! defined('BASEPATH')) {
exit('No direct script access allowed');
}
require_once(APPPATH . 'core/CI_finecontrol.php');
class Member extends CI_finecontrol
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
public function view_member()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');

 // echo SITE_NAME;
 // echo $this->session->userdata('image');
 // echo $this->session->userdata('position');
 // exit;

 $this->db->select('*');
 $this->db->from('tbl_member');
 //$this->db->where('id',$usr);
 $data['member_data']= $this->db->get();

 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/member/view_member');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=======================add_member=============================\\
public function add_member()
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['user_name']=$this->load->get_var('user_name');



 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/member/add_member');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
//=============================add_member_data=========================\\
public function add_member_data($t, $iw="")
{
if (!empty($this->session->userdata('admin_data'))) {
 $this->load->helper(array('form', 'url'));
 $this->load->library('form_validation');
 $this->load->helper('security');
 if ($this->input->post()) {
     // print_r($this->input->post());
     // exit;
     $this->form_validation->set_rules('name', 'name', 'required');
     $this->form_validation->set_rules('dob', 'dob', 'required');
     $this->form_validation->set_rules('home_town', 'home_town', 'required');
     $this->form_validation->set_rules('qualification', 'qualification', 'required');
     $this->form_validation->set_rules('district', 'district', 'required');
     $this->form_validation->set_rules('post', 'post', 'required');
     $this->form_validation->set_rules('email', 'email', 'required');
     $this->form_validation->set_rules('password', 'password', 'required');
     $this->form_validation->set_rules('phone', 'phone', 'required');
     $this->form_validation->set_rules('exe', 'exe', 'required');
     $this->form_validation->set_rules('officers_designation', 'officers_designation', 'required');
     $this->form_validation->set_rules('join_date', 'join_date', 'required');




     if ($this->form_validation->run()== true) {
         $name=$this->input->post('name');
         $dob=$this->input->post('dob');
         $home_town=$this->input->post('home_town');
         $qualification=$this->input->post('qualification');
         $district=$this->input->post('district');
         $post=$this->input->post('post');
         $email=$this->input->post('email');
         $password=$this->input->post('password');
         $phone=$this->input->post('phone');
         $exe=$this->input->post('exe');
         $officers_designation=$this->input->post('officers_designation');
         $join_date=$this->input->post('join_date');

         $ip = $this->input->ip_address();
         date_default_timezone_set("Asia/Calcutta");
         $cur_date=date("Y-m-d H:i:s");
         $addedby=$this->session->userdata('admin_id');

         $typ=base64_decode($t);
         $last_id = 0;
         if ($typ==1) {
             $img1='image';

             $file_check=($_FILES['image']['error']);
             if ($file_check!=4) {
                 $image_upload_folder = FCPATH . "assets/uploads/member/";
                 if (!file_exists($image_upload_folder)) {
                     mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                 }
                 $new_file_name="member".date("Ymdhms");
                 $this->upload_config = array(
                       'upload_path'   => $image_upload_folder,
                       'file_name' => $new_file_name,
                       'allowed_types' =>'jpg|jpeg|png',
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

                     $videoNAmePath = "assets/uploads/member/".$new_file_name.$file_info['file_ext'];
                     $file_info['new_name']=$videoNAmePath;
                     // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                     $nnnn=$file_info['file_name'];
                     $nnnn1=$videoNAmePath;

                     // echo json_encode($file_info);
                 }
             }

             $data_insert = array(
            'name'=>$name,
            'dob'=>$dob,
            'home_town'=>$home_town,
            'qualification'=>$qualification,
            'district'=>$district,
            'post'=>$post,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'exe'=>$exe,
            'officers_designation'=>$officers_designation,
            'join_date'=>$join_date,
'image'=>$nnnn1,

               'ip' =>$ip,
               'added_by' =>$addedby,
               'is_active' =>1,
               'date'=>$cur_date
               );

// die();
             $last_id=$this->base_model->insert_table("tbl_member", $data_insert, 1) ;
             $this->session->set_flashdata('smessage', 'Data inserted successfully');
             redirect("dcadmin/member/view_member", "refresh");
         }
         if ($typ==2) {
             $idw=base64_decode($iw);


             $this->db->select('*');
             $this->db->from('tbl_member');
             $this->db->where('id', $idw);
             $dsa=$this->db->get();
             $da=$dsa->row();



             $img1='image';


             $file_check=($_FILES['image']['error']);
             if ($file_check!=4) {
                 $image_upload_folder = FCPATH . "assets/uploads/member/";
                 if (!file_exists($image_upload_folder)) {
                     mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                 }
                 $new_file_name="member".date("Ymdhms");
                 $this->upload_config = array(
                       'upload_path'   => $image_upload_folder,
                       'file_name' => $new_file_name,
                       'allowed_types' =>'jpg|jpeg|png',
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

                     $videoNAmePath = "assets/uploads/member/".$new_file_name.$file_info['file_ext'];
                     $file_info['new_name']=$videoNAmePath;
                     // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                     $nnnn=$file_info['file_name'];
                     $nnnn1=$videoNAmePath;

                     // echo json_encode($file_info);
                 }
             }



             if (!empty($da)) {
                 $img = $da ->image;
                 if (!empty($img)) {
                     if (empty($nnnn1)) {
                         $nnnn1 = $img;
                     }
                 } else {
                     if (empty($nnnn1)) {
                         $nnnn1= "";
                     }
                 }
             }

             $data_insert = array(
            'name'=>$name,
            'dob'=>$dob,
            'home_town'=>$home_town,
            'qualification'=>$qualification,
            'district'=>$district,
            'post'=>$post,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'exe'=>$exe,
            'officers_designation'=>$officers_designation,
            'join_date'=>$join_date,
'image'=>$nnnn1,

               );
             $this->db->where('id', $idw);
             $last_id=$this->db->update('tbl_member', $data_insert);
         }
         if ($last_id!=0) {
             $this->session->set_flashdata('smessage', 'Data updated successfully');
             redirect("dcadmin/member/view_member", "refresh");
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
//===============================update_member=========================\\
public function update_member($idd)
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
 $this->db->from('tbl_member');
 $this->db->where('id', $id);
 $data['member']= $this->db->get()->row();


 $this->load->view('admin/common/header_view', $data);
 $this->load->view('admin/member/update_member');
 $this->load->view('admin/common/footer_view');
} else {
 redirect("login/admin_login", "refresh");
}
}
// =====================pending dues==============================
public function view_pending_dues($idd){

                 if(!empty($this->session->userdata('admin_data'))){


                   $data['user_name']=$this->load->get_var('user_name');

                   // echo SITE_NAME;
                   // echo $this->session->userdata('image');
                   // echo $this->session->userdata('position');
                   // exit;
                   $id=base64_decode($idd);
                   $data['id']=$idd;
                   $this->db->select('*');
                   $this->db->from('tbl_pending_dues');
                   $this->db->where('member_id',$id);
                   $this->db->where('is_active', 1);
                   $data['pending_dues']= $this->db->get();


                   $this->load->view('admin/common/header_view',$data);
                   $this->load->view('admin/member/view_pending_dues');
                   $this->load->view('admin/common/footer_view');

               }
               else{

                  redirect("login/admin_login","refresh");
               }

               }
        public function add_pending_dues($idd){

                         if(!empty($this->session->userdata('admin_data'))){


                           $data['user_name']=$this->load->get_var('user_name');

                           // echo SITE_NAME;
                           // echo $this->session->userdata('image');
                           // echo $this->session->userdata('position');
                           // exit;
                            $id=base64_decode($idd);
                           $data['id']=$idd;


                           $this->load->view('admin/common/header_view',$data);
                             $this->load->view('admin/member/add_pending_dues');
                           $this->load->view('admin/common/footer_view');

                       }
                       else{

                          redirect("login/admin_login","refresh");
                       }

                       }


            public function add_pending_dues_data($t,$iw="")

              {

                if(!empty($this->session->userdata('admin_data'))){


            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if($this->input->post())
            {
              // print_r($this->input->post());
              // exit;
              $this->form_validation->set_rules('member_id', 'member_id', 'required|xss_clean');
              $this->form_validation->set_rules('title', 'title', 'required|xss_clean');
              $this->form_validation->set_rules('amount', 'amount', 'required|xss_clean');
              // $this->form_validation->set_rules('year', 'year', 'required|xss_clean');

              if($this->form_validation->run()== TRUE)
              {
                $member_id=$this->input->post('member_id');
                $member_id_decode = base64_decode($member_id);
                $title=$this->input->post('title');
                $amount=$this->input->post('amount');
                // $year=$this->input->post('year');

                  $ip = $this->input->ip_address();
          date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("Y-m-d H:i:s");

                  $addedby=$this->session->userdata('admin_id');

          $typ=base64_decode($t);
          if($typ==1){

          $data_insert = array('member_id'=>$member_id_decode,
                    'title'=>$title,
                    'amount'=>$amount,
                    // 'year'=>$year,
                    'ip' =>$ip,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date

                    );





          $last_id=$this->base_model->insert_table("tbl_pending_dues",$data_insert,1) ;
          if($last_id!=0){

          $this->session->set_flashdata('smessage','Data inserted successfully');
          redirect("dcadmin/Member/view_pending_dues/".$member_id,"refresh");

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
                    'phone'=>$phone,
                    'address'=>$address,
                    'email'=>$email,
                    'password'=>$pass,
                    'power'=>$position,
                    'services'=>$ser

                    );




            $this->db->where('id', $idw);
            $last_id=$this->db->update('tbl_hod', $data_insert);

          }


                              if($last_id!=0){

                              $this->session->set_flashdata('smessage','Data inserted successfully');
                              redirect("dcadmin/Member/view_pending_dues/".$member_id,"refresh");

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

public function updatepending_duesStatus($idd, $t)
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
                    $zapak=$this->db->update('tbl_pending_dues', $data_update);

                    if ($zapak!=0) {
                        $this->session->set_flashdata('smessage', 'Status updated successfully');
                       redirect($_SERVER['HTTP_REFERER']);
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
                    $zapak=$this->db->update('tbl_pending_dues', $data_update);

                    if ($zapak!=0) {
                        $this->session->set_flashdata('smessage', 'Status updated successfully');
                         redirect($_SERVER['HTTP_REFERER']);
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
public function view_completed_dues($idd){

                 if(!empty($this->session->userdata('admin_data'))){


                   $data['user_name']=$this->load->get_var('user_name');

                   // echo SITE_NAME;
                   // echo $this->session->userdata('image');
                   // echo $this->session->userdata('position');
                   // exit;
                   $id=base64_decode($idd);
                   $data['id']=$idd;
                   $this->db->select('*');
                   $this->db->from('tbl_pending_dues');
                   $this->db->where('member_id',$id);
                   $this->db->where('is_active', 0);
                   $data['pending_dues']= $this->db->get();


                   $this->load->view('admin/common/header_view',$data);
                   $this->load->view('admin/member/view_completed_dues');
                   $this->load->view('admin/common/footer_view');

               }
               else{

                  redirect("login/admin_login","refresh");
               }

               }
        public function add_completed_dues($idd){

                         if(!empty($this->session->userdata('admin_data'))){


                           $data['user_name']=$this->load->get_var('user_name');

                           // echo SITE_NAME;
                           // echo $this->session->userdata('image');
                           // echo $this->session->userdata('position');
                           // exit;
                            $id=base64_decode($idd);
                           $data['id']=$idd;


                           $this->load->view('admin/common/header_view',$data);
                             $this->load->view('admin/member/add_completed_dues');
                           $this->load->view('admin/common/footer_view');

                       }
                       else{

                          redirect("login/admin_login","refresh");
                       }

                       }


            public function add_completed_dues_data($t,$iw="")

              {

                if(!empty($this->session->userdata('admin_data'))){


            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if($this->input->post())
            {
              // print_r($this->input->post());
              // exit;
              $this->form_validation->set_rules('member_id', 'member_id', 'required|xss_clean');
                $this->form_validation->set_rules('title', 'title', 'required|xss_clean');
              $this->form_validation->set_rules('amount', 'amount', 'required|xss_clean');
              // $this->form_validation->set_rules('year', 'year', 'required|xss_clean');

              if($this->form_validation->run()== TRUE)
              {
                $member_id=$this->input->post('member_id');
                $member_id_decode = base64_decode($member_id);
                $title=$this->input->post('title');
                $amount=$this->input->post('amount');
                // $year=$this->input->post('year');

                  $ip = $this->input->ip_address();
          date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("Y-m-d H:i:s");

                  $addedby=$this->session->userdata('admin_id');

          $typ=base64_decode($t);
          if($typ==1){

          $data_insert = array('member_id'=>$member_id_decode,
                    'title'=>$title,
                    'amount'=>$amount,
                    // 'year'=>$year,
                    'ip' =>$ip,
                    'added_by' =>$addedby,
                    'is_active' =>0,
                    'date'=>$cur_date

                    );





          $last_id=$this->base_model->insert_table("tbl_pending_dues",$data_insert,1) ;
          if($last_id!=0){

          $this->session->set_flashdata('smessage','Data inserted successfully');
          redirect("dcadmin/Member/view_completed_dues/".$member_id,"refresh");

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
                    'phone'=>$phone,
                    'address'=>$address,
                    'email'=>$email,
                    'password'=>$pass,
                    'power'=>$position,
                    'services'=>$ser

                    );




            $this->db->where('id', $idw);
            $last_id=$this->db->update('tbl_hod', $data_insert);

          }


                              if($last_id!=0){

                              $this->session->set_flashdata('smessage','Data inserted successfully');
                              redirect("dcadmin/Member/view_completed_dues/".$member_id,"refresh");

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

public function updatecompleted_duesStatus($idd, $t)
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
                          'is_active'=>0

                          );

                    $this->db->where('id', $id);
                    $zapak=$this->db->update('tbl_pending_dues', $data_update);

                    if ($zapak!=0) {
                        $this->session->set_flashdata('smessage', 'Status updated successfully');
                         redirect($_SERVER['HTTP_REFERER']);
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
                    $zapak=$this->db->update('tbl_pending_dues', $data_update);

                    if ($zapak!=0) {
                        $this->session->set_flashdata('smessage', 'Status updated successfully');
                         redirect($_SERVER['HTTP_REFERER']);
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
//===========================delete pending dues===========================\\
public function delete_pending_dues($idd)
               {
               if (!empty($this->session->userdata('admin_data'))) {
                $data['image_name']=$this->load->get_var('image_name');

                $id=base64_decode($idd);

                if ($this->load->get_var('position')=="Super Admin") {
                    $this->db->from('tbl_pending_dues');
                    $this->db->where('member_id', $id);

                    $data['pending_dues']= $this->db->get();

                    $zapak=$this->db->delete('tbl_pending_dues', array('id' => $id));
                    if ($zapak!=0) {
                        $this->session->set_flashdata('smessage', 'Member Pending Dues deleted successfully');
                       redirect($_SERVER['HTTP_REFERER']);
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
                $this->load->view('admin/member/view_member');
               }
               }


               public function delete_completed_dues($idd)
                              {
                              if (!empty($this->session->userdata('admin_data'))) {
                               $data['image_name']=$this->load->get_var('image_name');

                               $id=base64_decode($idd);

                               if ($this->load->get_var('position')=="Super Admin") {
                                   $this->db->from('tbl_pending_dues');
                                   $this->db->where('member_id', $id);

                                   $data['pending_dues']= $this->db->get();

                                   $zapak=$this->db->delete('tbl_pending_dues', array('id' => $id));
                                   if ($zapak!=0) {
                                       $this->session->set_flashdata('smessage', 'Member Completed Dues deleted successfully');
                                      redirect($_SERVER['HTTP_REFERER']);
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
                               $this->load->view('admin/member/view_member');
                              }
                              }

//=========================delete_member=======================\\
public function delete_member($idd)
{
if (!empty($this->session->userdata('admin_data'))) {
 $data['image_name']=$this->load->get_var('image_name');

 $id=base64_decode($idd);

 if ($this->load->get_var('position')=="Super Admin") {
     $this->db->from('tbl_member');
     $this->db->where('id', $id);
     $dsa= $this->db->get();
     $da=$dsa->row();

     $zapak=$this->db->delete('tbl_member', array('id' => $id));
     if ($zapak!=0) {
         $this->session->set_flashdata('smessage', 'Member deleted successfully');
         redirect("dcadmin/Member/view_member", "refresh");
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
 $this->load->view('admin/member/view_member');
}
}

public function updatememberStatus($idd, $t)
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
     $zapak=$this->db->update('tbl_member', $data_update);

     if ($zapak!=0) {
         $this->session->set_flashdata('smessage', 'Status updated successfully');
         redirect("dcadmin/Member/view_member", "refresh");
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
     $zapak=$this->db->update('tbl_member', $data_update);

     if ($zapak!=0) {
         $this->session->set_flashdata('smessage', 'Status updated successfully');
         redirect("dcadmin/Member/view_member", "refresh");
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
