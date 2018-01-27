<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud extends CI_Model{

    public function insert_new_user($fname,$lname,$contract_start,$contract_end,$username,$password,$role_id,$active){
        $insert_data = array(
            'f_name'=>$fname,
            'l_name'=>$lname,
            'contract_start'=>$contract_start,
            'contract_end'=>$contract_end,
            'username'=>$username,
            'password'=>md5($password),
            'role_id'=>$role_id,
            'active'=>$active
        );
        $this->db->insert('users',$insert_data);
    }

    public function add_form_duty_table($insert_data){
        $this->db->insert('form_duty_table',$insert_data);
        return $this->db->insert_id();
    }

    public function add_location($insert_data){
        $this->db->insert('locations',$insert_data);
    }

    public function add_eghdamat($insert_data){
        $this->db->insert('eghdamat',$insert_data);
        return $this->db->insert_id();
    }

    public function add_new_mali($insert_data){

        $this->db->insert('mali',$insert_data);
        return $this->db->insert_id();
    }

    public function add_new_form($insert_data)
    {
        $this->db->insert('form1',$insert_data);
        return $this->db->insert_id();
    }

    public function add_new_roles($insert_data){
        $this->db->insert('roles_duty',$insert_data);
    }

    public function add_new_role_name($insert_data){
        $this->db->insert('roles',$insert_data);
        return $this->db->insert_id();
    }

    public function add_new_role_per($insert_data){
        $this->db->insert('role_per',$insert_data);
    }

    public function add_new_history_kartable($insert_data){
        $this->db->insert('forms_users',$insert_data);
    }

    public function add_new_auto_action($insert_data){
        $this->db->insert('automated_action',$insert_data);
    }

    public function insert_independent_duty($inser_data){
        $this->db->insert('independent_duty',$inser_data);
    }
}