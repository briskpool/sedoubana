<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: abdulmanan7
 * Date: 2019-11-21
 * Time: 01:00
 */


class Star_rating extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('starRating');
    }



    public function getRating(){


        $userid = $this->session->userdata('uid');
//        $rideid = $this->input->post('ride_id');
        $rideid = '14';
        echo $this->starRating->getUserRating($userid,$rideid);
    }
    // Update rating
    public function updateRating(){
        // userid
        $userid = $this->session->userdata('uid');
        // POST values
        $rideid = $this->input->post('ride_id');
        $rating = $this->input->post('rating');

        // Update user rating and get Average rating of a post
        $averageRating = $this->starRating->userRating($userid,$rideid,$rating);

        echo $averageRating;
        exit;
    }

}