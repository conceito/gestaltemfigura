<?php 
/*
|=================================================================================================
|        Template: Página do curso aberto.
|        Controller: cursos/display/$id
|-------------------------------------------------------------------------------------------------
*/
?>
<div class="sidebar span4">
                
    <div class="top-space"></div>
        
    <?php 
    /*
    |=================================================================================================
    |       Se existir posts
    |-------------------------------------------------------------------------------------------------
    */
    if(isset($posts) && $posts):
    ?>
    
    <ul class="side-list unstyled">
        
        <?php 
        /*
        |=================================================================================================
        |       Looping pelos posts
        |-------------------------------------------------------------------------------------------------
        */
        foreach ($posts as $post) :

        ?>
        
        <li class="<?php echo $post['active']; ?>">
            <a href="<?php echo site_url($post['full_uri']); ?>"><?php echo $post['titulo']; ?></a>
        </li>
        
        <?php 
        endforeach;
        ?>
        
        
        
        
    </ul>
    <!-- .side-list -->
    
    <?php 
    endif;
    ?>
    
    <p></p>

    
    <a href="http://www.facebook.com/gestaltemfigura" target="_blank" title="Facebook" class="share-link">
        <i class="sprite icon-facebook"></i>
        <span>Curta nossa página <br>no Facebook</span>
    </a>

</div>
<!-- .sidebar -->

<div class="main span8">

    <h1 class="main-title">Cursos</h1>
        
        <span <?php if(isset($this->pagina['adminbar'])) echo $this->pagina['adminbar']; ?>></span>
    <!-- <h2 class="second-special-title"><?php if(isset($this->pagina['titulo'])) echo $this->pagina['titulo']; ?></h2> -->
        
    
    <?php if(isset($this->pagina['txt'])) echo $this->pagina['txt']; ?>


	<?php
	// do not show subscription form if not active
	if($this->pagina['status'] == 1):
	?>

    <a name="subscribe"></a>
    <div id="subscribe-form" class="<?php echo (isset($msg)) ? 'is-open' : ''; ?>">
        <div class="hd">
            <h3>Inscrição</h3>
        </div>
        <div class="ct">
        
            <?php if($msg_tipo != null):?>    
    
            <div class="form-horizontal"><div class="controls">
                <div class="alert <?php echo ($msg_tipo=='success')?'alert-success':'alert-error';?>">
                    <?php echo $msg; ?>
                </div>
                
            </div></div>
                
            <?php endif;?>
        
            <?php echo form_open('cursos/enviaInscricao', array(
                'class' => 'form-horizontal form-validate'
            )); ?>
            
            <input type="hidden" name="nome_curso" value="<?php echo $this->pagina['titulo'] ?>">
            <input type="hidden" name="redirect" value="<?php echo $this->config->site_url().trim($this->uri->uri_string(), '/'); ?>#subscribe">
            
            <div class="control-group">
                <label class="control-label" for="nome">Nome</label>
                <div class="controls">
                    <input type="text" name="nome" id="nome" class="input-xlarge required" value="<?php echo set_value('nome');?>">
                    <?php echo form_error('nome'); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="email" name="email" id="email" class="input-xlarge required" value="<?php echo set_value('email');?>">
                    <?php echo form_error('email'); ?>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="tel1">Telefone</label>
                <div class="controls">
                    <input type="text" name="tel1" id="tel1" class="input-medium required" value="<?php echo set_value('tel1');?>">
                    <?php echo form_error('tel1'); ?>
                </div>
            </div>            


            <div class="form-actions">
            
                <button type="submit" class="btn -btn-primary">Enviar inscrição</button>
                                    
            </div>
            
            
            <?php echo form_close(); ?>
        </div>    
        
    </div><!-- #subscribe-form -->

	<?php
	endif;
	?>

    

</div>
<!-- .main -->