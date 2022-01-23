<?php 
/**
 * 
 */
class Profile extends CI_Controller
{
	public function __construct() { 
      parent::__construct(); 
      $this->load->helper(array('form', 'url')); 
        $this->check_isvalidated();
        $this->load->model('profileModel');
   	}
    private function check_isvalidated(){
            if(!$this->session->userdata('validated_driver') && ! $this->session->userdata('validated')){
                redirect('/');
           }
      }
	
	function index()
	{
		$data['title']="Profile";
		$data['error']="";
		$data['path']="";
        $email=$this->session->userdata('email');
        $data['driver']=$this->profileModel->get_driver($email);
		$this->load->view('profile', $data);
	}
    function edit()
    {
        $data['title']="Profile edit";
        $data['error']="";
        $data['path']="";
        $email=$this->session->userdata('email');
        $data['driver']=$this->profileModel->get_driver($email);
        $this->load->view('profile_edit', $data);
    }
    function update()
    {
        $uid=$this->session->userdata('uid');
        $email=$this->session->userdata('email');
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'phone' => $this->input->post('phone'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'country' => $this->input->post('country'),
            'province' => $this->input->post('state'),
            'city' => $this->input->post('city'),
        );
        $this->profileModel->driversInfo($uid,$data,$email);
       redirect('profile');
    }
  function info()
  {
    $data['title']="Profile";
    
    $uid=$this->session->userdata('uid');
    $data['info']=$this->profileModel->get_driver_info($uid);
    $this->load->view('additional_info', $data);
  }
	public function uploadImage($name) { 
      $uid=$this->session->userdata('uid');
      $email=$this->session->userdata('email');
      $config['upload_path']   = './uploads/'; 
      $config['allowed_types'] = 'jpg|png|jpeg|JPEG|PNG|JPG';
      $config['overwrite'] = TRUE;
      $config['max_size']      = '3048';
      $config['file_name']	   = $name.$uid.'.jpg';
      $this->load->library('upload');
      $this->upload->initialize($config);


      if ( ! $this->upload->do_upload($name)) {
         echo $this->upload->display_errors(); 
         $data['path']=$config['upload_path'];

      }else { 
  
        $uploadedImage = $this->upload->data();
        $this->resizeImage($uploadedImage['file_name']);


        if ($name=='profile') {
          $data= array('photo' =>'uploads/'.$config['file_name'],
         );
        }else{
            $data = array('uid' => $uid,
            $name =>'uploads/'.$config['file_name'],
         );
        }
        $this->profileModel->additional($uid,$data,$name,$email);
      } 
   }
   /**
    * Manage uploadImage
    *
    * @return Response
   */
   public function resizeImage($filename)
   {
     	$source_path ='./uploads/' . $filename;
      $target_path = './uploads/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'width' => 500,
      );

      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
        // echo 'not ok';
      }
      echo 'ok';
      $this->image_lib->clear();
   }

   public function logout(){
           $this->session->sess_destroy();
            redirect('/');
     }

  function upload(){
    $uid=$this->session->userdata('uid');
    $email=$this->session->userdata('email');
    $data = array(
        'uid'=>$uid,
        'make' => $this->input->post('make'),
        'model' => $this->input->post('model'),
        'year' => $this->input->post('year'),
        'color' => $this->input->post('color'),
        'plate_number' => $this->input->post('plate_number')
     );
    $this->profileModel->vehicle_info($uid,$data,$email);
    $this->info();
  }	
}
 ?>