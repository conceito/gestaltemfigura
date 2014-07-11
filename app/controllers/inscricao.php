<?php

class Inscricao extends Frontend_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('contato_model', 'contato');
    }
    
    public function index($curso_id = ''){
        
        
        $this->setNewScript(array('jquery.validate'));
        
        $view['msg_tipo'] = $this->phpsess->flashget('msg_tipo');
        $view['msg']  = $this->phpsess->flashget('msg');
        
        if($curso_id == 'encontro'){
            $view['curso_nome'] = 'V Encontro Gestal em Figura';
        } else {
            $view['curso_nome'] = 'V Encontro Gestal em Figura';
        }
      
       
        $this->title = 'Inscrição';
        $this->corpo = $this->load->view('inscricao_fechada', $view, true);
//        $this->corpo = $this->load->view('form_inscricao', $view, true);


         $this->templateRender();
        
    }
    
    public function envia($curso_id = '')
    {
        // -- carrega classes -- //
        $this->load->library(array('form_validation'));

        /*
         * Validação
         */
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('tel1', 'Telefone fixo', 'trim|required');
        $this->form_validation->set_rules('tel2', 'Celular', 'trim');
        $this->form_validation->set_rules('modalidade_inscricao', 'Modalidade de inscrição', 'trim');
        $this->form_validation->set_rules('pagamento', 'Forma de pagamento', 'trim');
        $this->form_validation->set_rules('obs', 'Observação', 'trim');

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
            $this->index($curso_id);
        }
        /*
         * OK, validou
         */ else {

            $ret = $this->contato->envia_inscricao(array(
                'nome_curso' => $curso_id
            ));

            if ($ret) {
                $this->phpsess->flashsave('msg_tipo', 'success');
                $this->phpsess->flashsave('msg', 'Inscrição enviada com sucesso.');
            } else {
                $this->phpsess->flashsave('msg_tipo', 'erro');
                $this->phpsess->flashsave('msg', 'Erro ao enviar inscrição');
            }

            redirect('inscricao/'.$curso_id);
        }
    }
    
}