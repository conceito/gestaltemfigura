<?php

class Clinica extends Frontend_Controller{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        
        $this->pagina = $this->cms_conteudo->get_page('clinica');
        
        $this->title = 'Clínica';
        $this->corpo = $this->load->view('clinica', '', true);
        
        $this->templateRender();
    }
    
    
    
}