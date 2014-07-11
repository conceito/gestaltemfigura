<?php

class Cursos_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    // -------------------------------------------------------------------------
    /**
     * Combina os destaques com os abertos
     * @param type $limit
     * @return array
     */
    public function get_latest($limit = 10){
        return array_merge($this->get_destaques(), $this->get_abertos());
    }


    // -------------------------------------------------------------------------

    /**
     * Retorna os 8 últimos cursos em destaque.
     * @param type $limit
     * @return type
     */
    public function get_destaques($limit = 8){
        $ret = $this->cms_posts->get(array(
            'modulo_id' => 21,
            'grupo_id' => array(68, 69),
            'per_page' => $limit,
            'ignore_pagination' => true,
            'offset' => 0,
            'ordem' => 'rand()',
            'gallery_tag' => 1,
            'campos' => 'id, nick, titulo, resumo, dt_ini, galeria, modulo_id, tags',
            'destaque' => 1
        ));

        return $this->cursos_parser($ret);
    }

    // -------------------------------------------------------------------------
    /**
     * Retorna os cursos abertos em ordem dos mais recentes
     * @return type
     */
    public function get_abertos(){
   
        $ret = $this->cms_posts->get(array(
            'modulo_id' => 21,
            'per_page' => 100,
            'ignore_pagination' => true,
            'grupo_id' => 157,
//            'dt_ini' => date("Y-m-d"),
            'ordem' => 'cont.dt_ini',
            'gallery_tag' => 1,
            'campos' => 'id, nick, titulo, resumo, dt_ini, galeria, modulo_id, tags, full_uri',
            'destaque' => false
        ));



        return $this->cursos_parser($ret);
    }
    
    // -------------------------------------------------------------------------
    /**
     * Retorna os cursos fechados
     * @return type
     */
    public function get_fechados(){
        $ret = $this->cms_posts->get(array(
            'modulo_id' => 21,
            'per_page' => 100,
            'ignore_pagination' => true,
            'grupo_id' => 158,
            'dt_ini' => date("Y-m-d"),
            'ordem' => 'cont.dt_ini',
            'gallery_tag' => 1,
            'campos' => 'id, nick, titulo, resumo, dt_ini, galeria, modulo_id, tags',
            'destaque' => false
        ));

        return $this->cursos_parser($ret);
    }
    
    
    // -------------------------------------------------------------------------
    /**
     * Retorna os cursos abertos e programados ordenados pela data
     * @return type
     */
    public function get_cursos_all_no_destaque(){
        $ret = $this->cms_posts->get(array(
            'modulo_id' => 21,
            'per_page' => 100,
            'ignore_pagination' => true,
            'grupo_id' => array(157, 158),
            'dt_ini' => date("Y-m-d"),
            'ordem' => 'cont.dt_ini',
            'gallery_tag' => 1,
            'campos' => 'id, nick, titulo, resumo, dt_ini, galeria, modulo_id, tags',
            'destaque' => false
        ));

        return $this->cursos_parser($ret);
    }
    
    // -------------------------------------------------------------------------
    /**
     * Faz o parseamento pelos cursos, array simples ou multi.
     * @param type $array
     * @return type
     */
    public function cursos_parser($array){
        
        if(empty($array)){
            return false;
        }
        else if(isset($array[0]) && is_array($array[0])){
            $is_single = false;
        } 
        else {
            $is_single = true;
            $array = array($array);
        }
        
        $return = array();
        
        foreach($array as $row){
            
            // identifica o tipo de curso ///////////////////////////
            if( mb_strtolower($row['grupo_nick']) === 'fechado'){
                $row['is_fechado'] = true;
                $row['is_aberto'] = false;
            }
            else {
                $row['is_fechado'] = false;
                $row['is_aberto'] = true;
            }
            
            // tratamento de data
            $mesExtenso = mesNome(substr($row['dt_ini'], 3, 2), 'longo');
            $row['dt_especial'] = $mesExtenso . ' ' . substr($row['dt_ini'], -4);
            
            // is active ?
            if($row['nick'] == $this->uri->segment(2)){
                $row['active'] = 'active';
            } else $row['active'] = '';
            
            $return[] = $row;
        }
        
        if($is_single){
            return $return[0];
        } else {
            return $return;
        }
        
    }
    
}