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
class Subscription extends CI_Controller
{
    //Load libraries in Constructor.
    public function __construct()
    {
        parent::__construct();
        require_once('application/libraries/stripe-php/init.php');
    }

    public function index()
    {
        $data['title'] = "Stripe Manage Subscription Payment using Codeigniter - TechArise";
        $this->load->view('subscription', $data);
    }



//    public function checkout()
//    {
//        $this->load->model('subscriptionModel');
//        $uid = $this->session->userdata('uid');
//        $user = $this->subscriptionModel->getUserById($uid);
//        $setting = $this->subscriptionModel->getSetting();
//        $plan = $setting->sub_plan;
//        $interval = $setting->sub_interval;
//        $price = $setting->sub_price;
//        $currency = $setting->sub_currency;
//        \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
//        $plan = \Stripe\Plan::create(array(
//            "product" => [
//                "name" => $plan,
//                "type" => "service"
//            ],
//            "nickname" => $plan,
//            "interval" => $interval,
//            "interval_count" => "1",
//            "currency" => $currency,
//            "amount" => ($price * 100),
//        ));
//        $customer = \Stripe\Customer::create([
//            'email' => $user->email,
//            'name' => ucfirst($user->fname.' '.$user->lname),
//        ]);
//        $checkout_session = \Stripe\Checkout\Session::create([
//            'success_url' => base_url() . 'payment-success?session_id={CHECKOUT_SESSION_ID}',
//            'cancel_url' => base_url() . 'payment-error',
//            'payment_method_types' => ['card'],
//            'subscription_data' => [
//                'items' => [[
//                'plan' => $plan->id,
//            ]]]
//        ]);
//        echo json_encode(array('sessionId' => $checkout_session['id']));
//    }

    // create subscription
    public function create()
    {
        $this->load->model('subscriptionModel');
        $data['title'] = "Stripe Manage Subscription Payment using Codeigniter - TechArise";
        $uid = $this->session->userdata('uid');
        $user = $this->subscriptionModel->getUserById($uid);
        $setting = $this->subscriptionModel->getSetting();
        try {
            \Stripe\Stripe::setApiKey('sk_test_rCPBGpdY0OHBodwKzgWeBpkN00g7Hzfjrg');
            $token = $this->input->post('stripeToken');
            $email = $this->input->post('stripeEmail');
            $plan = $setting->sub_plan;
            $interval = $setting->sub_interval;
            $price = $setting->sub_price;
            $currency = $setting->sub_currency;
            $time = time();
            $plan = \Stripe\Plan::create(array(
                "product" => [
                    "name" => $plan,
                    "type" => "service"
                ],
                "nickname" => $plan,
                "interval" => $interval,
                "interval_count" => "1",
                "currency" => $currency,
                "amount" => $price,
            ));

            $customer = \Stripe\Customer::create([
                'email' => $email,
                'name' => ucfirst($user->fname.' '.$user->lname),
                'source' => $token,
            ]);

            $subscription = \Stripe\Subscription::create(array(
                "customer" => $customer->id,
                "items" => array(
                    array(
                        "plan" => $plan->id,
                    ),
                ),
            ));
            $chargeJson = $subscription->jsonSerialize();
            $plan = $chargeJson['plan'];

            //insert tansaction data into the database
            $dataDB = array(
                'uid' => $uid,
                'email' => $email,
                'sub_id' => $chargeJson['id'],
                'subscription_start' => $chargeJson['current_period_start'],
                'subscription_end' => $chargeJson['current_period_end'],
                'collection_method' => $chargeJson['collection_method'],
                'customer' => $chargeJson['customer'],
                'plan_id' => $plan['id'],
                'amount_paid' => $plan['amount'],
                'subscription_interval' => $plan['interval'],
                'product' => $plan['product'],
                'active' => $plan['active'],
                'status' => $chargeJson['status'],
                'created' => $chargeJson['created'],
            );
            $status = $this->subscriptionModel->insert($dataDB);
            if ($status) {
                $this->session->set_flashdata('price', $price);
                redirect('payment-success');
            }else{
                $this->session->set_flashdata('error', "Error in subscription");
                redirect('payment-error');
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
            $error = "Sorry, we weren't able to authorize your card. You have not been charged. Error<br>".$e->getMessage();
        }
        $this->session->set_flashdata('error', $error);
        redirect('payment-error');
    }

    public function Success()
    {
//        $id = $_GET['session_id'];
//        \Stripe\Stripe::setApiKey(STRIPE_SECRET_KEY);
//        $checkout_session = \Stripe\Checkout\Session::retrieve($id);
//        dd($checkout_session);
//        json_encode($checkout_session);
//        exit;
        $data['title'] = "Subscription Success";
        $data['price'] = $this->session->flashdata('price');
        $this->load->view('payment_success', $data);
    }

    public function Error()
    {
        $data['title'] = "Subscription Success";
        $data['error'] = $this->session->flashdata('error');
        $this->load->view('payment_error', $data);
    }

}
