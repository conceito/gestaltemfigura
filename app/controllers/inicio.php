<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller principal INDEX
 */

class Inicio extends Frontend_Controller {

    function __construct() {
        parent::__construct();
//        $this->output->enable_profiler(true);

        /*
         * Ativar função em caso de site multilingue
         * Ver core/Multilang_Controller.
         */
//        $this->setLang();
    }

    
    public function index() {
        
        $this->setNewScript(array('jquery.flexslider-min'));
        
        $this->load->library('cms_banner');
        $banners = $this->cms_banner->getBanners(41, 10);
        
        $view['banners'] = $banners;
        
        $this->load->model('cursos_model', 'cursos');
        // exibe lista de posts baseado nos argumentos abaixo:
        $view['cursos'] = $this->cursos->get_abertos();
        
        $this->title = '';
        $this->corpo = $this->load->view('homepage', $view, true);

		$this->uri_seg = false;
        $this->templateRender();
    }

    
    // -------------------------------------------------------------------------
    /**
     * Redireciona para endereço do banner e soma 1 click.
     * Caso não exita, redireciona para home.
     * @param int $banner_id
     */
    public function redirect($banner_id){
        
        $this->load->library('cms_banner');
        if(!$this->cms_banner->redirect($banner_id)){
            redirect('');
        }
        
    }

}