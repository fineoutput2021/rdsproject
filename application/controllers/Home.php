<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/login_model");
        $this->load->model("admin/base_model");
        $this->load->library('pagination');
    }

    //=================================== INDEX  ========================================
    public function index()
    {
        $this->db->select('*');
        $this->db->from('tbl_slider');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['slider_data']= $this->db->get();

        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['news_data']= $this->db->get();

        // date_default_timezone_set("Asia/Calcutta");
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('is_active', 1);
        // $data['birthday_data']= $this->db->get();
        $member_data= $this->db->get();
        $birth_data=[];
        $i=1;
        foreach ($member_data->result() as $member) {
            if (!empty($member->dob)) {
                $dob=(explode("-", $member->dob));
                // print_r($dob);die();
                if ($dob[1]==date("m") && $dob[2]==date("d")) {
                    $birth_data[] = array(
      'name'=>$member->name,
      'image'=>$member->image,
    );
                }
            }
        }
        // print_r($birth_data);die();
        $data['birthday_data'] = $birth_data;
        $data['birthday_count'] = count($birth_data);
        $this->db->select('*');
        $this->db->from('tbl_video');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['video_data']= $this->db->get();

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/index');
        $this->load->view('frontend/common/footer');
    }

    //======================================= CONTACT FORM SUBMIT =====================================
    public function contact_form_submit()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
            $this->form_validation->set_rules('last', 'last', 'required|xss_clean|trim');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean|trim');
            $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
            $this->form_validation->set_rules('message', 'message', 'required|xss_clean|trim');

            if ($this->form_validation->run()== true) {
                $name=$this->input->post('name');
                $last=$this->input->post('last');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $message=$this->input->post('message');

                $ip = $this->input->ip_address();
                date_default_timezone_set("Asia/Calcutta");
                $cur_date=date("Y-m-d H:i:s");

                $data_insert = array('name'=>$name." ".$last,
                    'email'=>$email,
                    'phone'=>$phone,
                    'message'=>$message,
                    'ip' =>$ip,
                    'date'=>$cur_date
                    );


                $last_id=$this->base_model->insert_table("tbl_contactus", $data_insert, 1) ;

                if ($last_id!=0) {
                    $this->session->set_flashdata('smessage', "Thank you! Your request submitted successfully!");
                    redirect("/", "refresh");
                }
            } else {
                $this->session->set_flashdata('emessage', validation_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('emessage', 'Please insert some data, No data available');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    //===================================== ABOUT US =========================
    public function about_us()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/about');
        $this->load->view('frontend/common/footer');
    }
    //===================================== ALL VIDEOS =========================
    public function all_video()
    {
        $this->db->select('*');
        $this->db->from('tbl_video');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['video_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/all_video');
        $this->load->view('frontend/common/footer');
    }


    //===================================== EXECUTIVE COUNCIL =========================
    public function executive_council()
    {
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('is_active', 1);
        $this->db->where('exe', 1);
        $data['executive_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/executive_council');
        $this->load->view('frontend/common/footer');
    }

    //===================================== OFFICER DETAILS =========================
    public function officer_details($idd)
    {
        $id=base64_decode($idd);
        $data['id']=$idd;
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('id', $id);
        $this->db->where('is_active', 1);
        $data['member_data']= $this->db->get()->row();

        $this->db->select('*');
        $this->db->from('tbl_posting');
        $this->db->where('member_id', $id);
        $this->db->order_by('id', 'desc');
        $this->db->where('is_active', 1);
        $data['posting_data']= $this->db->get();

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/officer_details');
        $this->load->view('frontend/common/footer');
    }

    //==================================== MEMBERS ==============================
    public function members($t="")
    {
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('is_active', 1);
        $this->db->where('exe', 2);
        $this->db->order_by('id', 'desc');
        $count = $this->db->count_all_results();
        // echo count;
        $config['base_url'] = base_url().'Home/members/';
        // echo $count;
        // exit;
        $per_page = 15;
        $config['total_rows'] = $count;
        $config['per_page'] = $per_page;
        $config['num_links'] = 5;

        $config['full_tag_open'] = '<ul class="pagination">';

        $config['full_tag_close'] = '</ul>';

        $config['use_page_numbers'] = true;

        $config['next_link'] = 'First';
        $config['first_tag_open'] = '<li class="first page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="last page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = ' Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);
        if (!empty($t)) {
            $page = $t;
            $i = $per_page * ($page - 1) + 1;
            $start = ($page - 1) * $config['per_page'];
        } else {
            $page = 0;
            $start = 0;

            $i=1;
        }
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('is_active', 1);
        $this->db->where('exe', 2);
        $this->db->order_by('id', 'desc');
        $this->db->limit($config["per_page"], $start);
        $members = $this->db->get();
        $data['links'] = $this->pagination->create_links();
        $data['members_data'] = $members;
        $data['i'] = $i;



        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/members');
        $this->load->view('frontend/common/footer');
    }
    //============================search===============================\\
    public function search_members()
    {
        $this->load->view('frontend/common/header');
        $this->load->view('frontend/search_members');
        $this->load->view('frontend/common/footer');
    }
    //============================magazine===============================\\
    public function magazines()
    {
        $this->db->select('*');
        $this->db->from('tbl_magazine');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['magazine_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/magazine');
        $this->load->view('frontend/common/footer');
    }
    //============================letters & memorandum ===============================\\
    public function letters_memorandum()
    {
        $this->db->select('*');
        $this->db->from('tbl_letters_memorandum');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['letters_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/letters_and_memorandum');
        $this->load->view('frontend/common/footer');
    }
    //============================important & memorandum ===============================\\
    public function important_acts_and_rules()
    {
        $this->db->select('*');
        $this->db->from('tbl_important_acts_rules');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['important_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/important_acts_rules');
        $this->load->view('frontend/common/footer');
    }
    //============================ important website ===============================\\

    public function important_website()
    {
        $this->db->select('*');
        $this->db->from('tbl_important_website');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['important_website_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/important_website');
        $this->load->view('frontend/common/footer');
    }

    //==============  Gallery ==============================

    public function gallery()
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['gallery_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/gallery');
        $this->load->view('frontend/common/footer');
    }
    //==============  Gallery slider ==============================

    public function gallery_slider($idd)
    {
        $id=base64_decode($idd);
        $data['id']=$idd;
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('is_active', 1);
        $this->db->where('id', $id);
        $data['gallery_data']= $this->db->get()->row();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/gallery_slider');
        $this->load->view('frontend/common/footer');
    }
    //====================================================== ALL NEWS ===========================

    public function all_news()
    {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'desc');
        $data['news_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/all_news');
        $this->load->view('frontend/common/footer');
    }
    //====================================================== MEMBER LOGIN ===========================

    public function login()
    {
        if (empty($this->session->userdata('member_data'))) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
                $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');


                if ($this->form_validation->run()== true) {
                    $email=$this->input->post('email');
                    $password=$this->input->post('password');

                    $this->db->select('*');
                    $this->db->from('tbl_member');
                    $this->db->where('email', $email);
                    $member_data= $this->db->get()->row();


                    if (!empty($member_data)) {
                        if ($member_data->is_active==1) {
                            if ($member_data->password==md5($password)) {
                                // echo "hi";die();
                                $this->session->set_userdata('member_data', 1);
                                $this->session->set_userdata('member_id', $member_data->id);
                                $this->session->set_userdata('member_name', $member_data->name);

                                $this->session->set_flashdata('smessage', 'Successfully Login');
                                redirect($_SERVER['HTTP_REFERER']);
                            } else {
                                $this->session->set_flashdata('emessage', 'Wrong Password');
                                redirect($_SERVER['HTTP_REFERER']);
                            }
                        } else {
                            $this->session->set_flashdata('emessage', 'Member is blocked! Please contact to admin');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        $this->session->set_flashdata('emessage', 'Member Not Found');
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
            redirect("/", "refresh");
        }
    }

    //======================== MEMBER LOGOUT ============================
    public function logout()
    {
        if (!empty($this->session->userdata('member_data'))) {
            $this->session->unset_userdata('member_data');
            $this->session->unset_userdata('member_id');
            $this->session->unset_userdata('member_name');
            $this->session->set_flashdata('smessage', 'Successfully Logout');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            redirect("/", "refresh");
        }
    }

    //====================== MY PROFILE =======================================
    public function my_profile($idd)
    {
        if (!empty($this->session->userdata('member_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_member');
            $this->db->where('id', $id);
            $this->db->where('is_active', 1);
            $data['member_data']= $this->db->get()->row();

            $this->db->select('*');
            $this->db->from('tbl_pending_dues');
            $this->db->where('member_id', $id);
            $this->db->where('is_active', 1);
            $data['pending_data']= $this->db->get();
            $total = 0;
            foreach ($data['pending_data']->result() as $pending) {
                $total = $total + $pending->amount;
            }
            $data['total_pending']=$total;
            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/my_profile');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }
    //====================== View Paid Amount =======================================
    public function view_all_paid($idd)
    {
        if (!empty($this->session->userdata('member_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;
            $this->db->select('*');
            $this->db->from('tbl_pending_dues');
            $this->db->where('member_id', $id);
            $this->db->where('is_active', 0);
            $data['paid_data']= $this->db->get();

            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/all_paid');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }
    //====================== View dues Amount =======================================
    public function view_all_dues($idd)
    {
        if (!empty($this->session->userdata('member_data'))) {
            $id=base64_decode($idd);
            $data['id']=$idd;
            // echo $id;die();
            $this->db->select('*');
            $this->db->from('tbl_pending_dues');
            $this->db->where('member_id', $id);
            $this->db->where('is_active', 1);
            $data['pending_data']= $this->db->get();

            $this->load->view('frontend/common/header', $data);
            $this->load->view('frontend/all_due');
            $this->load->view('frontend/common/footer');
        } else {
            redirect("/", "refresh");
        }
    }
    //====================== Search Member  =======================================
    public function search_member()
    {
        $string = $_GET['string'];
        $data['string'] = $string;
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->like('name', $string);
        $data['seach_data']= $this->db->get();

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/search_member');
        $this->load->view('frontend/common/footer');
    }
    //====================================================== 404 ===========================
    public function error404()
    {
        $this->load->view('errors/error404');
    }
    //------form forgot password submit-----

    public function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    //========================forgot password email submit===================================
    public function form_submit_forgotpassword()
    {
        if (empty($this->session->userdata('user_data'))) {
            $this->load->helper(array( 'form', 'url' ));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('reset_email', 'reset_email', 'required|valid_email|xss_clean|trim');

                if ($this->form_validation->run() == true) {
                    $email = $this->input->post('reset_email');


                    $this->db->select('*');
                    $this->db->from('tbl_member');
                    $this->db->where('email', $email);
                    $user_data= $this->db->get()->row();
                    // print_r($user_data);
                    // exit;
                    if (!empty($user_data)) {
                        if ($user_data->is_active==1) {
                            $user_id=$user_data->id;
                            $user_name=$user_data->name;
                            $user_email=$user_data->email;
                            $ip = $this->input->ip_address();
                            date_default_timezone_set("Asia/Calcutta");
                            $cur_date=date("Y-m-d H:i:s");

                            //generate unique string number for txn_id

                            $txn_id=  $this->generateRandomString(6);

                            $data_insert = array('member_id'=>$user_id,
                                                                           'txn_id'=>$txn_id,
                                                                           'status'=>0,
                                                                           'ip'=>$ip,
                                                                           'date'=>$cur_date
                                                                           );

                            $last_id=$this->base_model->insert_table("tbl_forgot_pass", $data_insert, 1) ;
                            $link = base_url()."Home/forget_password_reset/".$txn_id;
                            $forgot_password_data = array('user_name'=>$user_name,
                                                      'link'=>$link

                                                   );

                            $config = array(
                                                            'protocol' => 'smtp',
                                                        'smtp_host' => SMTP_HOST,
                                                        'smtp_port' => SMTP_PORT,
                                                        'smtp_user' => USER_NAME, // change it to yours
                                                        'smtp_pass' => PASSWORD, // change it to yours
                                                        'mailtype' => 'html',
                                                        'charset' => 'iso-8859-1',
                                                        'wordwrap' => true
                                                             );
                            $to=$user_email;

                            $message = 	$this->load->view('email/forgetpassword', $forgot_password_data, true);

                            $this->load->library('email', $config);
                            $this->email->set_newline("");
                            $this->email->from(EMAIL); // change it to yours
                                                    $this->email->to($to);// change it to yours
                                                    $this->email->subject('Reset Your Password');
                            $this->email->message($message);
                            if ($this->email->send()) {
                                // echo 'Email sent.';
                            } else {
                                show_error($this->email->print_debugger());
                            }

                            $this->session->set_flashdata('smessage', 'Password reset link has been sent successfully');
                            redirect('/');
                        } else {
                            $this->session->set_flashdata('emessage', 'Your account is inactive. Please contact admin.');
                            redirect($_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        $this->session->set_flashdata('emessage', 'User does not exists');
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
            redirect("/", "refresh");
        }
    }

    //---forget-password-reset-----
    public function forget_password_reset($t)
    {
        if (empty($this->session->userdata('user_data'))) {
            $id=$t;
            $this->db->select('*');
            $this->db->from('tbl_forgot_pass');
            $this->db->where('txn_id', $id);
            $u1= $this->db->get()->row();
            $st=$u1->status;

            if ($st==0) {
                $data_update = array('status'=>1);
                $this->db->where('status', $u1->status);
                $zapak=$this->db->update('tbl_forgot_pass', $data_update);
                $data['auth']=$id;

                $this->load->view('frontend/common/header', $data);
                $this->load->view('frontend/forgotpass');
                $this->load->view('frontend/common/footer', $data);
            } else {
                $this->session->set_flashdata('emessage', 'Link already used');
                redirect("/");
            }
        } else {
            redirect("/", "refresh");
        }
    }
    ////-------update password------
    public function update_password($t)
    {
        if (empty($this->session->userdata('user_data'))) {
            $txn_id=$t;

            $this->db->select('*');
            $this->db->from('tbl_forgot_pass');
            $this->db->where('txn_id', $txn_id);
            $u2= $this->db->get()->row();
            $ui=$u2->member_id;
            $data['auth']=$txn_id;
            $this->load->helper(array( 'form', 'url' ));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if ($this->input->post()) {
                $this->form_validation->set_rules('reset_password', 'reset_password', 'required|xss_clean|trim');

                if ($this->form_validation->run() == true) {
                    $reset_password = $this->input->post('reset_password');

                    $this->db->select('*');
                    $this->db->from('tbl_member');
                    $this->db->where('id', $ui);
                    $this->db->where('is_active', 1);
                    $user= $this->db->get()->row();

                    if (!empty($user)) {
                        $rs=md5($reset_password);
                        $data_update = array('password'=>$rs);

                        $this->db->where('password', $user->password);
                        $this->db->where('id', $user->id);
                        $zapak=$this->db->update('tbl_member', $data_update);

                        if ($zapak!=0) {
                            $this->session->set_flashdata('smessage', 'Password reset successfully');
                            redirect("/", "refresh");
                        }
                    } else {
                        $this->session->set_flashdata('emessage', 'User not found');
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
            redirect("/", "refresh");
        }
    }
}
