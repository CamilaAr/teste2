<?php

session_start();

$nome = $_GET["atributo"];
echo $nome;

include("conexao.php");

excluir($nome);

header('location: /index.php');


?>