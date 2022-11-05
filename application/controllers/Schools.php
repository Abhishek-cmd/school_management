<?php defined('BASEPATH') OR exit('No direct script access allowed');
	//
	class Schools extends CI_Controller {

		public $logged = '';

		public function __construct() {
			parent::__construct();
			$this->load->database();
			$this->load->model(array('all_model','common_model'));
			$this->load->helper(array('common_helper','url','language'));

			// Load session
		    $this->load->library('session');

		    // Load Pagination library
		    $this->load->library('pagination');

			$this->logged = $this->session_check();
		}

		public function session_check()
	    {
	        if($this->session->userdata('logged_in') != null)
	            return TRUE;
	        else
	            return FALSE;
	    }

		// public function loadRecord($rowno=0){
		public function index($rowno=0){
            $data['active_tab'] = 'list_school';
		    // Search text
		    $search_text = "";
		    if($this->input->post('submit') != NULL ){
		      $search_text = $this->input->post('search');
		      // $this->session->set_userdata(array("search"=>$search_text));
		    }else{
		      if($this->session->userdata('search') != NULL){
		        // $search_text = $this->session->userdata('search');
		      }
		    }

		    // Row per page
		    // $rowperpage = 20;

		    // // Row position
		    // if($rowno != 0){
		    //   $rowno = ($rowno-1) * $rowperpage;
		    // }

		    $limit = 20;
			if (isset($_GET['page'])) {
				$pn = $_GET['page'];
			} else {
				$pn = 1;
			}
			$start_from = ($pn - 1) * $limit;
 
		    // All records count

		    if(!empty($search_text) && !empty($_GET['per_page'])){
		    	$total_record = $this->all_model->getrecordCount($search_text);
		    	$data['schools'] = $this->all_model->getData($start_from,$_GET['per_page'],$search_text);
		    }else if(!empty($search_text) && empty($_GET['per_page'])){
                $total_record = $this->all_model->getrecordCount($search_text);
		    	$data['schools'] = $this->all_model->getData($start_from,$limit,$search_text);
		    }else if(empty($search_text) && !empty($_GET['per_page'])){
                $total_record = $this->all_model->getrecordCount($search_text='');
		    	$data['schools'] = $this->all_model->getData($start_from,$_GET['per_page'],$search_text='');
		    }else{
		    	$total_record = $this->all_model->getrecordCount($search_text='');
		    	$data['schools'] = $this->all_model->getData($start_from,$limit,$search_text='');
		    }  


		 
		    // Pagination Configuration
		    // $config['base_url'] = base_url().'schools/loadRecord';
		    $config['base_url'] = base_url().'schools';
		    $config['use_page_numbers'] = TRUE;

		    $total_pages = ceil($total_record / $limit);

		    $config['total_rows'] = $total_record;
		    $config['per_page'] = 20;
		    $per_page=20;
		    if(isset($_GET['per_page']))
			{
				$config['per_page']=$_GET['per_page'];
				$per_page=$_GET['per_page'];
			}

			$config['full_tag_open'] = '<ul class="pagination pb-5 pt-5 justify-content-end">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = '<i class="previous"></i>';
			$config['next_link'] = '<i class="next"></i>';
			$config['next_tag_open'] = '<li class="page-item next">';

			$config['page_query_string'] = TRUE;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['query_string_segment'] = 'page';
			$per_page=$config['per_page'];

			$page=1;
			if(isset($_GET['page']))
			{
				$page=$_GET['page'];
			}  

			$offset = ($page - 1) * $per_page;
			$page_from=($offset+1);
			$page_to=($offset+$per_page);
			if($total_record==0)
			{
				$page_from=0;
			    $page_to=0;
			}

			if($total_record<$per_page)
			{
			    $page_to=$total_record;
			}

		    $data['show_msg']='Showing '.$page_from.' to '.$page_to.' of '.$total_record.' records';
			$config['next_tag_close'] ='</li>';
			$config['prev_tag_open'] = '<li class="page-item previous">';

			$config['prev_tag_close'] ='</li>';
			$config['num_tag_open'] = '<li class="page-item ">';
			$config['attributes'] = array('class' => 'page-link');
			$config['num_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li class="page-item ">';

			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item ">';

			$config['last_tag_close'] = '</li>';

	        $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:void(0)" class="page-link">';

	        $config['cur_tag_close'] = '</a></li>';

		    // Initialize
		    $this->pagination->initialize($config);
		 
		    // $data['pagination'] = $this->pagination->create_links();
		    $data['result'] = $data['schools'];
		    $data['row'] = $rowno;
		    $data['search'] = $search_text;

		    // Load view
		    $this->load->view('admin/list_school',$data);		 
		}

		public function create_school(){
			if ($this->logged === TRUE) {
				$data['active_tab'] = 'create_school';
				$this->load->view('admin/create_school',$data);
		    }else{
		    	$this->load->view('admin/login');
		    }
		}

		public function list_school(){
			if ($this->logged === TRUE) {
				$data['active_tab'] = 'list_school';
				redirect('schools');
			}else{
		    	$this->load->view('admin/login');
		    }
		}

		public function addnew_school(){
            if ($this->logged === TRUE){
            	if(!empty($_POST)){
					$this->load->library('form_validation');
					$this->form_validation->set_rules('school_name', 'School Name:', 'required');
					$this->form_validation->set_rules('school_location', 'School Location:', 'required'); 

	                if($this->form_validation->run()){
	                	$school_name = $this->input->post('school_name');
	                	$school_location = $this->input->post('school_location');

						$user_register_data = array(
				    		'school_name' => $school_name,
				    		'school_location' => $school_location,
				    		'status' => '1',
				    		'created_at' => date('Y-m-d H:i:s')
				    	);

				    	$this->all_model->insert('tbl_school', $user_register_data);

				    	$this->session->set_flashdata('success', 'School added successfully');	
		                redirect('schools','refresh');
					}else{
	                    $this->session->set_flashdata('error', 'Error Occurred');	
		                redirect('schools','refresh');
					}
				}else{
					$this->load->view('admin/create_school');
				}
            }else{
		    	$this->load->view('admin/login');
		    }
		}

		public function edit_school($id){
			if ($this->logged === TRUE) {
				$data['active_tab'] = 'list_school';
				$data['schools_info'] = $this->common_model->getAllFor('tbl_school', 'id', $id);
				$this->load->view('admin/edit_school',$data);
			}else{
		    	$this->load->view('admin/login');
		    }
		}

		public function update_school($id){
			if ($this->logged === TRUE) {
				if(!empty($_POST)){
					$this->load->library('form_validation');
					$this->form_validation->set_rules('school_name', 'School Name:', 'required');
					$this->form_validation->set_rules('school_location', 'School Location:', 'required');

	                if($this->form_validation->run()){
	                	$school_name = $this->input->post('school_name');
	                	$school_location = $this->input->post('school_location');

						$user_register_data = array(
				    		'school_name' => $school_name,
				    		'school_location' => $school_location,
				    		'status' => '1',
				    		'updated_at' => date('Y-m-d H:i:s')
				    	);

				    	$school_id = $_POST['school_id'];

				    	$this->all_model->update_schools($user_register_data,$school_id);

				    	$this->session->set_flashdata('success', 'School updated successfully');	
		                redirect('auth/dashboard','refresh');
					}else{
	                    $this->session->set_flashdata('error', 'Error Occurred');	
		                redirect('schools','refresh');
					}
				}else{
					$this->load->view('admin/create_school');
				}
			}else{
				redirect('auth/login');
			}
		}

		public function delete_school($id){
			if ($this->logged === TRUE) {
				// $blog_id = $_POST['blog_id'];
				$data = $this->common_model->update('tbl_school', array('status' => '0'), array('id' => $id));
				redirect('schools');
			}else{
				redirect('auth/login');
			}
		}
	}
?>