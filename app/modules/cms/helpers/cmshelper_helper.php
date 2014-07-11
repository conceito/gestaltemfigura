<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Entra a string 'tipo' e retorna o número da revisão
 */
if(!function_exists('revision_num')){
    function revision_num($rev_string){
        $ex = explode('-', $rev_string);
        return $ex[2];
    }
}

/**
 * Entra a string 'tipo' e retorna o número do post original
 */
if(!function_exists('revision_id')){
    function revision_id($rev_string){
        $ex = explode('-', $rev_string);
        return $ex[0];
    }
}

/**
 * Monta inputs de filtros
 */
if(!function_exists('local_search')){
    function local_search($config = array()){
        
        $ci =& get_instance();
        
        // configurações
        $campo = (isset($config['campo'])) ? $config['campo'] : '';
        $type  = (isset($config['type']))  ? $config['type']  : 'text';
        $class = (isset($config['class'])) ? $config['class'] : '';
        $style = (isset($config['style'])) ? $config['style'] : '';
        $id    = (isset($config['id']))    ? $config['id']    : '';
        $options = (isset($config['options'])) ? $config['options'] : false;
        
        // valor
        $value = '';// init
        $uri = $ci->uri->to_array('filter_'.$campo);
        $value = $uri['filter_'.$campo];
        
        // tratamento para input
        if($type == 'date' && strlen($value) == '10'){
            $value = formaPadrao($value);
        }
        
        // valor via POST tem prioridade
        if(isset($_POST['filter_'.$campo])){
            $value = $_POST['filter_'.$campo];
        }
        
        // se houverem options, o input será um combobox
        if($options){
            $extra = 'id="'.$id.'" class="'.$class.'" style="'.$style.'"';
//            $options = array_merge(array(''=>''), $options);
            $options = array(''=>'') + $options;
            
            $input = form_dropdown('filter_'.$campo, $options, $value, $extra);
        } 
        // senão um input text
        else {
            $input = '<input type="text" name="filter_'.$campo.'" class="'.$class.'" id="'.$id.'" value="'.$value.'" size="100%" style="'.$style.'">';
        }
        
        
        
        return $input;
        
    }
}

/**
 * Indents a flat JSON string to make it more human-readable.
 *
 * @param string $json The original JSON string to process.
 *
 * @return string Indented version of the original JSON string.
 */
if (!function_exists('json_indent')) {


    function json_indent($json) {

        $result = '';
        $pos = 0;
        $strLen = strlen($json);
        $indentStr = '  ';
        $newLine = "\n";
        $prevChar = '';
        $outOfQuotes = true;

        for ($i = 0; $i <= $strLen; $i++) {

            // Grab the next character in the string.
            $char = substr($json, $i, 1);

            // Are we inside a quoted string?
            if ($char == '"' && $prevChar != '\\') {
                $outOfQuotes = !$outOfQuotes;

                // If this character is the end of an element, 
                // output a new line and indent the next line.
            } else if (($char == '}' || $char == ']') && $outOfQuotes) {
                $result .= $newLine;
                $pos--;
                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }

            // Add the character to the result string.
            $result .= $char;

            // If the last character was the beginning of an element, 
            // output a new line and indent the next line.
            if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos++;
                }

                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }

            $prevChar = $char;
        }

        return $result;
    }

}

// ------------------------------------------------------------------------

/**
 * Cms URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */
if (!function_exists('cms_url')) {

    function cms_url($uri = '') {
        $CI = & get_instance();
        return $CI->config->site_url($uri);
    }

}

// ----------------------------------------------------------------------------
// 
//////    formato brasilleiro
if ( ! function_exists('moneyBR'))
{
	function moneyBR($str)
	{
		// primeiro retira
		$str = number_format($str, 2, ',', '.');
		return $str;
	}
}

// ----------------------------------------------------------------------------

/**
 * Retorna uma sequencia de números qualquer no padrão: 0.00 
 */
if (!function_exists('moneyFormat')) {

    function moneyFormat($param) {
        
        // verifica se tem centavos com vírgula, 999,99
        if(substr($param, -3, 1) == ','){
            $param = str_replace(array(','), '.', $param);
        }
        
        // primeiro retira
        $param = str_replace(array(','), '', $param);
        return number_format((double)$param, 2, '.', '');
        
    }

}


// ----------------------------------------------------------------------------

/**
 * Converte cor no formato hexadecimal para RGB. 
 */
if (!function_exists('hex2rgb')) {

    function hex2rgb($hex, $format = 'string') {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);

        if ($format == 'string') {
            return implode(",", $rgb);
        } else if ($format == 'array') {
            return $rgb;
        }
    }

}



// ---------------------------------------------------------------------------


if (!function_exists('str_hierarchy')) {

    function str_hierarchy($level = NULL) {

        if ($level == NULL) {
            $level = 0;
        }

        $str_hierarchy = str_repeat('.&nbsp;', $level) . '&mdash; '; // &mdash;   &nbsp;&nbsp; ∟
//        $str_hierarchy = substr($str_hierarchy, 0, -1) . '∟';
        if ($level == 0) {
            $str_hierarchy = '';
        }

        return $str_hierarchy;
    }

}

// --------------------------------------------------------------------------
// transforma telefone SQL (nn|nnnn-nnnn) para input ((nn)nnnn-nnnn)
if (!function_exists('tel_input')) {

    function tel_input($tel) {
        if (strlen($tel) < 12
        )
            return '';
        $p = explode('|', $tel);
        $saida = '(' . $p[0] . ')' . $p[1];
        return $saida;
    }

}

// --------------------------------------------------------------------------
// transforma telefone input ((nn)nnnn-nnnn) para SQL (nn|nnnn-nnnn)
if (!function_exists('tel_sql')) {

    function tel_sql($tel) {
        if (strlen(trim($tel)) < 13
        )
            return '';
        $saida = substr(trim($tel), 1, 2) . '|' . substr(trim($tel), -9);
        return $saida;
    }

}

// --------------------------------------------------------------------------

/**
 * Retorna os dados do grupo principal (último) 
 */
if (!function_exists('lastGrupo')) {

    function lastGrupo($grupoParents) {
        if ($grupoParents === false) {
            return array('grupoCor2' => '');
        } else {

            $ttl = count($grupoParents);
            $last = $grupoParents[$ttl - 1];

            return $last;
        }
    }

}

// --------------------------------------------------------------------------
// retorna a língua ativa, se não houver coloca o PT como default
if (!function_exists('get_lang')) {

    function get_lang() {
        $ci = &get_instance();
        $lsess = $ci->phpsess->get('lang', 'cms');
        if (strlen(trim($lsess)) < 2) {
            $ci->phpsess->save('lang', 'pt', 'cms');
            return 'pt';
        }
        return $lsess;
    }

}

// --------------------------------------------------------------------------

/**
 * Salva o texto no BD como UTF8, menos as aspas..
 *
 * @param mixed $str
 * @return
 * */
if (!function_exists('campo_texto_utf8')) {

    function campo_texto_utf8($str) {
        $saida = utf8_encode(html_entity_decode($str, ENT_NOQUOTES));
        return $saida;
    }

}

// --------------------------------------------------------------------------

/**
 * calcula o percentual
 *
 * @param mixed $str
 * @return
 * */
if (!function_exists('percentual')) {

    function percentual($total, $parte) {
        if ($total < 1
        )
            return 0;
        $saida = ($parte * 100) / $total;
        return floor($saida);
    }

}

// --------------------------------------------------------------------------

/**
 * Prepara dados do form para salvar no bd
 */
if (!function_exists('prep_rel_to_sql')) {

    function prep_rel_to_sql($rel) {

        if (!is_array($rel)) {
            return 0;
        }

        $result = implode(',', $rel);

        return $result;
    }

}

// --------------------------------------------------------------------------

/**
 * Faz o cálculo de retorno entre visualização e cliques
 */
if (!function_exists('ctr')) {

    function ctr($clicks = NULL, $views = NULL) {

        if ($clicks == NULL || $views == NULL || ($clicks == 0 && $views == 0)) {
            return 0;
        }

        $result = round(($clicks / $views) * 100, 1);

        return $result;
    }

}

// --------------------------------------------------------------------------
/**
 * Converte bytes em Mb...
 */
if (!function_exists('format_bytes')) {

    function format_bytes($size, $precision = 1) {
        $base = log($size) / log(1024);
        $suffixes = array('B', 'Kb', 'Mb', 'Gb', 'Tb');

        return round(pow(1024, $base - floor($base)), $precision) . ' '. $suffixes[floor($base)];
    }

}
?>