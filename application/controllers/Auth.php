<?php defined('BASEPATH') OR exit('No direct script access allowed');
	//
	class Auth extends CI_Controller {

		public $logged = '';

		public function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model(array('all_model','common_model'));
			$this->load->helper(array('common_helper','url','language'));
			$this->logged = $this->session_check();
		}

		public function session_check()
	    {
	        if($this->session->userdata('logged_in') != null)
	            return TRUE;
	        else
	            return FALSE;
	    }

		public function index(){
			$this->load->view('admin/login');
		}

		public function login()
		{
			if(!empty($_POST)){
				$this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email:', 'required');  
                $this->form_validation->set_rules('password', 'Password:', 'required|trim'); 

                if ($this->form_validation->run()){
                	$email = $this->input->post('email');
					$password = $this->input->post('password');

					$validate = $this->all_model->access_users_login($email,$password);
					// echo "<pre>";
					// print_r($validate->first_name);exit;

                	if($validate){
                		$last_login_update = array(		
							'last_login' => date('Y-m-d H:i:s')								
						);							

						$this->common_model->update('tbl_users', $last_login_update, array('id'=>$validate->id));

			        	$this->session->set_userdata('logged_in', TRUE);
			        	$this->session->set_userdata('logged', TRUE);
						$this->session->set_userdata('user_id', $validate->id);
						$this->session->set_userdata('user_full_name', $validate->name);
						$this->session->set_userdata('user_email_id', $validate->email);

						$this->session->set_flashdata('success', 'Login user successfully');	
		                redirect('auth/dashboard','refresh');
					}else{
						$this->session->set_flashdata('error', 'Error Occurred');	
		                redirect('auth/login','refresh');
					}

                }else{
                	$this->session->set_flashdata('error', 'Incorrect mobile/password.');	
		            redirect('auth/login','refresh');
                } 		        
			}else{
				$this->load->view('admin/login');
			}			
		}

		public function register(){

			if(!empty($_POST)){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('first_name', 'First Name:', 'required');
				$this->form_validation->set_rules('last_name', 'Last Name:', 'required');  
				$this->form_validation->set_rules('emailaddress', 'Email:', 'required|valid_email');  
                $this->form_validation->set_rules('mobile', 'Mobile:', 'required');  
                $this->form_validation->set_rules('password', 'Password:', 'required|min_length[6]'); 

                if($this->form_validation->run()){
                	$first_name = $this->input->post('first_name');
                	$last_name = $this->input->post('last_name');
                	$mobile = $this->input->post('mobile');
                	$emailaddress = $this->input->post('emailaddress');
					$password = $this->input->post('password');

					$user_register_data = array(
			    		'first_name' => $first_name,
			    		'last_name' => $last_name,
			    		'email' => $emailaddress,
			    		'mobile' => $mobile,
			    		'visible_password' => $password,
			    		'password' => md5($password),
			    		'status' => '1',
			    		'created_at' => date('Y-m-d H:i:s')
			    	);

			    	$this->all_model->insert('tbl_users', $user_register_data);
			    	$this->session->set_flashdata('success', 'Register user successfully');	
	                redirect('auth/login','refresh');
				}else{
                    $this->session->set_flashdata('error', 'Error Occurred');	
	                redirect('auth/register','refresh');
				}
			}else{
				$this->load->view('admin/register');
			}			
		}		

		public function dashboard(){
			if ($this->logged === TRUE) {
				$data['active_tab'] = 'Dashboard';
				$data['schools'] = $this->common_model->getAllFor('tbl_school', 'status', 1);
				$this->load->view('admin/dashboard',$data);
			}else{
				redirect('auth/login');
			}
		}

		// log the user out
	    public function logout()
		{
			$this->data['title'] = "Logout";
			session_destroy();
			$this->session->unset_userdata('__ci_last_regenerate');
			$this->session->set_flashdata('success', 'You have successfully logged out!');
			redirect('auth/login');
		}
	}
?>