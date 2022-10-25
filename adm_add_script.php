<?php
    include ("conexao.php");
    if (isset($_POST['enviar'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
    $senha = $_POST['senha'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	$cpf = $_POST['cpf'];
    
    //conexão com o banco     
        
    $sql = "INSERT INTO usuario (nome, cpf, endereco, email, telefone, alerta_sms, alerta_email,senha,acesso)
    VALUES ('$nome', '$cpf', '$endereco', '$email', '$telefone',null,null,'sha1($senha)',0)";
    $inserir = $_SG['link']->prepare($sql);
    if ($inserir->execute() === TRUE) { 
         header('Location: sucess.php');
    } else {
           
        echo "Erro: " . $sql . "<br>" . $_SG['link']->error;
    }

    $conn->close();
    }
?>