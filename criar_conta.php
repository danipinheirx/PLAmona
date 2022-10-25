<?php

    if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
       
    } else {
       
    }
    

?>

<!DOCTYPE html>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=100%, initial-scale=1">
<head>
	<title>PlaMoNA | Cadastro </title>
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
    
    <script type="text/javascript">

    function validaSenha (input){ 
        else if (input.valueOf != document.getElementById("senha").value) {
            input.setCustomValidity('Repita a senha corretamente');
           // var txt ="Senha incorreta";
           // } else if ( $senha == "" ){ //$senha não existe em nenhum outro lugar?
              //  errors = "Você não digitou uma senha<br>";
            //var txt ="";
            //document.getElementById("senhaincorreta").innerHTML = txt; 
        } else {
            input.setCustomValidity('');
            }
        
    </script>

<script type="text/javascript">
   function validar(){
var campo1 = document.getElementById("senha");
var campo2 = document.getElementById("confirsenha");
if (campo1.value != campo2.value){
campo2.setCustomValidity("As senhas não conferem");
campo2.validity = false;
}else{
campo2.setCustomValidity("");
campo2.validity = true;
}
}             
</script>

    
<script type="text/javascript">

    // Isso impede que o form seja enviado ao clicar no botão de envio do formulário
  e.preventDefault();
    
  // Aqui você pode recuperar a senha e verificar se a mesma está no formato desejado
  let senha = document.querySelector('#senha').value;
  let senhaValida = VerificaSenha(senha);
    
  if(senhaValida == true){
    EnviaForm(senha); 
    
  } else {
    // Aqui vai o trecho de código para exibir a mensagem de erro em uma DIV
  }    

function EnviaForm(senha){

fetch(`suaUrl`, optionsPost = { method: "POST", mode: "cors", body: senha })
        .then(response => {
            response.json()
                .then(data => {                    
                    // Deu certo o envio
                    console.log(data);

                })
                .catch();
        })
        .catch(error => {
            // Se o server apresentar erro em qualquer ação cairá aqui
            console.log("Erro: " + error);
        });
}

</script>
    
    <script>
        function validaTelefone(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode /* keyCode - pega o valor unicode do botão pressionado which = pega o botão pressionado - sintaxe: condição ? executar(true) : executar(false)   */
        if (charCode > 31 && (charCode < 48 || charCode > 57)) // caso true checa se o valor é numérico por meio do unicode.
        return false;
        return true;
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
        
            <div id="esquerda">
                <div id="area_form"> 
                
                <form action="cadastro_script.php" id="formulario1" method="POST" autocomplete="on">
                    <fieldset>
                    <legend> Cadastre-se  </legend> 
                        <br>
                        <label> Nome: <br> </label> 
                            <input class="campo_nome" type="text" name="nome" maxlength=80 required> <br> <br>
                        <label> Sobrenome:<br> </label>
                            <input class="campo_sobrenome" type="text" name="sobrenome" maxlength=80 required> <br> <br>                        
                        <label> E-mail:<br> </label> 
                            <input class="campo_email" type="email" name="email" placeholder="exemplo@exemplo.com" required> <?php
                        
                            if (isset($_GET['error'])){
                                if ($_GET['error']=="1062"){
                                    echo "Email inválido";
                                }
                            }
                        
                        ?>  <br> <br>

                        <!--<label> Senha:<br> </label>
                            <input class="campo_senha" type="password" name="senha" id="senha" placeholder="*********" minlenght="8" maxlenght="8" size="8" pattern="^(?=.*[A-Z])(?=.*[a-z])(?+.*[0-9])(?=.*[@#$*])[a-zA-Z0-9@#$*]{8,50}$" required> <br> <br> -->
                        
                            <input class="campo_senha" type="password" name="senha" id="senha" onchange="validar()" required size="8" maxlength="8" placeholder="*********" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=^.{8,50}$).*$">
                            <br><br>
                            <label> Digite novamente sua senha:</label> <br>
                            <input class="campo_confr_senha" type="password" name="confirsenha" id="confirsenha" onchange="validar()" required size="8" maxlength="8" placeholder="*********" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=^.{8,50}$).*$">
                            <br><br>
                            
                        
                        <!-- <input class="campo_confr_senha" type="password" oninput="validaSenha(this)" id="confirsenha" name="confirsenha" placeholder="*********" minlenght="8" maxlenght="8" size="8" required>
                        <div id="senhaincorreta"></div> <br> <br> -->
                        <label> Endereço:<br> </label> 
                            <input class="campo_endereco" type="text" name="endereco" placeholder="Rua, Nº, Bairro" maxlength="45" required> <br> <br>
                        <label> Celular:<br> </label>
                            <input class="campo_telefone" type="text" onkeypress="mascara(this, '## #####-####');return validaTelefone(event);" name="telefone" placeholder="(xx)xxxxx-xxxx" maxlength=13 required> <br> <br> 
                        <label> Ser alertado por SMS: </label> 
                        <input type="radio" name="alerta_sms" value="1" required> Sim
                        <input type="radio" name="alerta_sms" value="0" required> Não<br> <br>
<!--
                        <input type="checkbox" name="alerta_sms" class="alerta_sms" value="1"> Sim  
                        <input type="checkbox" name="alerta_email" class="alerta_email" value="1"> Não <br> <br>
-->
                        <label> Ser alertado por E-mail </label>
                        <input type="radio" name="alerta_email" value="1" required> Sim
                        <input type="radio" name="alerta_email" value="0" required> Não
                        <br> <br>
                        <input class="botao_enviar" name="enviar" type="submit" value="Criar Conta">
                        <br>
                    </fieldset>
                </form>
                </div>
            </div> <!-- fim esquerda -->
            <div id="direita">
                <center><div id="area_form2">
                <form action="login_script.php" id="formulario_login" method="POST" autocomplete="on">
                    <fieldset>
                    <center>  <legend> Já possui uma conta?  </legend>  </center>
                        <br>
                        
                        
                      
                        
                        <label> Email: <br> </label> 
                            <input class="email_login" type="email" name="usuario" placeholder="exemplo@exemplo.com" required> <br><br>
                        <label> Senha <br> </label> 
                            <input class="campo_senha_login" type="password" name="senha" required> <br> <br>
                        <a href="recuperar_senha.php" style="color: black; font-family: sans-serif; font-size: 12px"> Esqueceu sua senha? <br>  Clique aqui </a> <br> <br> 
                        <input class="botao_enviar" name="enviar" type="submit" value="Entrar">
                        <br>
                    </fieldset>
                </form>
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