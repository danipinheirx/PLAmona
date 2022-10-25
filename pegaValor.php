<?php
    if (isset($_POST['Atualizar']) ) {
        if(isset($_POST['medicoes'])){
        $quantidade = $_POST['medicoes'];
            
         
            if(($quantidade=="1a")||($quantidade=="1b")||($quantidade=="1c")||($quantidade=="1d"))
            {
                $formato="hora";
                if($quantidade=="1a"){
                    $quantidade="1";
                } else if($quantidade=="1b"){
                    $quantidade="3";
                } else if($quantidade=="1c"){
                    $quantidade="6";
                }else if($quantidade=="1d"){
                    $quantidade="12";
                }
            } else if(($quantidade=="2a")||($quantidade=="2b")||($quantidade=="2c")||($quantidade=="2d")||($quantidade=="2e")||($quantidade=="2f")){
                $formato="dia";
                if($quantidade=="2a"){
                    $quantidade="1";
                } else if($quantidade=="2b"){
                    $quantidade="2";
                } else if($quantidade=="2c"){
                    $quantidade="3";
                }else if($quantidade=="2d"){
                    $quantidade="4";
                }
                else if($quantidade=="2e"){
                    $quantidade="5";
                }
                else if($quantidade=="2f"){
                    $quantidade="6";
                }
            } else if(($quantidade=="3a")||($quantidade=="3b")||($quantidade=="3c")){
                $formato="semana";
                if($quantidade=="3a"){
                    $quantidade="7";
                } else if($quantidade=="3b"){
                    $quantidade="14";
                } else if($quantidade=="3c"){
                    $quantidade="21";
                }
            } else if(($quantidade=="4a")||($quantidade=="4b")||($quantidade=="4c")||($quantidade=="4d")||($quantidade=="4e")||($quantidade=="4f")||($quantidade=="4g")||($quantidade=="4h")||($quantidade=="4i")||($quantidade=="4j")||($quantidade=="4k")||($quantidade=="4l")){
                $formato="mes";
                if($quantidade=="4a"){
                    $quantidade="1";
                } else if($quantidade=="4b"){
                    $quantidade="2";
                } else if($quantidade=="4c"){
                    $quantidade="3";
                }else if($quantidade=="4d"){
                    $quantidade="4";
                }
                else if($quantidade=="4e"){
                    $quantidade="5";
                }
                else if($quantidade=="4f"){
                    $quantidade="6";
                }
                else if($quantidade=="4g"){
                    $quantidade="7";
                }
                else if($quantidade=="4h"){
                    $quantidade="8";
                }
                else if($quantidade=="4i"){
                    $quantidade="9";
                }
                else if($quantidade=="4j"){
                    $quantidade="10";
                }
                else if($quantidade=="4k"){
                    $quantidade="11";
                }
                else if($quantidade=="4l"){
                    $quantidade="12";
                }
            } else if($quantidade=="5a"){
                $formato="ano";
                $quantidade="2017";
            }
        //$quantidade=20;
        session_start();
        $_SESSION['varMedicao']=$quantidade;
        $_SESSION['varFormato']=$formato;
        
        }
     else {
        $quantidade = 5;
        $formato="dia";
        session_start();
        $_SESSION['varMedicao']=$quantidade;
        $_SESSION['varFormato']=$formato;
         
    }
        
    }

 header ("Location: monitoramento.php");

?>