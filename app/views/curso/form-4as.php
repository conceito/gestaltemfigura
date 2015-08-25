<div class="control-group">
	<div class="controls">
		<label class="-control-label" for="data">Data do evento no qual deseja se inscrever</label>
		<input type="text" name="data" id="data" class="input-medium required" value="<?php echo
		set_value('data');?>" placeholder="dia / mês">
		<?php echo form_error('data'); ?>
	</div>
</div>