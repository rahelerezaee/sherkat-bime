<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pagination_configuration{


    public function __construct()
    {


    }

    public function paginate($controller_name,$table_name,$total_rows,$per_page,$where=null)
    {

        $CI=& get_instance();
        $CI->load->library('pagination');

        $config['base_url'] = base_url() . $controller_name;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
       /* $config['first_link'] = 'ابتدا';
        $config['last_link'] = 'انتها';*/
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 10;
        $page = ($CI->uri->segment(3)) ? $CI->uri->segment(3) : 0;
        $CI->pagination->initialize($config);
        $data['links'] = $CI->pagination->create_links();

        $data['forms'] = $CI->retrieve_model->get_data($table_name,$config["per_page"], $page,$where);
        return $data;
    }
}