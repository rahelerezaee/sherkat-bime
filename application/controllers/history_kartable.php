<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class history_kartable extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');
        $this->load->library('pagination_configuration');
    }

    public function index(){
        if($this->pages->check_logged_in()){
            $result0 = $this->retrieve_model->history_form_retrieve($this->session->userdata('user_id'));
            for($i=0;$i<count($result0);$i++)
            {
                $result0[$i]['register_date'] = $this->pages->date_conv_to_jalai($result0[$i]['register_date'],'-');

                $result0[$i]['dead_line'] =($result0[$i]['dead_line']==null)?'': $this->pages->date_conv_to_jalai($result0[$i]['dead_line'],'-');
            }
            $this->pages->show_page('inbox_history_page','کارتابل سابق',array($result0));
        }
        else
            $this->pages->show_login_page();
    }

    public function show_inbox_history_page(){    //namayeshe koli form ha

        if($this->pages->check_logged_in()){
            $result0 = $this->retrieve_model->history_form_retrieve($this->session->userdata('user_id'));
            for($i=0;$i<count($result0);$i++)
            {
                $result0[$i]['register_date'] = $this->pages->date_conv_to_jalai($result0[$i]['register_date'],'-');

                $result0[$i]['dead_line'] =($result0[$i]['dead_line']==null)?'': $this->pages->date_conv_to_jalai($result0[$i]['dead_line'],'-');
            }
            $this->pages->show_page('inbox_history_page','کارتابل سابق',array($result0));
        }
        else
            $this->pages->show_login_page();
    }

    public function just_show_form_page($form_serial){     // klik kardim ro yeki
        if($this->pages->check_logged_in()){
            $where = array('indicator_num'=>$form_serial);

            $form_data = $this->retrieve_model->form_retrieve($where);
            $user_data = '';
            $kartable_user = $this->retrieve_model->retrieve_user(array('user_id'=>$form_data[0]['kartable_user_id']));
            $mali_data = $this->retrieve_model->mali_detail_retrieve($form_data[0]['indicator_num']);

            $form_data[0]['register_date'] = $this->pages->date_conv_to_jalai($form_data[0]['register_date'],'-');
            $form_data[0]['sign_date'] = $this->pages->date_conv_to_jalai($form_data[0]['sign_date'],'-');
            $form_data[0]['birth_date'] = $this->pages->date_conv_to_jalai($form_data[0]['birth_date'],'-');
            $form_data[0]['birth_date2'] = $this->pages->date_conv_to_jalai($form_data[0]['birth_date2'],'-');
            $form_data[0]['tarikh_bime_name'] = ($form_data[0]['tarikh_bime_name']==''||$form_data[0]['tarikh_bime_name']=='0000-00-00')?'':$this->pages->date_conv_to_jalai($form_data[0]['tarikh_bime_name'],'-');
            $form_data[0]['tarikh_pishnahad'] = ($form_data[0]['tarikh_pishnahad']==''||$form_data[0]['tarikh_pishnahad']=='0000-00-00')?'':$this->pages->date_conv_to_jalai($form_data[0]['tarikh_pishnahad'],'-');

            $duty_data = $this->retrieve_model->form_duty_retrieve(array('form1_id'=>$form_serial));
            $this->pages->show_page('form_preview','فرم پیشنهادی ' . $form_serial,
                array($form_data[0],$user_data,$mali_data,$kartable_user[0],'duty_data'=>$duty_data));
        }
        else
            $this->pages->show_login_page();
    }

    public function show_results($result0){
        if($this->pages->check_logged_in()){
            for($i=0;$i<count($result0['forms']);$i++)
            {
                $result0['forms'][$i]['register_date'] = $this->pages->date_conv_to_jalai($result0['forms'][$i]['register_date'],'-');
                $result0[$i]['dead_line'] =($result0[$i]['dead_line']==null)?'': $this->pages->date_conv_to_jalai($result0[$i]['dead_line'],'-');
            }
            $this->pages->show_page('inbox_history_page','کارتابل سابق',array($result0));

        }
        else
            $this->pages->show_login_page();
    }
}