<?php

class TicketsModel extends CI_Model {


    public function getAll() {
        $this->db->select("cs.*, CONCAT(u.fname,' ',u.lname) as name, u.id as uid, u.role, (select count(*) from support_chat where support_id = cs.id) as total_chats");
        $this->db->from('contact_support as cs');
        $this->db->join('users as u', ' u.id = cs.user_id', 'left');
        $data = $this->db->get();
        return $data;

    }
    public function getAllChatsById($id) {
        $this->db->select(" sc.*,a.file,cs.category,cs.status, CONCAT(u.fname,' ',u.lname) as name,u.photo,");
        $this->db->from('support_chat as sc');
        $this->db->join('contact_support as cs', ' cs.id = sc.support_id');
        $this->db->join('users as u', ' u.id = cs.user_id');
        $this->db->join('attachments as a', ' a.chat_id = sc.id', 'left');
        $this->db->where('sc.support_id',$id);
        $data = $this->db->get();
        return $data;
    }

    function insertMessage($data)
    {
        $this->db->insert('support_chat', $data);
        $insert_id = $this->db->insert_id();
        $this->db->where('id',$insert_id);
        $data = $this->db->get('support_chat');
        return $data->row();
    }
    function updateChatViewed($id)
    {
        $this->db->where('id', $id);
        $this->db->update('contact_support', ['viewed'=>'1']);
        return true;
    }
}