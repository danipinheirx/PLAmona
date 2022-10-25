<?php
    include ("conexao.php");

    if (isset($_POST['enviar'])){
	$nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
	$email = $_POST['email'];
    $senha = $_POST['senha'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
    $alerta_sms = $_POST['alerta_sms'];
    $alerta_email = $_POST['alerta_email'];
    
    //insert dos dados
//    $sql = "INSERT INTO usuario (nome, cpf, endereco, email, telefone, alerta_sms, alerta_email,senha)
//    VALUES ('$nome', '$cpf', '$endereco', '$email', '$telefone','$alerta_sms','$alerta_email',SHA('$senha'))";   ATIVAR NOVAMENTE CRIPTOGRAFIA APÓS ALTERAR PROBLEMA NO LOGIN
        
    $sql = "INSERT INTO usuario (nome, sobrenome, endereco, email, telefone,rio_alvo_id_rio, alerta_sms, alerta_email,senha,acesso)
    VALUES ('$nome','$sobrenome', '$endereco', '$email', '$telefone',1,'$alerta_sms','$alerta_email',sha1('$senha'),1)";
    
    //echo $sql;
    $inserir = $_SG['link']->prepare($sql);
    if ($inserir->execute() === TRUE) { 
         header("Location: sucess.php?id=1");
    } else {
         //echo "entrou aqui"; 
         $error_code = $_SG['link'] -> errorCode();
         if ($error_code == 1062) {
             header ("Location: criar_conta.php?error=1062");
         }
    }

    $_SG['link']=null;
    }
?>