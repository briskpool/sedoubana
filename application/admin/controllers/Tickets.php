<?php


class Tickets extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('ticketsModel');
        $this->load->library('session');
    }
    public function Tickets() {
        $data["title"] = 'Tickets';
        $data["tickets"]  = $this->ticketsModel->getAll();
        $this->load->view('tickets/tickets', $data);
    }
    public function changeStatus() {
        $status = $this->input->post('values');
        $id = $this->input->post('chat_id');
        $this->ticketsModel->changeStatus($id, $status);
        echo 'true';
        exit;
    }
    public function Thread($id) {
        $data["title"] = 'Tickets';

       $this->ticketsModel->updateChatViewed($id);
        $data["chats"]  = $this->ticketsModel->getAllChatsById($id);
        $data["user"]  = $this->ticketsModel->getAllRequestById($id);
        $data["chat_status"]  = $this->ticketsModel->getStatus($id)->status;
        $data["chat_id"]  =($id)?$id:'';

//        dd($data["chats"]->result());
        $this->load->view('tickets/chats', $data);
    }


    function ThreadChat()
    {
        $uid=$this->session->userdata('logged_in')['id'];
        $suport_id = $this->input->post('support_id');
        $responce = '';

        if (!empty($uid) && !empty($suport_id)) {
            $data = array(
                'user_id' => $uid,
                'support_id' => $suport_id,
                'message' => $this->input->post('message'),
            );
            $getData = $this->ticketsModel->insertMessage($data);
            if($getData){
                $user = $this->session->userdata('user');
                $photo = ($user->photo !='')?base_url().$user->photo:base_url().'assets/img/avatar/avatar-1.png';
                $html='<div class="chat-item chat-right" style="">
                                    <img src="'.$photo.'">
                                    <div class="chat-details">
                                        <div class="chat-text">'.$getData->message.'</div>
                                        <div class="chat-time">'.time_elapsed_string($getData->created_at).'</div>
                                                                            </div>
                                </div>';
                $responce = ['status'=>1,'html'=>$html];
            }else{
                $responce =  ['status' => 0, 'html' => "Not data found"];
            }

        }else{
            $responce =  ['status' => 0, 'html' => "Invalid request"];
        }
        echo json_encode($responce);
        exit;

    }

}