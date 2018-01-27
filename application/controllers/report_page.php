<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class report_page extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pages');
    }

    public function index(){
        if($this->pages->check_logged_in()){
            $this->pages->show_page('report_page','گزارش گیری');
        }
        else
            $this->pages->show_login_page();
    }

}