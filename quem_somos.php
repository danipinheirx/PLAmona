<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança

?> 
<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
	<title>PlaMoNA | Sobre nós</title>
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
    
    <style>
        #slides
        {
             background: rgb (5,5,5) transparent;
           /*background: rgba(13,44,88,0.8); */
            background: rgba(0,0,0,0.8);
        }
       

    </style>
    
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
            
            
            
        </div> <!-- fim area do menu -->
        
    
        <!-- -------------- tirei os slides agora porque algo neles não tá deixando o menu funcionar, colocamos de volta quando alguém quiser dar uma olhada nisso -->
        <!-- <div id="slides">            
         <style>
		
		//a,img {border: none;}
		.trs {-webkit-transition:all ease-out 0.5s;
			-moz-transition:all ease-out 0.5s;
			-o-transition:all ease-out 0.5s;
			-ms-transition:all ease-out 0.5s;
			transition:all ease-out 0.5s;}
		
		#slider {//position: relative; z-index: 1; }
		#slider a { position: absolute; top: 0; left: 15%; opacity: 0;filter:alpha(opacity=0);}
		.ativo {opacity: 1!important; filter:alpha(opacity=100)!important;}
		
		/*controladores*/
		span {background: black; cursor: pointer; opacity: 0;filter:alpha(opacity=0); position: absolute; bottom: 40%; width: 43px; height: 43px; z-index: 5;}
		.next {right: 10px;}
		.next:before,.next:after {left: 21px;}
		.next:before {
			-webkit-transform: rotate(-42deg);
			top: 5px;
		}
		.next:after {
			-webkit-transform: rotate(-132deg);
			top: 19px;
		}
		.next:before,.next:after,.prev:before,.prev:after {content: "";
			height: 20px;
			background: #fff;
			width: 1px;
			position: absolute;
		}
		.prev {left: 10px;}
		.prev:before,.prev:after {left: 18px;}
		.prev:before {
			-webkit-transform: rotate(42deg);
			top: 5px;
		}
		.prev:after {
			-webkit-transform: rotate(132deg);
			top: 19px;
		}
		figure:hover span {opacity: 0.76;filter:alpha(opacity=76);}
		figure {
			max-width: 937px;
			height: 354px;
			position: relative;
			overflow: hidden;
			margin: 50px auto;
		}
		figcaption {padding-left: 20px;color: #fff; font-family: "Kaushan Script","Lato","arial"; font-size: 22px; background: rgba(0, 0, 0, 0.76); width: 100%; position: absolute; bottom: 0; left: 0; line-height: 55px; height: 55px; z-index: 5}
	</style>

	<figure>
		<span class="trs next"></span>
		<span class="trs prev"></span>

		<div id="slider">
			<a href="#" class="trs"><img src="images/castelhano1.jpg" alt="Arroio Castelhano" /></a>
			<a href="#" class="trs"><img src="images/castelhano2.jpg" alt="Mapeamento do Arroio Castelhano" /></a>
            <a href="#" class="trs"><img src="images/castelhano3.jpg" alt="Arroio Castelhano" /></a>	
            <a href="#" class="trs"><img src="images/castelhano4.jpg" alt="Arroio Castelhano" /></a>	
            <a href="#" class="trs"><img src="images/castelhano5.jpg" alt="Arroio Castelhano na localidade de Monte Alverne" /></a>	
            <a href="#" class="trs"><img src="images/castelhano6.jpg" alt="Maquete do Arroio Castelhano desenvolvida pelo projeto parceiro" /></a>	
                <a href="#" class="trs"><img src="images/castelhano7.jpg" alt="IFSul Venâncio Aires" /></a>	
		</div>

		<figcaption></figcaption>
	</figure>

	<script type="text/javascript">
		function setaImagem(){
			var settings = {
				primeiraImg: function(){
					elemento = document.querySelector("#slider a:first-child");
					elemento.classList.add("ativo");
					this.legenda(elemento);
				},
				slide: function(){
					elemento = document.querySelector(".ativo");
					if(elemento.nextElementSibling){
						elemento.nextElementSibling.classList.add("ativo");
						settings.legenda(elemento.nextElementSibling);
						elemento.classList.remove("ativo");
					}else{
						elemento.classList.remove("ativo");
						settings.primeiraImg();
					}
				},
				proximo: function(){
					clearInterval(intervalo);
					elemento = document.querySelector(".ativo");
					
					if(elemento.nextElementSibling){
						elemento.nextElementSibling.classList.add("ativo");
						settings.legenda(elemento.nextElementSibling);
						elemento.classList.remove("ativo");
					}else{
						elemento.classList.remove("ativo");
						settings.primeiraImg();
					}
					intervalo = setInterval(settings.slide,4000);
				},
				anterior: function(){
					clearInterval(intervalo);
					elemento = document.querySelector(".ativo");
					
					if(elemento.previousElementSibling){
						elemento.previousElementSibling.classList.add("ativo");
						settings.legenda(elemento.previousElementSibling);
						elemento.classList.remove("ativo");
					}else{
						elemento.classList.remove("ativo");						
						elemento = document.querySelector("a:last-child");
						elemento.classList.add("ativo");
						this.legenda(elemento);
					}
					intervalo = setInterval(settings.slide,4000);
				},
				legenda: function(obj){
					var legenda = obj.querySelector("img").getAttribute("alt");
					document.querySelector("figcaption").innerHTML = legenda;
				}
			}
			//chama o slide
			settings.primeiraImg();
			//chama a legenda
			settings.legenda(elemento);
			//chama o slide à um determinado tempo
			var intervalo = setInterval(settings.slide,4000);
			document.querySelector(".next").addEventListener("click",settings.proximo,false);
			document.querySelector(".prev").addEventListener("click",settings.anterior,false);
		}
		window.addEventListener("load",setaImagem,false);
	</script>
    </div>  -->
    
        <div id="linha_esquerda">
        
            <div id="esquerda_sobre">  
                
                <div id="texto_quem_somos">
					<center>  
						<h3> Objetivos: </h3>
                    </center>
                        <p> Desenvolver uma plataforma digital que possibilite a geração de gráficos e relatórios com informações do nível de águas de um determinado             afluente, bem como permitir que o público interessado possa acessar o conteúdo for necido pelo software de forma on-line, por meio de qualquer         dispositivo com acesso à internet;
                        </p> 
                        
                        <p>
                            Desenvolver e integrar à plataforma um sistema automatizado para o envio alertas, como e-mail, SMS (mensagens de texto para celular) ou outra forma de aviso, permitindo assim, que as pessoas cadastradas sejam avisadas sem a necessidade de acessar o sistema;
                            Analisar e interpretar os resultados obtidos na utilização da plataforma, para identificar possíveis problemas e melhorias a serem implementadas no funcionamento do sistema;

                            Documentar a plataforma, de forma que venha a facilitar a implementação a outros desenvolvedores e garantir o entendimento dos usuários finais
                        </p>
                        <center> <h3> Metodologia: </h3></center>
                    
                    <p> 
                    A presente proposta de projeto visa desenvolver uma plataforma digital para o monitoramento do nível de águas de um determinado alvo (rio ou arroio), independente da região onde está localizado. Tal necessidade foi observada devido a um arroio localizado em um bairro da cidade de aplicação do projeto, onde os moradores próximos das áreas atingidas sofrem com frequentes prejuízos decorrentes do transbordamento das águas. Sendo assim, este projeto pretende permitir que as pessoas interessadas sejam alertadas e possam acompanhar o nível das águas para tentarem reduzir suas perdas em caso de inundação. Busca -se, ainda, usar tecnologias para o acesso simples a essas informações, além de prover fácil manutenção e implementação. Ao fim de seu desenvolvimento e documentação, a plataforma gratuita deve ficar disponível para todas entidades/pessoas interessadas.
                    </p>
                    <p>
                    Depois de decidir as tecnologias a serem utilizadas, será feito um esboço da plataforma, que se dividirá em planejamento, validação das funções a serem programadas e testes de desempenho. A etapa de planejamento visará garantir a eficácia da plataforma a ser desenvolvida, a fim de evitar possíveis erros. A aparência gráfica também deve ser muito bem planejada, juntamente com os dados que serão disponibilizados no site, garantindo uma experiência positiva para os usuários finais que precisarão apenas de acesso à internet.
                    </p>
                    <p>
                    
                    O módulo de alerta, que encaminhará os e-mails, SMS ou outra forma de aviso para os usuários cadastrados, deverá ser estudado e desenvolvimento com as ferramentas adequadas, fazendo, se possível, com que o sistema encaminhe os alertas de forma automática, sem a necessidade de os usuários acessarem o sistema. Assim, deve -se permitir que o administrador do sistema configure os pontos-situações, definindo os limites que determinam cada condição (normal, atenção, alerta, emergência e transbordamento). Depois do planejamento
                    
                    devidamente concluído, parte-se para a produção do site. Deve-se estabelecer os padrões a serem utilizados para que não ocorram desentendimentos acerca dos mesmos, sendo que o programa estará sujeito a modificações constantes. Após o término da fase de produção, será realizada uma reunião com todos os membros do projeto, para que sejam identificadas possíveis melhorias. Após a desenvolvimento da plataforma, parte -se para a fase de implantação, que consiste na instalação do software em uma instancia de servidor e a sua disponibilização on-line para que os usuários e administradores possam fazer a utilização do programa. A estrutura de implementação deve ser disponibilizada pelo câmpus em que o projeto atua, sendo executado com o auxílio dos profissionais da área de TI (Tecnologia da Informação), sendo que a responsabilidade pela integridade dos equipamentos é atribuída a eles. Possíveis problemas devem ser sanados com a ajuda do professor-orientador, professores do câmpus e pesquisas.</p>
                </div>
            </div> <!-- fim esquerda -->
            
        
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

