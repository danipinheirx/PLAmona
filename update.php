<?php
    include ("seguranca.php"); //inclui o arquivo de seguranca para uso de variaveis de sessão
    include ("conexao.php"); //inclui o arquivo de conexao com o banco

    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
    }
    if (isset($_POST['endereco'])){
        $endereco = $_POST['endereco'];
    }
    if (isset($_POST['telefone'])){  
        $telefone = $_POST['telefone'];
    }
    $id = $_SESSION['usuarioID'];
    
    // testa se o usuario informou um dado novo para cada campo
    if (!empty($nome)){ //se o campo nao estiver vazio, acontece o update
         $sql = "UPDATE usuario set nome = '$nome' where id_usuario='$id'";
         
        //if ($_SG['link']->query($sql) === TRUE)  
            $inserir = $_SG['link']->prepare($sql);
            if ($inserir->execute() === TRUE){
            
            //header('Location: sucess.php');
        } else {
            echo "Erro: " . $sql . "<br>" . $_SG['link']->error;
            header ("Location: error.php");
        }
    }
    if (!empty($endereco)){ //se o campo nao estiver vazio, acontece o update
         $sql = "UPDATE usuario set endereco = '$endereco' where id_usuario='$id'";
         
         $inserir = $_SG['link']->prepare($sql);
         if ($inserir->execute() === TRUE){
            
            //header('Location: sucess.php');
        } else {
            echo "Erro: " . $sql . "<br>" . $_SG['link']->error;
            header ("Location: error.php");
        }
    }
    if (!empty($telefone)){ //se o campo nao estiver vazio, acontece o update
         $sql = "UPDATE usuario set telefone = '$telefone' where id_usuario='$id'";
         
         $inserir = $_SG['link']->prepare($sql);
         if ($inserir->execute() === TRUE){
         
            //header('Location: sucess.php');
        } else {
            echo "Erro: " . $sql . "<br>" . $_SG['link']->error;
            header ("Location: error.php");
        }
    }
    header("Location: sucess.php?id=2");
    
    
    



?>