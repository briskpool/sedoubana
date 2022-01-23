<?php


class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('UsersModel');
        $this->load->library('session');
        $this->load->library('Form_validation');
    }
    public function index() {
        $data["title"] = 'Profile';
        $user = $this->session->userdata('user');
        $data["user"]  = $this->UsersModel->getAdmin($user->id);
//        dd($data);
        $this->load->view('profile', $data);
    }
    public function update() {
        $data["title"] = 'Profile';
        $this->form_validation->set_rules('fname','First Name','trim|required');
        $this->form_validation->set_rules('lname','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->input->post('password') != ''){
          $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        }
        if($this->input->post('confirm_password') != ''){
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        }
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $user = $this->session->userdata('user');
            if($this->input->post('password') != ''){
                $data = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'dob' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'province' => $this->input->post('province'),
                    'city' => $this->input->post('city'),
                    'password' =>md5($this->input->post('password')),
                );
            }else{
                $data = array(
                    'fname' => $this->input->post('fname'),
                    'lname' => $this->input->post('lname'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'dob' => $this->input->post('dob'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'province' => $this->input->post('province'),
                    'city' => $this->input->post('city'),
                );
            }

            $data["user"]  = $this->UsersModel->updateProfile($user->id,$data);
//        dd($data);
            redirect('profile');
        }

    }



}