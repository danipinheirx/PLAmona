<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança


?>

<!DOCTYPE html>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
    <!-- site_V0.8700 --> 
<head>
	<title>PlaMoNA</title>
    <script type="text/javascript">
    
    var iframe;
            var socket = new easyXDM.Socket({
                //This is a fallback- not needed in many cases
                swf: "easyxdm.swf",
                onReady: function(){
                    iframe = document.createElement("iframe");
                    iframe.frameBorder = 0;
                    document.body.appendChild(iframe);
                    iframe.src = "THE HOST FRAME";
            iframe.onchange = messageBack();

                },
                onMessage: function(url, origin){
                    iframe.src = url;
                }
            });

            //Probe child.frame for dimensions.
            function messageBack(){
                socket.postMessage ( iframe.contentDocument.body.clientHeight + "," + iframe.contentDocument.body.clientWidth); 
            };

            //Poll for changes on children every 500ms.
            setInterval("messageBack()",500); 
    
    
    
    </script>
    <script type="text/javascript">
    
        /* muda o tamanho do menu para 45% */
        
        function openNav() {
            document.getElementById("mySidenav").style.width = "45%";
        }

        /* muda o tamanho do menu para 0 */
        
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    
    </script>
    
    
</head>
    <link rel="shortcut icon" href="images/favicon-96x96.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
<body onresize="funcaoResize()">
    
    <script>
        function funcaoResize(){
            
            /* toda vez que a janela for redimensionada pega a largura da janela e armazena na variável */
            
            var w = window.outerWidth;
            //var txt = "Tamanho: " + w + " ";
            //document.getElementById("demo").innerHTML = txt;
            
            /* testa se a largura é maior que 855px */
            
            if (w >= 855){
                /* se for maior, muda o tamanho do menu para 0 */
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
                    <li><a href="monitoramento.php">MONITORAMENTO</a> </li>
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
        
        <div id="menu"><ul>
              
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
                        <a href="quem_somos.php">Conheça o IFSUL</a>
                    </div>
            </li>
            <li> <?php if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                    echo "<a href='criar_conta.php'>CADASTRE-SE</a>"; } else { echo "<a href='account.php'> MINHA CONTA </a>";} ?>
                    
                </li>
            
            
            
  
        </ul>
            </div>
   
        <div id="linhas">
        
            <div id="esquerda">
                <div id="caixa">
                   <center><h3> Monitoramento da Semana </h3> </center> 
                        <iframe id='iframe' src='Conexao_BD-graficos.php' frameborder='0' width='100%' height='100%' scrolling='no'> </iframe>
                    
                </div> <!-- fim caixa -->    

              <div id="texto">
                    <a href="teste_envio_email.php"> teste </a> <br>
                   
                </div>
<!--
                <div id="caixa3">
					
                </div>
-->
            </div>
            <div id="direita">
            
                <div id="caixa1" style="height: 500">
                    <p> <center> Acompanhe o monitoramento atual:  </p>
						<iframe src = "Conexao2.php" frameborder="0" width="100%" height="450px" scrolling="no"></iframe> 
                    </center>
                </div> <!-- fim caixa 1 -->
                
                <div id="caixa2">
                    <?php
                    if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                    echo "<center> Tem interesse em ser alertado em caso de emergências?
                    <br> <br>
                    <div id='botao'>
                        <a href='criar_conta.php' title='Faça seu cadastro'>Cadastre-se</a>
                     
                    </div>
                        </a>
                    <br>
                              
                        <div id='botao'>
                                 Já possui uma conta? 
                            <br> <br> 
                        <a href='login.php' title='Entre em sua conta'> Login </a>
                            
                        </div>
                        </a>
                   </center>"; 
                        
                    } else {
                        echo "<center> <div id='botao'> 
                                    <a href='account.php' tittle='Gerenciar minha conta'> Gerenciar minha conta </a> </div>";
                   }  ?>
                </div> <!-- fim caixa 2-->
            
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
