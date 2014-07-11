<?php

class Pages_model extends CI_Model{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    
    /**
     * Insere itens no submenu de uma página dependendo da URI.
     * Combina com as páginas filhas, se existir.
     * 
     * @param string $masterPageNick
     * @return array
     */
    public function getChildrenPages($masterPageNick = '') {
        
        $pages = array();
        
        if($masterPageNick == 'gestalt-terapia'){
            $pages[] = array(
                'nick' => '',
                'titulo' => 'Gestalt-terapia',
                'uri' => $masterPageNick
            );
        }
        
        $pagesGetted = $this->cms_conteudo->get_children(true, array('html' => false));
        
        if($pagesGetted === false){
            return $pages;
        } else {
            return array_merge($pages, $pagesGetted);
            
        }
        
        
    }
    
    /**
     * 
     * @return type
     */
    public function glossarioLetters() {
        
        $this->db->where('modulo_id', 7);
        $this->db->where('tipo', 'conteudo');
        $this->db->where('status', 1);
        $this->db->where('grupo', 0);
        $this->db->where('lang', 'pt');
        $this->db->order_by('ordem');
        $this->db->select('id, nick, titulo');
        $query = $this->db->get('cms_conteudo');
        
        $return = array();
        
        if($query->num_rows() == 0){
            return false;
        }
        
        $t = $this->uri->segment(3);
        
        foreach($query->result_array() as $row){
            
            if($t === $row['nick']){
                $row['active'] = 'active';
            } else $row['active'] = '';
            
            // Busca se existe algum vocábulo
            $posts = $this->cms_posts->get(array(            
                'modulo_id' => 7,
                'per_page' => 1,
                'grupo_id'  => $row['id'],
                'campos' => 'id, nick, titulo, resumo, txt, galeria, modulo_id, full_uri'
            ));
            if($posts === false){
                $row['active'] = 'none';
            }
            
            
            $return[] = $row;
        }
        
        return $return;
    }
    
    // -----------------------------------------------------------------------
    /**
     * 
     * @return type
     */
    public function getVocabulos() {
        
        $letter = ($this->uri->segment(3)) ? $this->uri->segment(3) : 'a';
        
        $grupo = $this->cms_conteudo->get_page($letter, true);
        
        $posts = $this->cms_posts->get(array(
            
            'modulo_id' => 7,
            'per_page' => 100,
            'grupo_id'  => $grupo['id'],
            'ordem' => 'cont.titulo',
            'campos' => 'id, nick, titulo, resumo, txt, galeria, modulo_id, full_uri'
            
        ));
        
        return $posts;
    }
    
    // -----------------------------------------------------------------------
    /**
     * 
     * @return type
     */
    public function getProfissionais($config = array()) {
        
        $posts = $this->cms_posts->get(array(
            
            'modulo_id' => 61,
            'per_page' => 100,
            'grupo_id'  => false,
            'ordem' => 'cont.titulo',
            'campos' => 'id, nick, titulo, resumo, txt, galeria, modulo_id, full_uri, tags',
            'destaque' => (isset($config['destaque'])) ? $config['destaque'] : false
            
        ));
        
        return $posts;
        
    }
    
}