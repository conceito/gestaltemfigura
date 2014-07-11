<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller principal INDEX
 */

class Index extends Frontend_Controller {

    function __construct() {
        parent::__construct();
//        $this->output->enable_profiler(true);

        /*
         * Ativar função em caso de site multilingue
         * Ver core/Multilang_Controller.
         */
//        $this->setLang();
    }

    function index() {
        
        $this->load->library('user_agent');
        if($this->agent->is_mobile()){
            redirect('inicio');
        }

        $this->title = '';
        $this->load->view('intro');
    }
   
}