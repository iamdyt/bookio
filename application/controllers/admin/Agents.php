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
        $data['agents'] = $this->common_model->select_by_role_payment('users','agent');
        $data['agent_plans'] = $this->common_model->select_asc('agent_plan');
        $data['main_content'] = $this->load->view('agents/agents', $data,  TRUE);
        
        $this->load->view('admin/index', $data);
    }

    public function create(){
        $data = array();
        $data['page_title'] = 'New Agents';     
        $data['page'] = 'Agents';
        $data['agent_plans'] = $this->common_model->get_all('agent_plan');
        $data['main_content'] = $this->load->view('agents/create', $data,  TRUE);
        $this->load->view('admin/index', $data);
    }

    public function save(){   
        if($_POST){
            $plan = $this->common_model->get_by_id($this->input->post('plan'), 'agent_plan');
            $expire ="";
            if($plan->bill_type == 'monthly'){
                $expire.="+1 month";
            }else{
                $expire.="+12 month";
            }
            $message = urlencode("Agent Created Successfully");
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
            $agent_id = $this->common_model->insert($data, 'users');
            
            $agent_payment = [
                'agent_id' => $agent_id,
                'plan_id' => $plan->id,
                'amount' => $plan->price,
                'status' => 'pending',
                'created_at' => my_date_now(),
                'expires_on' => date('Y-m-d', strtotime($expire))
            ];
            $this->common_model->insert($agent_payment, 'agent_payment');
        }
        redirect($_SERVER['HTTP_REFERER'].'/?message='.$message);
    }

    public function delete($id){
        $this->common_model->delete_agent($id, 'users','agent_payment');
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function plan_update($agent_id, $plan_id){
        // action,id, table
        $plan = $this->common_model->select_plan_by_name('agent_plan', $this->input->get('plan'));
        
        $expire ="";
        if($plan->bill_type == 'monthly'){
            $expire.="+1 month";
        }else{
            $expire.="+12 month";
        }

        $data = [
            'agent_id' => $agent_id,
            'plan_id' => $plan_id,
            'amount' => '5000',
            'payment_method' => '',
            'status' => 'pending',
            'created_at' => my_date_now(),
            'expires_on' => date('Y-m-d', strtotime($expire))
        ];
        
        $this->common_model->update_plan($data, $agent_id, 'agent_payment');
        redirect(base_url('admin/agents/all'));
    }

    public function plans(){
        $data = array();
        $data['page_title'] = 'Agent Plans';     
        $data['page'] = 'Agent Plans';
        $data['agent_plans'] = $this->common_model->select_asc('agent_plan');
        $data['main_content'] = $this->load->view('agents/plans', $data,  TRUE);
        
        $this->load->view('admin/index', $data);
    }

    public function edit_plan($id){
        $data = array();
        $data['page_title'] = 'Edit Plan';     
        $data['page'] = 'Edit Plan';
        $data['plan'] = $this->common_model->get_by_id($id,'agent_plan');
        $data['main_content'] = $this->load->view('agents/edit_plan', $data,  TRUE);
        
        $this->load->view('admin/index', $data);
    }

    public function update_agent_plan($id){
        // action, id, table
        $data = [
            'plan_name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'permitted_biz' => $this->input->post('biz')
        ];
        $this->common_model->update($data, $id, 'agent_plan');
        redirect(base_url('admin/agents/plans'));
    }
}