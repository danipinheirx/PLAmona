
<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
    <title>PlaMoNA | Sobre nós </title>
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
        
                <center>
                    <div id="area_form"> 
                <div id="sobre_nos"> 
                    
                    <div id="linha_esquerda">
        
            <div id="esquerda_sobre">  
                
                <div id="texto_quem_somos">
                    <center>  
                        <h3> Sobre nós </h3>
                    </center>
                        <p> O PlaMoNA é um projeto que iniciou em meados de 2019 e atualmente é composto por seis integrantes, sendo eles, o coordenador Geovane Griesang, os professores Daniel Assmann, Marcelo de Barros e Josemar Quevedo, e os alunos Lucas Henrique Raenke dos Santos e Kathleen Schmidt. 
                        </p>

                        <p>Este projeto tem como objetivo auxiliar de alguma forma as pessoas que acabam sendo atingidas por enchentes e/ou inundações, sendo assim, procura-se desenvolver uma plataforma digital em que as pessoas cadastradas poderão ser comunicadas quando o rio estiver cheio e com chance de transbordar e também poderão ter acessos a alguns gráficos para ter uma noção maior de como está o nível do rio em tempo real. Elas serão avisadas através de uma mensagem por email ou sms, assim não serão atingidas tão drasticamente.
                        </p> 
                    </div>
                </div>
            </div>
                </div> </center>
              
            

            
            
            
            
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
