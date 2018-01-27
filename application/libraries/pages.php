<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pages{
    public function __construct()
    {
        include ("jdf.php");
        date_default_timezone_set('Asia/Tehran');
    }

    public $page_size=20;

    public function show_page($page_name = 'login_page',$page_title = 'ورود',$more_data = null){

        $CI =& get_instance();
        if($page_name == 'login_page') {
            $data['title'] = $page_title;
            $CI->load->view('templates/'.'head',$data);
            $CI->load->view('pages/'.$page_name);
        }
        else{

            $permission = 0;
            switch ($page_name){
                case 'inbox_page':
                    $permission =  isset($_SESSION['kartable_per']);
                    break;
                case 'form_representation_page':
                    $permission = isset($_SESSION['open_kartable_per']);
                    break;
                case 'form_log':
                    $permission = isset($_SESSION['independent_eghdam_per']);
                    break;
                case 'log_detail':
                    $permission = max(isset($_SESSION['open_independent_eghdam_per']),isset($_SESSION['display_auto_kartable_per']));
                    break;
                case 'independent_duty':
                    $permission = 1;
                    break;
                case 'duty_page':
                    $permission = isset($_SESSION['duty_kartable_per']);
                    break;
                case 'inbox_history_page':
                    $permission = isset($_SESSION['kartable_per0']);
                    break;
                case 'eghdamat_page':
                    $permission = isset($_SESSION['eghdam_kartable_per']);
                    break;
                case 'mali_detail_page':
                    $permission = max(isset($_SESSION['open_mali_kartable_per']),isset($_SESSION['open_mali_per'])) ;
                    break;
                case 'form_page':
                    $permission = isset($_SESSION['new_form_per']);
                    break;
                case 'mali_page':
                    $permission = isset($_SESSION['mali_per']);
                    break;
                case 'locations_page':
                    $permission =  isset($_SESSION['position_per']);
                    break;
                case 'role_definition_page':
                    $permission =  isset($_SESSION['role_manager_per']);
                    break;
                case 'registered_role_display':
                    $permission =  isset($_SESSION['registerd_role_display_manager_per']);
                    break;
                case 'update_role_permissions':
                    $permission =  isset($_SESSION['edit_registerd_role_display_manager_per']);
                    break;
                case 'update_form_page': //edit_open_kartable_per
                    $permission = max(isset($_SESSION['edit_mali_per']), isset($_SESSION['edit_open_kartable_per']));
                    break;
                case 'register_page':
                    $permission =  isset($_SESSION['user_manager_per']);
                    break;
                case 'update_registered_user':
                    $permission = isset($_SESSION['edit_show_manager_per']);
                    break;
                case 'registerd_user_page':
                    $permission =  isset($_SESSION['show_manager_per']);
                    break;
                case 'role_page':
                    $permission =  isset($_SESSION['role_relation_manager_per']);
                    break;
                ////////////////////////////////////////////
                case 'manager_panel_page':
                    $permission =  isset($_SESSION['panel_manager_per']);

                    break;
                ///////////////////////////////////////////
                case 'form_preview':
                    $permission =  isset($_SESSION['history_kartable_per']);
                    break;
                case 'report_page':
                    $permission =  isset($_SESSION['reporting_per']);
                    break;

            }

            $data['page_name'] = $page_name;
            $data['title']=$page_title;
            $data['more_data']=$more_data;
            $data['role']=$_SESSION['role'];;
            $data['session'] = $_SESSION;
            $CI->load->view('templates/'.'head',$data);
            $CI->load->view('templates/header_navbar',$data);
            if($permission==1)
                $CI->load->view('pages/'.$page_name,$data);
            else
                $CI->load->view('pages/home_page',$data);

        }

    }

    public function logout(){

    }

    public function check_logged_in(){

        if(isset($_SESSION['logged_in']) && isset($_SESSION['user_id']))
            return true;
        return false;
    }

    public function show_login_page(){
        if($this->check_logged_in())
            redirect('retrieve_page/show_first_page');
        else
            $this->show_page('login_page','ورود');
    }

    public function date_conv($date,$delimiter){
        $q = explode($delimiter,$date);
        return jalali_to_gregorian($q[0],$q[1],$q[2],'/');
    }

    public function date_conv_to_jalai($date,$delimiter){
        $q = explode($delimiter,$date);
        return gregorian_to_jalali($q[0],$q[1],$q[2],'/');
    }

    public function decrypt_url($url_string){
        return urldecode(base64_decode($url_string));
    }

    public function encrypt_url($url_string){
        return urlencode(base64_encode($url_string));
    }


}
