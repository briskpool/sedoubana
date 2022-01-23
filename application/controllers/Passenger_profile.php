<?php

/**
 * 
 */
class Passenger_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->check_isvalidated();
        $this->load->model('profileModel');
    }
    private function check_isvalidated()
    {
        //dd($this->session->userdata('p_email'));

        if (!$this->session->userdata('validated_driver') && !$this->session->userdata('validated')) {
            redirect('/');
        }
    }

    function index()
    {
        $data['title'] = "Passenger Profile";
        $this->load->model('ProfileModel');
        $email = $this->session->userdata('email');

        $data['passenger'] = $this->ProfileModel->get_passenger($email);
        $this->load->view('passenger/profile', $data);
    }

    function edit()
    {

        $data['title'] = "Profile edit";
        $data['error'] = "";
        $data['path'] = "";
        $email = $this->session->userdata('email');
        $data['passenger'] = $this->profileModel->get_passenger($email);
        $this->load->view('passenger/profile_edit', $data);
    }

    function update()
    {

        $uid = $this->session->userdata('uid');
        $email = $this->session->userdata('email');
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'country' => $this->input->post('country'),
            'province' => $this->input->post('state'),
            'city' => $this->input->post('city'),
        );

        $this->profileModel->passengerInfo($uid, $data, $email);
        redirect('passenger-profile');
    }

    public function logout()
    {
       

         $this->session->sess_destroy();
        redirect('/');
    }
}
