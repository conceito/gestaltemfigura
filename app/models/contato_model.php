<?php

class Contato_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

   
    /**
     * Verifica se a string inicia com [debug]
     *
     * @param string $str
     * @return boolean
     */
    function debugMode($str = '') {

        if (strlen($str) == 0) {
            $d = false;
        } else if (strtolower(substr($str, 0, 7)) == '[debug]') {
            $d = true;
        } else {
            $d = false;
        }
        return $d;
    }

    function envia_contato() {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $assunto = 'Mensagem pelo site';
        $mensagem = $this->input->post('mensagem');



        /*
         * monta html
         */
        $html = "Nome: " . $nome . "<br>" . PHP_EOL;
        $html .= "E-mail: " . $email . "<br>" . PHP_EOL;
        $html .= "Telefone: " . $tel . "<br>" . PHP_EOL;
        $html .= "Mensagem: " . nl2br($mensagem) . "<br>" . PHP_EOL;

        /*
         * instancia library
         */
        $this->load->library('e_mail');

        if ($this->debug) {
            $emailDes = $this->config->item('email_debug');
            $assunto = '[debug] ' . $assunto;
        } else {
            $emailDes = $this->config->item('email1');
        }

        $nomeDes = $this->config->item('title');
        $menHTML = $html;
        $menTXT = $html;
        $emailRem = $email;
        $nomeRem = $nome;

        $ret = $this->e_mail->envia($emailDes, $nomeDes, $assunto, $menHTML, $menTXT, $emailRem, $nomeRem);
        return $ret;
    }

    function envia_inscricao($config = array()) {

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $tel1 = $this->input->post('tel1');
        $tel2 = $this->input->post('tel2');
        $modalidade_inscricao = $this->input->post('modalidade_inscricao');
        $pagamento = $this->input->post('pagamento');
        $obs = $this->input->post('obs');
        $curso_nome = $this->input->post('nome_curso');
        $assunto = 'Inscrição: ' . $curso_nome;



        /*
         * monta html
         */
        $html = '';
        $html .= (strlen($curso_nome)>0) ? "Curso: " .$curso_nome . "<br>" . PHP_EOL : '';
        $html .= "Nome: " . $nome . "<br>" . PHP_EOL;
        $html .= "E-mail: " . $email . "<br>" . PHP_EOL;
        $html .= (strlen($tel1)>0) ? "Telefone fixo: " . $tel1 . "<br>" . PHP_EOL : '';
        $html .= (strlen($tel2)>0) ? "Celular: " .$tel2 . "<br>"  . PHP_EOL : '';
        $html .= (strlen($modalidade_inscricao)>0) ? "Modalidade de inscrição: " .$modalidade_inscricao . "<br>" . PHP_EOL : '';
        $html .= (strlen($pagamento)>0) ? "Pagamento: " .$pagamento . "<br>" . PHP_EOL : '';
        $html .= (strlen($obs)) ? "Observações: " . $obs . "<br>" . PHP_EOL : '';

        /*
         * instancia library
         */
        $this->load->library('e_mail');
        
        if ($this->debugMode($nome)) {
            $emailDes = $this->config->item('email_debug');
            $assunto = '[debug] ' . $assunto;
        } else {
            $emailDes = $this->config->item('email1');
        }

        $nomeDes = $this->config->item('title');
        $menHTML = $html;
        $menTXT = $html;
        $emailRem = $email;
        $nomeRem = $nome;

        $ret = $this->e_mail->envia($emailDes, $nomeDes, $assunto, $menHTML, $menTXT, $emailRem, $nomeRem);
        return $ret;
    }

    /**
     * VALIDA ARQUIVO SUBMETIDO
     * http://www.beesky.com/newsite/bit_byte.htm << conversão
     *
     * @param array $files
     */
    protected function validaArq($files) {

        $erro = 0;
        $ext1 = explode('.', $files['name']);
        $ext = strtolower($ext1[count($ext1) - 1]);


        // erro do servidor
        if ($files['error'] != 0) {
            $erro = 1;
        } else if ($files['size'] > 1048576) {// 1Mb
            $erro = 2;
        } else if ($ext != 'doc' && $ext != 'pdf' && $ext != 'docx') {
            $erro = 3;
        }
//        echo $ext;
//        exit;

        if ($erro == 0
            )return true;
        else
            return false;
    }

}