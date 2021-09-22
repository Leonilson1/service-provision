<?php


$bant = 'bancoteste';
$usuario = 'root';
$senha = 'Pandora*2001';

try {
	
$conexao= new PDO("mysql:host=localhost; dbname=$bant","$usuario","$senha");
$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$conexao->exec("set names utf8");
} 
catch (PDOException $erro) {
	
	echo"Erro na conexão:".$erro->getMessage();
}

?>