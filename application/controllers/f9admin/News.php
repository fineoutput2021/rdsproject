<?php

        if (! defined('BASEPATH')) {
            exit('No direct script access allowed');
        }
             require_once(APPPATH . 'core/CI_finecontrol.php');
             class News extends CI_finecontrol
             {
                 public function __construct()
                 {
                     parent::__construct();
                     $this->load->model("login_model");
                     $this->load->model("admin/base_model");
                     $this->load->library('user_agent');
                     $this->load->library('upload');
                 }

                 public function view_news()
                 {
                     if (!empty($this->session->userdata('admin_data'))) {
                         $data['user_name']=$this->load->get_var('user_name');

                         $this->db->select('*');
                         $this->db->from('tbl_news');
                         // $this->db->order_by('id','desc');
                         $data['news_data']= $this->db->get();

                         $this->load->view('admin/common/header_view', $data);
                         $this->load->view('admin/news/view_news');
                         $this->load->view('admin/common/footer_view');
                     } else {
                         redirect("login/admin_login", "refresh");
                     }
                 }
      public function add_news(){

                       if(!empty($this->session->userdata('admin_data'))){


                         $data['user_name']=$this->load->get_var('user_name');

                         // echo SITE_NAME;
                         // echo $this->session->userdata('image');
                         // echo $this->session->userdata('position');
                         // exit;


                         $this->load->view('admin/common/header_view',$data);
                         $this->load->view('admin/news/add_news');
                         $this->load->view('admin/common/footer_view');

                     }
                     else{

                        redirect("login/admin_login","refresh");
                     }

                     }
 public function add_news_data($t,$iw="")

                       {

                         if(!empty($this->session->userdata('admin_data'))){


                     $this->load->helper(array('form', 'url'));
                     $this->load->library('form_validation');
                     $this->load->helper('security');
                     if($this->input->post())
                     {
          $this->form_validation->set_rules('news_heading', 'news_heading', 'required|xss_clean|trim');

                       if($this->form_validation->run()== TRUE)
                       {
          $news_heading=$this->input->post('news_heading');


        $img1='file';



        $file_check=($_FILES['file']['error']);
        if ($file_check!=4) {
                 $image_upload_folder = FCPATH . "assets/uploads/news/";
                             if (!file_exists($image_upload_folder))
                             {
                                 mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                             }
                             $new_file_name="news".date("Ymdhms");
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

                                 $videoNAmePath = "assets/uploads/news/".$new_file_name.$file_info['file_ext'];
                                 $file_info['new_name']=$videoNAmePath;
                                 // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                 $nnnn=$file_info['file_name'];
                                 $nnnn1=$videoNAmePath;

                                 // echo json_encode($file_info);
                             }
        }

        $ip = $this->input->ip_address();
        date_default_timezone_set("Asia/Calcutta");
        $cur_date=date("Y-m-d H:i:s");
        $addedby=$this->session->userdata('admin_id');

       $typ=base64_decode($t);
       $last_id = 0;
       if($typ==1){

                   $data_insert = array(
'news_heading'=>$news_heading,
          'file'=>$nnnn1,
                             'ip' =>$ip,
                             'added_by' =>$addedby,
                             'is_active' =>1,
                             'date'=>$cur_date
                             );


                   $last_id=$this->base_model->insert_table("tbl_news",$data_insert,1) ;
                   if($last_id!=0){
                           $this->session->set_flashdata('smessage','Data inserted successfully');
                           redirect("dcadmin/news/view_news","refresh");
                          }
                   }
                   if($typ==2){

            $idw=base64_decode($iw);


         $this->db->select('*');
         $this->db->from('tbl_news');
         $this->db->where('id',$idw);
         $dsa=$this->db->get();
         $da=$dsa->row();



        $img1='file';

        $file_check=($_FILES['file']['error']);
        if ($file_check!=4) {
                 $image_upload_folder = FCPATH . "assets/uploads/news/";
                             if (!file_exists($image_upload_folder))
                             {
                                 mkdir($image_upload_folder, DIR_WRITE_MODE, true);
                             }
                             $new_file_name="news".date("Ymdhms");
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

                                 $videoNAmePath = "assets/uploads/news/".$new_file_name.$file_info['file_ext'];
                                 $file_info['new_name']=$videoNAmePath;
                                 // $this->step6_model->updateappIconImage($imageNAmePath,$appInfoId);
                                 $nnnn=$file_info['file_name'];
                                 $nnnn1=$videoNAmePath;

                                 // echo json_encode($file_info);
                             }
        }



         if(!empty($da)){ $img = $da ->file;
        if(!empty($img)) { if(empty($nnnn1)){ $nnnn1 = $img; } }else{ if(empty($nnnn1)){ $nnnn1= ""; } } }
                   $data_insert = array(
                          'news_heading'=>$news_heading,
          'file'=>$nnnn1,

                             );
                     $this->db->where('id', $idw);
                     $last_id=$this->db->update('tbl_news', $data_insert);
                   }
                               if($last_id!=0){
                                       $this->session->set_flashdata('smessage','Data updated successfully');
                                       redirect("dcadmin/News/view_news","refresh");
                                      }
                                       else
                                           {
                                            $this->session->set_flashdata('emessage','Sorry error occured');
                                            redirect($_SERVER['HTTP_REFERER']);
                                          }
                       }
                     else{
         //
                $this->session->set_flashdata('emessage',validation_errors());
              redirect($_SERVER['HTTP_REFERER']);
         //
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


  public function update_news($idd)
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
                    $this->db->from('tbl_news');
                    $this->db->where('id', $id);
                    $data['news']= $this->db->get()->row();


                    $this->load->view('admin/common/header_view', $data);
                    $this->load->view('admin/news/update_news');
                    $this->load->view('admin/common/footer_view');
                   } else {
                    redirect("login/admin_login", "refresh");
                   }
                   }



    public function updatenewsStatus($idd, $t)
                   {
                       if (!empty($this->session->userdata('admin_data'))) {
                           $data['user_name']=$this->load->get_var('user_name');

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
                               $zapak=$this->db->update('tbl_news', $data_update);

                               if ($zapak!=0) {
                                    $this->session->set_flashdata('smessage', 'Status updated successfully');
                                   redirect("dcadmin/news/view_news", "refresh");
                               } else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occured');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }
                           }
                           if ($t=="inactive") {
                               $data_update = array(
                                 'is_active'=>0

                                 );

                               $this->db->where('id', $id);
                               $zapak=$this->db->update('tbl_news', $data_update);

                               if ($zapak!=0) {
                                   $this->session->set_flashdata('smessage', 'Status updated successfully');
                                   redirect("dcadmin/news/view_news", "refresh");
                               } else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occured');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }
                           }
                       } else {
                           redirect("login/admin_login", "refresh");
                       }
                   }



                   public function delete_news($idd)
                   {
                       if (!empty($this->session->userdata('admin_data'))) {
                           $data['user_name']=$this->load->get_var('user_name');

                           $id=base64_decode($idd);

                           if ($this->load->get_var('position')=="Super Admin") {

                             // $this->db->select('image');
                               // $this->db->from('tbl_blog');
                               // $this->db->where('id',$id);
                               // $dsa= $this->db->get();
                               // $da=$dsa->row();
                               // $img=$da->image;

                               $zapak=$this->db->delete('tbl_news', array('id' => $id));
                               if ($zapak!=0) {
                                   // $path = FCPATH .$img;
                                   //   unlink($path);
                                     $this->session->set_flashdata('smessage', 'News deleted successfully');
                                   redirect("dcadmin/news/view_news", "refresh");
                               } else {
                                   $this->session->set_flashdata('emessage', 'Sorry error occured');
                                   redirect($_SERVER['HTTP_REFERER']);
                               }
                           } else {
                               $this->session->set_flashdata('emessage', 'Sorry you not a super admin you dont have permission to delete anything');
                               redirect($_SERVER['HTTP_REFERER']);
                           }
                       } else {
                           redirect("login/admin_login", "refresh");
                       }
                   }
             }
