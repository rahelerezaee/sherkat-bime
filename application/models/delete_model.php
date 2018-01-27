<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class delete_model extends CI_Model{

    public function delete_form_tabel($form_serial){

        $this->db->delete('form1',array('indicator_num'=>$form_serial));
    }

    public function delete_mali_detail_by_form_serial($form_serial){
        $this->db->delete('mali',array('form1_id'=>$form_serial));
    }

    public function delete_mali_detail_by_id($id_value){
        $this->db->delete('mali',array('id'=>$id_value));
    }

    public function delete_eghdam($where){
        $this->db->delete('eghdamat',$where);

    }

    public function delete_role($where)
    {
        $this->db->delete('roles_duty',$where);
    }

    public function delete_location($where){
        $this->db->delete('locations',$where);
    }

    public function delete_duty($where){
        $this->db->delete('form_duty_table',$where);
    }

    public function delete_from_role_table($where){
        $this->db->delete('roles',$where);
    }

    public function delete_per($where){
        $this->db->delete('role_per',$where);
    }

    public function delete_log($where){
        $this->db->delete('automated_action',$where);
    }

    public function delete_independent_duty($where){
        $this->db->delete('independent_duty',$where);
    }
}