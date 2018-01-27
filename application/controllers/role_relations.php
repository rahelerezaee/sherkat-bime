<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class role_relations extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');
    }

    public function index(){
        if($this->pages->check_logged_in()){
            $roles_duty = $this->retrieve_model->all_duty_role_retrieve();
            $roles = $this->retrieve_model->all_roles_retrieve();

            $this->pages->show_page('role_page','ارتباط نقش ها',array('roles_duty'=>$roles_duty , 'roles'=>$roles));
        }
        else
            $this->pages->show_login_page();
    }

    public function show_role_page()
    {
        if($this->pages->check_logged_in()){
            $roles_duty = $this->retrieve_model->all_duty_role_retrieve();
            $roles = $this->retrieve_model->all_roles_retrieve();
            //print_r($roles_duty);
            $this->pages->show_page('role_page','ارتباط نقش ها',array('roles_duty'=>$roles_duty , 'roles'=>$roles));
        }
        else
            $this->pages->show_login_page();
    }

    public function insert_new_role(){
        if($this->pages->check_logged_in())
        {
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('user1','نام های کاربری','callback_check_equal|callback_check_unique');

            if($this->form_validation->run())
            {
                $role1=$this->input->post('user1');
                $role2=$this->input->post('user2');
                $insert_data = array(
                    'role1'=>$role1,
                    'role2'=>$role2
                );
                $this->load->model('crud','crud_model');
                $this->crud_model->add_new_roles($insert_data);
                redirect('role_relations/show_role_page');
            }
            else
                $this->show_role_page();

        }
        else
            $this->pages->show_login_page();
    }

    public function check_unique(){
        $field1 = $this->input->post('user1');
        $field2 = $this->input->post('user2');
        //echo $field1 . ' ' .$field2;
        $where = array(
            'role1' => $field1,
            'role2' =>$field2
        );
        $this->form_validation->set_message('check_unique','نقش های انتخاب شده قبلا وارد شده اند');
        return $this->retrieve_model->check_uniqe_for_roles($where);
    }

    public function check_equal(){
        $role1=$this->input->post('user1');
        $role2=$this->input->post('user2');
        if($role1 == $role2){
            $this->form_validation->set_message('check_equal','نقش های وارد شده نباید یکسان باشند');
            return false;
        }
        else
            return true;

    }

    public function delete_roles_duty($id){

        if($this->pages->check_logged_in()) {
            $where = array(
                'id' => $id,
            );
            $this->load->model('delete_model');
            $this->delete_model->delete_role($where);
            redirect('role_relations/show_role_page');
        }
        else
            $this->pages->show_login_page();
    }
}