<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class role_page extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');

    }

    public function index($success_added=null){

        if($this->pages->check_logged_in()){
            $this->pages->show_page('role_definition_page','تعرف نقش',$success_added);
        }
        else
            $this->pages->show_login_page();

    }
    public function show_role_definition_page($success_added=null){
        if($this->pages->check_logged_in()){
            $this->pages->show_page('role_definition_page','تعرف نقش',$success_added);
        }
        else
            $this->pages->show_login_page();
    }

    public function show_update_role_per($role_id){
        if($this->pages->check_logged_in()){
            $role = $this->retrieve_model->retrieve_role_by_id(array('id'=>$role_id));
            $this->pages->show_page('update_role_permissions','به روز رسانی مجوزها',$role[0]);
        }
        else
            $this->pages->show_login_page();
    }

    public function show_role_registered_display($edited=null){
        if($this->pages->check_logged_in()){
            $roles = $this->retrieve_model->all_roles_retrieve();
            $this->pages->show_page('registered_role_display','نقش های ثبت شده',array($roles,$edited));
        }
        else
            $this->pages->show_login_page();
    }

    public function update_role_per($id){
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('role_name','نام نقش','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            //echo $this->input->post('permission');
            if($this->form_validation->run()){
                $this->load->model('crud');
                $this->load->model('delete_model');
                $this->load->model('update_model');
                $this->delete_model->delete_per(array('role_id'=>$id));
                $permissions = explode(',',$this->input->post('permission'));
                for ($i=0;$i<count($permissions)-1;$i++)
                    $this->crud->add_new_role_per(array('role_id'=>$id,'permission'=>$permissions[$i]));
                $this->update_model->update_role_name(array('id'=>$id),array('role_name'=>$this->input->post('role_name')));
                redirect('role_page/show_role_registered_display/1');

            }
            else
                $this->show_update_role_per($id);
        }
        else
            $this->show_login_page();
    }

    public function insert_new_role_per(){       //tik   zadana
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('role_name','نام نقش','required|is_unique[roles.role_name]',array('required'=>'وارد کردن %s اجباری می باشد','is_unique'=>'نام نقش وارد شده تکراری می باشد'));

            if($this->form_validation->run()){
                $this->load->model('crud');
                $role_id = $this->crud->add_new_role_name(array('role_name'=>$this->input->post('role_name')));
                $permissions = explode(',',$this->input->post('permission'));
                for ($i=0;$i<count($permissions)-1;$i++)
                    $this->crud->add_new_role_per(array('role_id'=>$role_id,'permission'=>$permissions[$i]));
                redirect('role_page/show_role_definition_page/1');

            }
            else
                $this->show_role_definition_page();
        }
        else
            $this->pages->show_login_page();
    }

    public function delete_role($id){
        if($this->pages->check_logged_in()){
            $this->load->model('delete_model');
            $this->delete_model->delete_from_role_table(array('id'=>$id));
            redirect('role_page/show_role_registered_display');
        }
        else{
            $this->pages->show_login_page();
        }
    }
}