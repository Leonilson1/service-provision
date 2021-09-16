 
<?php
include 'conexaobanco.php';

if(isset($_GET["id"])){$id=$_GET["id"];}
if(isset($_GET["nome"])){$nome=$_GET["nome"];}

if(isset($_GET["cep"])){$cep=$_GET["cep"];}
if(isset($_GET["endereco"])){$endereco=$_GET["endereco"];}
if(isset($_GET["bairro"])){$bairro=$_GET["bairro"];}
if(isset($_GET["cidade"])){$bairro=$_GET["cidade"];}
if(isset($_GET["email"])){$email=$_GET["email"];}
if(isset($_GET["celular"])){$celular=$_GET["celular"];}
try{
	$Comando=$conexao->prepare("delete from  cadastro_usuario where id = (?) ");
	$Comando->bindParam(1, $id);
     
	
	$Comando->execute();

	if ($Comando->rowCount() > 0){
		
		$RetornoJSON = "exclusão feito com sucesso";
	}
	else{
		$RetornoJSON = "Erro não excluido";
	}
}
catch (PDOException $erro){
	$RetornoJSON = "Erro: " . $erro->getMessage();
} 
echo $RetornoJSON;

?>