<script type="text/javascript">
$(document).ready(function () {
    $("#tel1").mask("(99)9999-9999");
    $("#tel2").mask("(99)9999-9999");
});
</script>
<div class="sidebar span4">
                
                
    <div class="top-space"></div>   
    <p></p>
    
    <a href="http://www.facebook.com/gestaltemfigura" target="_blank" title="Facebook" class="share-link">
        <i class="sprite icon-facebook"></i>
        <span>Curta nossa página <br>no Facebook</span>
    </a>

</div>
<!-- .sidebar -->

<div class="main span8">

    <h1 class="main-title">Inscrição</h1>
        
    <h2 class="second-special-title"><?php if(isset($curso_nome)) echo $curso_nome; ?></h2>
        
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
    

    <?php echo form_open('inscricao/envia/'.$this->uri->segment(2), array(
        'class' => 'form-horizontal form-validate',
        'novalidate' => 'false'
    )); ?>
    
        <input type="hidden" name="nome_curso" value="<?php if(isset($curso_nome)) echo $curso_nome; ?>">
        
        <div class="control-group">
            <label class="control-label" for="nome">Nome</label>
            <div class="controls">
                <input type="text" name="nome" id="nome" class="input-xlarge" value="<?php echo set_value('nome');?>">
                <?php echo form_error('nome'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="email" name="email" id="email" class="input-xlarge" value="<?php echo set_value('email');?>">
                <?php echo form_error('email'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="tel1">Telefone fixo</label>
            <div class="controls">
                <input type="text" name="tel1" id="tel1" class="input-medium" value="<?php echo set_value('tel1');?>">
                <?php echo form_error('tel1'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="tel2">Celular</label>
            <div class="controls">
                <input type="text" name="tel2" id="tel2" class="input-medium" value="<?php echo set_value('tel2');?>">
                <?php echo form_error('tel2'); ?>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="modalidade_inscricao">Modalidade de inscrição</label>
            <div class="controls">
                <select name="modalidade_inscricao" id="modalidade_inscricao">
                    <option value="Estudante à vista">Estudante à vista</option>
                    <option value="Estudante parcelado">Estudante parcelado</option>
                    <option value="Profissional à vista">Profissional à vista</option>
                    <option value="Profissional parcelado">Profissional parcelado</option>
                </select>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="pagamento">Forma de pagamento</label>
            <div class="controls">
                <select name="pagamento" id="pagamento">
                    <option value="Depósito bancário">Depósito bancário</option>
                </select>
            </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="obs">Observações</label>
            <div class="controls">
                <textarea name="obs" id="obs" cols="" rows="5" class="input-xlarge"><?php echo set_value('obs');?></textarea>
                <?php echo form_error('obs'); ?>
            </div>
        </div>


        <div class="form-actions">
        
            <button type="submit" class="btn btn-primary">Enviar dados para inscrição</button>
                
            
        </div>
      
    <?php echo form_close(); ?>
    
    

</div>
<!-- .main -->