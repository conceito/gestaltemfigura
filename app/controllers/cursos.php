<?php

/**
 * Controller para gerir módulo de Notícias 
 */
class Cursos extends Frontend_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('cursos_model', 'cursos');
    }

    // -------------------------------------------------------------------------
    /**
     * 
     */
    public function index() {
  
        // exibe lista de posts baseado nos argumentos abaixo:
        $view['posts'] = $this->cursos->get_abertos();
        // string de navegação para injetar na view
        $view['pagination'] = $this->cms_posts->pagination();
//        mybug($view['posts']);
        
//        $this->pagina = $this->cms_conteudo->get_page('cursos');
        
        $this->title = 'Cursos';
        $this->corpo = $this->load->view('cursos', $view, true);

        $this->templateRender();
    }
    
    // -------------------------------------------------------------------------
    /**
     * Método padrão para exibir módulo "notícias".
     * Ver: $route['noticias/(:any)'] = "noticias/display/$1";
     * @param int $page_id
     */
    public function display(){
        
        // shortcodes devem ser inicializados primeiro
        $this->cms_conteudo->shortcode_reg(array('slide'));
        
        $view['msg_tipo'] = $this->phpsess->flashget('msg_tipo');
        $view['msg']  = $this->phpsess->flashget('msg');
        
        $this->setNewScript(array('curso','jquery.validate'));
        
        // retorna dados da tabela cms_conteudo parseado
        $this->cms_conteudo->set_page();
        $this->pagina = $this->cms_conteudo->get_page();
        
        
        // retorna galeria
        $this->pagina['galeria'] = $this->cms_conteudo->get_page_gallery();
        // retorna os arquivos anexos
        $this->pagina['anexos'] = $this->cms_conteudo->get_page_attachments();
        // retorna dados do módulo
        $this->pagina['modulo'] = $this->cms_conteudo->set_get_modulo();
        //
        $this->pagina['precos'] =  $this->cms_conteudo->get_precos();
        $this->pagina['cupons'] =  $this->cms_conteudo->get_cupons();
        $this->pagina['preco_final'] = $this->cms_conteudo->preco_final();
        
        
        // retorna as páginas, ou grupos a que pertencem para breadcrumb
        $this->pagina['hierarchy'] = $this->cms_conteudo->get_hierarchy();
//             mybug($this->pagina['hierarchy']);  
        
        // exibe lista de posts baseado nos argumentos abaixo:
        $view['posts'] = $this->cursos->get_abertos();

	    if($this->pagina['status'] != 1)
	    {
		    $this->pagina['txt'] = '<p class="alert">Este curso não está disponível.</p>';
	    }

        $this->title = $this->pagina['titulo'];
        $this->corpo = $this->load->view('curso', $view, true);

        $this->templateRender();
        
    }
    
    // ------------------------------------------------------------------------
    /**
     * Navegação pelos grupos de posts
     */
    public function categoria(){
        
        // retorna dados da tabela cms_conteudo parseado
        $this->cms_conteudo->set_page();
        $this->pagina = $this->cms_conteudo->get_page();
        
        // exibe lista de posts baseado nos argumentos abaixo:
        $view['posts'] = $this->cms_posts->get(array(
            'modulo_id' => 21,
            'per_page' => 10,
            'grupo_id' => $this->pagina['id'],
            'base_url' => 'cursos/g/'.$this->pagina['nick'],
            'gallery_tag' => false,
            'gettags' => false
        ));
        // string de navegação para injetar na view
        $view['pagination'] = $this->cms_posts->pagination();
//        mybug($view['posts'], true);
        
        
        // breadcrumb
        $this->breadcrumb->add('Cursos', 'cursos');
        $this->breadcrumb->add($this->pagina['titulo']);
        
        
        $view['post'] = 'Grupo';        

        $this->title = 'Grupo - ' . $this->pagina['titulo'];
        $this->corpo = $this->load->view('site_add/looping-links', $view, true);

        $this->templateRender();
        
    }
    
    public function user($curso_id, $user_id){
        
        $this->load->library(array('cms_usuario'));
        
//        $this->cms_usuario->do_login(array(
//            'email' => 'brunodanca@gmail.com'
//        ));
        
        
        
//        $this->cms_usuario->do_logout();
        
        $sess = $this->cms_usuario->get_session();
        
        // recupera infos da inscrição
        $retorno['inscription'] = $this->cms_usuario->get_inscription($curso_id, $user_id);
        
        $user_id = $retorno['inscription'][0]['user_id'];
        
        $retorno['user'] = $this->cms_usuario->get($user_id);
        
        mybug($retorno);
        
    }
    
    //----------------------------------------------------------------------
    
    public function enviaInscricao()
    {
        $this->load->library(array('form_validation'));
        $this->load->model('contato_model', 'contato');

        /*
         * Validação
         */
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('tel1', 'Telefone', 'trim');
        $this->form_validation->set_rules('nome_curso', 'Nome do Curso', 'trim');

        $this->form_validation->set_message('required', 'Obrigatório');
        $this->form_validation->set_message('min_length', 'Obrigatório');
        $this->form_validation->set_message('valid_email', 'Obrigatório');
        $this->form_validation->set_error_delimiters('<label class="error">', '</label>');

        /*
         * Não validou
         */
        if ($this->form_validation->run() == false) {

            // salva erro na session
            $this->phpsess->flashsave('msg_tipo', 'erro');
            $this->phpsess->flashsave('msg', 'Campos incorretos.');

        } else {

            $ret = $this->contato->envia_inscricao();
         
            if ($ret) {
                $this->phpsess->flashsave('msg_tipo', 'success');
                $this->phpsess->flashsave('msg', 'Mensagem enviada com sucesso.');
            } else {
                $this->phpsess->flashsave('msg_tipo', 'erro');
                $this->phpsess->flashsave('msg', 'Erro ao enviar dados');
            }

        }
        
        redirect($this->input->post('redirect'), 'refresh');
        
    }

    

}