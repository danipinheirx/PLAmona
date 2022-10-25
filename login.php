<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
	<title>PlaMoNA | Login </title>
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
            
            
            
        </nav> <!-- fim menu -->
            
        </div> <!-- fim area do menu -->
                
    
        <div id="linhas">
        
            <center><div id="area_form_login">
                <form action="login_script.php" id="formulario1" method="POST" autocomplete="on">
                    <fieldset>
                    <center><legend> Entre em sua conta:  </legend> </center>
                        
                        <?php 
                            if (isset($_GET['erro'])) {
                                {
                                    $erro = $_GET['erro'];
                                    //echo $erro;
                                    if ($erro == 1){ 
                                        echo "<br> <br> <font face='sans-serif' color='red'> <b> Dados incorretos! </b> </font> "; } 
                                    else if ($erro ==2){ 
                                        echo "<br> <br> <font color='red'>Você não tem acesso a essa página! <br> Efetue o login com uma conta apropriada! </font>"  ;
                                    }else if ($erro ==3){
                                        echo "<br> <br> <font face='sans-serif' color='red'> <b> Senha alterada, efetue o login novamente! </b> </font> ";
                                    }
                                } 
                            }  
                            ?> <br> <br> 
                        <label> Email: <br> </label> 
                            <input class="campo_email" type="email" name="usuario" placeholder="exemplo@exemplo.com" required> 
                        <br><br>
                        <label> Senha <br> </label> 
                            <input class="campo_senha" type="password" name="senha"  required> <br> <br>
                        <a href="recupera_senha_teste.php" style="color: black; font-family: sans-serif; font-size: 12px"> Esqueceu sua senha? <br>  Clique aqui </a> <br> <br>  
                        <input class="botao_enviar" name="enviar" type="submit" value="Entrar">
                        <br>
                    </fieldset>
                </form>
                
                </div>
                    </center>
                     
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

