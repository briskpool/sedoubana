<?php

/**
 *
 */
class Search_results extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('result');
        $this->load->model('passengerTrips');
        $this->config->load('email_config');
    }

    function index()
    {

        $data['title'] = "Search Results";

        $dataArray = array(
            'pickup' => $this->input->get('pickup'),
            'drop' => $this->input->get('drop'),
            'date-range' => $this->input->get('date-range')
        );
        if (!empty($dataArray['pickup']) && !empty($dataArray['drop']) && !empty($dataArray['date-range'])) {
            $data['data'] = $this->result->getResult($dataArray);
           
            // dd($this->result->getResult($dataArray)->row());
            
            $this->load->view('results', $data);
        } else {
            redirect('home');
        }
    }

    function confirm_seats()
    {

        $data['title'] = "Confirm Seat";
        if (!$this->session->userData('validated')) {

            $tripId = $this->input->get('id');
            if ($tripId) {
                $this->session->set_userdata('redirect_user', 'search-results/confirm-seats?id=' . $tripId);
                
            }
        }
        $dataArray = array(
            'rideId' => $this->input->get('id')
        );

        // dd($dataArray);
        $data['data'] = $this->result->getRideDetail($dataArray);
        // dd($this->result->getRideDetail($dataArray));
        $this->load->view('confirm_seat', $data);
    }

    function confirm_detail()
    {

        if (!$this->session->userData('validated')) {
            redirect('login');
        }
        $data['title'] = "Confirm Detail";
        if ($this->input->post()) {
            $uid = $this->session->userdata('uid') ;
            $postArray = array(
                'uid' => $uid,
                'ride_id' => $this->input->post('ride_id'),
                'no_seats' => $this->input->post('seats'),
                'duffel' => ($this->input->post('duffel') == 'on') ? '1' : '0',
                'suitcase' => ($this->input->post('suitcase') == 'on') ? '1' : '0',
                'backpack' => ($this->input->post('backpack') == 'on') ? '1' : '0',
            );

            if ($this->input->post('TS') != $this->session->userdata('form_TS')) {
                $this->session->set_userdata('form_TS', $this->input->post('TS'));
                $status = $this->passengerTrips->postTrip($postArray);
                if ($status['status']) {
                    $data['data'] = $status['data'];
                    $this->sendEmail($postArray);
                    $this->load->view('confirm_detail', $data);
                } else {
                    $uid = $this->session->userdata('uid');
                    $dataArray = array(
                        'uid' => $uid,
                        'rideId' => $this->input->post('ride_id')
                    );
                    $data['error'] = $status['error'];
                    $data['data'] = $this->result->getRideDetail($dataArray);
                    $this->load->view('confirm_seat', $data);
                }
            } else {
                $data['data'] = $this->passengerTrips->search($postArray);
                // dd($this->passengerTrips->search($postArray)->row());
                $this->load->view('confirm_detail', $data);
            }
        } else {
            echo "In valid request";
        }
    }

    function sendEmail($data)
    {
        $dataArray = array(
            'uid' => $data['uid'],
            'rideId' => $data['ride_id']
        );
        $getTripDetail=$this->result->getTrip($dataArray)->row();
        $tripCreatedAt=$getTripDetail->created_at;
        $getdata = $this->result->getRideDetail($dataArray)->row();
        $user = $this->result->getUserDetail($data['uid']);
        $dep_city = $this->result->getCityById($getdata->dep_city)->name;
        $dest_city = $this->result->getCityById($getdata->dest_city)->name;
        $driver = $this->result->getDriverById($getdata->driver_id);
        $date = dateTimeToLocal($getdata->dep_date . ' ' . $getdata->dep_time);
        $email = $driver->email;
        $passenger_email = $user->email;
        $luggage = '';
        if ($data['backpack'] == '1') {
            $luggage .= 'Backpack, ';
        }
        if ($data['suitcase'] == '1') {
            $luggage .= 'Suitcase, ';
        }
        if ($data['duffel'] == '1') {
            $luggage .= 'Ruffel,';
        }
        $getLuggage = (!empty($luggage)) ? rtrim($luggage, ', ') : 'No Luggage';

        $dataSet = array(
            'user_name' => $user->fname . ' ' . $user->lname,
            'message' => "You have recieved a new booking. Please find the details below.",
            'user_email' => $user->email,
            'name' => $driver->fname . ' ' . $driver->lname,
            'phone' => $user->phone,
            'dep_city' => $dep_city,
            'dest_city' => $dest_city,
            'luggage' => $getLuggage,
            'datetime' => $date,
            'no_seats' => $data['no_seats'],
            'created_at' => $tripCreatedAt,
        );


        
        $this->driver_conf_email($dataSet, $email);
        $name= array("name"=> $user->fname . ' ' . $user->lname);
        $email_message= array("message"=> "You have recently booked a trip. Please find the details below.");
        $this->passenger_conf_email($dataSet, $passenger_email, $name, $email_message);
        // $message = $this->load->view('booking_email', $dataSet, TRUE);
        // $this->load->library('email', $config);
        // $this->email->set_newline("\r\n");
        // $this->email->from('info@sedoubana.com', 'Sedoubana');
        // $this->email->to($email);
        // $this->email->to($passenger_email);
        // $this->email->subject('Reservation Alert');
        // $this->email->message($message);
        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }

    function driver_conf_email($dataSet, $email)
    {                                                                                 
        $config = $this->config->item('email_smtp');
        $message = $this->load->view('booking-email', $dataSet, TRUE);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@sedoubana.com', 'Sedoubana');
        $this->email->to($email);
        $this->email->subject('Reservation Alert');
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
    function passenger_conf_email($dataSet, $email, $name, $email_message)
    {
        $dataSet=array_replace($dataSet,$name);
        $dataSet=array_replace($dataSet, $email_message);
        $config = $this->config->item('email_smtp');
        $message = $this->load->view('booking-email', $dataSet, TRUE);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('info@sedoubana.com', 'Sedoubana');
        $this->email->to($email);
        $this->email->subject('Reservation Alert');
        $this->email->message($message);
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}
