<?php 

class Mysession extends CI_Controller {

    function __construct()
    {
        parent::__construct();  //tsy asorina manjary tsy hitany le obj miantso : $this->load->library('session');
        $this->load->library('session');
        if($this->session->has_userdata('logged_in') == false)
             {
                redirect(site_url('login/index'));
            }
    }
	
}
?>