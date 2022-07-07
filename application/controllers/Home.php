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
        $data['news_data']= $this->db->get();


        $this->db->select('*');
        $this->db->from('tbl_video');
        $this->db->where('is_active', 1);
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
        $this->db->where('is_active', 1);
        $data['posting_data']= $this->db->get();

        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/officer_details');
        $this->load->view('frontend/common/footer');
    }

    //==================================== MEMBERS ==============================
    public function members()
    {
        $this->db->select('*');
        $this->db->from('tbl_member');
        $this->db->where('is_active', 1);
        $this->db->where('exe', 2);
        $data['members_data']= $this->db->get();

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
        $data['gallery_data']= $this->db->get();
        $this->load->view('frontend/common/header', $data);
        $this->load->view('frontend/gallery');
        $this->load->view('frontend/common/footer');
    }

    public function error404()
    {
        $this->load->view('errors/error404');
    }
}
