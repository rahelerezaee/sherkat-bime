<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_page extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');
    }

    public function index($reloaded=null){

        if($this->pages->check_logged_in()){
            $roles = $this->retrieve_model->all_roles_retrieve();
            $this->pages->show_page('register_page','ثبت نام',array($reloaded,'roles'=>$roles));
        }
        else
            $this->pages->show_login_page();

    }

    public function show_register_page($reloaded=null){
        if($this->pages->check_logged_in()){
            $roles = $this->retrieve_model->all_roles_retrieve();
            $this->pages->show_page('register_page','ثبت نام',array($reloaded,'roles'=>$roles));
        }
        else
            $this->pages->show_login_page();
    }

    public function show_update_user($user_id,$err){
        if($this->pages->check_logged_in()){
            $user = $this->retrieve_model->retrieve_user(array('user_id'=>$user_id));
            $roles = $this->retrieve_model->all_roles_retrieve();

            $this->pages->show_page('update_registered_user','به روز رسانی کاربران',array('user'=>$user[0],'err'=>$err,'roles'=>$roles));
        }
        else
            $this->pages->show_login_page();
    }

    public function show_registerd_user_page($succ=null){
        if($this->pages->check_logged_in())
        {
            $users = $this->retrieve_model->retrieve_users_with_roles();
            $this->pages->show_page('registerd_user_page','کاربران ثبت نام شده',array('users'=>$users , 'succ'=>$succ));
        }
        else
            $this->pages->show_login_page();
    }

    public function add_new_user(){

        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        $this->form_validation->set_rules('f_name','نام','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('l_name','نام خانوادگی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('username','نام کاربری','required|is_unique[users.username]',array('required'=>'وارد کردن %s اجباری می باشد','is_unique'=>'نام کاربری وارد شده تکراری می باشد'));
        $this->form_validation->set_rules('key','رمز عبور','required',array('required'=>'وارد کردن %s اجباری می باشد'));

        if($this->form_validation->run()){

            $fname=$this->input->post('f_name');
            $lname=$this->input->post('l_name');
            $role_id = $this->input->post('role');
            $contract_start=$this->input->post('start_date');
            $contract_end=$this->input->post('end_date');
            $username=$this->input->post('username');
            $password=$this->input->post('key');
            $active = ($this->input->post('active_user')=='on')?true:false;
            $this->load->model('crud','crud_model');
            $this->crud_model->insert_new_user($fname,$lname,$contract_start,$contract_end,$username,$password,$role_id,$active);
            $this->show_register_page(1);
        }
        else{
            $this->show_register_page(0);
        }

    }

    public function deactive_user($user_id,$activation_status){
        if($this->pages->check_logged_in()){
            $this->load->model('update_model');
            $this->update_model->update_user(array('user_id'=>$user_id),array('active'=>1 - $activation_status));
            redirect('register_page/show_registerd_user_page');
        }
        else
            $this->pages->show_login_page();
    }

    public function update_user($user_id){
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            $this->form_validation->set_rules('f_name','نام','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            $this->form_validation->set_rules('l_name','نام خانوادگی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            $this->form_validation->set_rules('username','نام کاربری','required',array('required'=>'وارد کردن %s اجباری می باشد',));

            if($this->form_validation->run()){
                $this->load->model('update_model');
                if($this->input->post('key')!=''){
                    $value = array(
                        'f_name' => $this->input->post('f_name'),
                        'l_name' => $this->input->post('l_name'),
                        'role_id' => $this->input->post('role'),
                        'contract_start' => $this->input->post('start_date'),
                        'contract_end' => $this->input->post('end_date'),
                        'username' =>  $this->input->post('username'),
                        'password' => md5($this->input->post('key')),
                        'active' => ($this->input->post('active_user')=='on')?true:false
                    );
                }
                else{
                    $value = array(
                        'f_name' => $this->input->post('f_name'),
                        'l_name' => $this->input->post('l_name'),
                        'role_id' => $this->input->post('role'),
                        'contract_start' => $this->input->post('start_date'),
                        'contract_end' => $this->input->post('end_date'),
                        'username' =>  $this->input->post('username'),
                        'active' => ($this->input->post('active_user')=='on')?true:false
                    );
                }


                $this->update_model->update_user(array('user_id'=>$user_id),$value);
                redirect('register_page/show_registerd_user_page/1');
            }
            else
                $this->show_update_user($user_id,2);
        }
        else
            $this->show_login_page();
    }

}
