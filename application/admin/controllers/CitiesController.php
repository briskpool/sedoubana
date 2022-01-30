<?php


class CitiesController extends CI_Controller {

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
        $data['title'] ='Cities';
        $data["data"] = $this->cites->getAll();
        $this->load->view('cites/cites', $data);
    }
    /*
    function for  add Cites get
    created by your name
    created at 16-12-19.
    */
    public function addCites() {
        $data['title'] ='Cities';
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
        $this->session->set_flashdata('success', 'Cities added Successfully');
        redirect('cities');
    }
    /*
    function for edit Cites get
    returns  Cites by id.
    created by your name
    created at 16-12-19.
    */
    public function editCites($cites_id) {
        $data['title'] ='Cities';
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
            $this->session->set_flashdata('success', 'City(s) Updated');
            redirect('cities');
        }
    }
    /*
    function for view Cites get
    created by your name
    created at 16-12-19.
    */
    public function viewCites($cites_id) {
        $data['title'] ='Cities';
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
        $this->session->set_flashdata('success', 'City(s) deleted');
        redirect('cities');
    }
    /*
    function for activation and deactivation of Cites.
    created by your name
    created at 16-12-19.
    */
    public function changeStatusCites($cites_id) {
        $edit = $this->cites->changeStatus($cites_id);
        $this->session->set_flashdata('success', 'City(s) '.$edit.' Successfully');
        redirect('cities');
    }

}