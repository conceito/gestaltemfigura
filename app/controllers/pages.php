<?php

/**
 * Controller para gerir módulo de páginas 
 */
class Pages extends Frontend_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('pages_model', 'pages');
    }

    /**
     * Identifica a página e os grupos na hierarquia 
     */
    public function index() {

        $v = $this->uri->to_array('id');
        
        

        // Caso a página não seja identificada pela URI, podemos entrar manualmente
//        $this->cms_conteudo->set_page('nick ou ID');

        
//        $hierarquia = $this->cms_conteudo->get_page_hierarchy();
        $this->pagina = $this->cms_conteudo->get_page();
        
//        $ralacionados = $this->cms_conteudo->get_page_relations();
//        
//        $this->pagina['precos'] = $this->cms_conteudo->get_precos();
//        $anexos10 = $this->cms_conteudo->get_page_attachments('agenda-ecemplo');
//        $tags = $this->cms_conteudo->get_page_tags();
//        mybug($this->pagina);

        $view['post'] = '';
        

        $this->title = $this->pagina['titulo'];
        $this->corpo = $this->load->view('site_add/post-content', $view, true);

        $this->templateRender();
    }
    
    // -------------------------------------------------------------------------
    /**
     *  Método padrão para exibir módulo "páginas"
     * @param int $page_id
     */
    public function display($page_id = ''){
        
        // shortcodes devem ser inicializados primeiro
//        $this->cms_conteudo->shortcode_reg(array('slide'));
        
        
        // retorna dados da tabela cms_conteudo parseado
        $this->pagina = $this->cms_conteudo->get_page($page_id);
        
        if($this->pagina === FALSE || $this->pagina['status'] != 1){
            redirect();
        }
        
        // retorna galeria
        $this->pagina['galeria'] = $this->cms_conteudo->get_page_gallery();
        // retorna os arquivos anexos
        $this->pagina['anexos'] = $this->cms_conteudo->get_page_attachments();
        // retorna dados do módulo
        $this->pagina['modulo'] = $this->cms_conteudo->set_get_modulo();        
        // retorna as páginas, ou grupos a que pertencem para breadcrumb
        $this->pagina['hierarchy'] = $this->cms_conteudo->get_hierarchy();
        
        /*
         * Estabelece o menu de páginas filhas da página de primeiro nível
         */
        $firstNick = $this->uri->segment(1);
        $secondNick = $this->uri->segment(2);
        
        $view['masterPage'] = $this->cms_conteudo->get_page($firstNick, false);
        // retorna as páginas filhas
        $view['children'] = $this->pages->getChildrenPages($firstNick);
        
        /* --------------------------------------------------------------
         * Tratamento de páginas especiais
         */
        if($secondNick == 'glossario-gestaltico'){
            $this->setNewScript(array('bootstrap-transition', 'bootstrap-collapse'));
            $view['letters'] = $this->pages->glossarioLetters();
            $view['vocabulos'] = $this->pages->getVocabulos();
            $this->pagina['txt'] .= $this->load->view('glossario', $view, true);
        }
                
        
//        mybug($view['children']);
        
      

        $this->title = $this->pagina['titulo'];
        
        if($firstNick == 'gestalt-terapia'){
            $template = 'gestalt-terapia';
        } else {
            $template = 'basic-page';
        }
        
        $this->corpo = $this->load->view($template, $view, true);

        $this->templateRender();
    }
    
    
    public function profissionais() {
        
        $this->setNewScript(array('bootstrap-transition', 'bootstrap-collapse'));
        
        $this->pagina = $this->cms_conteudo->get_page('profissionais');
        
        $view['responsaveis'] = $this->pages->getProfissionais(array(
            'destaque' => 1
        ));
        $view['outros'] = $this->pages->getProfissionais(array(
            'destaque' => 0
        ));
        
        $this->title = $this->pagina['titulo'];
        
        $this->corpo = $this->load->view('profissionais', $view, true);

        $this->templateRender();
        
    }

    

}