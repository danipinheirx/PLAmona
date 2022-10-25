<?php
    include ("conexao.php");
    
    $grafico = $_POST['grafico_index'];
    $sql = "UPDATE graficos_ativos set grafico = '$grafico' where id_local = 1 ";
//  $q = mysqli_query($conn,$sql);
    
    $conf = $_SG['link']->prepare($sql); // tabela não existe?
    $conf -> execute();
 
      if( $_SG['link']->rowCount() == 1 ){
        header ("Location: restrito.php?cod=2");
      }
      else {
//     header ("Location: restrito.php?cod=1");
          echo $sql;
    }
                         
?>
