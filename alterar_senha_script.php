<?php
    include ("seguranca.php");
    include ("conexao.php");
        
    if (isset($_POST['enviar'])){
            
        $antiga = $_POST['antiga'];
        $nova = $_POST['nova'];

        $_SG['tabela'] = 'usuario';       // Nome da tabela onde os usuários são salvos


        $id = $_SESSION['usuarioID'];

        $sql = "SELECT * FROM usuario WHERE  `senha` = '".sha1($antiga)."' AND id_usuario = '".$id."' LIMIT 1";

        $query = $_SG['link']->query($sql);

        $resultado = $query->fetch(PDO::FETCH_ASSOC);
            // Verifica se encontrou algum registro
            if (empty($resultado)) {
                // Nenhum registro foi encontrado => o usuário é inválido
                header ("Location: alterar_senha.php?cod=1");

            } else {
                $sql = "UPDATE USUARIO set senha ='".sha1($nova)."' WHERE id_usuario = '".$id."'";
                $query = $query = $_SG['link']->query($sql);;
                $resultado = $query->fetch(PDO::FETCH_ASSOC);

                header ("Location: sucess.php?id=4");
            }
        }

?>