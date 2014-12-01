<div class="sidebar span4">
                
    <div class="top-space"></div>   
    <p></p>
    
    <a href="http://www.facebook.com/gestaltemfigura" target="_blank" title="Facebook" class="share-link">
        <i class="sprite icon-facebook"></i>
        <span>Curta nossa página <br>no Facebook</span>
    </a>

</div>
<!-- .sidebar -->

<script>
	$(document).ready(function(){
		$('.tel').mask('(99) 99999999?9');
	});
</script>

<div class="main span8">

    <h1 class="main-title">Contato</h1>
        
    <?php 
    /*
    |=================================================================================================
    |        Alerta
    |-------------------------------------------------------------------------------------------------
    */
    if($msg_tipo != null):?>    
    
    <div class="form-horizontal"><div class="controls">
        <div class="alert <?php echo ($msg_tipo=='success')?'alert-success':'alert-error';?>">
            <?php echo $msg; ?>
        </div>
        
    </div></div>
        
    <?php endif;?>
    

    <?php echo form_open('contato/envia', array(
        'class' => 'form-horizontal form-validate',
        'novalidate' => ''
    )); ?>
        
        <div class="control-group">
            <label class="control-label" for="nome">Nome</label>
            <div class="controls">
                <input type="text" name="nome" id="nome" class="input-xlarge required" value="<?php echo set_value
				('nome');?>">
                <?php echo form_error('nome'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="email" name="email" id="email" class="input-xlarge required" value="<?php echo set_value
				('email');?>">
                <?php echo form_error('email'); ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="tel">Telefone</label>
            <div class="controls">
                <input type="tel" name="tel" id="tel" class="input-medium tel required" value="<?php echo set_value
				('tel');
				?>">
                <?php echo form_error('tel'); ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="mensagem">Mensagem</label>
            <div class="controls">
                <textarea name="mensagem" id="mensagem" cols="" rows="5" class="input-xlarge required"><?php echo set_value('mensagem');?></textarea>
                <?php echo form_error('mensagem'); ?>
            </div>
        </div>


        <div class="form-actions">
        
            <button type="submit" class="btn btn-primary">Enviar mensagem</button>
                
            
        </div>
      
    <?php echo form_close(); ?>
    
    

</div>
<!-- .main -->