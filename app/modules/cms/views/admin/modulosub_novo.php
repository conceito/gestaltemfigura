<h3>Novo subitem deste menu:</h3>


<label for="novo_label" class="lb-full">Label</label><input name="novo_label" id="novo_label" type="text" class="input-longo input-titulo" value="<?php echo set_value('novo_label');?>" />

<br />

<label for="novo_uri" class="lb-full">URI</label><input name="novo_uri" id="novo_uri" type="text" class="input-longo" value="<?php echo set_value('novo_uri');?>" />

<br />

<label for="novo_acao" class="lb-full">Tipo de ação</label><div class="form-opcoes">
<?php echo form_radio('novo_acao', 'a');?> apagar | 
<?php echo form_radio('novo_acao', 'c');?> criar/editar | 
<?php echo form_radio('novo_acao', 'l');?> listar | 
<?php echo form_radio('novo_acao', 'r');?> gerar relatórios</div>

<br />

<label for="novo_tipo" class="lb-full">Quem pode ver</label><div class="form-opcoes"><?php echo form_radio('novo_tipo', 0);?> God | <?php echo form_radio('novo_tipo', 1, true);?> Admins</div>

<br />

<label for="novo_tabela" class="lb-full">Tabela</label><input name="novo_tabela" id="novo_tabela" type="text" class="input-curto" value="<?php echo set_value('novo_tabela');?>" />

<br />

<label for="novo_status" class="lb-full">Status</label><div class="form-opcoes"><?php echo form_radio('novo_status', 1, true);?> ativo | <?php echo form_radio('novo_status', 0);?> inativo | <?php echo form_radio('novo_status', 2);?> editando</div>

<br />
