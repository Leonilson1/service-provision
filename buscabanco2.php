 
<?php
include 'conexaobanco.php';
$id=$_GET["id"];
try{
    if($id == '')
    
    {
   
      $Matriz =$conexao->prepare("select * from cadastro_usuario inner join contatos ");
	
    }
    else
    {
       $Matriz =$conexao->prepare("select nome, cep, endereco, bairro, cidade,email,celular
        from cadastro_usuario u
        inner join contatos c
        on u.id = c.id_contato where u.id = ?");
       $Matriz->bindParam(1,$id);
    }
    $Matriz->execute();
    $cadastro =  $Matriz->fetchAll();
    $RetornoJSON = json_encode($cadastro);
    
    echo $RetornoJSON;
    
} catch (Exception $erro){
    $RetornoJSON = "erro".$erro->getMessage();  
}

?>
