<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retrieve_model extends CI_Model{

    public function check_login($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->where('active',1);
        $query = $this->db->get('users');
        $query=$query->result_array();

        if(count($query)==1)
        {

            $join_query = $this->db->select('permission')->from('users')->where('user_id',$query[0]['user_id'])
                ->join('roles','users.role_id = roles.id')
                ->join('role_per','roles.id = role_per.role_id')->
                get()->result_array();

            $this->db->where('id',$query[0]['role_id']);
            $role = $this->db->get('roles')->result_array();
            $query = array('user_data'=>$query[0] , 'role'=>$role[0], 'user_permission'=>$join_query);
            return $query;
        }
        else
            return false;
    }

    public function retrieve_user_full_name($where){
        $this->db->select('f_name,l_name');
        $this->db->where($where);
        $query = $this->db->get('users');
        $query = $query->result_array();
        $query = $query[0]['f_name'].' '.$query[0]['l_name'];
        return $query;
    }


        public function retrieve_user($where){

        $this->db->where($where);
        $query = $this->db->get('users');
        $query = $query->result_array();
        return $query;
    }

    public function retrieve_users_with_roles($where = null){
        $query = $this->db->select('*')->from('users')->join('roles','users.role_id = roles.id','left')->get()->result_array();
        return$query;
    }

    public function all_roles_retrieve(){
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function history_form_retrieve($user_id){
        $query = $this->db->select('form1.register_date,form1.indicator_num,form1.f_name,form1.l_name,form1.f_name2
            ,form1.l_name2,form1.payment_serial,form1.dead_line,form1.dead_time,form1.color,form1.seen')
            ->from('form1')
            ->join('forms_users','form1.indicator_num =forms_users.indicator_num ')->where('forms_users.user_id = '.$user_id)
            ->group_by('forms_users.user_id,forms_users.indicator_num')
            ->get();

        return $query->result_array();
    }

    public function location_retrieve($where=null){
        if($where!=null)
            $this->db->where($where);
        $this->db->select('location_id,location_name');
        $query = $this->db->get('locations');
        return $query->result_array();
    }

    public function show_kartable_forms($where){

        $this->db->where($where);
        $this->db->order_by('date_of_send','DESC');
        $query = $this->db->get('form1');
        $query = $query->result_array();

        return $query;
    }

    public function retrieve_all_form_with_select(){
        $this->db->select('register_date,indicator_num,f_name,l_name,f_name2,l_name2,payment_serial,kartable_user_id,color');
        $this->db->order_by('register_date','desc');
        return $this->db->get('form1')->result_array();
    }

    public function role_retrieve($role)
    {
        $query = $this->db->select('*')->from('roles_duty')->join('roles','roles_duty.role2 =roles.id ')->where(array('role1'=>$role))->get();//$this->db->get('roles_duty');
        $query = $query->result_array();
        return $query;
    }

    public function retrieve_role_by_id($where){
        $this->db->where($where);
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function all_duty_role_retrieve(){
        $query2 = $this->db->select('roles_duty.id as id, roles.role_name as role1, a.role_name as role2')->from('roles_duty')
            ->join('roles','roles.id = roles_duty.role1')
            ->join('roles a','a.id =roles_duty.role2')
            ->get();
        return $query2->result_array();
    }

    public function mali_detail_retrieve($form_serial_number){
        $this->db->where(array('form1_id'=>$form_serial_number));
        $query = $this->db->get('mali');
        $query=$query->result_array();
        return $query;
    }

    public function mali_detail_retrieve_by_id($where){
        $this->db->where($where);
        $query = $this->db->get('mali');
        $query=$query->result_array();
        return $query;
    }

    public function eghdamat_retrieve($where){
        $this->db->where($where);
        $query = $this->db->get('eghdamat');
        $query = $query->result_array();
        return $query;
    }

    public function form_retrieve($where_data){
        return $this->show_kartable_forms($where_data);
    }

    public function forms_users_retrieve($where){    //baraye ch kesaii tahala frestadim
        $this->db->where($where);
        $query = $this->db->get('forms_users');
        $query = $query->result_array();
        return $query;
    }

    public function form_retriece_with_select($where){    //select ro forma
        $this->db->select('indicator_num,kartable_user_id,f_name,l_name');
        $this->db->where($where);
        return $this->db->get('form1')->result_array();
    }

    public function get_data($table_name,$limit, $start,$where = null){    //formaye az in tarikh ta in tarik ro mide --piade nakardim

        $this->db->select('register_date,indicator_num,f_name,l_name,f_name2,l_name2,payment_serial,kartable_user_id,color');
        if($where!=null)
            $this->db->like($where);
        $this->db->limit($limit, $start);
        return $this->db->get($table_name)->result_array();
    }

    public function check_uniqe_for_roles($where){
        $this->db->where($where);
        $query = $this->db->get('roles_duty');
        $query = $query->result_array();

        if(count($query)==1)
            return false;
        else
            return true;

    }

    public function user_with_minimum_job($where){
        $users = $this->retrieve_user(array('role'=>$where['kartable_role']));
        $index = mt_rand(0,count($users)-1);
        $kartable_user_id = $users[$index]['user_id'];
        return $kartable_user_id;
    }

    public function locations_retrieve(){
        $query = $this->db->get('locations');
        $query = $query->result_array();
        return $query;
    }

    public function form_duty_retrieve($where){
        $this->db->where($where);
        $query = $this->db->get('form_duty_table');
        $query = $query->result_array();
        return $query;
    }

    public function check_form($user_id,$indicator_num){
        $this->db->where('indicator_num',$indicator_num);
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('forms_users');
        if($query->num_rows()>0)
            return false;
        return true;
    }

    public function retrieve_log_dtail($where){
        $this->db->where($where);
        $query = $this->db->get('automated_action');
        $query = $query->result_array();
        return $query;
    }

    public function retrieve_log_detail_with_form($where){
        $query = $this->retrieve_log_dtail($where);

        $dest_table=$query[0]['action_table'];
        $dest_id=$query[0]['action_id'];
        $indicator_num = $query[0]['form1_id'];
        if($dest_table=='mali'&&$dest_id!=''){
            $query = $this->db->select('form1.indicator_num,form1.f_name,form1.l_name,form1.f_name2,form1.l_name2,
            aa.action_description,aa.by_user_full_name,aa.action_date,aa.action_time,m.nahve_pardakht,m.mablagh,
            m.shomare_marja,m.vaziat,m.tarikh_tasvie,m.tozihat')->from('form1')
                ->where('indicator_num',$indicator_num)->join('automated_action aa','form1.indicator_num=aa.form1_id')
                ->where('aa.id',$where['id'])->join('mali m','aa.action_id=m.id','left')->get();

        }
        else if($dest_table=='eghdamat'&&$dest_id!=''){
            $query = $this->db->select('form1.indicator_num,form1.f_name,form1.l_name,form1.f_name2,form1.l_name2,
            aa.action_description,aa.by_user_full_name,aa.action_date,aa.action_time,e.description')->from('form1')
                ->where('indicator_num',$indicator_num)->join('automated_action aa','form1.indicator_num=aa.form1_id')
                ->where('aa.id',$where['id'])->join('eghdamat e','aa.action_id=e.id','left')->get();

        }
        else if($dest_table=='form_duty_table'&&$dest_id!=''){
            $query = $this->db->select('form1.indicator_num,form1.f_name,form1.l_name,form1.f_name2,form1.l_name2,
            aa.action_description,aa.by_user_full_name,aa.action_date,aa.action_time,fd.duty_description,fd.reciever_full_name')
                ->from('form1')
                ->where('indicator_num',$indicator_num)->join('automated_action aa','form1.indicator_num=aa.form1_id')
                ->where('aa.id',$where['id'])->join('form_duty_table fd','aa.action_id=fd.id','left')->get();

        }
        else if($dest_id==''){
            $query = $this->db->select('form1.indicator_num,form1.f_name,form1.l_name,form1.f_name2,form1.l_name2,
            aa.action_description,aa.by_user_full_name,aa.action_date,aa.action_time,aa.to_user_id,aa.to_user_full_name')
                ->from('form1')
                ->where('indicator_num',$indicator_num)->join('automated_action aa','form1.indicator_num=aa.form1_id')
                ->where('aa.id',$where['id'])->get();

        }
        return $query->result_array();

    }

    public function independent_duty_retrieve($where){
        $this->db->where($where);
        $this->db->order_by('duty_date','DESC');
        $query = $this->db->get('independent_duty');
        $query = $query->result_array();
        return $query;
    }
}