<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class location_page extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');

    }

    public function index(){
        if($this->pages->check_logged_in())
        {
            $locations = $this->retrieve_model->locations_retrieve();
            $this->pages->show_page('locations_page','موقعیت ها',$locations);
        }
        else
            $this->pages->show_login_page();
    }

    public function insert_new_location(){
        if($this->pages->check_logged_in())
        {
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('location_name','نام موقعیت','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            if($this->form_validation->run())
            {
                $location_name = $this->input->post('location_name');
                $location_address = $this->input->post('location_address');
                $this->load->model('crud','crud_model');
                $this->crud_model->add_location(array('location_name'=>$location_name,'location_address'=>$location_address));
                redirect('location_page');
            }
            else
                $this->index();

        }
        else
            $this->pages->show_login_page();
    }

    public function delete_location($id){
        if($this->pages->check_logged_in())
        {
            $this->load->model('delete_model');
            $this->delete_model->delete_location(array('location_id'=>$id));
            redirect('location_page');

        }
        else
            $this->pages->show_login_page();

    }

}