<?php
include "conexaobanco.php";


if(isset($_GET["nome"])){$nome=$_GET["nome"];}

if(isset($_GET["cep"])){$cep=$_GET["cep"];}
if(isset($_GET["endereco"])){$endereco=$_GET["endereco"];}
if(isset($_GET["bairro"])){$bairro=$_GET["bairro"];}
if(isset($_GET["cidade"])){$cidade=$_GET["cidade"];}

if(isset($_GET["email"])){$email=$_GET["email"];}
if(isset($_GET["celular"])){$celular=$_GET["celular"];}

try{
	$Comando=$conexao->prepare("insert into  cadastro_usuario (nome,cep,endereco,bairro,cidade) values (?,?,?,?,?)");

	$Comando->bindParam(1, $nome);
	
	$Comando->bindParam(2, $cep);
    $Comando->bindParam(3, $endereco);
	$Comando->bindParam(4, $bairro);
    $Comando->bindParam(5, $cidade);
	$Comando->execute();

	$Comando=$conexao->prepare("insert into contatos (email,celular) values (?,?)");

	$Comando->bindParam(1, $email);
	$Comando->bindParam(2, $celular);

	$Comando->execute();

	if ($Comando->rowCount() > 0){
	
		$nome = null;
		
		$cep = null;
        $endereco = null;
		$bairro = null;
		$cidade = null;
		$id_contato = null;
		$email = null;
		$celular = null;
	

		echo "<script>alert('Cadastro efetuado com sucesso!')</script>";   
		echo('<meta http-equiv="refresh"content=0;"Pagina2.html">');
	}
	else{
		$RetornoJSON = "Erro no cadastro";
	}



}
catch (PDOException $erro){
	$RetornoJSON = "Erro: " . $erro->getMessage();
} 
echo $RetornoJSON
 

?>