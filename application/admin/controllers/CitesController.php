<?php


class CitesController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cites');
        $this->load->library('session');
    }
    /*
    function for manage Cites.
    return all Citess.
    created by your name
    created at 16-12-19.
    */
    public function manageCites() {
        $data['title'] ='Cites';
        $data["data"] = $this->cites->getAll();
        $this->load->view('cites/cites', $data);
    }
    /*
    function for  add Cites get
    created by your name
    created at 16-12-19.
    */
    public function addCites() {
        $data['title'] ='Cites';
        $this->load->view('cites/add-city',$data);
    }
    /*
    function for add Cites post
    created by your name
    created at 16-12-19.
    */
    public function addCitesPost() {
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $this->cites->insert($data);
        $this->session->set_flashdata('success', 'Cites added Successfully');
        redirect('cites');
    }
    /*
    function for edit Cites get
    returns  Cites by id.
    created by your name
    created at 16-12-19.
    */
    public function editCites($cites_id) {
        $data['title'] ='Cites';
        $data['cites_id'] = $cites_id;
        $data['cites'] = $this->cites->getDataById($cites_id);
        $this->load->view('cites/edit-city', $data);
    }
    /*
    function for edit Cites post
    created by your name
    created at 16-12-19.
    */
    public function editCitesPost() {

        $cites_id = $this->input->post('cites_id');
        $cites = $this->cites->getDataById($cites_id);
        $data['name'] = $this->input->post('name');
        $data['status'] = $this->input->post('status');
        $edit = $this->cites->update($cites_id,$data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Cites Updated');
            redirect('cites');
        }
    }
    /*
    function for view Cites get
    created by your name
    created at 16-12-19.
    */
    public function viewCites($cites_id) {
        $data['title'] ='Cites';
        $data['cites_id'] = $cites_id;
        $data['cites'] = $this->cites->getDataById($cites_id);
        $this->load->view('cites/view-city', $data);
    }
    /*
    function for delete Cites    created by your name
    created at 16-12-19.
    */
    public function deleteCites($cites_id) {
        $delete = $this->cites->delete($cites_id);
        $this->session->set_flashdata('success', 'cites deleted');
        redirect('cites');
    }
    /*
    function for activation and deactivation of Cites.
    created by your name
    created at 16-12-19.
    */
    public function changeStatusCites($cites_id) {
        $edit = $this->cites->changeStatus($cites_id);
        $this->session->set_flashdata('success', 'cites '.$edit.' Successfully');
        redirect('cites');
    }

}