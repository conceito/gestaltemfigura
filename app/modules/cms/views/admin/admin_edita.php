<?php echo validation_errors(); ?>

<label for="nome" class="lb-full">Nome</label><input name="nome" id="nome" type="text" class="input-longo" value="<?php echo set_value('nome', $row['nome']);?>" />

<br />

<label for="email" class="lb-full">E-mail</label><input name="email" id="email" type="text" class="input-longo" value="<?php echo set_value('email', $row['email']);?>" />

<br />

<label for="nick" class="lb-full">Apelido</label><input name="nick" id="nick" type="text" class="input-curto" value="<?php echo set_value('nick', $row['nick']);?>" />

<br /><br />

<label for="login" class="lb-full">Login</label><input name="login" id="login" type="text" class="input-curto" value="<?php echo set_value('login', $row['login']);?>" />

<br /><br />

<label for="senha" class="lb-full">Nova Senha</label><input name="senha" id="senha" type="password" class="input-curto" value="<?php echo set_value('senha');?>" />
<?php echo i('Somente preencha este campo se deseja alterar sua senha. <br />Deve ter entre 5 e 15 caracteres. <br />Não pode ter espaço e caracteres especiais!');?>
<br /><br />

<label for="confirmar" class="lb-full">Confirmar Senha</label><input name="confirmar" id="confirmar" type="password" class="input-curto" value="<?php echo set_value('confirmar');?>" />
<?php echo i('Deve ser exatamente igual a senha.');?>

<br />



