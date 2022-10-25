<?php


include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
//protegePagina(); // Chama a função que protege a página 


?>

<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
	<title>PlaMoNA | Recuperação de senha</title>
</head>
    <link rel="shortcut icon" href="images/favicon-96x96.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script language="JavaScript">
     /*
     A função Mascara tera como valores no argumento os dados inseridos no input (ou no evento onkeypress)
     onkeypress="mascara(this, '## ####-####')"
     onkeypress = chama uma função quando uma tecla é pressionada, no exemplo acima, chama a função mascara e define os valores do argumento na função
     O primeiro valor é o this, é o Apontador/Indicador da Mascara, o '## ####-####' é o modelo / formato da mascara
     no exemplo acima o # indica os números, e o - (hifen) o caracter que será inserido entre os números, ou seja, no exemplo acima o telefone ficara assim: 11-4000-3562
     para o celular de são paulo o modelo deverá ser assim: '## #####-####' [11 98563-1254]
     para o RG '##.###.###.# [40.123.456.7]
     para o CPF '###.###.###.##' [789.456.123.10]
     Ou seja esta mascara tem como objetivo inserir o hifen ou espaço automáticamente quando o usuário inserir o número do celular, cpf, rg, etc 

     lembrando que o hifen ou qualquer outro caracter é contado tambem, como: 11-4561-6543 temos 10 números e 2 hifens, por isso o valor de maxlength será 12
     <input type="text" name="telefone" onkeypress="mascara(this, '## ####-####')" maxlength="12">
     neste código não é possivel inserir () ou [], apenas . (ponto), - (hifén) ou espaço
     */

    function mascara(t, mask){
    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
        if (texto.substring(0,1) != saida){
            t.value += texto.substring(0,1);
        }
    }
 </script>
    <script type="text/javascript">
    
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0"; document.getElementById("main").style.marginLeft = "0";
        }
    
    </script>
<body onresize="funcaoResize()">
    
    <script>
        function funcaoResize(){
            var w = window.outerWidth;
            //var txt = "Tamanho: " + w + " ";
            //document.getElementById("demo").innerHTML = txt;
            if (w >= 855){
                document.getElementById("mySidenav").style.width = "0";        
            }
        }
    
    </script>
    
	<div id="container">
        
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
               <ul>
                    <li> <a href="index.php"> HOME</a> </li>
                    <hr>
                    <li><a href="#">MONITORAMENTO</a> </li>
                    <ul> 
                    <li> <a href="monitoramento.php"> Arroio Castelhano </a> </li>
                    </ul>
                    <hr>
                    <li><a href="quem_somos.php">CONHEÇA O PROJETO</a> </li>
                    <hr>
                    
                    <li><?php if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                    echo "<a href='criar_conta.php'>CADASTRE-SE</a> </li> <ul>
                    <li> <a href='criar_conta.php'> Crie sua conta </a></li>
                    <li> <a href='login.php'> Entrar </a></li>
                    </ul> "; } else { echo "<a href='account.php'> MINHA CONTA </a>";} ?> 
                
                    <hr>
                </ul>
        </div>
        <div id="header"> 
            <a href="index.php"> <img src="images/logo_plamona_escuro2.png" height="220px" width="175px" class="logo"> </a>
        
      
            <a href="http://www.ifsul.edu.br" target="_blank"> <img src="images/ifsul_escuro.png" height="57px" width="278px" align="right" class="ifsul"> </a>
            
            
            <span onclick="openNav()"> 
                <div id="botao_menu">
                    <div id="menu_icon"> </div>
                    <div id="menu_icon"> </div>
                    <div id="menu_icon"> </div> 
                </div>
            </span>
        </div>  <!--fim header -->
        
        <div id="menu">     
            <ul>
            <li><a href="index.php">HOME</a></li>
            
            
            <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">MONITORAMENTO</a>
                    <div class="dropdown-content">
                        <a href="monitoramento.php">Arroio Castelhano</a>    
                    </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">CONHEÇA O PROJETO</a>
                    <div class="dropdown-content">
                        <a href="quem_somos.php">Quem somos</a>
                    </div>
            </li>
            <li> <?php if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                    echo "<a href='criar_conta.php'>CADASTRE-SE</a>"; } else { echo "<a href='account.php'> MINHA CONTA </a>";} ?>
                    
                </li>
  
        </ul>
        </div>
        <div id="linhas">
        
           <div id="area_form_login"> 
                <center> <br>
                <div id="area_form">
                    <?php
                        if( empty($_GET['utilizador']) || empty($_GET['confirmacao']) )
                        die('<p>Não é possível alterar a password: dados em falta</p>');
                        
                        include ("conexao.php");
                          
                        $user = addslashes($_GET['utilizador']);    

                        $hash = addslashes($_GET['confirmacao']);    
                        //  $user = mysql_real_escape_string($_GET['utilizador']);
                        //  $hash = mysql_real_escape_string($_GET['confirmacao']);

                        $sql = "SELECT COUNT(*) FROM recuperacao WHERE utilizador = '$user' AND confirmacao = '$hash'";
                        //echo "sql".$sql;

                        $q = $_SG['link']->prepare($sql);
                        $q -> execute();
                       
                        
                        
                        if ($q->rowCount()>0){


                        // os dados estão corretos: eliminar o pedido e permitir alterar a password
                       $sql = "DELETE FROM recuperacao WHERE utilizador = '$user' AND confirmacao = '$hash'";
                       $sql = "SELECT * FROM recuperacao";
                        echo $sql;
                        $conf=$_SG['link']->prepare($sql);
                       // $conf -> execute();
                        echo $conf -> execute();
                        
                        $_SESSION['user_mail'] = $user;
                        
                        echo "<form action='nova_senha_script.php' id='formulario1' method='POST' >
                                <fieldset>
                                <legend> Escolha sua nova senha</legend> 
                                <br>
                           
                                <label> Nova senha: <br> <br> </label> 
                                    <input class='campo_senha' id='senha' type='password' name='nova'  required> <br> <br>
                                    <br> <br> 
                                <input class='botao_enviar' name='enviar' type='submit' value='Alterar senha '>
                                <br>
                                </fieldset>
                            </form>";

                        } else {
                        echo '<p>Não é possível alterar a password: dados incorretos</p>';
                        }


?>
                
                </div> </center>
               </div>
            
            
                    </center>
            
            
            
            
            
            </div> <!-- fim direita -->
        
        </div> <!--fim linhas -->
        <div id="rodape">
            
            <div id="parceiros"> <b> Parceiros: </b> <br>
            
                <a href="http://www.venancio.ifsul.edu.br/portal/"> <img src="images/ifsul.png" height="60%" class="logo_rodape"> </a>
                <div id="vertical_r"> </div>
                
                <div id="texto">
                    <a href="sobre_nos.php"> Sobre nós </a> <br>
                    <a href="http://www.venancio.ifsul.edu.br/portal/"> Sobre o IFSUL </a>
            
                </div>
                
            </div>
            <div id="plamona_logo">
                 <img src="images/logo_horizontal.png" class="logo_horizontal">   
            </div>
            
        </div> <!-- fim rodapé -->
    

	</div> <!-- fim container -->

</body>
</html>

?>
