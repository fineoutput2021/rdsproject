<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
function __construct()
		{
			parent::__construct();
			$this->load->model("admin/login_model");
			$this->load->model("admin/base_model");
		}
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



		$this->load->view('frontend/common/header',$data);
		$this->load->view('frontend/index');
		$this->load->view('frontend/common/footer');

	}
      			public function contact_form_submit()
              {

          	$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('security');
            if($this->input->post())
            {
              // print_r($this->input->post());
              // exit;
              $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim');
              $this->form_validation->set_rules('last', 'last', 'required|xss_clean|trim');
              $this->form_validation->set_rules('email', 'email', 'required|valid_email|xss_clean|trim');
              $this->form_validation->set_rules('phone', 'phone', 'required|xss_clean|trim');
              $this->form_validation->set_rules('message', 'message', 'required|xss_clean|trim');

              if($this->form_validation->run()== TRUE)
              {
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


          $last_id=$this->base_model->insert_table("tbl_contactus",$data_insert,1) ;

                                        if($last_id!=0){
																					$this->session->set_flashdata('smessage', "Thank you! Your request submitted successfully!");
				redirect("/", "refresh");
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



	public function error404()
		{
				$this->load->view('errors/error404');

		}



	// public function blog()
	// {
	//
	//
	// 											$this->db->select('*');
	// 											$this->db->from('tbl_blog');
	// 											$this->db->where('is_active',1);
	// 											$this->db->order_by('blog_id', 'DESC');
	// 											$data['blog_data']= $this->db->get();
	//
	//
	//
	//
	// 		$this->load->view('blog/header',$data);
	// 		$this->load->view('blog/blog');
	// 		$this->load->view('blog/footer');
	//     // }
	// }


		// public function single()
		// {
		//
		// 		$this->load->view('blog/single-header');
		// 		$this->load->view('blog/blogsingle');
		// 		$this->load->view('blog/footer');
		//
		// }

}
