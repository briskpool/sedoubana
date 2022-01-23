<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('authModel');
        $this->config->load('email_config');
    }

    public function login()
    {

        if (!$this->input->post()) {
            $data = array(
                'title' => "Auth"
            );
            $this->load->view('auth-login', $data);
        } else {
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                if (isset($this->session->userdata['logged_in'])) {

                    redirect('admin/dashboard');
                } else {
                    $this->load->view('auth-login');
                }
            } else {
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                $result = $this->authModel->login($data);

                if ($result == true) {

                    if ($result['data'] != false) {

                        $session_data = array(
                            'id' => $result['data']->id,
                            'email' => $result['data']->email,
                            'role' => $result['data']->role,
                        );
                        //dd($result['data']);
                        $this->session->set_userdata('logged_in', $session_data);
                        $this->session->set_userdata('user', $result['data']);
                        //dd($this->session->userdata('user'));
                        redirect('dashboard');
                    }
                } else {
                    $data = array(
                        'title' => "Auth",
                        'error_message' => 'Invalid Email or Password'
                    );
                    $this->load->view('auth-login', $data);
                }
            }
        }
    }


    // Logout from admin page
    public function logout()
    {

        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        redirect('auth/login');
    }


    public function auth_forgot_password()
    {
        $data = array(
            'title' => "Forgot Password"
        );
        $this->load->view('auth-forgot-password', $data);
    }


    function reset_password()
    {

        if (isset($_POST['email'])) {
            $enc_email = md5($this->config->item('salt') . $_POST['email']);
            $email = $_POST['email'];
            $getData = $this->authModel->email_check($email);

            if ($getData['status'] == 'true') {
                $token = $this->authModel->insertToken($getData['user']->id);
                $this->send_link($token, $email);
            } else {

                $data = array(
                    'title' => "Reset Password",
                    'err_msg' => "Email does not exist",
                );
                $this->session->set_flashdata('flash_message', 'Podany adres email już istnieje');
                $this->load->view('auth-forgot-password', $data);
            }
        }
    }


    public function send_link($token, $email)
    {

        $data['email'] = $email;
        $data['token'] = $token;
        $config = $this->config->item('email_smtp');
        $message = $this->load->view('reset-password', $data, TRUE);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply@sedoubana.com', 'Sedoubana');
        $this->email->to($email);
        $this->email->subject('Password Reset');
        $this->email->message($message);
        if ($this->email->send()) {
            echo 'email sent';
        } else {
            show_error($this->email->print_debugger());
        }

        //echo $email;
    }

    public function new_password($token)
    {


        $getData = $this->authModel->getUserByToken($token);
        if ($getData['status'] == '1') {
            $data = array(
                'title' => "Create New Password",
                'error' => '',
                'token' => $token
            );
            $this->load->view('auth-reset-password', $data);
        } else {
            $data = array(
                'title' => "Invalid Token",
                'msg' => ''
            );
            $this->load->view('errors-402', $data);
        }
    }

    public function change_pass()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $token = $_POST['token'];
            $this->session->set_flashdata('flash_message', validation_errors());
            redirect('new-password/' . $token);
        } else {
            $token = $_POST['token'];
            $getData = $this->authModel->getUserByToken($token);
            if ($getData['status'] == '1') {
                $pass = md5($_POST['password']);
                $datArray = array('password' => $pass);
                $this->authModel->change_password($datArray, $getData['user']->id);
                redirect('password-changed');
            }
        }
    }
    public function pass_changed()
    {
        $data['title'] = 'Password Changed';
        $this->load->view('pass_changed', $data);
    }
}
