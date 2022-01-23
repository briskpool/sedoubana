<?php 
/**
 * 
 */
class Register extends CI_Controller
{

	public function __construct(){
		parent::__construct();

		$this->config->load('email_config');
	}
	
	function index(){
		$data = array(
			'title' => 'Register',
			'msg' => ''
		);
		$this->load->view('register', $data);
	}
	function activation(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);
 		$user = $this->uri->segment(5);
		//fetch user details
		$this->load->model('registerModel');
		if ($user=='passenger') {
			
		
				$user = $this->registerModel->getPassenger($id);
				if($user['code'] == $code){
					//update user active status
					$data['activation'] = true;
					$query = $this->registerModel->activate_passenger($data, $id);
		 
					if($query){
						$this->load->view('verified');
					}
					else{
						echo 'error';
					}
				}
				else{
					echo 'code not match';
				}
		}
		else if ($user=='driver') {
			
		
				$user = $this->registerModel->getDriver($id);
				if($user['code'] == $code){
					//update user active status
					$data['activation'] = true;
					$query = $this->registerModel->activate_driver($data, $id);
		 
					if($query){
						$this->load->view('verified');
					}
					else{
						echo 'error';
					}
				}
				else{
					echo 'code not match';
				}
		}
		
	}
	function register_error()
	{
		$data = array(
			'title' => 'Register',
			'msg' => 'This email is aleardy registered'
		);
		$this->load->view('register', $data);
	}
	function email_sent()
	{
		$data = array(
			'title' => 'Email Sent',
			'msg' => ''
		);
		$this->load->view('email-sent', $data);
	}
	function sendData(){

		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, 12);
		$data=array(
			'activation'=>'0',
			'code'=>$code,
			'fname'=>$this->input->post('fname'),
			'lname'=>$this->input->post('lname'),
			'gender'=>$this->input->post('gender'),
			'dob'=>$this->input->post('dob'),
			'country'=>$this->input->post('country'),
			'city'=>$this->input->post('city'),
			'province'=>$this->input->post('state'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'password'=>md5($this->input->post('password')),
			// 'photo'=>$this->input->post('photo'),
			'role'=>$this->input->post('role'),

		);

		$email=$this->input->post('email');
		$role=$this->input->post('role');

		$this->load->model('registerModel');
		if ($this->input->post('role')=="passenger") {

			$data['response']=$this->registerModel->reg_passenger($data, $email,$role);
			if($data['response']==false){
			
			redirect ('register/register-error');
			}
			else{
			
			
			
			$data['email']=$email;
			$data['password']= $this->input->post('password');
			$data['code']=$code;
			$data['user']='passenger';
			$config = $this->config->item('email_smtp');
        $message=$this->load->view('activate_email',$data,TRUE);

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@sedoubana.com', 'Sedoubana');
        $this->email->to($email);
        $this->email->subject('Verify Your Account');
        $this->email->message($message);
        if ($this->email->send()) {
           redirect("register/email-sent");
        }
        else{
            show_error($this->email->print_debugger());
        }
			}
		}
		if ($this->input->post('role')=="driver") {
			// dd($role);
			$data['response']=$this->registerModel->reg_driver($data, $email, $role);
			if($data['response']==false){
			redirect ('register/register-error');
			}
			else{
			$data['email']=$email;
			$data['password']=$this->input->post('password');
			$data['code']=$code;
			$data['user']='driver';
			$config = $this->config->item('email_smtp');

        $message=$this->load->view('activate_email',$data,TRUE);
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@sedoubana.com', 'Sedoubana');
        $this->email->to($email);
        $this->email->subject('Verify Your Account');
        $this->email->message($message);
        if ($this->email->send()) {
           redirect("register/email-sent");
        }
        else{
            show_error($this->email->print_debugger());
        }
			}
		}
		
		
	}
}
 ?>