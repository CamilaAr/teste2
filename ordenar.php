<?php

include("conexao.php");
include("header.php");



$vetor = $rows;
$primeiro = reset($vetor);
		//var_dump($primeiro); 
		echo "<br>" . $primeiro['nascimento'] ;
		
		$ultimo = end($vetor);
		echo "<br>" . $ultimo['nascimento'] ;


$OrdenaAlfabeto  = array_column($rows, 'Nome');
$array_lowercase = array_map('strtolower', $OrdenaAlfabeto);
array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $rows);	
		
/*	
if($primeiro['idade'] < $ultimo['idade']){
	$OrdenaIdade  = array_column($_SESSION['usuario'], 'idade');
		array_multisort($OrdenaIdade, SORT_DESC, $_SESSION['usuario']);
} 

else{
	$OrdenaIdade  = array_column($_SESSION['usuario'], 'idade');
		array_multisort($OrdenaIdade, SORT_ASC, $_SESSION['usuario']);
}
*/
//header('location: /index.php');
?>

<body>
<div class="uk-container">

	<div style="background-color:#F7F7F7; padding: 20px; border-radius: 10px;">
		<h2 style="text-align: center;">Lista de Usuários</h2>
		
		<a href='ordenar.php' class="uk-button uk-button-default" style="border-radius: 10px;">ordenar a lista</a> <br>
		<br>
		<div class="uk-child-width-1-6@m"  uk-grid>
		<?php
		
	
		
		foreach ($rows as $row)
{
    foreach($row as $index => $atributo)
    {
		if ($index == 'Nome'){
			?>
			
			<div>
			<?php
			?>
			<a class="uk-button uk-button-danger uk-button-small"  style="border-radius: 10px;"  href='excluir.php?atributo=<?php echo $atributo ?>'>Excluir</a> 
			 <a  class="uk-button uk-button-primary uk-button-small"style="border-radius: 10px;" href='editar.php?atributo=<?php echo $atributo ?>'>Editar</a>
			 
			 </div>
			 <?php
		
		}
		if ($index == 'nascimento'){
				
			$idade = idade($atributo);
			?>
			<div>
		<p><?php echo "Idade";?>:  <?php echo $idade;?> </p>
		 
			 </div>
			 
			 <div>
		<p><?php echo "Faixa Etária";?>:  <?php echo faixaEtaria($idade);?> </p>
		 
			 </div>
			 
			 <?php
		
		}
		?>
			
			<div>
			
		<p><?php echo $index;?>:  <?php echo $atributo;?> </p>
		 
			 </div>
			 
			 
			
			
			<?php 
			
			
        
		
    }
}			
		
				?>
				</div>	
				</div>
				<a href="index.php" > Voltar</a>
				</div>
				</body>
	

	
</html>