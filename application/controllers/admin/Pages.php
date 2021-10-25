<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Home_Controller {

    public function __construct()
    {
        parent::__construct();
        //check auth
        if (!is_admin() && !is_user()) {
            redirect(base_url());
        }
    }


    public function index()
    {
        $data = array();
        $data['page_title'] = 'Pages';  
        $data['page'] = FALSE;
        $data['pages'] = $this->admin_model->select('pages');
        $data['main_content'] = $this->load->view('admin/pages',$data,TRUE);
        $this->load->view('admin/index',$data);
    }



    public function add()
    {	
        check_status();
        
        if($_POST)
        {   
            $id = $this->input->post('id', true);

            //validate inputs
            $this->form_validation->set_rules('title', 'Title', 'required');
            
            if ($this->form_validation->run() === false) {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('admin/pages'));
            } else {
                $data=array(
                    'title' => $this->input->post('title'),
                    'slug' => str_slug(trim($this->input->post('slug'))),
                    'details' => $this->input->post('details'),
                    'status' => 1,
                    'created_at' => my_date_now()
                );

                //if id available info will be edited
                if ($id != '') {
                    $this->admin_model->edit_option($data, $id, 'pages');
                    $this->session->set_flashdata('msg', trans('updated-successfully')); 
                } else {
                    $id = $this->admin_model->insert($data, 'pages');
                    $this->session->set_flashdata('msg', trans('inserted-successfully')); 
                }
            }
            redirect(base_url('admin/pages'));

        }      
        
    }

    public function edit($id)
    {  
        $data = array();
        $data['page_title'] = 'Edit';   
        $data['page'] = $this->admin_model->select_option($id, 'pages');
        $data['main_content'] = $this->load->view('admin/pages',$data,TRUE);
        $this->load->view('admin/index',$data);
    }

    
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'pages');
        $this->session->set_flashdata('msg', trans('activate-successfully')); 
        redirect(base_url('admin/pages'));
    }

    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->admin_model->update($data, $id,'pages');
        $this->session->set_flashdata('msg', trans('deactivate-successfully')); 
        redirect(base_url('admin/pages'));
    }

    public function delete($id)
    {
        $this->admin_model->delete($id,'pages'); 
        echo json_encode(array('st' => 1));
    }

    //*************** this is for page-module creator different from the normal page *********************

    public function all(){
        $data = array();
        $data['page_title'] = 'All Pages';     
        $data['page'] = 'Pages';
        $data['view_link'] = base_url('admin/pages/single/');
        $data['pages'] = $this->common_model->get_all('page_module');
        $data['main_content'] = $this->load->view('page_module/all', $data,  TRUE);
        $this->load->view('admin/index', $data);
    }

    public function create(){
        $data = array();
        $data['page_title'] = 'Create Page';    
        $data['page'] = 'Pages';
        $data['main_content'] = $this->load->view('page_module/create', $data,  TRUE);
        $this->load->view('admin/index', $data);
        
    }

    public function save_page(){
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $content = $this->input->post('content', true);
        $data = [
            'title' => $title,
            'link' => $link,
            'content' => $content
        ];
        $data = $this->security->xss_clean($data);
        $this->common_model->insert($data, 'page_module');
        redirect(base_url('admin/pages/all'));
    }

    public function single($id){
        $data = array();
        $data['page_title'] = 'Single Page';    
        $data['page'] = 'Page';
        $data['single'] = $this->common_model->select_optional($id, 'page_module');
        $data['main_content'] = $this->load->view('page_module/single', $data,  TRUE);
        $this->load->view('admin/index', $data);
    }

    public function modify($id){
        $data = array();
        $data['page_title'] = 'Edit Page';    
        $data['page'] = 'Page';
        $data['single'] = $this->common_model->select_optional($id, 'page_module');
        $data['main_content'] = $this->load->view('page_module/edit', $data,  TRUE);
        $this->load->view('admin/index', $data);
    }

    public function affect(){
        $page_id = $this->input->post('page_id');
        $title = $this->input->post('title', true);
        $link = $this->input->post('link', true);
        $content = $this->input->post('content', true);
        $data = [
            'title' => $title,
            'link' => $link,
            'content' => $content
        ];
        $this->common_model->update($data, $page_id, 'page_module');
        redirect(base_url('admin/pages/all'));
    }

    public function remove($id){
        $this->db->delete('page_module', ['id'=>$id]);
        redirect($_SERVER['HTTP_REFERER']);       
    }
    

}
	

