<?php

/**
 *
 */
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        // $this->config->load('email_config');
    }


    function index()
    {


        $data = array(
            'title' => "Auth",
            'msg' => '',
            'role' => 'passenger'
        );
        $this->load->view('login', $data);
    }

    public function process()
    {

        // Load the model
        // return "Hello";
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->input->post('user');
        // Validate the user can login
        $result = $this->login_model->validate($email, $password, $user);
        // dd($result);
        // Now we verify the result
        if ($user == 'driver') {
            if ($result['status'] == '10') {
                // If user did validate,
                // Send them to members area
                redirect('profile');
            } else {

                // If user did not validate, then show them login page again
                if ($result['status'] == '5') {
                    $data = array(
                        'title' => "Auth",
                        'msg' => 'Sorry. Your account is inactive for some reason.',
                        'role' => 'driver',
                        'resend_email' => ''
                    );
                } elseif ($result['status'] == '9') {
                    $data = array(
                        'title' => "Auth",
                        'msg' => 'Your account is not verified yet. Please check your inbox and click on verify link.',
                        'role' => 'driver',
                        'resend_email' => ($result['user_id']) ? $result['user_id'] : ''
                    );
                } else {
                    $data = array(
                        'title' => "Auth",
                        'msg' => 'Invalid Credentials',
                        'role' => 'driver',
                        'resend_email' => ''
                    );
                }

                $this->load->view('login', $data);
            }

            //            if (!$result) {
            //                // If user did not validate, then show them login page again
            //                $data = array(
            //                    'title' => "Auth",
            //                    'msg' => 'Invalid Credentials'
            //                );
            //                $this->load->view('login', $data);
            //            } else {
            //
            //                // If user did validate,
            //                // Send them to members area
            //                redirect('profile');
            //            }
        } else if ($user == 'passenger') {
            // dd($result['status']);
            if ($result['status'] == '10') {
                //dd($this->session->userdata('redirect_user'));
                if ($this->session->userData('redirect_user')) {
                    redirect($this->session->userData('redirect_user'));
                }
                // If user did validate,
                // Send them to members area
                redirect('passenger-profile');
            } else {

                // If user did not validate, then show them login page again
                if ($result['status'] == '5') {
                    $data = array(
                        'title' => "Auth",
                        'msg' => 'Sorry. Your account is inactive for some reason.',
                        'role' => 'passenger',
                        'resend_email' => ''
                    );
                } elseif ($result['status'] == '9') {
                    $data = array(
                        'title' => "Auth",
                        'msg' => 'Your account is not verified yet. Please check your inbox and click on verify link.',
                        'role' => 'passenger',
                        'resend_email' => ($result['user_id']) ? $result['user_id'] : ''
                    );
                } else {
                    $data = array(
                        'title' => "Auth",
                        'msg' => 'Invalid Credentials',
                        'role' => 'passenger',
                        'resend_email' => ''
                    );
                }
                $this->load->view('login', $data);
            }
        }
    }
    function resendEmail()
    {
        $id = $_GET['id'];
        if ($id) {
            $result = $this->login_model->getUserById($id);
            $email = $result->email;
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);
            $config = $this->config->item('email_smtp');
            $data['email'] = $email;
            $data['password'] = $this->input->post('password');
            $data['code'] = $code;
            $data['user'] = $result->role;
            $data['response'] = $result->id;
            $message = $this->load->view('activate_email', $data, TRUE);
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('noreply@sedoubana.com', 'Sedoubana');
            $this->email->to($email);
            $this->email->subject('Verify Your Account');
            $this->email->message($message);
            if ($this->email->send()) {
                $this->login_model->updateCodeById($id, $code);
                redirect("register/email-sent");
            } else {
                show_error($this->email->print_debugger());
            }
        } else {
            redirect(['/']);
        }
    }
    function socialLogin()
    {

        $email = $_POST['email'];
        $user = $_POST['user'];
        $result = $this->login_model->social_validate($email, $user);
        if (!$result) {
            // If user did not validate, then show them login page again
            echo 'false';
        } else {
            // If user did validate, 
            // Send them to members area
            echo "logged in";
            // redirect('profile'); 
        }
    }

    function reset_password()
    {

        if (!isset($_POST['email'])) {
            $user = $_GET['user'];
            $data = array(
                'title' => "Reset Password",
                'err_msg' => "",
                'msg' => "",
                'user' => $user
            );

            $this->load->view('reset-pass', $data);
        } else {
            $enc_email = md5($this->config->item('salt') . $_POST['email']);

            $email = $_POST['email'];
            $user = $_POST['user'];

            $return = $this->login_model->email_check($email, $user);
            if ($return == 'true') {

                redirect('login/send_link/' . $user . '/' . $email);
            } else {

                $data = array(
                    'title' => "Reset Password",
                    'err_msg' => "Email does not exist",
                    'user' => $user
                );
                $this->load->view('reset-pass', $data);
            }
        }
    }


    public function send_link($user, $email)
    {

        $data['email'] = $email;
        $data['user'] = $user;
        $config = $this->config->item('email_smtp');
        $message = $this->load->view('reset-password', $data, TRUE);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('noreply@sedoubana.com', 'Sedoubana');
        $this->email->to($email);
        $this->email->subject('Password Reset');
        $this->email->message($message);
        if ($this->email->send()) {
            redirect("register/email-sent");
        } else {
            show_error($this->email->print_debugger());
        }

        //echo $email;
    }

    public function new_password($email_hash)
    {

        $user = $_GET['user'];
        if ($this->session->has_userdata('send_email')) {

            $data = $this->session->userdata('send_email');
            $email2 = $data['email'];


            if ($email_hash === md5($this->config->item('salt') . $email2)) {
                $titledata = array(
                    'title' => "Create New Password",
                    'msg' => '',
                    'user' => $user
                );
                $this->load->view('new-pass', $titledata);
            } else {
                echo 'bye';
            }

            session_unset($data);
        } else {
            echo 'expired';
        }
    }

    public function change_pass()
    {
        $pass = md5($_POST['password']);
        $data = array('password' => $pass);
        $email = $_POST['email'];
        $user = $_POST['user'];
        $this->login_model->change_password($data, $email, $user);

        $this->load->view('pass-changed', $data);
    }
}
