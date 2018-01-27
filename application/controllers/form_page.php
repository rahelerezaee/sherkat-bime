<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form_page extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('retrieve_model');
        $this->load->library('pages');
    }
    public function index($suc=null){
        if($this->pages->check_logged_in()) {
            $locations = $this->retrieve_model->location_retrieve();
            $this->pages->show_page('form_page', 'ثبت فرم پیشنهاد', array('locations'=>$locations,'suc'=>$suc));
        }
        else
            $this->pages->show_login_page();
    }

    public function insert_new_form()
    {//valid_email

        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        ///// location
        $this->form_validation->set_rules('form_serial','سریال فرم پیشنهاد','required|is_unique[form1.form_serial]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','is_unique'=>'%s وارد شده قبلا ثبت شده است','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('payment_serial','سریال رسید وجه','required|is_unique[form1.payment_serial]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','is_unique'=>'%s وارد شده قبلا ثبت شده است','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('sign_date','تاریخ امضا پیشنهاد','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('fname','نام','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('lname','نام خانوادگی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('codemelli','کدملی','required|min_length[10]|max_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد','min_length'=>'طول فیلد %s باید حداقل %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('birth_date','تاریخ تولد','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('sodoor_location','محل صدور','required',array('required'=>'وارد کردن %s اجباری می باشد'));

        $this->form_validation->set_rules('vazn','وزن','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));
        $this->form_validation->set_rules('ghad','قد','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));

        $this->form_validation->set_rules('job','شغل اصلی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('address','نشانی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('postcode','کدپستی','required|exact_length[10]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('tel','تلفن ثابت','exact_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('mobile','تلفن همراه 1','required|exact_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('mobile2','تلفن همراه 2','exact_length[11]|numeric',array('exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('email','پست الکترونیکی','valid_email',array('valid_email'=>'پست الکترونیکی وارد شده معتبر نمی باشد'));

        $this->form_validation->set_rules('b_fname','نام','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_lname','نام خانوادگی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_codemelli','کدملی','required|min_length[10]|max_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','min_length'=>'طول فیلد %s باید حداقل %s باشد','numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));
        $this->form_validation->set_rules('b_birth_date','تاریخ تولد','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_sodoor_location','محل صدور','required',array('required'=>'وارد کردن %s اجباری می باشد'));

        $this->form_validation->set_rules('b_vazn','وزن','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));
        $this->form_validation->set_rules('b_ghad','قد','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));

        $this->form_validation->set_rules('b_job','شغل اصلی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_address','نشانی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_postcode','کدپستی','required|exact_length[10]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_tel','تلفن ثابت','exact_length[11]|numeric',array('exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_mobile','تلفن همراه 1','required|exact_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_mobile2','تلفن همراه 2','exact_length[11]|numeric',array('exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_email','پست الکترونیکی','valid_email',array('valid_email'=>'پست الکترونیکی وارد شده معتبر نمی باشد'));

        $this->form_validation->set_rules('modat_bime','مدت بیمه','required|numeric',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('seporde','سپرده اولیه','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('hagh_bime','حق بیمه سال اول','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('zarib_hagh_bime','ضریب افزایش سالیانه حق بیمه','required|numeric|callback_check_numeric_value[20]',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('sarmaie_fot','سرمایه ی فوت سال اول','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('zarib_sarmaie_fot','ضریب افزایش سالیانه سرمایه فوت','required|numeric|callback_check_value',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));

        $this->form_validation->set_rules('vaziat_salamat_bimeshode','توضیحات وضعیت سلامت بیمه شده','callback_check_value_with_condition');
        $this->form_validation->set_rules('vaziat_salamat_khanevade','توضیحات وضعیت سلامت خانواده','callback_check_value_with_condition_khanevade');
        /////////////////////////// form 2
        if($this->form_validation->run()){

            date_default_timezone_set('Asia/Tehran');
            $now = new DateTime();
            $insert_data = array(
                'location_id'=>$this->input->post('location_id'),
                'sign_date'=>$this->pages->date_conv(($this->input->post('sign_date')),'/'),
                'form_serial' => $this->input->post('form_serial'),
                'payment_serial' => $this->input->post('payment_serial'),
                'register_date' => $now->format('Y/m/d'),
                'register_time' => $now->format('H:i:s'),
                'user_id' =>$this->session->userdata('user_id'),
                'user_full_name'=>$this->session->userdata('user_full_name'),
                'f_name' => $this->input->post('fname'),
                'l_name' => $this->input->post('lname'),
                'codemelli' => $this->input->post('codemelli'),
                'birth_date' => $this->pages->date_conv($this->input->post('birth_date'),'/'),
                'sodoor_location' => $this->input->post('sodoor_location'),
                'gender' => $this->input->post('gender'),
                'married_status'=>$this->input->post('married_status'),
                'tahsilat' =>$this->input->post('tahsilat'),
                'job' =>$this->input->post('job'),
                'address' =>$this->input->post('address'),
                'postcode' => $this->input->post('postcode'),
                'tel'=> base64_encode($this->input->post('tel')),
                'mobile'=>base64_encode($this->input->post('mobile')),
                'email'=>$this->input->post('email'),
                'tozihat'=>$this->input->post('tozihat'),
                //nesbat
                'nesbat'=>($this->input->post('nesbat_select')==null)?'خودم':$this->input->post('nesbat_select'),
                'f_name2'=>$this->input->post('b_fname'),
                'l_name2'=>$this->input->post('b_lname'),
                'codemelli2'=>$this->input->post('b_codemelli'),
                'birth_date2'=>$this->pages->date_conv($this->input->post('b_birth_date'),'/'),
                'sodoor_location2'=>$this->input->post('b_sodoor_location'),
                'gender2'=>$this->input->post('b_gender'),
                'married_status2'=>$this->input->post('b_married_status'),
                'tahsilat2'=>$this->input->post('b_tahsilat'),
                'job2'=>$this->input->post('b_job'),
                'address2'=>$this->input->post('b_address'),
                'postcode2'=>$this->input->post('b_postcode'),
                'nezam_vazife_status2'=>$this->input->post('b_nezam_vazife_status'),
                'mobile2_2'=>base64_encode($this->input->post('b_mobile2')),
                'ghad2'=>$this->input->post('b_ghad'),
                'vazn2'=>$this->input->post('b_vazn'),
                'email2'=>$this->input->post('b_email'),
                'mobile1_2'=> base64_encode($this->input->post('b_mobile')),
                'tel2'=>base64_encode($this->input->post('b_tel')),
                'tozihat2'=>$this->input->post('b_tozihat'),
                'modat_bime' =>$this->input->post('modat_bime'),
                'seporde'=>str_ireplace(',','',$this->input->post('seporde')),
                'hagh_bime'=>str_ireplace(',','',$this->input->post('hagh_bime')),
                'zarib_hagh_bime'=>$this->input->post('zarib_hagh_bime'),
                'ravesh_pardakht'=>$this->input->post('ravesh_pardakht'),
                'sarmaie_fot'=>str_ireplace(',','',$this->input->post('sarmaie_fot')),
                'zarib_sarmaie_fot'=>$this->input->post('zarib_sarmaie_fot'),

                'vaziat_salamat_khanevade'=>$this->input->post('vaziat_salamat_khanevade'),
                'tozihat_vaziat_salamat_khanevade'=>$this->input->post('tozihat_vaziat_salamat_khanevade'),

                'vaziat_salamat_bime_shode'=>$this->input->post('vaziat_salamat_bimeshode'),
                'tozihat_vaziat_salamat_bime_shode'=>$this->input->post('tozihat_vaziat_salamat_bimeshode'),
                'date_of_send'=> $now->format('Y-m-d H:i:s'),
                'shomare_bime_name'=>null,
                'shomare_pishnahad'=>null,

                'kartable_user_id'=>$this->session->userdata('user_id'),
                'nezam_vazife_status'=>$this->input->post('nezam_vazife_status'),
                'mobile2'=>base64_encode($this->input->post('mobile2')),
                'ghad'=>$this->input->post('ghad'),
                'vazn'=>$this->input->post('vazn'),
                'seen'=>0
            );
            ///////////////////////////////////
            $this->load->model('crud','crud_model');
            $indicator_num = $this->crud_model->add_new_form($insert_data);//2
            $datetime = new DateTime('tomorrow');
            $this->crud_model->add_new_history_kartable(array('indicator_num'=>$indicator_num,
                'user_id'=>$this->session->userdata('user_id'),
                'dead_line'=>$datetime->format('Y-m-d'),
                'dead_time'=>$now->format('H:i:s'),
                'date_of_send'=>$now->format('Y-m-d')
            ));
            $this->crud_model->add_new_auto_action(array('form1_id'=>$indicator_num,'action_description'=>'فرم با شماره اندیکاتور '.$indicator_num.' ثبت شد',
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s')));
            redirect('form_page/index/'.$indicator_num);
        }// end validation form if
        else{

            $this->index();
        }


    }

    public function delete_form($id_value,$page=null){
        if($this->pages->check_logged_in()) {
            $now=new DateTime();
            $this->load->model('delete_model');
            $this->delete_model->delete_form_tabel($id_value);
            $this->load->model('crud');
            $this->crud->add_new_auto_action(array('form1_id'=>$id_value,'action_description'=>'فرم با شماره اندیکاتور '.$id_value.' حذف شد',
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s')));
            if($page==null)
                redirect('financial_page');
            else if($page==1)
                redirect('retrieve_page/show_inbox_page');
            else if($page==2)
                redirect('manager_page');
        }
        else
            $this->pages->show_login_page();
    }

    public function update_form($form_serial,$page){
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        ///// location
        $this->form_validation->set_rules('form_serial','سریال فرم پیشنهاد','required|numeric',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('payment_serial','سریال رسید وجه','required|numeric',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('sign_date','تاریخ امضا پیشنهاد','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('fname','نام','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('lname','نام خانوادگی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('codemelli','کدملی','required|min_length[10]|max_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد','min_length'=>'طول فیلد %s باید حداقل %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('birth_date','تاریخ تولد','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('sodoor_location','محل صدور','required',array('required'=>'وارد کردن %s اجباری می باشد'));

        $this->form_validation->set_rules('vazn','وزن','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));
        $this->form_validation->set_rules('ghad','قد','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));

        $this->form_validation->set_rules('job','شغل اصلی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('address','نشانی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('postcode','کدپستی','required|exact_length[10]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('tel','تلفن ثابت','exact_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('mobile','تلفن همراه 1','required|exact_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('mobile2','تلفن همراه 2','exact_length[11]|numeric',array('exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('email','پست الکترونیکی','valid_email',array('valid_email'=>'پست الکترونیکی وارد شده معتبر نمی باشد'));

        $this->form_validation->set_rules('b_fname','نام','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_lname','نام خانوادگی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_codemelli','کدملی','required|min_length[10]|max_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','min_length'=>'طول فیلد %s باید حداقل %s باشد','numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));
        $this->form_validation->set_rules('b_birth_date','تاریخ تولد','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_sodoor_location','محل صدور','required',array('required'=>'وارد کردن %s اجباری می باشد'));

        $this->form_validation->set_rules('b_vazn','وزن','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));
        $this->form_validation->set_rules('b_ghad','قد','numeric|max_length[3]',array('numeric'=>'فیلد %s باید عددی باشد','max_length'=>'طول فیلد %s باید حداکثر %s باشد'));

        $this->form_validation->set_rules('b_job','شغل اصلی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_address','نشانی','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('b_postcode','کدپستی','required|exact_length[10]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_tel','تلفن ثابت','exact_length[11]|numeric',array('exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_mobile','تلفن همراه 1','required|exact_length[11]|numeric',array('required'=>'وارد کردن %s اجباری می باشد','exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_mobile2','تلفن همراه 2','exact_length[11]|numeric',array('exact_length'=>'طول فیلد %s باید %s باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('b_email','پست الکترونیکی','valid_email',array('valid_email'=>'پست الکترونیکی وارد شده معتبر نمی باشد'));

        $this->form_validation->set_rules('modat_bime','مدت بیمه','required|numeric',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('seporde','سپرده اولیه','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('hagh_bime','حق بیمه سال اول','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('zarib_hagh_bime','ضریب افزایش سالیانه حق بیمه','required|numeric|callback_check_numeric_value[20]',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));
        $this->form_validation->set_rules('sarmaie_fot','سرمایه ی فوت سال اول','required',array('required'=>'وارد کردن %s اجباری می باشد'));
        $this->form_validation->set_rules('zarib_sarmaie_fot','ضریب افزایش سالیانه سرمایه فوت','required|numeric|callback_check_value',array('required'=>'وارد کردن %s اجباری می باشد','numeric'=>'فیلد %s باید عددی باشد'));

        $this->form_validation->set_rules('vaziat_salamat_bimeshode','توضیحات وضعیت سلامت بیمه شده','callback_check_value_with_condition');
        $this->form_validation->set_rules('vaziat_salamat_khanevade','توضیحات وضعیت سلامت خانواده','callback_check_value_with_condition_khanevade');

        if($this->form_validation->run()) {
            $this->load->model('update_model');
            $this->update_model->update_form1(
                array('indicator_num'=>$form_serial),
                array(
                    'location_id'=>$this->input->post('location_id'),
                    'sign_date'=>$this->pages->date_conv(($this->input->post('sign_date')),'/'),
                    'form_serial' => $this->input->post('form_serial'),
                    'payment_serial' => $this->input->post('payment_serial'),

                    'f_name' => $this->input->post('fname'),
                    'l_name' => $this->input->post('lname'),
                    'codemelli' => $this->input->post('codemelli'),
                    'birth_date' => $this->pages->date_conv($this->input->post('birth_date'),'/'),
                    'sodoor_location' => $this->input->post('sodoor_location'),
                    'gender' => $this->input->post('gender'),
                    'married_status'=>$this->input->post('married_status'),
                    'tahsilat' =>$this->input->post('tahsilat'),
                    'job' =>$this->input->post('job'),
                    'address' =>$this->input->post('address'),
                    'postcode' => $this->input->post('postcode'),
                    'tel'=> base64_encode($this->input->post('tel')),
                    'mobile'=>base64_encode($this->input->post('mobile')),
                    'email'=>$this->input->post('email'),
                    'tozihat'=>$this->input->post('tozihat'),

                    'nesbat'=>($this->input->post('nesbat_select')==null)?'خودم':$this->input->post('nesbat_select'),
                    'f_name2'=>$this->input->post('b_fname'),
                    'l_name2'=>$this->input->post('b_lname'),
                    'codemelli2'=>$this->input->post('b_codemelli'),
                    'birth_date2'=>$this->pages->date_conv($this->input->post('b_birth_date'),'/'),
                    'sodoor_location2'=>$this->input->post('b_sodoor_location'),
                    'gender2'=>$this->input->post('b_gender'),
                    'married_status2'=>$this->input->post('b_married_status'),
                    'tahsilat2'=>$this->input->post('b_tahsilat'),
                    'job2'=>$this->input->post('b_job'),
                    'address2'=>$this->input->post('b_address'),
                    'postcode2'=>$this->input->post('b_postcode'),
                    'nezam_vazife_status2'=>$this->input->post('b_nezam_vazife_status'),
                    'mobile2_2'=>base64_encode($this->input->post('b_mobile2')),
                    'ghad2'=>$this->input->post('b_ghad'),
                    'vazn2'=>$this->input->post('b_vazn'),
                    'email2'=>$this->input->post('b_email'),
                    'mobile1_2'=> base64_encode($this->input->post('b_mobile')),
                    'tel2'=>base64_encode($this->input->post('b_tel')),
                    'tozihat2'=>$this->input->post('b_tozihat'),
                    'modat_bime' =>$this->input->post('modat_bime'),
                    'seporde'=>str_ireplace(',','',$this->input->post('seporde')),
                    'hagh_bime'=>str_ireplace(',','',$this->input->post('hagh_bime')),
                    'zarib_hagh_bime'=>$this->input->post('zarib_hagh_bime'),
                    'ravesh_pardakht'=>$this->input->post('ravesh_pardakht'),
                    'sarmaie_fot'=>str_ireplace(',','',$this->input->post('sarmaie_fot')),
                    'zarib_sarmaie_fot'=>$this->input->post('zarib_sarmaie_fot'),

                    'vaziat_salamat_khanevade'=>$this->input->post('vaziat_salamat_khanevade'),
                    'tozihat_vaziat_salamat_khanevade'=>$this->input->post('tozihat_vaziat_salamat_khanevade'),

                    'vaziat_salamat_bime_shode'=>$this->input->post('vaziat_salamat_bimeshode'),
                    'tozihat_vaziat_salamat_bime_shode'=>$this->input->post('tozihat_vaziat_salamat_bimeshode'),

                    'nezam_vazife_status'=>$this->input->post('nezam_vazife_status'),
                    'mobile2'=>base64_encode($this->input->post('mobile2')),
                    'ghad'=>$this->input->post('ghad'),
                    'vazn'=>$this->input->post('vazn'),
                )
            );

            $now = new DateTime();
            $this->load->model('crud','crud_model');
            $this->crud_model->add_new_auto_action(array('form1_id'=>$form_serial,'action_description'=>'تغییر فرم با شماره اندیکاتور '.$form_serial,
                'by_user_id'=>$this->session->userdata('user_id'),
                'by_user_full_name'=>$this->session->userdata('user_full_name'),
                'action_date'=>$now->format('Y-m-d'),'action_time'=>$now->format('H:i:s')));

            if($page == 1)
                redirect('financial_page/index/1');
            else if($page == 2)
                redirect('retrieve_page/show_form_representation_page/'.$form_serial);
            else
                redirect('manager_page/index/edited');
        }
        else{
            $this->show_update_form_page($form_serial,$page,1);
        }
    }

    public function show_update_form_page($form_serial,$page,$flag=0){
        if($this->pages->check_logged_in())
        {
            $data = $this->retrieve_model->form_retrieve(array('indicator_num'=>$form_serial));
            $data[0]['sign_date'] = $this->pages->date_conv_to_jalai($data[0]['sign_date'],'-');
            $data[0]['register_date'] = $this->pages->date_conv_to_jalai($data[0]['register_date'],'-');
            $data[0]['birth_date'] = $this->pages->date_conv_to_jalai($data[0]['birth_date'],'-');
            $data[0]['birth_date2'] = $this->pages->date_conv_to_jalai($data[0]['birth_date2'],'-');
            $data[0]['tel'] = base64_decode($data[0]['tel']);
            $data[0]['tel2'] = base64_decode($data[0]['tel2']);
            $data[0]['mobile'] = base64_decode($data[0]['mobile']);
            $data[0]['mobile2'] =($data[0]['mobile2']=='')?'':base64_decode($data[0]['mobile2']);
            $data[0]['mobile1_2'] = base64_decode($data[0]['mobile1_2']);
            $data[0]['mobile2_2'] = ($data[0]['mobile2_2']=='')?'':base64_decode($data[0]['mobile2_2']);

            $locations = $this->retrieve_model->location_retrieve();
            if($this->session->userdata('user_id')==$data[0]['kartable_user_id']|| $this->session->userdata('panel_manager_per'))
                $this->pages->show_page('update_form_page','اصلاح داده های فرم',array('data'=>$data[0],'locations'=>$locations,'error_flag'=>$flag,'page'=>$page));
            else
                echo '404 PAGE NOT FOUND';
        }
        else
            $this->pages->show_login_page();
    }

    public function check_value(){
        $zarib_fot = $this->input->post('zarib_sarmaie_fot');
        $zarib_hagh_bime = $this->input->post('zarib_hagh_bime');
        $this->form_validation->set_message('check_value','ضریب فوت نمی تواند بیشتر از ضریب افزایش سالیانه حق بیمه باشد باشد');
        if($zarib_fot>$zarib_hagh_bime)
            return false;
        else
            return true;
    }

    public function check_numeric_value(){
        $input = $this->input->post('zarib_hagh_bime');
        $this->form_validation->set_message('check_numeric_value','میزان %s نمی تواند بیشتر از %s باشد');
        if($input>20)
            return false;
        return true;
    }

    public function check_value_with_condition_khanevade(){
        $vaziat_salamat_khanevade = $this->input->post('vaziat_salamat_khanevade');
        $tozihat = $this->input->post('tozihat_vaziat_salamat_khanevade');
        $this->form_validation->set_message('check_value_with_condition_khanevade','فیلد توضیحات مربوط به %s در صورت سالم نبودن نمی تواند خالی باشد');
        if($vaziat_salamat_khanevade == 'سالم')
            return true;
        else if($tozihat == '')
            return false;
        else
            return true;

    }

    public function check_value_with_condition(){
        $vaziat_salamat_bimeshode = $this->input->post('vaziat_salamat_bimeshode');
        $tozihat = $this->input->post('tozihat_vaziat_salamat_bimeshode');
        $this->form_validation->set_message('check_value_with_condition','فیلد توضیحات مربوط به %s در صورت سالم نبودن نمی تواند خالی باشد');
        if($vaziat_salamat_bimeshode == 'سالم')
            return true;
        else if($tozihat == '')
            return false;
        else
            return true;

    }

}