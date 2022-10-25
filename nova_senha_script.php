<?php
    include ("seguranca.php");
    include ("conexao.php");
    if (isset($_POST['enviar'])){
	$nova = $_POST['nova'];
    
        
        $user_mail = $_SESSION['user_mail'];
//        echo "Valor da variável: ",$user_mail,"<br>";

        $sql = "SELECT id_usuario FROM usuario WHERE email = '".$user_mail."' LIMIT 1";
  
        $query = $_SG['link']->query($sql);;
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
        // Verifica se encontrou algum registro
        if (empty($resultado)) {
         echo "Nenhum registro foi encontrado. O usuário é inválido"; 
//            header ("Location: alterar_senha.php?cod=1");
        
        } else {
            $id = $resultado['id_usuario'];
            $sql = "UPDATE USUARIO set senha ='".sha1($nova)."' WHERE id_usuario = '".$id."'";
            $query = $_SG['link']->query($sql);;
            $resultado = $query->fetch(PDO::FETCH_ASSOC);
            unset($_SESSION['user']);
            header ("Location: sucess.php");
        }
    }

?>