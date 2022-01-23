<?php


class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('auth/login');
        }
        $this->load->model('settingsModel');
        $this->load->library('session');
    }

    public function Settings()
    {
        $data["title"] = 'Settings';
        $data["selected"] = 'site_setting';
        $sub = $this->input->post('sub');
        if (isset($sub)) {
            if ($this->input->post('type') == 'site_setting') {
                $getSetting = $this->settingsModel->getAll();
                $siteLogoPath = $getSetting->site_logo;
                $site_favicon = $getSetting->site_favicon;
                $data["selected"] = 'site_setting';
                if(!empty($_FILES['site_logo']['name'])){
                    $file = $this->uploadImage($_FILES['site_logo'],'site_logo');
                    if($file['status']=='1'){
                        $siteLogoPath = $file['file'];
                    }
                }
                if(!empty($_FILES['site_logo']['name'])){
                    $file = $this->uploadImage($_FILES['site_favicon'],'site_favicon');
                    if($file['status']=='1'){
                        $site_favicon = $file['file'];
                    }
                }
                $setData = array(
                    'site_title' => $this->input->post('site_title'),
                    'site_description' => $this->input->post('site_description'),
                    'site_nav' => $this->input->post('site_nav'),
                    'site_logo' => $siteLogoPath,
                    'site_favicon' => $site_favicon,
                    'analytics_code' => $this->input->post('analytics_code')
                );
                $this->settingsModel->update($setData);

            } else if ($this->input->post('type') == 'email_setting') {
                $data["selected"] = 'email_setting';
                $setData = array(
                    'protocol' => $this->input->post('protocol'),
                    'smtp_host' => $this->input->post('smtp_host'),
                    'smtp_port' => $this->input->post('smtp_port'),
                    'smtp_user' => $this->input->post('smtp_user'),
                    'smtp_pass' => $this->input->post('smtp_pass'),
                    'mailtype' => $this->input->post('mailtype'),
                    'charset' => $this->input->post('charset')
                );
                $this->settingsModel->update($setData);
            }else if ($this->input->post('type') == 'sub_setting') {
                $data["selected"] = 'sub_setting';
                $setData = array(
                    'sub_plan' => $this->input->post('sub_plan'),
                    'sub_interval' => $this->input->post('sub_interval'),
                    'sub_price' => $this->input->post('sub_price'),
                    'sub_currency' => $this->input->post('sub_currency')
                );
                $this->settingsModel->update($setData);
            }
            $this->session->set_flashdata('success', 'Updated successfully');

        }
        $data["setting"] = $this->settingsModel->getAll();
        $this->load->view('settings', $data);
    }


    public function uploadImage($file, $type) {
        if(!empty($file)){
            $name = $file['name'];
            $unique = strtotime(date('Y-m-d h:i:s'));
            $getfile = pathinfo($name);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $config['upload_path'] = '../uploads/';
            $config['allowed_types'] = 'jpg|png';
            $config['overwrite'] = TRUE;
            $config['max_size']  = 2048;
            $config['file_name'] = normalizeString($getfile['filename']) .'-'. $unique . '.'.$extension;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($type))
            {
                return ['status'=>'0','message'=>$this->upload->display_errors()];
            }
            else
            {
                return ['status'=>'1', 'file' => 'uploads/' . $config['file_name']];
            }
        }else{
            return ['status'=>'0'];
        }
    }


}