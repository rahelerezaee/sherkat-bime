<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class financial_page extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');
    }
    public function index($edited=null){     // namayesh page

        if($this->pages->check_logged_in()){

            $where=array('user_id'=>$this->session->userdata('user_id'),'kartable_user_id'=>$this->session->userdata('user_id'));
            $more_data = $this->retrieve_model->form_retrieve($where);
            for($i=0;$i<count($more_data);$i++)
            {
                $more_data[$i]['register_date'] = $this->pages->date_conv_to_jalai($more_data[$i]['register_date'],'-');
            }

            $this->pages->show_page('mali_page','فرمهای پیشنهادی ثبت شده',array($more_data,$edited));

        }
        else{
            $this->pages->show_login_page();
        }

    }

    public function show_mali_detail_page($form_serial,$insert_success = 2){
        if($this->pages->check_logged_in()){
            $data = $this->retrieve_model->mali_detail_retrieve($form_serial);
            $form_data = $this->retrieve_model->form_retrieve(array('indicator_num'=>$form_serial));
            //$form_data = $form_data[0]['f_name']." ".$form_data[0]['l_name'];

            for($i=0;$i<count($data);$i++)
                $data[$i]['tarikh_tasvie']=($data[$i]['tarikh_tasvie']==null||$data[$i]['tarikh_tasvie']=='0000-00-00')? '':$this->pages->date_conv_to_jalai($data[$i]['tarikh_tasvie'],'-');
            //print_r($form_data);
            if($this->session->userdata('user_id')==$form_data[0]['kartable_user_id']|| $this->session->userdata('panel_manager_per'))
                $this->pages->show_page('mali_detail_page','ثبت امور مالی',array($form_serial,$data,$form_data[0]['f_name']." ".$form_data[0]['l_name'],$insert_success));
            else
                echo '404 PAGE NOT FOUND';
        }
        else
            $this->pages->show_login_page();
    }

    public function insert_new_mali($form1_id){     //dokmeye afzodan ...
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        $this->form_validation->set_rules('mablagh','مبلغ','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('shomare_marja','شماره مرجع','callback_check_required_nahve_pardakht|numeric',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('tozihat','توضیحات','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('tasvie','موعد تسویه','callback_check_required_beyane');
        if(!$this->check_tasvie($form1_id)){
            $this->show_mali_detail_page($form1_id,3);
        }
        else{
            if($this->form_validation->run()){
                $now = new DateTime();
                $insert_data = array(
                    'nahve_pardakht'=>$this->input->post('nahve_pardakht'),
                    'mablagh'=>str_ireplace(',','', $this->input->post('mablagh')),
                    'shomare_marja'=>$this->input->post('shomare_marja'),
                    'tozihat'=>$this->input->post('tozihat'),
                    'vaziat'=>$this->input->post('vaziat'),
                    'tarikh_tasvie' =>($this->input->post('tasvie')=='')?'':(($this->input->post('vaziat')=='تسویه')?'':$this->pages->date_conv($this->input->post('tasvie'),'/')),
                    'insert_date' => $now->format('Y/m/d'),
                    'insert_time' =>$now->format('H:i:s'),
                    'form1_id'=>$form1_id
                );
                $this->load->model('crud','crud_model');
                $mali_id = $this->crud_model->add_new_mali($insert_data);

                $this->crud_model->add_new_auto_action(array('form1_id'=>$form1_id,'action_description'=>'ثبت مالی برای فرم با شماره اندیکاتور '.$form1_id,
                    'by_user_id'=>$this->session->userdata('user_id'),
                    'by_user_full_name'=>$this->session->userdata('user_full_name'),
                    'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                    'action_id'=>$mali_id,'action_table'=>'mali'));

                redirect('financial_page/show_mali_detail_page/' . $form1_id);
            }
            else
                $this->show_mali_detail_page($form1_id);
        }

    }

    public function update_mali($id,$form_serial){
        if($this->pages->check_logged_in()){

            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
            $this->form_validation->set_rules('b_mablagh','مبلغ','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            $this->form_validation->set_rules('b_shomare_marja','شماره مرجع','callback_check_required_nahve_pardakht2|numeric',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
            $this->form_validation->set_rules('b_tozihat','توضیحات','required',array('required'=>'وارد کردن %s اجباری می باشد'));
            $this->form_validation->set_rules('b_tasvie','موعد تسویه','callback_check_required_beyane2');
            if($this->form_validation->run()){
                $update_value = array(
                    'nahve_pardakht' => $this->input->post('b_nahve_pardakht'),
                    'mablagh' =>str_ireplace(',','',$this->input->post('b_mablagh')) ,
                    'shomare_marja' => $this->input->post('b_shomare_marja'),
                    'vaziat' => $this->input->post('b_vaziat'),
                    'tarikh_tasvie' => ($this->input->post('b_tasvie')!='')?$this->pages->date_conv($this->input->post('b_tasvie'),'/'):'',
                    'tozihat' => $this->input->post('b_tozihat')
                );

                $this->load->model('update_model');
                $this->update_model->update_mali_table(array('id'=>$id),$update_value);
                $now = new DateTime();
                $this->change_ready_register($form_serial);
                $this->load->model('crud','crud_model');
                $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'به روزرسانی مالی برای فرم با شماره اندیکاتور '.$form_serial,
                    'by_user_id'=>$this->session->userdata('user_id'),
                    'by_user_full_name'=>$this->session->userdata('user_full_name'),
                    'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                    'action_id'=>$id,'action_table'=>'mali'));

                redirect('financial_page/show_mali_detail_page/'.$form_serial.'/1');
            }
            else
                $this->show_mali_detail_page($form_serial,0);
        }
    }

    public function check_tasvie($form_serial){
        $tasvie_value = $this->input->post('vaziat');
        $mablgh_jaree = ($this->input->post('mablagh')=='')? 0:str_ireplace(',','',$this->input->post('mablagh'));
        if($tasvie_value=='تسویه')
        {

            return $this->check_majmoo_mabalegh($form_serial,$mablgh_jaree);
        }
        else
            return true;

    }

    public function check_majmoo_mabalegh($form_serial,$mablgh_jaree=0){

        $hagh_bime = $this->retrieve_model->form_retrieve(array('indicator_num'=>$form_serial));
        if($mablgh_jaree != 0)
            $majmoo_mabalegh = $this->retrieve_model->mali_detail_retrieve($form_serial);
        else
            $majmoo_mabalegh = $this->retrieve_model->mali_detail_retrieve_by_id(array('form1_id'=>$form_serial,'accepted'=>0));

        $majmoo = 0;
        foreach ($majmoo_mabalegh as $mablagh)
        {
            $majmoo += $mablagh['mablagh'];
        }
        $hagh_bime = $hagh_bime[0]['hagh_bime']+$hagh_bime[0]['seporde'];
        if($hagh_bime<=$majmoo+$mablgh_jaree)
            return true;
        else
            return false;
    }

    public function check_required_nahve_pardakht(){
        $nahve_pardakht = $this->input->post('nahve_pardakht');
        $shomare_marja = $this->input->post('shomare_marja');
        $this->form_validation->set_message('check_required_nahve_pardakht','فیلد %s اجباری می باشد');
        if($nahve_pardakht == 'نقدی' && $shomare_marja == '')
            return false;
        return true;
    }

    public function check_required_beyane()
    {
        $vaziat = $this->input->post('vaziat');
        $tasvie = $this->input->post('tasvie');
        $this->form_validation->set_message('check_required_beyane','مقدار فیلد %s اجباری می باشد');
        if ($vaziat == 'بیعانه' && $tasvie=='')
            return false;
        return true;
    }

    public function check_required_nahve_pardakht2(){
        $nahve_pardakht = $this->input->post('b_nahve_pardakht');
        $shomare_marja = $this->input->post('b_shomare_marja');
        $this->form_validation->set_message('check_required_nahve_pardakht2','فیلد %s اجباری می باشد');
        if($nahve_pardakht == 'نقدی' && $shomare_marja == '')
            return false;
        return true;
    }

    public function change_ready_register($form_serial){
        $this->load->model('update_model');
        if($this->check_majmoo_mabalegh($form_serial))
            $this->update_model->update_form1(array('indicator_num'=>$form_serial),array('ready_to_register'=>1));
        else
            $this->update_model->update_form1(array('indicator_num'=>$form_serial),array('ready_to_register'=>0));
    }

    public function check_required_beyane2()
    {
        $vaziat = $this->input->post('b_vaziat');
        $tasvie = $this->input->post('b_tasvie');
        $this->form_validation->set_message('check_required_beyane2','مقدار فیلد %s اجباری می باشد');
        if ($vaziat == 'بیعانه' && $tasvie=='')
            return false;
        return true;
    }

    public function show_mali_by_id(){
        if($this->pages->check_logged_in()){
            $id = $this->input->post('key');
            $data = $this->retrieve_model->mali_detail_retrieve_by_id(array('id'=>$id));
            $data[0]['tarikh_tasvie'] = ($data[0]['tarikh_tasvie']=='0000-00-00')?'': $this->pages->date_conv_to_jalai($data[0]['tarikh_tasvie'],'-');
            echo json_encode($data);
        }
    }

    public function delete_mali_detail_entry($form_serial,$id_value){
        if($this->pages->check_logged_in()){
            $this->load->model('delete_model');
            $this->delete_model->delete_mali_detail_by_id($id_value);
            $this->change_ready_register($form_serial);

            $now = new DateTime();
            $this->load->model('crud','crud_model');
            $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'حذف مالی برای فرم با شماره اندیکاتور '.$form_serial,
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                'action_id'=>$id_value,'action_table'=>'mali'));

            redirect('financial_page/show_mali_detail_page/'.$form_serial);
        }
        else
            $this->pages->show_login_page();
    }

    public function confirm_mali_detail($form_serial,$id,$accepted){
        if($this->pages->check_logged_in()){
            $where = array(
                'id' => $id,
                'accepted' => $accepted
            );
            $this->load->model('update_model');
            $this->update_model->update_accepted_of_mali_table_by_id($where);

            $this->load->model('crud','crud_model');
            $now = new DateTime();
            $form_description = ($accepted==0)?'تایید مالی برای فرم با شماره اندیکاتور '.$form_serial:'عدم تایید مالی برای فرم با شماره اندیکاتور '.$form_serial;
            $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>$form_description,
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s'),
                'action_id'=>$id,'action_table'=>'mali'));


            $this->change_ready_register($form_serial);

            redirect('retrieve_page/show_form_representation_page/'.$form_serial);
        }
        else
            $this->pages->show_login_page();
    }
}