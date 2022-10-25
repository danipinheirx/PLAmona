<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página 
restringeAcesso();


?>


<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
	<title>PlaMoNA | Administração </title>
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
        
            <div id="esquerda_adm">
                <?php
                include ("conexao.php");
            
                $id = $_SESSION['usuarioID'];
                
                $sql = "SELECT * FROM usuario WHERE `id_usuario` = $id";
                $query = $query = $_SG['link']->query($sql);;
                $resultado = $query->fetch(PDO::FETCH_ASSOC);
               
                
                ?>
                <div id="adm"> 
                    
                    Seja bem vindo, Administrador 
                    <hr>
                    
                    <form action="update_graficos_script.php"  id="form_graficos" method="post">
                        <fieldset>
                    
                            <legend> Administrar site: </legend>
                            
                            <label>Selecionar grafico da página inicial: </label> 
                            <select name="grafico_index">
                                <option value="1">Gráfico do dia</option>
                                <option value="2">Gráfico da semana</option>
                                <option value="3">Gráfico do mês</option>
                            </select>
                            <?php 
                                if (isset($_GET['cod'])){
                                    $cod = $_GET['cod'];
                                        if ($cod == 2){
                                            echo "<img src='images/cadastro_sucess.png' height=15px; widht='15px';>";
                                        }
                                    }
                            ?>
                            <br> <br> 
                            <input class="botao_enviar" type="submit" name="definir" value="Definir">
                            
                            <hr> Pesquisar por usuarios:   
                            
                    
                    
                            </fieldset>
                            </form>
                
                </div>
            </div> <!-- fim esquerda -->
            <div id="direita_adm">
                
            <center> <br> 
                <?php echo "Seja bem vindo, " . $_SESSION['usuarioNome'];
                ?> <br> 
                <?php echo "Hoje é: ", date('d/m/y') ?> <br> <br> </center>
                <div id="account_button"> 
                    <a href="adm.php">Adicionar Administrador </a>
                    <br>
                    <a href="erro.php">Opção</a>
                    <br>
                    <a href="erro.php">Opção</a>
                    <br>
                    <a href="logout_script.php">Sair</a>
                    <br>
                </div>
                
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