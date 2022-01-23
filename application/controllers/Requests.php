<?php

/**
 *
 */
class Requests extends CI_Controller
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

        if (!$this->session->userdata('validated_driver')  && !$this->session->userdata('validated')) {
            redirect('/');
        }
    }

    function index()
    {
        $data['title'] = "Requests";
        $uid = $this->session->userdata('uid') ?? $this->session->userdata('p_uid');
        $data['data'] = $this->supportModel->getRrequests($uid);
        $this->load->view('my_requests', $data);
    }

    function thread()
    {
        $data['title'] = "Requests";
        $uid = $this->session->userdata('uid') ?? $this->session->userdata('p_uid');
        $ticketId = $this->input->get('ticket');
        $suport_id = $this->input->get('id');
        $subject = $this->supportModel->getRrequest($suport_id);
        $data['support'] = $subject->row();
        $data['data'] = $this->supportModel->getRrequestsChat($suport_id, $uid, $ticketId);
        //        dd($data['data']->result());
        $this->load->view("request_thread", $data);
    }

    function threadChat()
    {
        $uid = $this->session->userdata('uid') ;
        $suport_id = $this->input->post('support_id');
        $responce = '';

        if (!empty($uid) && !empty($suport_id)) {
            $data = array(
                'user_id' => $uid,
                'support_id' => $suport_id,
                'message' => $this->input->post('message'),
            );
            $insertId = $this->supportModel->insertMessage($data);

            if (!empty($insertId) && !empty($_FILES['file']['name'])) {

                $name = $_FILES['file']['name'];
                $uid = $this->session->userdata('uid') ;
                $file = pathinfo($name);
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['overwrite'] = TRUE;
                $config['max_size'] = 3048;
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

            if (!empty($insertId)) {
                $data = $this->supportModel->getRrequestsChatById($insertId, $uid);
                $html = '';
                $row = $data->row();
                if ($row->role == 'admin') {
                    $photo = 'assets/images/logo.png';
                } else {
                    $photo = ($row->photo) ? $row->photo : 'assets/images/profile-placeholder.png';
                }
                if ($row->role == 'admin') {
                    $name = "support";
                } else {
                    $name = $row->fname . ' ' . $row->lname;
                }

                $html = '<div class="row border-top pt-2 row-hover"><div class="col-md-1 col-3"><img src="' . base_url() . $photo . '" class="rounded border-0 w-100" alt=""></div><div class="col-md-9 col-12"><span class="font-small font-weight-bold text-dark">' . $name . '</span><p class="font-small text-dark">' . $row->message . '</p></div><div class="col-md-2 col-6"><span class="font-extra-small">' . dateTimeToLocal($row->created_on) . '</span></div></div>';
                $responce =  ['status' => 1, 'html' => $html];
            } else {
                $responce =  ['status' => 0, 'html' => "<p>Error in request</p>"];
            }
        } else {
            $responce =  ['status' => 0, 'html' => "Invalid request"];
        }

        echo json_encode($responce);
        exit;
    }
}
