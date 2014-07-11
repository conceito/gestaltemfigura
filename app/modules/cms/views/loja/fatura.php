<?php
/*********************************************
*	Template: fatura do pedido loja
*	Controller: cms/loja/imprimir_fatura
*/

$extrato   = $f['extrato'];
$historico = $f['historico'];
$usuario   = $f['usuario'];
$produtos  = $f['produtos'];
$descontos = $f['descontos'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Fatura:<?php echo $extrato['fatura'];?></title>
<style type="text/css">
body {
	background: #FFFFFF;
}
body, td, th, input, select, textarea, option, optgroup {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
h1 {
	text-transform: uppercase;
	color: #CCCCCC;
	text-align: right;
	font-size: 24px;
	font-weight: normal;
	padding-bottom: 5px;
	margin-top: 0px;
	margin-bottom: 15px;
	border-bottom: 1px solid #CDDDDD;
}
.div1 {
	width: 100%;
	margin-bottom: 20px;
}
.div2 {
	float: left;
	display: inline-block;
}
.div3 {
	float: right;
	display: inline-block;
	padding: 5px;
}
.heading td {
	background: #E7EFEF;
}
.address, .product {
	border-collapse: collapse;
}
.address {
	width: 100%;
	margin-bottom: 20px;
	border-top: 1px solid #CDDDDD;
	border-right: 1px solid #CDDDDD;
}
.address th, .address td {
	border-left: 1px solid #CDDDDD;
	border-bottom: 1px solid #CDDDDD;
	padding: 5px;
}
.address td {
	width: 50%;
}
.product {
	width: 100%;
	margin-bottom: 20px;
	border-top: 1px solid #CDDDDD;
	border-right: 1px solid #CDDDDD;
}
.product td {
	border-left: 1px solid #CDDDDD;
	border-bottom: 1px solid #CDDDDD;
	padding: 5px;
}
</style>
</head>

<body>
<div style="page-break-after: always;">
  <h1>Fatura: <?php echo $extrato['fatura'];?></h1>
  <div class="div1">
    <table width="100%">
      <tbody>
        <tr>
          <td>
		  <?php echo $this->config->item('title');?><br>           
          <?php echo nl2br($loja['loja52_dados']);?><br> 
		  <?php echo base_url();?>
          </td>
          <td align="right" valign="top"><table>
              <tbody>
                <tr>
                  <td><b>Data da venda:</b></td>
                  <td><?php echo formaPadrao($extrato['data']);?> - <?php echo $extrato['hora'];?></td>
                </tr>
                <tr>
                  <td><b>Nº da fatura:</b></td>
                  <td><?php echo $extrato['fatura'];?></td>
                </tr>
                
                <tr>
                  <td><b>Nº da venda:</b></td>
                  <td><?php echo $extrato['id'];?></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>
  </div>
  <table class="address">
    <tbody>
      <tr class="heading">
        <td width="50%"><b>Para</b></td>
        <td width="50%"><b>Endereço</b></td>
      </tr>
      <tr>
        <td valign="top"><?php echo $usuario['nome'];?><br>
        	<?php echo $usuario['email'];?><br>
       
			<?php if(strlen($usuario['razao']) > 1):?>
            <?php echo $usuario['razao'];?><br>
            <?php endif;?>
            
            <?php if(strlen($usuario['fantasia']) > 1):?>
            <?php echo $usuario['fantasia'];?><br>
            <?php endif;?>
            
            <?php if(strlen($usuario['cnpj']) > 1):?>
            <?php echo $usuario['cnpj'];?><br>
            <?php endif;?>
            
            <?php if(strlen($usuario['insc_estadual']) > 1):?>
            Inscrição Estadual: <?php echo $usuario['insc_estadual'];?><br>
            <?php endif;?>
            
            <?php if(strlen($usuario['insc_municipal']) > 1):?>
            Inscrição Municipal: <?php echo $usuario['insc_municipal'];?><br>
            <?php endif;?>
            
			<?php if(strlen($usuario['rg']) > 1):?>
            RG: <?php echo $usuario['rg'];?><br>
            <?php endif;?>
            
            <?php if(strlen($usuario['cpf']) > 1):?>
            CPF: <?php echo $usuario['cpf'];?><br>
            <?php endif;?>
            
            <?php echo $usuario['tel1'];?> / <?php echo $usuario['tel2'];?>
        
      
        </td>
        <td valign="top">
        <?php echo $usuario['cep'];?><br>
		<?php echo $usuario['logradouro'];?><br>
		<?php echo $usuario['num'];?> / <?php echo $usuario['compl'];?><br>
		<?php echo $usuario['cidade'];?> - 
		<?php echo $usuario['bairro'];?> - <?php echo $usuario['uf'];?>
        
        </td>
      </tr>
    </tbody>
  </table>
  <table class="product">
    <tbody>
      <tr class="heading">
        <td><b>Produto</b></td>
        <td align="right"><b>Quantidade</b></td>
        <td align="right"><b>Preço unitário</b></td>
        <td align="right"><b>Sub-Total</b></td>
      </tr>
      
      <?php foreach($produtos as $items):?>
      <tr>
        <td><?php echo $items['conteudo_titulo']; ?> <br>
        	
            <?php if ($items['opcoes']): ?>

				<small>
				<?php foreach ($items['opcoes'] as $opt): ?>

                    <strong> - <?php echo $opt['opcao']['titulo']; ?>:</strong> 
					<?php echo $opt['valor']['titulo']; ?> 
                    <?php if(strlen($opt['valor']['codigo']) > 0): ?>
                    	(<?php echo $opt['valor']['codigo']; ?>)
                    <?php endif;?>
                    
                    <br />

                <?php endforeach; ?>
				</small>

			<?php endif;?>
        
        </td>        
        <td align="right"><?php echo $items['quantidade']; ?></td>
        <td align="right">R$<?php echo number_format($items['valor'], 2, ',', '.'); ?></td>
        <td align="right">R$<?php echo number_format($items['subtotal'], 2, ',', '.'); ?></td>
      </tr>
      <?php endforeach;?>
      
      <?php ///////////////////////////   SE EXISTIR EXIBE DESCONTOS /////////////////////////
		if($descontos):
			foreach($descontos as $des):
		?>
      
      <tr>
        <td align="right" colspan="3"><b><?php echo $des['titulo'];?> (<?php echo $des['opcao'];?>)</b></td>
        <td align="right">
		<?php if($des['regra'] == '%'):?>
      
        <?php echo $des['valor'];?>% -
        
       <?php else: ?>
      
        R$ <?php echo moneyBR($des['valor']);?> -
      
      <?php endif;?>
      </td>
      </tr>
      <?php 
			endforeach;			
		endif;?>
      
      <tr>
        <td align="right" colspan="3"><b>Total:</b></td>
        <td align="right">R$<?php echo moneyBR($extrato['valor_total']);?></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>