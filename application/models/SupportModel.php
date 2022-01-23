<?php

/**
 *
 */
class SupportModel extends CI_Model
{

    function insert($data)
    {
        $status = $this->db->insert('contact_support', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function insertMessage($data)
    {
        $this->db->insert('support_chat', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function uploadFile($data)
    {
        $this->db->insert('attachments', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function getRrequests($user_id)
    {

        $this->db->where('user_id', $user_id);
        $data = $this->db->get('contact_support');
        return $data;
    }
    function getRrequest($id)
    {

        $this->db->where('id', $id);
        $data = $this->db->get('contact_support');
        return $data;
    }
    function getRrequestsChatById($suport_id, $user_id)
    {

        $this->db->select('sc.*,cs.subject as subject,cs.*,  u.*, sc.created_at as created_on');
        $this->db->from('support_chat as sc');
        $this->db->join('contact_support as cs', ' cs.id = sc.support_id');
        $this->db->join('users as u', ' sc.user_id = u.id');
        $this->db->where(['sc.id' => $suport_id, 'cs.user_id =' => $user_id]);
        $data = $this->db->get();
        return $data;
    }

    function getRrequestsChat($suport_id, $user_id, $ticket)
    {

        $this->db->select('sc.*,cs.subject as subject, at.file , u.fname, u.lname,u.photo,u.role, sc.created_at as created_on');
        $this->db->from('support_chat as sc');
        $this->db->join('contact_support as cs', ' cs.id = sc.support_id');
        $this->db->join('attachments as at', ' sc.id = at.chat_id', 'left');
        $this->db->join('users as u', ' sc.user_id = u.id');
        $this->db->where(['cs.id' => $suport_id, 'cs.user_id =' => $user_id, 'cs.ticket' => $ticket]);
        $this->db->order_by('sc.id', 'ASC');
        $data = $this->db->get();
        return $data;
    }
}
