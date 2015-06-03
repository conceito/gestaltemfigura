<?php

class Contato extends Frontend_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('contato_model', 'contato');

	}

	public function index()
	{

		$view['captcha']  = gestalt_captcha();

		$this->setNewScript(array('jquery.validate'));

		$view['msg_tipo'] = $this->phpsess->flashget('msg_tipo');
		$view['msg']      = $this->phpsess->flashget('msg');

		$this->title = 'Contato';
		$this->corpo = $this->load->view('contato', $view, true);

		$this->templateRender();

	}

	public function envia()
	{
		// -- carrega classes -- //
		$this->load->library(array('form_validation'));

		/*
		 * Validação
		 */
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('mensagem', 'Mensagem', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('tel', 'Telefone', 'trim');
		$this->form_validation->set_rules('captcha', 'Validação', 'trim');

		$this->form_validation->set_message('required', 'Obrigatório');
		$this->form_validation->set_message('min_length', 'Obrigatório');
		$this->form_validation->set_message('valid_email', 'Obrigatório');
		$this->form_validation->set_error_delimiters('<label class="error">', '</label>');

		/*
		 * Não validou
		 */
		if ($this->form_validation->run() == false)
		{

			// salva erro na session
			$this->phpsess->flashsave('msg_tipo', 'erro');
			$this->phpsess->flashsave('msg', 'Campos incorretos.');
			$this->index();
		}
		else if(!validate_captcha())
		{
			// salva erro na session
			$this->phpsess->flashsave('msg_tipo', 'erro');
			$this->phpsess->flashsave('msg', 'Entre com o texto na imagem.');
			$this->index();
		}
		/*
		 * OK, validou
		 */
		else
		{

			$ret = $this->contato->envia_contato();

			if ($ret)
			{
				$this->phpsess->flashsave('msg_tipo', 'success');
				$this->phpsess->flashsave('msg', 'Mensagem enviada com sucesso.');
			}
			else
			{
				$this->phpsess->flashsave('msg_tipo', 'erro');
				$this->phpsess->flashsave('msg', 'Erro ao enviar mensagem');
			}

			redirect('contato');
		}
	}

}