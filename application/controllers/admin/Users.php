<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends Home_Controller {

	public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin() && !is_agent() ) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $this->all_users('all');
    }

    //all users list
    public function all_users($type)
    {

        $data = array();
        //initialize pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/users/all_users/'.$type);
        $total_row = $this->admin_model->get_all_users(1 , 0, 0, $type,user()->id);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 15;
        $this->pagination->initialize($config);
        
        $page = $this->security->xss_clean($this->input->get('page'));
        if (empty($page)) {
            $page = 0;
        }
        if ($page != 0) {
            $page = $page - 1;
        }

        $data['page_title'] = 'Users';
        $data['packages'] = $this->admin_model->select('package');
        $data['users'] = $this->admin_model->get_all_users(0 , $config['per_page'], $page * $config['per_page'], $type, user()->id);
        $data['main_content'] = $this->load->view('admin/users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    //active or deactive post
    public function status_action($type, $id) 
    {
        $data = array(
            'status' => $type
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'users');

        if($type ==1):
            $this->session->set_flashdata('msg', trans('activate-successfully')); 
        else:
            $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        endif;
        redirect(base_url('admin/users'));
    }

    //change user role
    public function change_account($id) 
    {
        $data = array(
            'account_type' => $this->input->post('type', false)
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->edit_option($data, $id, 'users');
        $this->session->set_flashdata('msg', trans('updated-successfully')); 
        redirect(base_url('admin/users'));
    }


    public function delete($user_id)
    {
        check_status();

        $this->admin_model->delete_by_user($user_id,'payment');
        $this->admin_model->delete_by_user($user_id,'appointments');
        $this->admin_model->delete_by_user($user_id,'business');
        $this->admin_model->delete_by_user($user_id,'services');
        $this->admin_model->delete_by_user($user_id,'staffs');
        $this->admin_model->delete_by_user($user_id,'customers');
        $this->admin_model->delete($user_id,'users'); 
        echo json_encode(array('st' => 1));
        
    }

    public function createbiz(){
        $data = array();
        $data['page_title'] = 'New User/Business';     
        $data['page'] = 'Business';
        $data['countries'] = $this->admin_model->select_asc('country');
        $data['categories'] = $this->admin_model->select_by_status('categories');
        $data['dialing_codes'] = $this->common_model->select_asc('dialing_codes');
        $data['main_content'] = $this->load->view('business/create', $data,  TRUE);
        $this->load->view('admin/index', $data);
    }

    public function savebiz(){
        if($_POST){

                $mail =  strtolower(trim($this->input->post('email', true)));
                $phone = '+'.$this->input->post('dial_code', true).''.$this->input->post('phone', true);

                $check_phone = $this->auth_model->check_duplicate_phone($phone);
                $email = $this->auth_model->check_duplicate_email($mail);
                
                if ($this->session->userdata('trial') == 'trial') {
                    $user_type = 'trial';
                    $trial_expire = date('Y-m-d', strtotime('+'.$this->settings->trial_days .' days'));
                }else{
                    $user_type = 'registered';
                    $trial_expire = date('Y-m-d');
                }

                if ($check_phone){
                    echo json_encode(array('st'=>2));
                    exit();
                } 

                // if email already exist
                if ($email){
                    //echo json_encode(array('st'=>2));
                    echo "E-mail already exist";
                    exit();
                } else {
                        
                        $code = random_string('numeric', 4);
                        $data=array(
                            'name' => $this->input->post('company_name', true),
                            'slug' => str_slug($this->input->post('company_slug', true)),
                            'user_name' => str_slug($this->input->post('company_slug', true)),
                            'email' => $this->input->post('email', true),
                            'phone' => $phone,
                            'thumb' => 'assets/images/no-photo-sm.png',
                            'password' => hash_password($this->input->post('password', true)),
                            'role' => 'user',
                            'agent_id' => user()->id,
                            'user_type' => $user_type,
                            'trial_expire' => $trial_expire,
                            'status' => 1,
                            'parent_id' => 0,
                            'paypal_payment' => 0,
                            'stripe_payment' => 0, 
                            'verify_code' => $code,
                            'email_verified' => 1,
                            'enable_appointment' => 1,
                            'created_at' => my_date_now()
                        );
                        $data = $this->security->xss_clean($data);
                        $id = $this->common_model->insert($data, 'users');

                        $user = $this->auth_model->validate_id(md5($id));
                        // $data = array(
                        //     'id' => $user->id,
                        //     'name' => $user->name,
                        //     'role' => $user->role,
                        //     'thumb' =>$user->thumb,
                        //     'email' => $user->email,
                        //     'logged_in' => true
                        // );
                        // $this->session->set_userdata($data);

                        $uid = random_string('numeric', 5);
                        $company_data=array(
                            'uid' => $uid,
                            'user_id' => $id,
                            'name' => $this->input->post('company_name', true),
                            'email' => $this->input->post('email', true),
                            'slug' => str_slug($this->input->post('company_slug', true)),
                            'category' => str_slug($this->input->post('category', true)),
                            'details' => $this->input->post('details', true),
                            'country' => $this->input->post('country', true),
                            'type' => 1,
                            'status' => 1,
                            'created_at' => my_date_now()
                        );
                        $company_data = $this->security->xss_clean($company_data);
                        $this->common_model->insert($company_data, 'business');

                        $active_business = array('active_business' => $uid);
                        // $this->session->set_userdata($active_business);
                        
                        $plan = $this->input->post('plan', true);
                        $billing = $this->input->post('billing', true);

                        $package = $this->common_model->get_by_slug($plan, 'package');
                        if ($billing == 'monthly') {
                            $price = $package->monthly_price;
                            $expire = date('Y-m-d', strtotime('+1 month'));
                        } else {
                            $price = $package->price;
                            $expire = date('Y-m-d', strtotime('+12 month'));
                        }
                        
                        //make payment
                        $pay_data=array(
                            'user_id' => $user->id,
                            'puid' => random_string('numeric',5),
                            'package_id' => $package->id,
                            'amount' => $price,
                            'billing_type' => $billing,
                            'status' => 'pending',
                            'created_at' => my_date_now(),
                            'expire_on' => $expire
                        );
                        $pay_data = $this->security->xss_clean($pay_data);
                        $this->common_model->insert($pay_data, 'payment');
                        redirect(base_url('admin/users'));
                    
                }

            
        }
    }


}