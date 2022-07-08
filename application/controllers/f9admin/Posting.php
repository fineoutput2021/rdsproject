<?php

        if (! defined('BASEPATH')) {
            exit('No direct script access allowed');
        }
             require_once(APPPATH . 'core/CI_finecontrol.php');
             class Posting extends CI_finecontrol
             {
                 public function __construct()
                 {
                     parent::__construct();
                     $this->load->model("login_model");
                     $this->load->model("admin/base_model");
                     $this->load->library('user_agent');
                     $this->load->library('upload');
                 }

                 public function view_posting($idd)
                 {
                     if (!empty($this->session->userdata('admin_data'))) {
                         $data['user_name']=$this->load->get_var('user_name');
                         $id=base64_decode($idd);
                         $data['id']=$idd;
                       $this->db->select('*');
                         $this->db->from('tbl_posting');
                     $this->db->where('member_id',$id);
                         $data['posting_data']= $this->db->get();

                         $this->load->view('admin/common/header_view', $data);
                         $this->load->view('admin/posting/view_posting');
                         $this->load->view('admin/common/footer_view');
                     } else {
                         redirect("login/admin_login", "refresh");
                     }
                 }
                 public function add_posting($idd){

                                  if(!empty($this->session->userdata('admin_data'))){


                                    $data['user_name']=$this->load->get_var('user_name');

                                     $id=base64_decode($idd);
                                    $data['id']=$idd;

                                    $this->load->view('admin/common/header_view',$data);
                                    $this->load->view('admin/posting/add_posting');
                                    $this->load->view('admin/common/footer_view');

                                }
                                else{

                                   redirect("login/admin_login","refresh");
                                }

                                }
                                public function add_posting_data($t,$iw="")

                                  {

                                    if(!empty($this->session->userdata('admin_data'))){


                                $this->load->helper(array('form', 'url'));
                                $this->load->library('form_validation');
                                $this->load->helper('security');
                                if($this->input->post())
                                {
                                  // print_r($this->input->post());
                                  // exit;
                                  $this->form_validation->set_rules('member_id', 'member_id', 'required|xss_clean|trim');
                                  $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
                                  $this->form_validation->set_rules('date_from', 'date_from', 'xss_clean|trim');
                                  $this->form_validation->set_rules('date_to', 'date_to', 'xss_clean|trim');

                                  if($this->form_validation->run()== TRUE)
                                  {
                                    $member_id=$this->input->post('member_id');
                                    $member_id_decode = base64_decode($member_id);
                                    $name=$this->input->post('name');
                                    $date_from=$this->input->post('date_from');
                                    $date_to=$this->input->post('date_to');

                                      $ip = $this->input->ip_address();
                              date_default_timezone_set("Asia/Calcutta");
                                      $cur_date=date("Y-m-d H:i:s");

                                      $addedby=$this->session->userdata('admin_id');

                              $typ=base64_decode($t);
                              if($typ==1){

                              $data_insert = array('member_id'=>$member_id_decode,
                                'name'=>$name,
                                        'date_from'=>$date_from,
                                        'date_to'=>$date_to,
                                        'ip' =>$ip,
                                        'added_by' =>$addedby,
                                        'is_active' =>1,
                                        'date'=>$cur_date

                                        );





                              $last_id=$this->base_model->insert_table("tbl_posting",$data_insert,1) ;
                              if($last_id!=0){
                              $this->session->set_flashdata('smessage','Data inserted successfully');
                              redirect("dcadmin/Posting/view_posting/".$member_id,"refresh");

                                      }

                              }
                              if($typ==2){

                            $idw=base64_decode($iw);



                              $data_insert = array(
                                'member_id'=>$member_id_decode,
                                'name'=>$name,
                                        'date_from'=>$date_from,
                                        'date_to'=>$date_to,
                                        );

                                $this->db->where('id', $idw);
                                $last_id=$this->db->update('tbl_posting', $data_insert);

                              }


                                                  if($last_id!=0){
                                                  $this->session->set_flashdata('smessage','Data updated successfully');
                                                  redirect("dcadmin/Posting/view_posting","refresh");
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
                              // public function update_posting($idd)
                              // {
                              //     if (!empty($this->session->userdata('admin_data'))) {
                              //         $data['image_name']=$this->load->get_var('image_name');
                              //
                              //         // echo SITE_NAME;
                              //         // echo $this->session->userdata('image');
                              //         // echo $this->session->userdata('position');
                              //         // exit;
                              //         $id=base64_decode($idd);
                              //         $data['id']=$idd;
                              //
                              //         $this->db->select('*');
                              //         $this->db->from('tbl_posting');
                              //         $this->db->where('memberid', $id);
                              //         $data['posting']= $this->db->get()->row();
                              //
                              //
                              //         $this->load->view('admin/common/header_view', $data);
                              //         $this->load->view('admin/posting/update_posting');
                              //         $this->load->view('admin/common/footer_view');
                              //     } else {
                              //         redirect("login/admin_login", "refresh");
                              //     }
                              // }

                              public function delete_posting($idd)
                              {
                                  if (!empty($this->session->userdata('admin_data'))) {
                                      $data['image_name']=$this->load->get_var('image_name');

                                      $id=base64_decode($idd);

                                      if ($this->load->get_var('position')=="Super Admin") {
                                          $this->db->from('tbl_posting');
                                        $this->db->where('member_id', $id);

                                          $data['posting']= $this->db->get();

                                          $zapak=$this->db->delete('tbl_posting', array('id' => $id));
                                          if ($zapak!=0) {
                                              $this->session->set_flashdata('smessage', 'Present Posting deleted successfully');
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
                                      $this->load->view('admin/posting/view_posting');
                                  }
                              }

                              // public function updatepostingStatus($idd, $t)
                              // {
                              //     if (!empty($this->session->userdata('admin_data'))) {
                              //         $data['image_name']=$this->load->get_var('image_name');
                              //
                              //         // echo SITE_NAME;
                              //         // echo $this->session->userdata('image');
                              //         // echo $this->session->userdata('position');
                              //         // exit;
                              //         $id=base64_decode($idd);
                              //
                              //         if ($t=="active") {
                              //             $data_update = array(
                              //     'is_active'=>1
                              //
                              //     );
                              //
                              //             $this->db->where('id', $id);
                              //             $zapak=$this->db->update('tbl_posting', $data_update);
                              //
                              //             if ($zapak!=0) {
                              //                 $this->session->set_flashdata('smessage', 'Status updated successfully');
                              //                 redirect("dcadmin/Posting/view_posting", "refresh");
                              //             } else {
                              //                 echo "Error";
                              //                 exit;
                              //             }
                              //         }
                              //         if ($t=="inactive") {
                              //             $data_update = array(
                              //      'is_active'=>0
                              //
                              //      );
                              //
                              //             $this->db->where('id', $id);
                              //             $zapak=$this->db->update('tbl_posting', $data_update);
                              //
                              //             if ($zapak!=0) {
                              //                 $this->session->set_flashdata('smessage', 'Status updated successfully');
                              //                 redirect("dcadmin/Posting/view_posting", "refresh");
                              //             } else {
                              //                 $data['e']="Error Occured";
                              //                 // exit;
                              //                 $this->load->view('errors/error500admin', $data);
                              //             }
                              //         }
                              //     } else {
                              //         $this->load->view('admin/login/index');
                              //     }
                              // }
}
