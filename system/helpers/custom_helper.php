<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: abdulmanan7
 * Date: 2019-11-19
 * Time: 23:39
 */

if (!function_exists('test_method')) {
    if (!function_exists('dd')) {
        function dd($val = "i am here...", $dump = false, $lastQuery = false)
        {
            echo "<pre>";
            if ($dump)
                var_dump($val);
            else
                print_r($val);
            if ($lastQuery) {
                $query = $val->createCommand();
                print_r($query->sql);
            }
            echo "</pre>";
            die;
        }
    }
    if (!function_exists('truncate')) {
        function truncate($string, $length, $type = 'start', $dots = "....")
        {
            // return  yii\helpers\StringHelper::truncate($string,$length);
            if (strlen($string) < $length) {
                return $string;
            }
            $textLength = strlen($string);
            return $result = substr_replace($string, $dots, $length, $textLength);
        }
    }

    if (!function_exists('humanifyString')) {
        function humanifyString($type)
        {
            $title = preg_replace('/\s+/', '_', $type);
            return ucfirst($title);
        }
    }
    function randomString($prefix = "abc")
    {
        $id_length = 12 - strlen($prefix);
        $range = "12345abcdefghijklmnopqrstuvwxyz";
        $random = $prefix . substr(str_shuffle(str_repeat($range, $id_length)), 0, $id_length);
        while (strlen($random) < 12) {
            $random = $prefix . substr(str_shuffle(str_repeat($range, $id_length)), 0, $id_length);
        }
        return strtolower($random);
    }
    function normalizeString($str = '')
    {
        $str = strip_tags($str);
        $str = preg_replace('/[\r\n\t ]+/', ' ', $str);
        $str = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);
        $str = strtolower($str);
        $str = html_entity_decode($str, ENT_QUOTES, "utf-8");
        $str = htmlentities($str, ENT_QUOTES, "utf-8");
        $str = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);
        $str = str_replace(' ', '-', $str);
        $str = rawurlencode($str);
        $str = str_replace('%', '-', $str);
        return $str;
    }
    function getRideAverageRating($rideId, $driverId)
    {
        $data = [];
        $CI = &get_instance();
        $CI->db->select('ROUND(AVG(rating),1) as averageRating');
        $CI->db->from('rating');
        $CI->db->where("ride_id", $rideId);
        $ratingquery = $CI->db->get();
        $postResult = $ratingquery->result_array();
        $rating = $postResult[0]['averageRating'];

        $CI->db->select('id');
        $CI->db->from('rides');
        $CI->db->where("driver_id", $driverId);
        $ride = $CI->db->get();
        if ($rating == '') {
            $rating = 0;
        }
        $data['rating'] = $rating;
        $data['rides'] = $ride->num_rows();
        return $data;
    }

    function subscriptionStatus($uid)
    {
        //        $now = strtotime(date('Y-m-d H:i:s'));
        $now = date("Y-m-d H:i:s", strtotime("NOW"));
        $CI = &get_instance();
        $CI->db->where('uid', $uid);
        $CI->db->where('subscription_end  >=', $now);
        $CI->db->where('subscription_start  <=', $now);
        $data = $CI->db->get('subscription');
        // dd($data);
        if ($data->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getSubscription($uid)
    {
        $now = date("Y-m-d H:i:s", strtotime("NOW"));
        $CI = &get_instance();
        $CI->db->where('uid', $uid);
        $CI->db->where('subscription_end  >=', $now);
        $CI->db->where('subscription_start  <=', $now);
        $data = $CI->db->get('subscription');
        return $data->row();
    }

    function getSettings()
    {
        $CI = &get_instance();
        $CI->db->where('id', '1');
        $data = $CI->db->get('settings');
        return $data->row();
    }


    function getCity($id)
    {
        $CI = &get_instance();
        $CI->db->where('id', $id);
        $data = $CI->db->get('cites');
        return $data->row();
    }

    function getSeatsBooked($rideId)
    {
        $CI = &get_instance();
        $CI->db->select_sum('no_seats');
        $CI->db->where('ride_id', $rideId);
        $data = $CI->db->get('passenger_trips');
        return $data->row();
    }

    function getDriverStatus($uid, $role)
    {
        $CI = &get_instance();
        $CI->db->select('status,approved');
        $CI->db->from('users');
        $CI->db->where(['id' => $uid, 'role' => $role]);
        $data = $CI->db->get();
        return ($data->row()) ? $data->row()->approved : '';
    }

    function getUserRating($rideId, $uid)
    {
        $CI = &get_instance();
        $CI->db->select('*');
        $CI->db->from('rating');
        $CI->db->where(['user_id' => $uid, 'ride_id' => $rideId]);
        $data = $CI->db->get();
        foreach ($data->result_array() as $row) {
            return $row["rating"];
        }
    }

    function getSeatsBookedPerRide($uId, $rideId)
    {
        $CI = &get_instance();
        $CI->db->select_sum('no_seats');
        $CI->db->where(['uid' => $uId, 'ride_id' => $rideId]);
        $data = $CI->db->get('passenger_trips');
        return $data->row();
    }

    function dateToDb($date)
    {
        return date("Y-m-d", strtotime($date));
    }

    function dateToLocal($date, $format = "d-m-Y")
    {
        return date($format, strtotime($date));;
    }

    function timeToLocal($time, $format = "h:i A")
    {
        return date($format, strtotime($time));
    }
    function dateTimeToDb($date)
    {
        return date("Y-m-d H:i:s", strtotime($date));
    }
    function dateTimeToLocal($date, $format = "d-m-Y h:i A")
    {
        return date($format, strtotime($date));
    }

    function isGreaterThenNow($date)
    {
        $now = strtotime(date('Y-m-d H:i:s'));
        $new = strtotime($date);
        if ($new > $now) {
            return true;
        } else {
            return false;
        }
    }

    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute'
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
