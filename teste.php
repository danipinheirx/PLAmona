<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */


//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
function enviaEmail($email,$op,$link){
	
	$emailUsuario=addslashes($email);
    echo $emailUsuario;
	//$nomeUsuario=addslashes($nome);

date_default_timezone_set('Etc/UTC');

require 'PHPMailer-master/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
//$mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "contato.plamona@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "pla123mo123na123";

//Set who the message is to be sent from
$mail->setFrom('contato.plamona@gmail.com', 'PlaMoNA');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
//$mail->addAddress('geovane.griesang@gmail.com', 'Geovane Griesang');
//$mail->addBcc('geovane.griesang@gmail.com', 'Geovane Griesang');
$mail->addBcc($emailUsuario, '');
// $mail->addBcc('ariel.7198@hotmail.com', 'Ariel');

//Set the subject line
if ($op == 1) {
	$mail->Subject = 'Pedido de alteração de senha';
} else if ($op ==2){
	$mail ->Subject = "Alerta de transbordamento do Arroio Castelhano";
}

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

if ($op ==1){
	 $mail->msgHTML("Foi solicitada uma alteração de senha em seu nome. Para confirmar clique <a href='$link'> aqui </a> . ");

	$mail->msgHTML("<style>
    
    body {
        background-color: #F9FBFC;
    }
    table#header {
        background-color: #0d2c58;
        width: 100%;
        height: 100px;
    }
    #logo {
/*        background-color: red;*/
        
        
    }
    table#content{
        margin-top: 10%;
        background-color: white;
        height: 300px;
        width: 40%;
        margin-bottom: 10%;
    }
    #blank{
        background-color: #F9FBFC;
        width: 25%;
    }
    #texto {
        border-width: thin;
        border-style: solid;
        border-color: #f0f0f4;
        border-radius: 3px;
        padding-left: 10%;
        padding-right: 10%;
        font-family: sans-serif;
    }
    #botao a{
        height: 20px;
        display: block; 
        background: #0d2c58;
        color: #FFFFFF; 
        text-shadow: 0px 1px 0px #111111;
        text-align: center;  
        box-shadow: #b5b5b9 4px 4px 4px;
        padding: 5px 5px 5px 5px; 
        margin: 0px 0px 0px 0px; 
        text-decoration: none; 
        border-left: 0px solid transparent;
        -webkit-transition: all 0.2s ease-out;
        border-radius: 4px;
        width: 50%;
    }
    table#footer{
        
        background-color: #0d2c58;
        width: 100%;
        height: 100px;
        
    }

</style>
<!DOCTYPE html>
<html>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    
<head>
	<title></title>
</head>
<body>
<table id='header' border='1px'>
    <tr> <td id='logo' width=20px>
        <img src='http://i.imgur.com/NowexK1.png' width=120px class='logo'> 
        </td>
        <td>
        </td>
    </tr>
    </table>
    <center>
    <table id='content'> 
    <tr>
    <td id='texto'> <center> <h2> <font face='sans-serif' color='#0d2c58'> <b> Pedido de alterção de senha </b> </font> </h2> </center> </div>
            Foi solicitada uma mudanca de senha para sua conta. Para continuar confirme o pedido. <br> <br> 
            <center>
            
            
               <div id='botao'> <a href='$link'> Alterar senha </a>  </div>
            
            </center> </td>
    </tr>
    
    </table>
    </center>
    <table id='footer'> 
        <tr>
        <td> </td>
        </tr>

    </table>
    

</body>
</html>");
} else if ($op ==2){
	$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
}
//Replace the plain text body with one created manually
$mail->AltBody = 'Atenção!';

//Attach an image file
//$mail->addAttachment('logo.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Deu certo";
}
}
?>