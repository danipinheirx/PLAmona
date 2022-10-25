<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página 


?>


<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
	<title> PlaMoNA | Minha Conta</title>
</head>
    <link rel="shortcut icon" href="images/favicon-96x96.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
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
            <img src="images/logo_horizontal.png" height="90%" class="horizontal-logo">
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
        
            <div id="esquerda_user">
                  

                
                <?php
               include ("conexao.php");
                
                $id = $_SESSION['usuarioID'];
                
                $sql = "SELECT * FROM `".$_SG['tabela']."` WHERE `id_usuario` = $id";
                $query = $_SG['link']->query($sql);
                $resultado = $query->fetch(PDO::FETCH_ASSOC); 
                echo "<form action='update.php' id='formulario_update' method='POST'>
                    <fieldset>
                    <legend> Atualizar Dados: </legend> 
                        <br>
                       <label> Nome: </label> <br>   
                        
                            <input class='campo_nome' type='text' name='nome' placeholder='" . $_SESSION['usuarioNome'],"' maxlength=80  > <br><br>
                      <label> Endereço:</label> <br>

                            <input class='campo_endereco' type='text' placeholder='" . $resultado['endereco'],"' name='endereco'> <br> <br> 
                            
                            
                            <label> Telefone:  </label> <br>
                            
                            <input class='campo_telefone' type='text' placeholder='" . $resultado['telefone'],"' name='telefone'> <br> <br> 
                
                        <input class='botao_enviar' name='enviar' type='submit' value='Atualizar Dados'>
                    </fieldset> 
                </form> "
                
                
                
                
                
                ?>
            </div> <!-- fim esquerda -->
            <div id="direita_user">
                
                <center> <br> 
                
                <div id="account_button"> 
                    <a href="alterar_senha.php">Alterar senha </a>
                    <br>
                    <a href="erro.php">Cancelar alertas</a>
                    <br> <?php 
                    if ($_SESSION['usuarioAcesso'] == 0){
                    echo "<a href='restrito.php'>Administração</a> ";
                    } else {
                        echo "<a href='erro.php'>Opção</a> ";
                    }
                    
                    ?>
                    <br>
                    <a href="logout_script.php">Sair</a>
                    <br>
                </div>
                </center>
            </div>
                    
            
            
            
            
            
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