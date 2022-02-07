

	

<?php
include("header.php");
include("conexao.php");
?>	

<body>

	<div class="uk-container">
	<br>
		<h1 style="text-align: center;">Gerenciamento de Usuários</h1>
		<br>
		<div >
		
		<div  >
		<div style=" height: 400px;  background-color:#F7F7F7; padding: 20px; border-radius: 10px;">
		<h2 style="text-align: center;" >Cadastrar Usuário</h2>
		<form method="post" action="cadastrar.php">
			<label class="uk-legend">Nome: </label>
			<input class="uk-input" type="text" name="nome" placeholder="Nome completo"> <br><br>
			
			<label class="uk-legend">Data de Nascimento: </label>
			<input class="uk-input" type="date" name="nascimento" placeholder="Digia sua data de nascimento"> <br><br>
			
			<label class="uk-legend">Ativo no Sistema: </label>
			 <select name="ativo" class="uk-select">
                <option value="1">Ativo</option>
                <option value="0">Não ativo</option>
            </select>
			<br><br>
			<input style="border-radius: 10px;" class="uk-button uk-button-primary" type="submit" value="cadastrar">
		</form>
		</div>
				</div>
		
		<br><br>
		
		<div   >
		<div style="background-color:#F7F7F7; padding: 20px; border-radius: 10px;">
		<h2 style="text-align: center;">Lista de Usuários</h2>
		<?php
		$atributo = $_GET["atributo"];		
	$vetor = $rows;
$primeiro = reset($vetor);
		//var_dump($primeiro); 
		
		
		$ultimo = end($vetor);
	

if($atributo == "alfabetica"){
	$OrdenaAlfabeto  = array_column($rows, 'Nome');
	$array_lowercase = array_map('strtolower', $OrdenaAlfabeto);
	array_multisort($array_lowercase, SORT_ASC, SORT_STRING, $rows);

}

if($atributo == "faixa"){
	$OrdenaNascimento = array_column($rows, 'nascimento');
	array_multisort($OrdenaNascimento,SORT_DESC, $rows);

}

if($atributo == "nasc"){
	$OrdenaNascimento = array_column($rows, 'nascimento');
	array_multisort($OrdenaNascimento,SORT_ASC, $rows);

}


		?>
		
		<a href='index.php?atributo=alfabetica' class="uk-button uk-button-default" style="border-radius: 10px;">Ordem alfabética</a> 
		<a href='index.php?atributo=faixa' class="uk-button uk-button-default" style="border-radius: 10px;">Ordem por faixa etária</a>
		<a href='index.php?atributo=faixa' class="uk-button uk-button-default" style="border-radius: 10px;">Ordem idade</a>
		<a href='index.php?atributo=nasc' class="uk-button uk-button-default" style="border-radius: 10px;">Ordem por data de nascimento </a>
		
		<br>
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
				</div>
		
		
		
				
				</div>
		<br>		
	<a href="sair.php" > Finalizar sessão</a>
	
	</div>
	</body>
	

	
</html>