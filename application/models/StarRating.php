<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class StarRating extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    function getUserRating($user_id, $ride_id)
    {
        $this->db->select('*');
        $this->db->from('rating');
        $this->db->where(['user_id'=>$user_id,'ride_id'=>$ride_id]);
        $data = $this->db->get();
        foreach($data->result_array() as $row)
        {
            return $row["rating"];
        }
    }

    // Save user rating
    public function userRating($user_id,$ride_id,$rating){
        $this->db->select('*');
        $this->db->from('rating');
        $this->db->where("ride_id", $ride_id);
        $this->db->where("user_id", $user_id);
        $userRatingquery = $this->db->get();

        $userRatingResult = $userRatingquery->result_array();
        if(count($userRatingResult) > 0){

            $postRating_id = $userRatingResult[0]['id'];
            // Update
            $value=array('rating'=>$rating);
            $this->db->where('id',$postRating_id);
            $this->db->update('rating',$value);
        }else{
            $userRating = array(
                "ride_id" => $ride_id,
                "user_id" => $user_id,
                "rating" => $rating
            );

            $this->db->insert('rating', $userRating);
        }

        // Average rating
        $this->db->select('ROUND(AVG(rating),1) as averageRating');
        $this->db->from('rating');
        $this->db->where("ride_id", $ride_id);
        $ratingquery = $this->db->get();

        $postResult = $ratingquery->result_array();

        $rating = $postResult[0]['averageRating'];

        if($rating == ''){
            $rating = 0;
        }

        return $rating;
    }

}