<?php


class Alerts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('alertsModel');
        $this->load->library('session');
    }

    public function Alerts()
    {
        $data["title"] = 'Alerts';
        $data["alerts"] = $this->alertsModel->getAll();
       //dd( $data["alerts"]->result());
        $this->load->view('alerts/alerts', $data);
    }

    public function CreateAlerts()
    {
        $data["title"] = 'Create Alerts';
        $data["users"] = $this->alertsModel->getAllUers();
        $this->load->view('alerts/create', $data);
    }

    public function viewAlerts($id)
    {
        $data["title"] = 'View Alerts';
        $data["alert"] = $this->alertsModel->getById($id);
        $data["users"] = $this->alertsModel->getAllByAlertId($data["alert"]->alert_id);
        $this->load->view('alerts/view-alerts', $data);
    }


    public function AlertSend()
    {

        if ($this->input->post('send') == 'sub') {
            $message = $this->input->post('message');
            $rand = rand(1,10000);
            if ($this->input->post('sentTo') == 'all') {
                $users = $this->alertsModel->getAllUers();

            } else if ($this->input->post('sentTo') == 'driver') {
                $users = $this->alertsModel->getAllUersByRole('driver');
            } else if ($this->input->post('sentTo') == 'passenger') {
                $users = $this->alertsModel->getAllUersByRole('passenger');
            } else if ($this->input->post('sentTo') == 'manual') {
                $getUsers = $this->input->post('users');
                $users = $this->alertsModel->getUersById($getUsers);
            }

            if ($users->num_rows() > 0) {
                foreach ($users->result() as $row) {
                    $data = [
                        'alert_id'=>$rand,
                        'user_id'=>$row->id,
                        'message'=>$message,
                        'date_time'=>date("Y-m-d H:i:s"),
                    ];
                    $this->alertsModel->insert($data);
                    $this->session->set_flashdata('success', 'Alert Sent Successfully');

                }
                redirect('alerts');
            }
        }else{
            $this->session->set_flashdata('error', 'Invalid Request');
            redirect('create-alerts');
        }

    }


}