<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class update_model extends CI_Model{

    public function update_user_table_by_username($username){
        $this->db->set('password',$username);
        $this->db->where('username',$username);
        $this->db->update('users');
    }

    public function update_accepted_of_mali_table_by_id($where){
        //$this->db->set('accepted',$where['accepted']);
        $this->db->where(array('id'=>$where['id']));
        $this->db->update('mali',array('accepted'=>$where['accepted']));
    }

    public function update_mali_table($where,$update_value){
        $this->db->where($where);
        $this->db->update('mali',$update_value);
    }

    public function update_shomarebime_of_form1_table_by_form_serial($where){
        $this->db->where(array('indicator_num'=>$where['indicator_num']));
        $this->db->update('form1',$where);
    }

    public function update_seen_of_form1_table($where)
    {
        $this->db->where(array('indicator_num'=>$where['indicator_num']));
        $this->db->update('form1',array('seen'=>0));
    }

    public function update_kartable_role_of_form1_table($where){
        $this->db->where(array('indicator_num' => $where['indicator_num']));
        $this->db->update('form1',$where);
    }

    public function update_form1($where,$value){
        $this->db->where($where);
        $this->db->update('form1',$value);
    }

    public function enable_duties($where,$value){
        $this->db->where($where);
        $this->db->update('form_duty_table',$value);
    }

    public function disable_all_duty($where,$value){
        $this->db->where($where);
        $this->db->update('form_duty_table',$value);
    }

    public function update_role_permmision($where,$insert_data){
        $this->db->where($where);
        $this->db->insert('role_per',$insert_data);
    }

    public function update_user($where,$value){
        $this->db->where($where);
        $this->db->update('users',$value);
    }

    public function update_forms_users_on_time($where,$value){
        $this->db->where($where);
        $this->db->update('forms_users',$value);
    }

    public function update_role_name($where,$value){
        $this->db->where($where);
        $this->db->update('roles',$value);
    }

    public function update_forms_users($where,$value){
        $this->db->where($where);
        $this->db->update('forms_users',$value);
    }

    public function update_independent_duty($where,$value){
        $this->db->where($where);
        $this->db->update('independent_duty',$value);
    }
}