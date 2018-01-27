<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retrieve_page extends CI_Controller{    ///kole kartable jari +  login + ...

    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model','retrieve_model');
        $this->load->library('pages');

    }

    public function index(){
        $this->show_login_page();
    }

    public function show_login_page(){
        $this->pages->show_login_page();
    }

    public function show_home_page(){
        if($this->pages->check_logged_in())
        {
            $this->session->userdata('user_id');

            redirect('retrieve_page/show_first_page');
            //redirect()
        }
        else
            $this->pages->show_login_page();
    }

    public function show_first_page(){
        if($this->pages->check_logged_in())
            $this->pages->show_page('home_page','خانه');
        else
            $this->pages->show_login_page();
    }

    public function show_inbox_page($un_sent_forms = null){
        if($this->pages->check_logged_in()){
            $now = new DateTime();
            $result0 = $this->retrieve_model->show_kartable_forms(array('kartable_user_id' => $this->session->userdata('user_id')));
            for($i=0;$i<count($result0);$i++)
            {
                $result0[$i]['register_date'] = $this->pages->date_conv_to_jalai($result0[$i]['register_date'],'-');
                if(strtotime($result0[$i]['dead_line'])<strtotime($now->format('Y-m-d'))&&$result0[$i]['dead_line']!=null)
                    $result0[$i]['color'] = 0;
                else{
                    if (strtotime($result0[$i]['dead_line']) == strtotime($now->format('Y-m-d'))){
                        if(strtotime($result0[$i]['dead_time']) < strtotime($now->format('H:i:s')))
                            $result0[$i]['color'] = 0;
                        else
                            $result0[$i]['color'] = 1;
                    }
                    else
                        $result0[$i]['color'] = 2;
                }
                $result0[$i]['dead_line'] =($result0[$i]['dead_line']==null)?'': $this->pages->date_conv_to_jalai($result0[$i]['dead_line'],'-');
            }
            $result1 = $this->retrieve_model->role_retrieve($this->session->userdata('role_id'));
            $this->pages->show_page('inbox_page','فرم های پیشنهادی دریافت شده',array($result0,$result1,'num_of_un_sent_form'=>$un_sent_forms));
        }
        else
            $this->pages->show_login_page();
    }

    public function show_form_representation_page($form_serial){
        if($this->pages->check_logged_in()){

            $where = array('indicator_num'=>$form_serial);
            $this->load->model('update_model');
            $this->update_model->update_seen_of_form1_table($where);
            $form_data = $this->retrieve_model->form_retrieve($where);
            $roles = $this->retrieve_model->role_retrieve($this->session->userdata('role_id'));
            $where = array('user_id' => $this->session->userdata('user_id'));
            $user_data = $this->retrieve_model->retrieve_user($where);
            $mali_data = $this->retrieve_model->mali_detail_retrieve($form_data[0]['indicator_num']);
            $duty_data = $this->retrieve_model->form_duty_retrieve(array('reciever_id'=>$this->session->userdata('user_id'),'form1_id'=>$form_serial));
            $form_data[0]['register_date'] = $this->pages->date_conv_to_jalai($form_data[0]['register_date'],'-');
            $form_data[0]['sign_date'] = $this->pages->date_conv_to_jalai($form_data[0]['sign_date'],'-');
            $form_data[0]['birth_date'] = $this->pages->date_conv_to_jalai($form_data[0]['birth_date'],'-');
            $form_data[0]['birth_date2'] = $this->pages->date_conv_to_jalai($form_data[0]['birth_date2'],'-');
            $form_data[0]['tarikh_bime_name'] = ($form_data[0]['tarikh_bime_name']==''||$form_data[0]['tarikh_bime_name']=='0000-00-00')?'':$this->pages->date_conv_to_jalai($form_data[0]['tarikh_bime_name'],'-');
            $form_data[0]['tarikh_pishnahad'] = ($form_data[0]['tarikh_pishnahad']==''||$form_data[0]['tarikh_pishnahad']=='0000-00-00')?'':$this->pages->date_conv_to_jalai($form_data[0]['tarikh_pishnahad'],'-');
            $count = 0;
            foreach ($duty_data as $row){
                if($row['done'] == 0)
                    $count++;
            }
            if($this->session->userdata('user_id')==$form_data[0]['kartable_user_id'] || $this->session->userdata('panel_manager_per'))
                $this->pages->show_page('form_representation_page','فرم پیشنهادی ' . $form_serial,
                    array($form_data[0],$user_data[0],$mali_data,$roles,'duty_data'=>$duty_data,'count'=>$count));
            else
                echo '404 PAGE NOT FOUND';
        }
        else
            $this->pages->show_login_page();
    }

    public function show_eghdamat_page($user_id , $form_serial){
        if($this->pages->check_logged_in())
        {
            $where = array('form1_id'=>$form_serial);
            $eghdamat_data = $this->retrieve_model->eghdamat_retrieve($where);
            $user_data = $this->retrieve_model->retrieve_user(array('user_id'=>$user_id));
            $loggedin_user = $this->retrieve_model->retrieve_user(array('user_id'=>$this->session->userdata('user_id')));
            $form = $this->retrieve_model->form_retriece_with_select(array('indicator_num'=>$form_serial));
            if($this->session->userdata('user_id')==$form[0]['kartable_user_id'] || $this->session->userdata('panel_manager_per'))
                $this->pages->show_page('eghdamat_page','ثبت اقدامات',array('user_id'=>$user_id,'indicator_num'=>$form_serial,'eghdamat_data' => $eghdamat_data,'user_data'=>$user_data[0],'loggedin_user'=>$loggedin_user[0]));
            else
                echo '404 PAGE NOT FOUND';
        }
        else
            $this->pages->show_login_page();
    }

    public function show_user_role(){
        if($this->pages->check_logged_in()) {
            $key = $this->input->post('key');
            $data = $this->retrieve_model->retrieve_user(array('role_id'=>$key));
            echo json_encode($data);
        }


    }

    public function show_duty_page($form_serial){
        if($this->pages->check_logged_in()) {
            $duty_data = $this->retrieve_model->form_duty_retrieve(array('form1_id'=>$form_serial,'sender_id'=>$this->session->userdata('user_id')));
            $form_data = $this->retrieve_model->form_retriece_with_select(array('indicator_num' => $form_serial));

            $roles = $this->retrieve_model->role_retrieve($this->session->userdata('role_id'));
            $loggedin_user = $this->retrieve_model->retrieve_user(array('user_id'=>$this->session->userdata('user_id')));
            if($this->session->userdata('user_id')==$form_data[0]['kartable_user_id']|| $this->session->userdata('panel_manager_per'))
                $this->pages->show_page('duty_page','صفحه وظایف',array('indicator_num'=> $form_data[0]['indicator_num'],'duty_data'=>$duty_data,'roles'=>$roles,'loggedin_user'=>$loggedin_user[0]));
            else
                echo '404 PAGE NOT FOUND';
        }
        else
            $this->pages->show_login_page();
    }

    public function delete_eghdam($user_id,$form_serial,$id){
        if($this->pages->check_logged_in())
        {
            $this->load->model('delete_model');
            $this->delete_model->delete_eghdam(array('id'=>$id));
            $this->load->model('crud','crud_model');
            $now = new DateTime();

            $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'حذف اقدام برای فرم با شماره اندیکاتور '.$form_serial,
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                'action_id'=>$id,'action_table'=>'eghdamat'));


            redirect('retrieve_page/show_eghdamat_page/'.$user_id.'/'.$form_serial);
        }
        else
            $this->show_login_page();
    }

    public function delete_duty($form_serial,$id){
        if($this->pages->check_logged_in()){
            $this->load->model('delete_model');
            $this->delete_model->delete_duty(array('id'=>$id));

            $this->load->model('crud','crud_model');
            $now = new DateTime();

            $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'حذف وظیفه برای فرم با شماره اندیکاتور '.$form_serial,
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                'action_id'=>$id,'action_table'=>'form_duty_table'));

            redirect('retrieve_page/show_duty_page/'.$form_serial);
        }
        else $this->pages->show_login_page();

    }

    public function insert_shomare_bime($form_serial){
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('shomare_bime_name2','شماره بیمه نامه','callback_check_required_on_bime_status|numeric',array('numeric'=>'فیلد %s باید عددی باشد'));
            $this->form_validation->set_rules('tarikh_bime_name2','تاریخ بیمه نامه','callback_check_required_on_bime_status2');
            $this->form_validation->set_rules('shomare_pishnahad2','شماره پیشنهاد','callback_check_required_on_eghdamat_done|numeric',array('numeric'=>'فیلد %s باید عددی باشد'));
            $this->form_validation->set_rules('tarikh_pishnahad2','تاریخ پیشنهاد','callback_check_required_on_eghdamat_done2');
            if($this->form_validation->run()) {
                $eghdamat_done = $this->input->post('eghdamat_done');
                $shomare_pishnahad = ($eghdamat_done==1)?'':$this->input->post('shomare_pishnahad2');
                $tarikh_pishnahad = ($eghdamat_done==1)?'':$this->pages->date_conv($this->input->post('tarikh_pishnahad2'),'/');


                $bime_status = $this->input->post('bime_status');
                $shomare_bime_name = ($eghdamat_done == 1)?'':(($bime_status==1)?'':($this->input->post('shomare_bime_name2')));
                $tarikh_bime_name = ($eghdamat_done == 1)?'':(($bime_status==1)?'':$this->pages->date_conv($this->input->post('tarikh_bime_name2'),'/'));

                $where = array(
                    'indicator_num'=>$form_serial,
                    'emkan_sabt' =>$eghdamat_done,
                    'eghdam'=>$bime_status,
                    'shomare_bime_name'=>$shomare_bime_name,
                    'tarikh_bime_name'=>$tarikh_bime_name,
                    'shomare_pishnahad'=>$shomare_pishnahad,
                    'tarikh_pishnahad'=>$tarikh_pishnahad
                );
                $this->load->model('update_model');
                $this->update_model->update_shomarebime_of_form1_table_by_form_serial($where);

                $this->load->model('crud','crud_model');
                $now = new DateTime();

                if($eghdamat_done==1 && $bime_status==0){
                    $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'شماره پیشنهاد برای فرم با شماره اندیکاتور '.$form_serial.' ثبت شد و چکاپ صادر شده است',
                        'by_user_id'=>$this->session->userdata('user_id'),
                        'by_user_full_name'=>$this->session->userdata('user_full_name'),
                        'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s')));

                }
                else if($eghdamat_done==1 && $bime_status==1){
                    $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'شماره بیمه نامه برای فرم با شماره اندیکاتور '.$form_serial.' ثبت شد و بیمه نامه صادر شده است',
                        'by_user_id'=>$this->session->userdata('user_id'),
                        'by_user_full_name'=>$this->session->userdata('user_full_name'),
                        'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s')));
                }


                redirect('retrieve_page/show_form_representation_page/' . $form_serial);
            }
            else{
                $this->show_form_representation_page($form_serial);
            }

        }
        else
            $this->pages->show_login_page();
    }

    public function insert_new_eghdamat($form_serial){
        $user_id = $this->session->userdata('user_id');
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('eghdam','اقدام صورت گرفته','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            if($this->form_validation->run()){
                $description = $this->input->post('eghdam');

                $user_full_name = $this->session->userdata('user_full_name');
                $insert_array = array(
                    'description'=>$description,
                    'user_id'=>$user_id,
                    'user_full_name'=>$user_full_name,
                    'form1_id' =>$form_serial
                );
                $this->load->model('crud','crud_model');
                $id = $this->crud_model->add_eghdamat($insert_array);

                $now = new DateTime();
                $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'افزودن اقدام برای فرم با شماره اندیکاتور '.$form_serial,
                    'by_user_id'=>$this->session->userdata('user_id'),
                    'by_user_full_name'=>$this->session->userdata('user_full_name'),
                    'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                    'action_id'=>$id,'action_table'=>'eghdamat'));

                redirect('retrieve_page/show_eghdamat_page/'.$this->session->userdata('user_id').'/'.$form_serial);
            }
            else
                $this->show_eghdamat_page($user_id,$form_serial);
        }
        else
            $this->pages->show_login_page();
    }

    public function insert_new_duty($form_serial){
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('eghdam','شرح وظیفه','required',array('required'=>'وارد کردن فیلد %s اجباری می باشد'));
            $this->form_validation->set_rules('erja','نقش','callback_check_dropdown');
            if($this->form_validation->run()){
                $reciever = $this->retrieve_model->retrieve_user(array('user_id'=>$this->input->post('user_erja')));
                $insert_data = array(
                    'form1_id'=>$form_serial,
                    'duty_description'=>$this->input->post('eghdam'),
                    'sender_id'=>$this->session->userdata('user_id'),
                    'sender_full_name'=>$this->session->userdata('user_full_name'),
                    'reciever_id'=>$this->input->post('user_erja'),
                    'reciever_full_name'=>$reciever[0]['f_name'] . ' '.$reciever[0]['l_name']
                );
                $this->load->model('crud','crud_model');
                $id = $this->crud_model->add_form_duty_table($insert_data);


                $now = new DateTime();

                $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'افزودن وظیفه برای فرم با شماره اندیکاتور '.$form_serial,
                    'by_user_id'=>$this->session->userdata('user_id'),
                    'by_user_full_name'=>$this->session->userdata('user_full_name'),
                    'to_user_id'=>$this->input->post('user_erja'),
                    'to_user_full_name'=>$reciever[0]['f_name'] . ' '.$reciever[0]['l_name'],
                    'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                    'action_id'=>$id,'action_table'=>'form_duty_table'));

                redirect('retrieve_page/show_duty_page/'.$form_serial);
            }
            else
                $this->show_duty_page($form_serial);
        }
        else
            $this->pages->show_login_page();
    }

    public function confirm_duty($form_serial){
        if($this->pages->check_logged_in())
        {
            $duty_ids = $this->input->post('checked_items');
            $this->load->model('update_model');
            $this->update_model->disable_all_duty(array('reciever_id'=>$this->session->userdata('user_id')),array('done'=>0));
            $this->load->model('crud','crud_model');
            $now = new DateTime();

            foreach ($duty_ids as $duty_id){
                $this->update_model->enable_duties(array('id'=>$duty_id),array('done'=>1));
                $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'تایید وظیفه/وظایف خود برای فرم با شماره اندیکاتور '.$form_serial,
                    'by_user_id'=>$this->session->userdata('user_id'),
                    'by_user_full_name'=>$this->session->userdata('user_full_name'),
                    'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                    'action_id'=>$duty_id,'action_table'=>'form_duty_table'));
            }
            redirect('retrieve_page/show_form_representation_page/' . $form_serial);
        }
        else
            $this->pages->show_login_page();
    }

    public function send_forms($form_ser=null){
        if($this->pages->check_logged_in()){
            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('erja','نقش','callback_check_dropdown');

            $this->form_validation->set_rules('mohlat_erja','مهلت ارجاع','required|callback_check_before_today',array('required'=>'%s باید مشخص شود'));
            $this->form_validation->set_rules('time_erja','زمان ارجاع','required',array('required'=>'%s باید مشخص شود'));

            if($this->form_validation->run())
            {
                $this->load->model('crud','crud_model');
                $form_serials = ($form_ser==null)?$this->input->post('forms_value'):array($form_ser);
                $time_erja = $this->input->post('time_erja');
                $erja = $this->input->post('erja');
                $mohlat_erja = $this->pages->date_conv($this->input->post('mohlat_erja'),'/');
                $this->load->model('update_model');

                $count = 0;
                foreach ($form_serials as $form_serial){
                    $un_done_forms = $this->retrieve_model->form_duty_retrieve(array('reciever_id'=>$this->session->userdata('user_id'),'form1_id'=>$form_serial,'done'=>0));

                    if(count($un_done_forms)!=0)
                        $count++;
                    else {
                        $now = new DateTime();
                        $kartable_user_id = $this->input->post('user_erja');
                        $where = array(
                            'indicator_num' => $form_serial,
                            'kartable_role' => $erja,
                            'kartable_user_id' => $kartable_user_id,
                            'dead_line' => $mohlat_erja,
                            'dead_time'=>$time_erja,
                            'date_of_send' => $now->format('Y-m-d H:i:s'),
                            'seen' => 1
                        );
                        $on_time = 0;
                        $now = new DateTime();

                        $forms_users = $this->retrieve_model->forms_users_retrieve(array('user_id'=>$this->session->userdata('user_id'),
                            'indicator_num'=>$form_serial,'on_time'=>null));
                        if (strtotime($forms_users[0]['dead_line']) > strtotime($now->format('Y-m-d')))
                            $on_time = 1;
                        else if (strtotime($forms_users[0]['dead_line']) == strtotime($now->format('Y-m-d')))
                            if(strtotime($forms_users[0]['dead_time']) > strtotime($now->format('H:i:s')))
                                $on_time = 1;

                        $this->update_model->update_forms_users_on_time(array('user_id'=>$this->session->userdata('user_id'),
                            'indicator_num'=>$form_serial,'on_time'=>null),array('on_time'=>$on_time));

                        $this->update_model->update_kartable_role_of_form1_table($where);

                        $this->crud_model->add_new_history_kartable(
                            array('indicator_num'=>$form_serial,'user_id'=>$kartable_user_id,
                                'dead_line' => $mohlat_erja,
                                'dead_time'=>$time_erja,
                                'date_of_send' => $now->format('Y-m-d H:i:s')));

                        $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'ارجاع فرم با شماره اندیکاتور '.$form_serial,
                            'by_user_id'=>$this->session->userdata('user_id'),
                            'by_user_full_name'=>$this->session->userdata('user_full_name'),
                            'to_user_id'=>$kartable_user_id,
                            'to_user_full_name'=>'anonymous',
                            'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                            ));
                    }
                }

                redirect('retrieve_page/show_inbox_page/'.$count);
            }
            else{

                if($form_ser==null)
                    $this->show_inbox_page();
                else
                    $this->show_form_representation_page($form_ser);
            }

        }
        else
            $this->pages->show_login_page();
    }

    public function login(){
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        $this->form_validation->set_rules('email','نام کاربری','required|callback_check_auth',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('key','رمز عبور','required',array('required'=>'وارد کردن %s اجباری می باشد'));

        if($this->form_validation->run()){
            $this->session->set_userdata('logged_in',true);
            $this->show_home_page();
        }
        else
            $this->pages->show_login_page();
    }

    public function check_auth(){
        $username = $this->input->post('email');
        $password=$this->input->post('key');
        //$this->load->model('retrieve_model');
        $result = $this->retrieve_model->check_login($username,md5($password));
        if($result != false)
        {
            $this->session->set_userdata('user_id',$result['user_data']['user_id']);
            $this->session->set_userdata('role',$result['role']['role_name']);
            $this->session->set_userdata('role_id',$result['role']['id']);
            $this->session->set_userdata('user_full_name',$result['user_data']['f_name'].' '.$result['user_data']['l_name']);
            $this->session->set_userdata('contract_start',$result['user_data']['contract_start']);
            $this->session->set_userdata('contract_end',$result['user_data']['contract_end']);
            foreach ($result['user_permission'] as $permission){
                $this->session->set_userdata($permission['permission'],1);
            }
            return true;
        }
        else{
            $this->form_validation->set_message('check_auth','نام کاربری یا رمز عبور غلط است!!!');
            return false;
        }

    }

    public function logout(){
        if($this->pages->check_logged_in())
        {
            $this->session->sess_destroy();
            redirect('retrieve_page/show_login_page');
        }
        else
            echo 'ACCESS IS DENIED';

    }

    public function check_dropdown(){
        $input = $this->input->post('erja');
        $this->form_validation->set_message('check_dropdown','نقش انتخاب شده معتبر نمی باشد');
        if($input == '')
            return false;
        return true;
    }

    public function check_before_today(){
        $erja_date =($this->input->post('mohlat_erja')!='')?$this->pages->date_conv($this->input->post('mohlat_erja'),'/'):$this->input->post('mohlat_erja');
        $erja_time = $this->input->post('time_erja');
        $now = new DateTime();
        $this->form_validation->set_message('check_before_today','مجموعه ی تاریخ و زمان نمی تواند از اکنون کمتر باشد');
        if(strtotime($erja_date)<strtotime($now->format('Y/m/d')))
            return false;
        else {
            if(strtotime($erja_date)==strtotime($now->format('Y/m/d'))) {
                if(strtotime($erja_time)<strtotime($now->format('H:i:s')))
                    return false;
                return true;
            }
            return true;
        }

    }

    public function check_required_on_eghdamat_done(){
        $eghdam_value = $this->input->post('eghdamat_done');
        $shomare_pishnahd2 = $this->input->post('shomare_pishnahad2');
        $this->form_validation->set_message('check_required_on_eghdamat_done','فیلد %s اجباری می باشد');
        if($eghdam_value == '2' && $shomare_pishnahd2 == '')
            return false;
        return true;
    }

    public function check_required_on_eghdamat_done2(){

        $shomare_pishnahd2 = $this->input->post('shomare_pishnahad2');
        $tarikh_pishnahad = $this->input->post('tarikh_pishnahad2');
        $this->form_validation->set_message('check_required_on_eghdamat_done2','فیلد %s اجباری می باشد');
        if($shomare_pishnahd2 != '' && $tarikh_pishnahad == '')
            return false;
        return true;
    }

    public function check_required_on_bime_status(){
        $bime_status = $this->input->post('bime_status');
        $shomare_bime_name = $this->input->post('shomare_bime_name2');
        $this->form_validation->set_message('check_required_on_bime_status','فیلد %s اجباری می باشد');
        if($bime_status == '2' && $shomare_bime_name == '')
            return false;
        return true;
    }

    public function check_required_on_bime_status2(){

        $shomare_bime_name = $this->input->post('shomare_bime_name2');
        $tarikh_bime_name = $this->input->post('tarikh_bime_name2');
        $this->form_validation->set_message('check_required_on_bime_status2','فیلد %s اجباری می باشد');
        if($shomare_bime_name != '' && $tarikh_bime_name == '')
            return false;
        return true;
    }

    public function test(){

    }
}