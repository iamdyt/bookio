<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agents extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!is_admin()) {
            redirect(base_url());
        }
    }

    public function all(){
        $data = array();
        $data['page_title'] = 'All Agents';     
        $data['page'] = 'Agents';
        $data['agents'] = $this->common_model->select_by_role('users','agent');
        $data['main_content'] = $this->load->view('agents/agents', $data,  TRUE);
        
        $this->load->view('admin/index', $data);
    }

    public function create(){
        $data = array();
        $data['page_title'] = 'New Agents';     
        $data['page'] = 'Agents';
        $data['main_content'] = $this->load->view('agents/create', $data,  TRUE);
        $this->load->view('admin/index', $data);
    }

    public function save(){   
        if($_POST){
            $data = [
                'name' => $this->input->post('name'),
                'slug' => str_slug($this->input->post('name')),
                'email' => $this->input->post('email'),
                'user_name'=> $this->input->post('username'),
                'password'=>hash_password($this->input->post('password')),
                'role'=> 'agent',
                'thumb' => 'assets/images/no-photo-sm.png',
                'phone' => $this->input->post('phone'),
                'user_type' => 'registered',
                'status' => 1,
                'paypal_mode' => 'live',
                'paypal_payment' => 1,
                'stripe_payment' => 1,
                'email_verified' => 1,
                'enable_appointment'=> 0,
                'enable_sms_notify' => 0,
                'enable_sms_alert' => 0,
                'enable_rating' => 0,
                'currency' => 'USD',
                'created_at' => my_date_now()

            ];
            $data = $this->security->xss_clean($data);
            $this->common_model->insert($data, 'users');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id){
        $this->common_model->delete_agent($id, 'users');
        redirect($_SERVER['HTTP_REFERER']);
    }

}