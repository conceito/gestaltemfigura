<div class="control-group">
	<label class="control-label">Escolha sua opção de pagamento</label>
	<div class="controls">
		<label><input type="radio" name="pagamento" value="a vista" checked/> à vista</label>

		<?php if(date("Y-m-d") <= '2015-07-20'):?>
			<label><input type="radio" name="pagamento" value="parcelado"/> parcelado</label>
		<?php endif;?>

	</div>
</div>