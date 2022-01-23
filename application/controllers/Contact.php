<?php 
/**
 * 
 */
class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

		$this->config->load('email_config');
	}
	
	function index(){
		$data = array(
			'title' => "Contact"
		);
		$this->load->view('contact', $data);
	}
	function send()
	{
		$name= $this->input->post('name');
		$email= $this->input->post('email');
		$subject= $this->input->post('subject');
		$message= $this->input->post('message');
		$config = $this->config->item('email_smtp');

		$data=array(
			'name' =>$name,
			'email'=> $email,
			'subject'=> $subject,
			'message'=> $message
		);
		// reCAPTCHA validation
		if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

			// Google secret API
			$secretAPIkey = '6Len37waAAAAAP2TXf7yx_M2YUtc-wAMlLf6-y70';

			// reCAPTCHA response verification
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretAPIkey . '&response=' . $_POST['g-recaptcha-response']);
			// Decode JSON data
			$response = json_decode($verifyResponse);
			if ($response->success) {

				$message = $this->load->view('contact-email', $data, TRUE);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$this->email->from('info@sedoubana.com', 'Sedoubana');
				$this->email->to('info@sedoubana.com');
				$this->email->subject('New Message');
				$this->email->message($message);

				if ($this->email->send()) {
					$result = array(
						"status" => "alert-success",
						"message" => "Email Sent Successfully."
					);
					$this->session->set_flashdata($result);
					redirect('contact');
				} else {
					$result = array(
						"status" => "alert-danger",
						"message" => "Something Went Wrong."
					);
					$this->session->set_flashdata($result);
					redirect('contact');
				}
			} else {
				$result = array(
					"status" => "alert-danger",
					"message" => "Robot verification failed, please try again."
				);
				$this->session->set_flashdata($result);
				redirect('contact');
			} 
		} else {
			$result = array(
				"status" => "alert-danger",
				"message" => "Plese check on the reCAPTCHA box."
			);
			$this->session->set_flashdata($result);
			redirect('contact');
		} 

		
	}
}
 ?>