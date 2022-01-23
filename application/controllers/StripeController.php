<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Version: 1.0.0
 *
 * Description of Subscriptions Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 **/
// Subscriptions class
class StripeController extends CI_Controller
{
    //Load libraries in Constructor.
    public function __construct()
    {
        parent::__construct();
        require_once('application/libraries/stripe-php/init.php');
        $uid = $this->session->userdata('uid');
        $subscription_status = subscriptionStatus($uid);
        if($subscription_status){
            redirect('profile');
        }
    }

    public function index()
    {
        $data['title'] = "Stripe Manage Subscription Payment using Codeigniter - TechArise";
        $this->load->view('strip_payment', $data);
    }


    public function check()
    {
        $this->load->model('subscriptionModel');
        $data['title'] = "Stripe Manage Subscription Payment using Codeigniter - TechArise";
        $uid = $this->session->userdata('uid');
        $user = $this->subscriptionModel->getUserById($uid);
        $setting = $this->subscriptionModel->getSetting();
        try {

            //check whether stripe token is not empty
            if (!empty($_POST['stripeToken'])) {

                $token = $this->input->post('stripeToken');
                $email = $this->input->post('stripeEmail');

                \Stripe\Stripe::setApiKey('sk_test_Dhts5UYp0I96zSWSMG2fcRe0');

                //add customer to stripe
                $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source' => $token
                ));
                $time = time();
                //item information
                $itemName = ($setting->sub_plan) ? $setting->sub_plan : "Suscribition";
                $itemNumber = ($setting->sub_interval) ? $setting->sub_interval : 'year';
                $itemPrice = $setting->sub_price;
                $currency = ($setting->sub_currency) ? $setting->sub_currency : "usd";
                $orderID = $time;
                //charge a credit or a debit card
                $charge = \Stripe\Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => ($itemPrice * 100),
                    'currency' => $currency,
                    'description' => $itemNumber,
                    'metadata' => array(
                        'item_id' => $itemNumber
                    )
                ));

                //retrieve charge details
                $chargeJson = $charge->jsonSerialize();
//               dd($chargeJson);
                //check whether the charge is successful
                if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
                    //order details
                    $amount = $chargeJson['amount'];
                    $description = $chargeJson['description'];
                    $balance_transaction = $chargeJson['balance_transaction'];
                    $currency = $chargeJson['currency'];
                    $status = $chargeJson['status'];
                    $start_date = date("Y-m-d H:i:s");

                    $end_date = date("Y-m-d  H:i:s", strtotime($start_date." +1 ".$itemNumber));



                    $source =  $chargeJson['source'];
                    $sourceId = $source['id'];
                    $sourceObject = $source['object'];
                    $sourceBrand = $source['brand'];
                    $sourceCountry = $source['country'];
                    $sourceCustomer = $source['customer'];
                    $sourceExpMonth = $source['exp_month'];
                    $sourceRxp_year = $source['exp_year'];
                    $sourceLast4 = $source['last4'];

                    //insert tansaction data into the database
                    $dataDB = array(
                        'uid' =>$user->id,
                        'email' => $email,
                        'subscription_start' => $start_date,
                        'subscription_end' => $end_date,
                        'item_name' => $itemName,
                        'description' => $description,
                        'item_number' => $itemNumber,
                        'item_price' => $itemPrice,
                        'item_price_currency' => $currency,
                        'paid_amount' => $amount,
                        'paid_amount_currency' => $currency,
                        'txn_id' => $balance_transaction,
                        'payment_status' => $status,
                        'source_id' => $sourceId,
                        'source_obj' => $sourceObject,
                        'source_brand' => $sourceBrand,
                        'source_country' => $sourceCountry,
                        'source_customer' => $sourceCustomer,
                        'source_expMonth' => $sourceExpMonth,
                        'source_rxp_year' => $sourceRxp_year,
                        'source_last4' => $sourceLast4,
                    );
                    if ($this->db->insert('subscription', $dataDB)) {
                        if ($this->db->insert_id() && $status == 'succeeded') {
                            $data['insertID'] = $this->db->insert_id();
                            $duration = "subscription from ".dateTimeToLocal($start_date)." to ".dateTimeToLocal($end_date);
                            $this->session->set_flashdata(['price'=> $itemPrice, 'duration'=>$duration]);
                            redirect('payment-success');
                        } else {
                            $error = "Transaction has been failed";
                            $this->session->set_flashdata('error', $error);
                            redirect('payment-error');
                        }
                    } else {
                        $error = "not inserted. Transaction has been failed";
                        $this->session->set_flashdata('error', $error);
                        redirect('payment-error');
                    }
                } else {
                    $error =  "Invalid Token";
                    $this->session->set_flashdata('error', $error);
                    redirect('payment-error');
                }
            }
        } catch (\Stripe\Error\Card $e) {
            // Since it's a decline, \Stripe\Error\Card will be caught
            $body = $e->getJsonBody();
            $error = $body['error']['message'];
        } // Probably want to log all of these for later or send yourself a notification
        catch (\Stripe\Error\RateLimit $e) {
            $error = "Sorry, we weren't able to authorize your card. You have not been charged.";
        } catch (\Stripe\Error\InvalidRequest $e) {
            $error = "Sorry, we weren't able to authorize your card. You have not been charged.";
        } catch (\Stripe\Error\Authentication $e) {
            $error = "Sorry, we weren't able to authorize your card. You have not been charged.";
        } catch (\Stripe\Error\ApiConnection $e) {
            $error = "Sorry, we weren't able to authorize your card. You have not been charged.";
        } catch (\Stripe\Error\Base $e) {
            $error = "Sorry, we weren't able to authorize your card. You have not been charged.";
        } catch (Exception $e) {
            $error = "Sorry, we weren't able to authorize your card. You have not been charged. Error<br>" . $e->getMessage();
        }
        $this->session->set_flashdata('error', $error);
        redirect('payment-error');
    }

    public function payment_success()
    {
        $this->load->view('payment_success');
    }

    public function payment_error()
    {
        $this->load->view('payment_error');
    }

}
