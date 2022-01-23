<?php

/**
 * 
 */
class Support extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('supportModel');
        $this->check_isvalidated();
    }
    private function check_isvalidated()
    {

        if (!$this->session->userdata('validated_driver') && !$this->session->userdata('validated')) {
            redirect('/');
        }
    }

    function index()
    {
        $data['title'] = "Contact Support";

        $data['category'] = ['General Inquiries', 'Account & Payment Issues', 'Technical Support', 'Contact Your Driver', 'Other'];
        $this->load->view('contact_support', $data);
    }

    function request()
    {
        $uid = $this->session->userdata('uid');
        $data = array(
            'user_id' => $uid,
            'ticket' => rand(1, 10000),
            'category' => $this->input->post('category'),
            'subject' => $this->input->post('subject'),
            'status' => 'in-progress',
            'last_activity' => date('Y-m-d H:i:s')
        );
        $insert_id = $this->supportModel->insert($data);
        if (!empty($insert_id)) {
            $data = array(
                'user_id' => $uid,
                'support_id' => $insert_id,
                'message' => $this->input->post('message'),
            );
            $insertId = $this->supportModel->insertMessage($data);
            if (!empty($insertId) && $_FILES['file']) {
                $name = $_FILES['file']['name'];
                $uid = $this->session->userdata('uid');
                $file = pathinfo($name);
                if (!empty($name)) {
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['overwrite'] = TRUE;
                    $config['max_size']             = 3048;
                    $config['file_name'] = normalizeString($file['filename']) . '-' . $uid . '.' . $file['extension'];

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file')) {
                        $getData = array('error' => $this->upload->display_errors());
                    } else {
                        $getData = array(
                            'chat_id' => $insertId,
                            'file' => 'uploads/' . $config['file_name']
                        );
                        $this->supportModel->uploadFile($getData);
                    }
                }
            }
        }
        redirect('requests');
    }
}
