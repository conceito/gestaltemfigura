<div class="col-1">
    
   	<h1><span class="ico"></span> CONTATO</h1>
    
    <div class="no-submenu"></div>

    
<?php if($tip != ''):?>
<div class="resposta">
	<?php if($tip == 'ok'):?><div class="ok">OK, sua mensagem foi enviada com sucesso.</div><?php endif;?>
    <?php if($tip == 'faltaCampos' || $tip == 'erro'):?><div class="erro">Ops! Houve um erro ao enviar sua mensagem.</div><?php endif;?>
</div>
<?php endif;?>
   
    
    <!--BOX PRINCIPAL DE CONTEÚDO-->
  <div class="box-pagina borda-footer10 sombra">
    
   
        
      <p>Todos os campos são necessários.</p>
        
        <form action="<?php echo site_url('contato/envia');?>" method="post" id="frm_contato">
        
        <div class="formline">
        <label for="nome" class="lb">NOME</label>
        <input id="nome" name="nome" type="text" value="<?php echo set_value('nome');?>" class="input longo" />
        
        </div>
        
        <div class="formline">
        <label for="email" class="lb">E-MAIL</label>
        <input id="email" name="email" type="text" value="<?php echo set_value('email');?>" class="input longo" />
        </div>
        
        <div class="formline">
        <label for="tel" class="lb">TELEFONE</label>
        <input id="tel" name="tel" type="text" value="<?php echo set_value('tel');?>" class="input" />
        </div>
        
        <div class="formline">
        <label for="mensagem" class="lb">MENSAGEM</label>
        <textarea id="mensagem" name="mensagem" cols="" rows="" class="txtarea"><?php echo set_value('mensagem');?></textarea>
        </div>
        
        <div class="formline">
        <label for="mensagem" class="lb" style="background-image:none;">&nbsp;</label>
        <input name="submit" type="submit" value="Enviar" class="" />
        <a href="#" class="frm-submit bot-laranja w-med ">Enviar mensagem <span class="bl"></span></a>
        </div>
        
      </form>
      
      <?php echo validation_errors(); ?>
        
        
        
        
        
    </div><!--BOX PRINCIPAL DE CONTEÚDO // FIM -->
        
</div>