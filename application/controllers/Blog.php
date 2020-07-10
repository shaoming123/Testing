<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
	$this->load->model('blog_m');
	$this->load->database();
	$this->load->library('form_validation');
	$this->load->helper('url', 'form','file');	
	$this->load->library('form_validation');
	
		}

	public function login()
	{ 
		if($this->input->post('login'))
		{

			$e=$this->input->post('username');
			$p=$this->input->post('pass');
			$ps=md5($p);
			
	
			$que=$this->db->query("select * from user where username='".$e."' and password='$ps'");
			foreach ($que->result() as $row)
					{
        		$idd = $row->user_id;
        	}

			$row = $que->num_rows();
			if($row)
			{
				
			redirect("blog/index?idd=$idd");


			}
			else
			{
		$data['error']="<h3 style='color:red'>Invalid login details</h3>";
			}	
		}
		$this->load->view('blog/login',@$data);		
	}

	public function Logout()
    {
        $this->session->sess_destroy();
        redirect('blog/login');
    }

    public function register(){

    if($this->input->post('register'))
		{
		$n=$this->input->post('username');
		$e=$this->input->post('email');
		$p=$this->input->post('pass');
		$ps=md5($p);
		
		$que=$this->db->query("select * from user where email='".$e."'");
		$row = $que->num_rows();
		if($row)
		{
		$data['error']="<h3 style='color:red'>This user already exists</h3>";
		}
		else
		{
		$que=$this->db->query("insert into user values('','$n','$ps','$e')");
		
		$data['error']="<h3 style='color:blue'>Your account created successfully</h3>";
		}			
				
		}
	$this->load->view('blog/register',@$data);	

	}
	
	

	public function index(){
		
		$this->load->model('blog_m');
		$posts['posts'] = $this->blog_m->getPosts();
		$newtable['tables'] = $this->blog_m->getuser();
		$this->load->view('blog/index',$posts,$newtable);

		}
	
	 public function add(){
	 	
		
		$this->load->view('blog/add');
		

	} 

	public function update($id)
	{
		

		$this->load->model('blog_m');
		$post = $this->blog_m->singlepost($id);
		
		$this->load->view('blog/update', ['post' => $post]);
	}


	public function save()
	{

		$this->form_validation->set_rules('Title', 'Title', 'required');
		$this->form_validation->set_rules('Description', 'Description', 'required');

		
		$config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);
         $this->upload->initialize($config);
        
      
	
		if ($this->form_validation->run() && $this->upload->do_upload('file_name'))
		{	

			$Title = $this->input->post('Title');
			$Description = $this->input->post('Description');
			$image = $this->upload->data();
			$idd = $this->input->post('idd');
			$user = (['Title' => $Title, 'Description'=>$Description,'file_name'=>$image['file_name'],'id_user' => $idd]);
			$data = array_merge($user);
			date_default_timezone_set('Asia/Singapore');
			$today = date('Y-m-d h:i:s a');
			
			$data['date_created'] = $today;
			
			
			unset($data['submit']);
			
			
			
			if($this->blog_m->addPost($data))
			{
				$this->session->set_flashdata('msg','Post Saved Successfully');

			}else{

				$this->session->set_flashdata('msg','Failed to Save Post!');		
			
		}
		return redirect('blog/index?idd='.$idd);
			
		}
		else
		{
			
			$this->load->view('blog/add?idd='.$idd);
		}
	
		
	}
	public function change($id)
	{
		
		$this->form_validation->set_rules('Title', 'Title', 'required');
		$this->form_validation->set_rules('Description', 'Description', 'required');
		$idd = $_REQUEST['idd'];
		$config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);
         $this->upload->initialize($config);
     	if(!empty($_FILES['file']['name'])) {
		
		if ($this->form_validation->run() && $this->upload->do_upload())
		{	
			

			$image = $this->upload->data();
			$Title = $this->input->post('Title');
			$Description = $this->input->post('Description');		
			$idd = $this->input->post('idd');


			$user = (['Title' => $Title, 'Description'=>$Description,'id_user' => $idd , 'file_name' => $image['file_name']]);
			$data = array_merge($user);
			date_default_timezone_set('Asia/Singapore');
			$today = date('Y-m-d h:i:s a');
			
			$data['date_created'] = $today;
			
			
			unset($data['submit']);


			$this->load->model('blog_m');
			if($this->blog_m->updatePost($data, $id))
			{
				$this->session->set_flashdata('msg','Post Saved Successfully');
			}else{

				$this->session->set_flashdata('msg','Failed to Save Post!');

			}
			return redirect("blog/index?idd=".$idd);
			
		}
	}
		else
		{
			$this->load->view('blog/update?idd='.$idd);
		}

	
		
	}


	public function delete($id){
		$this->load->model('blog_m');
		$idd = $_REQUEST['idd'];
		if( $this->blog_m->deletepost($id))
		{
			$this->session->set_flashdata('msg','Post Deleted Successfully');
		}else
		{
			$this->session->set_flashdata('msg','Failed to Delete Post ');
		}
		return redirect('blog/index?idd='.$idd);
		

	}
	
        
	}
	



	
 
	



