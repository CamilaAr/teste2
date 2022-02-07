

<?php
include("header.php");
include("conexao.php");
?>	

<body>

<?php

$nome = $_GET["atributo"];
$antigonome = $_POST["antigonome"];
$novonome = filter_input(INPUT_POST, 'novonome', FILTER_SANITIZE_STRING);
$novonascimento = $_POST["novonascimento"];
$novoativo = $_POST["novoativo"];		
		if(isset($novonome) && (isset($novonascimento)) && (isset($novoativo))){
			echo "entrou";
				
				
				
				editar($novonome, $novonascimento, $novoativo, $antigonome );
				header('location: /index.php');
		}

?>

<?php 
$pessoa = selecionar($nome);


if($pessoa['ativo'] == 1){
	$situacao = "ativo";
} else{
	$situacao = "não ativo";
}


?>
<div class="uk-container" style="text-align: center">
<h2 >
	Editar o Usuário <?php echo $nome; ?> ?
</h2>

<div style="   background-color:#F7F7F7; padding: 20px; border-radius: 10px; ">
		<h3> Digite o novo nome e a nova idade: </h3> 
		
		<form method="post" action="editar.php">
			<label  class="uk-legend">Nome: </label>
			<p>Atualmente: <?php echo $pessoa['Nome']; ?>  </p>
			<input class="uk-input" type="text" name="novonome" placeholder="Digite o novo nome" required> <br><br>
			<input type="hidden" name="antigonome" value="<?php echo $nome ?>" > 
			
			<label class="uk-legend">Data de Nascimento: </label>
			<p>Atualmente: <?php echo $pessoa['nascimento']; ?>  </p>
			<input class="uk-input" type="date" name="novonascimento" placeholder="Digia sua data de nascimento"> <br><br>
			
			<label class="uk-legend">Ativo no Sistema: </label>
			<p>Atualmente: <?php echo $situacao; ?>  </p>
			 <select name="novoativo" class="uk-select">
                <option value="1">Ativo</option>
                <option value="0">Não ativo</option>
            </select>
			<br><br>
			<input style="border-radius: 10px;" class="uk-button uk-button-primary" type="submit" value="Confirmar">
		</form>
		
	</div>	
		
		
<div style="text-align:left;">
<a href="index.php" > cancelar</a>
</div>
</div>
</body>
</html>