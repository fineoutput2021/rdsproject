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
        // $this->db->select('*');
        // $this->db->from('tbl_member');
        // $this->db->where('is_active', 1);
        // $this->db->where('exe', 2);
        // $this->db->order_by('id', 'desc');
        // $data['members_data']= $this->db->get();

        if ($t == 1) {
          $this->db->select('*');
          $this->db->from('tbl_member');
          $this->db->where('is_active', 1);
          $this->db->where('exe', 2);
          $this->db->order_by('id', 'desc');
            $count = $this->db->count_all_results();
            // echo $count;
            // exit;
            $config['base_url'] = base_url().'Home/members/';
            // echo $count;
            // exit;
            $config['total_rows'] = $count;

            $config['per_page'] = 2;

            $config['uri_segment'] = 5;

            $config['full_tag_open'] = '<ul class="b-diw" style="list-style-type:none; display: flex; margin-bottom: 48px;">';

            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'First';

            $config['last_link'] = 'Last';

            $config['first_tag_open'] = '<li  class="btn bro-3" style="font-size:20px;">';

            $config['first_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';

            $config['prev_tag_open'] = '<li class="prev btn bro-3">';

            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';

            $config['next_tag_open'] = '<li  class="btn bro-3">';

            $config['next_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li  class="btn bro-2">';

            $config['last_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active btn bro-2" style="background-color:#2e3e4e; color:white; text-align:center;" >';

            $config['cur_tag_close'] = '</a></li >';

            $config['num_tag_open'] = '<li class="btn bro-3">';

            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);

            // $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            // echo $page;
            // exit;

            $this->db->select('*');
            $this->db->from('tbl_member');
            $this->db->where('is_active', 1);
            $this->db->where('exe', 2);
            $this->db->order_by('id', 'desc');
            $this->db->limit($config["per_page"], 0);
            $members = $this->db->get();




            $data['links'] = $this->pagination->create_links();
            // print_r($data['links']);
            // exit;

            $data['member_data'] = $members;
        } else {
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
            $config['total_rows'] = $count;

            $config['per_page'] = 2;

            $config['uri_segment'] = 5;

            $config['full_tag_open'] = '<ul class="b-diw" style="list-style-type:none; display: flex; margin-bottom: 48px;">';

            $config['full_tag_close'] = '</ul>';

            $config['first_link'] = 'First';

            $config['last_link'] = 'Last';

            $config['first_tag_open'] = '<li class="btn bro-4">';

            $config['first_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';

            $config['prev_tag_open'] = '<li class="btn bro-4" class="prev">';

            $config['prev_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';

            $config['next_tag_open'] = '<li>';

            $config['next_tag_close'] = '</li>';

            $config['last_tag_open'] = '<li>';

            $config['last_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active btn bro-2"><a href="'.base_url().'/Home/members">';

            $config['cur_tag_close'] = '</a></li >';

            $config['num_tag_open'] = '<li class="btn bro-3">';

            $config['num_tag_close'] = '</li>';



            $this->pagination->initialize($config);
            // $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            // echo $page;
            // exit;
            if (!empty($t)) {
                $page = $t;
            } else {
                $page = 0;
            }

            $this->db->select('*');
          $this->db->from('tbl_member');
          $this->db->where('is_active', 1);
          $this->db->where('exe', 2);
          $this->db->order_by('id', 'desc');
            $this->db->limit($config["per_page"], $page);
            $members = $this->db->get();


            $data['links'] = $this->pagination->create_links();
            // print_r($data['links']);
            // exit;

            $data['members_data'] = $members;
        }


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
        // $this->db->order_by('id', 'desc');
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
      if(empty($this->session->userdata('member_data'))){

          $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('security');
        if($this->input->post())
        {
        $this->form_validation->set_rules('email', 'email', 'required|xss_clean|trim');
        $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim');


        	if($this->form_validation->run()== TRUE)
        	{

            $email=$this->input->post('email');
        			 $password=$this->input->post('password');

            $this->db->select('*');
            $this->db->from('tbl_member');
            $this->db->where('email',$email);
            $member_data= $this->db->get()->row();


            if(!empty($member_data)){
              if($member_data->is_active==1){
                if($member_data->password==md5($password)){
                    // echo "hi";die();
                  $this->session->set_userdata('member_data',1);
                  $this->session->set_userdata('member_id',$member_data->id);
                  $this->session->set_userdata('member_name',$member_data->name);

                  $this->session->set_flashdata('smessage', 'Successfully Login');
                  redirect($_SERVER['HTTP_REFERER']);

                }else{
                  $this->session->set_flashdata('emessage','Wrong Password');
                  redirect($_SERVER['HTTP_REFERER']);
                }

              }else{
                $this->session->set_flashdata('emessage','Member is blocked! Please contact to admin');
                redirect($_SERVER['HTTP_REFERER']);
              }
            }else{
              $this->session->set_flashdata('emessage','Member Not Found');
              redirect($_SERVER['HTTP_REFERER']);
            }

        }else{

        $this->session->set_flashdata('emessage',validation_errors());
        redirect($_SERVER['HTTP_REFERER']);

        }

        }
        else{

        $this->session->set_flashdata('emessage','Please insert some data, No data available');
        redirect($_SERVER['HTTP_REFERER']);

        }
      }else{
      redirect("/","refresh");
      }

    }

//======================== MEMBER LOGOUT ============================
public function logout(){
if(!empty($this->session->userdata('member_data'))){
  $this->session->unset_userdata('member_data');
  $this->session->unset_userdata('member_id');
  $this->session->unset_userdata('member_name');
  $this->session->set_flashdata('smessage', 'Successfully Logout');
  redirect($_SERVER['HTTP_REFERER']);

}else{
redirect("/","refresh");
}
}

//====================== MY PROFILE =======================================
public function my_profile($idd){
  if(!empty($this->session->userdata('member_data'))){
     $id=base64_decode($idd);
    $data['id']=$idd;
    $this->db->select('*');
    $this->db->from('tbl_member');
    $this->db->where('id',$id);
    $this->db->where('is_active',1);
    $data['member_data']= $this->db->get()->row();

    $this->db->select('*');
    $this->db->from('tbl_pending_dues');
    $this->db->where('member_id',$id);
    $this->db->where('is_active',1);
    $data['pending_data']= $this->db->get();
    $total = 0;
    foreach($data['pending_data']->result() as $pending) {
      $total = $total + $pending->amount;
    }
    $data['total_pending']=$total;
    $this->load->view('frontend/common/header', $data);
    $this->load->view('frontend/my_profile');
    $this->load->view('frontend/common/footer');
  }else{
  redirect("/","refresh");
  }
}
//====================== View Paid Amount =======================================
public function view_all_paid($idd){
  if(!empty($this->session->userdata('member_data'))){
     $id=base64_decode($idd);
    $data['id']=$idd;
    $this->db->select('*');
    $this->db->from('tbl_pending_dues');
    $this->db->where('member_id',$id);
    $this->db->where('is_active',0);
    $data['paid_data']= $this->db->get();

    $this->load->view('frontend/common/header', $data);
    $this->load->view('frontend/all_paid');
    $this->load->view('frontend/common/footer');
  }else{
  redirect("/","refresh");
  }
}
//====================== View dues Amount =======================================
public function view_all_dues($idd){
  if(!empty($this->session->userdata('member_data'))){
     $id=base64_decode($idd);
    $data['id']=$idd;
    // echo $id;die();
    $this->db->select('*');
    $this->db->from('tbl_pending_dues');
    $this->db->where('member_id',$id);
    $this->db->where('is_active',1);
    $data['pending_data']= $this->db->get();

    $this->load->view('frontend/common/header', $data);
    $this->load->view('frontend/all_due');
    $this->load->view('frontend/common/footer');
  }else{
  redirect("/","refresh");
  }
}
//====================== Search Member  =======================================
public function search_member(){

    $string = $_GET['string'];
    $data['string'] = $string;
    $this->db->select('*');
    $this->db->from('tbl_member');
    $this->db->like('name',$string);
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
}
