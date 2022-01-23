<?php 
/**
 * 
 */
class Home extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));

    }

	function index(){
        $this->load->model('ride');
		$data = array(
			'title' => "Sedoubana - The Best Ride Share"
		);
//        $data['depCites']=$this->ride->getDepCites();
//        $data['destCity']=$this->ride->getDesCites();
        $data['cites']=$this->ride->getAllCites();
		$this->load->view('index', $data);
	}

    function Autocomplete(){
        $this->load->model('ride');
        if (isset($_GET['term'])) {
            $result = $this->ride->search_city($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->name;
                echo json_encode($arr_result);
            }
        }
    }
    function privacy_policy(){
        $data = array(
            'title' => "Privacy Policy"
        );
        $this->load->view('privacy-policy', $data);
    }
    function terms_condition(){
        $data = array(
            'title' => "Terms and Condition"
        );
        $this->load->view('terms-condition', $data);
    }
    function faq(){
        $data = array(
            'title' => "FAQ"
        );
        $this->load->view('faq', $data);
    }
}
 ?>