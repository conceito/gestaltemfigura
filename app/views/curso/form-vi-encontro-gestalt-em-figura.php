<?php
//Inscrições: * Somente para o Encontro
//* Somente para o Pré-Encontro
//* Pacote Pré-Encontro + Encontro
//
//Pagamento: * À vista
//* Parcelado em 2x
//* Parcelado em 3x
//
// Os valores de pagamento mudam a cada mês,
// por isso tem que ter um mecanismo para
// bloquear a opção que já está vencida.
// Peço que você olhe a tabela de pagamento
// que colocamos na página para entender melhor.
?>

<div class="control-group">
	<label class="control-label">Você é estudante de Psicologia?</label>
	<div class="controls">
		<label><input type="radio" name="estudante" value="Sim"/> Sim</label>

		<label><input type="radio" name="estudante" value="Não" checked/> Não </label>

		<label>
	</div>
</div>


<div class="control-group">
	<label class="control-label">Tipo de inscrição</label>
	<div class="controls">
		<label><input type="radio" name="tipo_inscricao" value="Somente para o Encontro" checked/> Somente para o Encontro</label>

		<label><input type="radio" name="tipo_inscricao" value="Somente para o Pré-Encontro"/> Somente para o Pré-Encontro</label>

		<label><input type="radio" name="tipo_inscricao" value="Pacote Pré-Encontro + Encontro"/> Pacote Pré-Encontro + Encontro</label>

	</div>
</div>


<div class="control-group">
	<label class="control-label">Pagamento</label>
	<div class="controls">
		<label><input type="radio" name="pagamento" value="a vista" checked/> à vista</label>

		<?php if(date("Y-m-d") <= '2015-08-31'):?>
			<label><input type="radio" name="pagamento" value="parcelado em 2x"/> parcelado em 2x</label>
		<?php endif;?>

		<?php if(date("Y-m-d") <= '2015-07-31'):?>
			<label><input type="radio" name="pagamento" value="parcelado em 3x"/> parcelado em 3x</label>
		<?php endif;?>

	</div>
</div>