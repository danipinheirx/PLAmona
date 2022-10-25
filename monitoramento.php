<?php
    include ("seguranca.php");
?>
<!DOCTYPE html>

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
	<title> PlaMoNA | Monitoramento </title>
</head>
    <link rel="shortcut icon" href="images/favicon-96x96.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <form action="pegaValor.php" method="post">
        
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
        
            <div id="mon_content">
                
                <div id="legend"><center> Monitoramento Atual:  </center><br><br> </div>
               	Selecione as medições:  
                <select id="medicoes" name="medicoes">
                    <optgroup label="Hora">
    				    <option value="1a">1 horas</option>
                        <option value="1b">3 horas</option>
                        <option value="1c">6 horas</option>
                        <option value="1d">12 horas</option>
                    <optgroup label="Dia">
    				    <option value="2a">1 dia</option>
                        <option value="2b">2 dias</option>
                        <option value="2c">3 dias</option>
                        <option value="2d">4 dias</option>
                        <option value="2e">5 dias</option>
                        <option value="2f">6 dias</option>
                    <optgroup label="Semana">
    				    <option value="3a">1 semana</option>
                        <option value="3b">2 semanas</option>
                        <option value="3c">3 semanas</option>
                    <optgroup label="Mês">
    				    <option value="4a">Janeiro</option>
                        <option value="4b">Fevereiro</option>
                        <option value="4c">Março</option>
                        <option value="4d">Abril</option>
                        <option value="4e">Maio</option>
                        <option value="4f">Junho</option>
                        <option value="4g">Julho</option>
                        <option value="4h">Agosto</option>
                        <option value="4i">Setembro</option>
                        <option value="4j">Outubro</option>
                        <option value="4k">Novembro</option>
                        <option value="4l">Dezembro</option>
				</select>
                <select id="ano" name="ano">
                <option value="2017">2017</option></select>
				<input type="submit" class="button" onClick="envia()" id="Atualizar" value="Atualizar" name="Atualizar" />

                <iframe id="grafico" src = "Conexao_BD-graficos.php" frameborder="0" width="100%" height="900px" scrolling="no"></iframe>
               <!-- <iframe src = "Conexao_BD-graficos.php" frameborder="0" width="100%" height="410" scrolling="no"> </iframe> -->
    
                
                
                <center>
                
                   
                
                    <br>
                    Selecione as medições da linha 1:  
                <select id="medicoes1" name="medicoes1">
                    <optgroup label="Mês">
    				    <option value="4a">Janeiro</option>
                        <option value="4b">Fevereiro</option>
                        <option value="4c">Março</option>
                        <option value="4d">Abril</option>
                        <option value="4e">Maio</option>
                        <option value="4f">Junho</option>
                        <option value="4g">Julho</option>
                        <option value="4h">Agosto</option>
                        <option value="4i">Setembro</option>
                        <option value="4j">Outubro</option>
                        <option value="4k">Novembro</option>
                        <option value="4l">Dezembro</option>
				</select>
                <select id="ano1" name="ano1">
                <option value="2017">2017</option></select><br><br>
                    
                   Selecione as medições da linha 2:  
                <select id="medicoes2" name="medicoes2">
                    <optgroup label="Mês">
    				    <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
				</select>
                <select id="ano2" name="ano2">
                <option value="2017">2017</option></select><br><br>
            
                    <br><br>
                    <input type="submit" class="button" id="Gerar" value="Gerar" name="Gerar" /> 
                     <a href="#" type="submit" class="button" id="Gerar" value="Gerar" name="Gerar" onclick="window.open('grafico.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=YES, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');"> <font size="2"> Gerar Gráfico em nova janela </font></a> 
                    <?php
                    
                    $_SESSION['medicoes1']=3;
                    
                    ?>
                   <iframe id="grafico" src = "grafico.php" frameborder="0" width="100%" height="900px" scrolling="no"></iframe>
                    <br><br>
                   
                
                     </center>
                
                
            </div> <!-- fim mon_content -->
            
            <div id="mon_direita">
                <div id="legend">
                    <center>Temperatura e umidade </center>
                </div>
                                                                        
                <iframe id="grafico" src="Conexao_BD-graficos.php" frameborder="0" width="100%" height="600px" scrolling ="no"></iframe>
                       
                  <?php if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
                    echo "";} else { echo "<div id='account_button'> 
                    <a href='account.php'>Alterar Dados </a>
                    <br>
                    <a href='#'>Cancelar alertas</a>
                    <br>
                    <a href='#'>Opção 4</a>
                    <br>
                    <a href='#'>Opção 5</a>
                    <br>
                </div>" ;} ?>     
                </p> <?php echo "Hoje é: ", date('d/m/y') ?> <br> <br>
                
            </div> 
    
            
            <script type="text/javascript">
            	document.getElementById("Atualizar").onclick = function() {
    			//var medicoess = document.getElementById("medicoes").value;
                document.getElementById("grafico").src = "Conexao_BD-graficos.php"; 
                    
			};
                function Mudarestado(el) {
                    var display = document.getElementById(el).style.display;
                        if(display == "none")
                        document.getElementById(el).style.display = 'block';
                        else
                        document.getElementById(el).style.display = 'none';
                    }
			</script>
 
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