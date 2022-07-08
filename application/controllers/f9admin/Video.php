<?php

        if (! defined('BASEPATH')) {
            exit('No direct script access allowed');
        }
             require_once(APPPATH . 'core/CI_finecontrol.php');
             class Video extends CI_finecontrol
             {
                 public function __construct()
                 {
                     parent::__construct();
                     $this->load->model("login_model");
                     $this->load->model("admin/base_model");
                     $this->load->library('user_agent');
                     $this->load->library('upload');
                 }

                 public function view_video()
                 {
                     if (!empty($this->session->userdata('admin_data'))) {
                         $data['user_name']=$this->load->get_var('user_name');

                         $this->db->select('*');
                         $this->db->from('tbl_video');
                         // $this->db->order_by('id','desc');
                         $data['video_data']= $this->db->get();

                         $this->load->view('admin/common/header_view', $data);
                         $this->load->view('admin/video/view_video');
                         $this->load->view('admin/common/footer_view');
                     } else {
                         redirect("login/admin_login", "refresh");
                     }
                 }
      public function add_video(){

                       if(!empty($this->session->userdata('admin_data'))){


                         $data['user_name']=$this->load->get_var('user_name');



                         $this->load->view('admin/common/header_view',$data);
                         $this->load->view('admin/video/add_video');
                         $this->load->view('admin/common/footer_view');

                     }
                     else{

                        redirect("login/admin_login","refresh");
                     }

                     }
            public function add_video_data($t,$iw="")

              {

                if(!empty($this->session->userdata('admin_data'))){


            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if($this->input->post())
            {
              // print_r($this->input->post());
              // exit;
              $this->form_validation->set_rules('link', 'link', 'required|xss_clean|trim');

              if($this->form_validation->run()== TRUE)
              {
                $link=$this->input->post('link');

                  $ip = $this->input->ip_address();
          date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("Y-m-d H:i:s");

                  $addedby=$this->session->userdata('admin_id');
                  //========================image_1 upload========================\\
                              // $img1='image';
                              // $nnnn = '';
                              //
                              // $file_check=($_FILES['image']['error']);
                              // if ($file_check!=4) {
                              //     $image_upload_folder = FCPATH . "assets/uploads/video/";
                              //     if (!file_exists($image_upload_folder)) {
                              //         mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                              //     }
                              //     $new_file_name="video_image".date("Ymdhms");
                              //     $this->upload_config = array(
                              //             'upload_path'   => $image_upload_folder,
                              //             'file_name' => $new_file_name,
                              //             'allowed_types' =>'jpg|jpeg|png',
                              //             'max_size'      => 25000
                              //     );
                              //     $this->upload->initialize($this->upload_config);
                              //     if (!$this->upload->do_upload($img1)) {
                              //         $upload_error = $this->upload->display_errors();
                              //         // echo json_encode($upload_error);
                              //         // echo $upload_error;
                              //         $this->session->set_flashdata('emessage', $upload_error);
                              //         redirect($_SERVER['HTTP_REFERER']);
                              //     } else {
                              //         $file_info = $this->upload->data();
                              //
                              //         $videoNAmePath = "assets/uploads/video/".$new_file_name.$file_info['file_ext'];
                              //         $nnnn=$videoNAmePath;
                              //     }
                              // }

          $typ=base64_decode($t);
          if($typ==1){

          $data_insert = array('link'=>$link,
          // 'image'=>$nnnn,
                    'ip' =>$ip,
                    'added_by' =>$addedby,
                    'is_active' =>1,
                    'date'=>$cur_date

                    );


          $last_id=$this->base_model->insert_table("tbl_video",$data_insert,1) ;
          if($last_id!=0){
          $this->session->set_flashdata('smessage','Data inserted successfully');
          redirect("dcadmin/Video/view_video","refresh");
                  }
          }


            if ($typ==2) {
                $idw=base64_decode($iw);


                $this->db->select('*');
                $this->db->from('tbl_video');
                $this->db->where('id', $idw);
                $pro_data= $this->db->get()->row();
                // if (empty($nnnn)) {
                //     $nnnn=$pro_data->image;
                // }
          $data_insert = array('link'=>$link,
// 'image'=>$nnnn,
                    );

            $this->db->where('id', $idw);
            $last_id=$this->db->update('tbl_video', $data_insert);
          }
          //  else {
          //   $data_insert = array('link'=>$link,
          //                 );
          // }
                              if($last_id!=0){
                              $this->session->set_flashdata('smessage','Data updated successfully');
                              redirect("dcadmin/Video/view_video","refresh");
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

          public function update_video($idd)
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
                  $this->db->from('tbl_video');
                  $this->db->where('id', $id);
                  $data['video']= $this->db->get()->row();


                  $this->load->view('admin/common/header_view', $data);
                  $this->load->view('admin/video/update_video');
                  $this->load->view('admin/common/footer_view');
              } else {
                  redirect("login/admin_login", "refresh");
              }
          }

          public function delete_video($idd)
          {
              if (!empty($this->session->userdata('admin_data'))) {
                  $data['image_name']=$this->load->get_var('image_name');

                  $id=base64_decode($idd);

                  if ($this->load->get_var('position')=="Super Admin") {
                      $this->db->from('tbl_video');
                      $this->db->where('id', $id);
                      $dsa= $this->db->get();
                      $da=$dsa->row();

                      $zapak=$this->db->delete('tbl_video', array('id' => $id));
                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Video link deleted successfully');
                          redirect("dcadmin/video/view_video", "refresh");
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
                  $this->load->view('admin/video/view_video');
              }
          }

          public function updatevideoStatus($idd, $t)
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
                      $zapak=$this->db->update('tbl_video', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Video status updated successfully');
                          redirect("dcadmin/Video/view_video", "refresh");
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
                      $zapak=$this->db->update('tbl_video', $data_update);

                      if ($zapak!=0) {
                          $this->session->set_flashdata('smessage', 'Video status updated successfully');
                          redirect("dcadmin/Video/view_video", "refresh");
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
