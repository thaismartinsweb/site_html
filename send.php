<?php

require 'validation.php';
$validation = new Validation();

$nome	  = $_POST['nome'];
$email	  = $_POST['email'];
$site	  = $_POST['site'];
$telefone = $_POST['telefone'];
$mensagem = $validation->purifier($_POST['mensagem']);

if(!$validation->isLetter($nome)){
	$nome = '';
}

if(!$validation->isEmail($email)){
	$email = '';
}

if(!$validation->isTelephone($telefone)){
	$telefone = '';
}


$assunto	= '[tmartins.com.br] Contato do Site';
$sender		= 'thamartins@msn.com';
$senderCopy	= 'thaismartinsweb@gmail.com';
$senderName = 'Thais Martins';


if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n";
else $quebra_linha = "\n";

$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=utf-8" .$quebra_linha;
$headers .= "From:" . $senderName . "<" . $sender . ">" .$quebra_linha;
$headers .= "Reply-To: " . $email . $quebra_linha;


$mensagemHTML = '<h1>Contato do Site</h1>
<p><strong>Nome: </strong>'.$nome.'</p>
<p><strong>Email: </strong>'.$email.'</p>
<p><strong>Telefone: </strong>'.$telefone.'</p>
<p><strong>Site: </strong>'.$site.'</p>
<p><b><i>'.$mensagem.'</i></b></p>
<hr>';


if($validation->error){
	echo $validation->error;
} else {
	mail($sender, $assunto, $mensagemHTML, $headers);
	mail($senderCopy, $assunto, $mensagemHTML, $headers);
	echo 1;
}


// /* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
// if (@eregi('www.tmartins.com.br$|tmartins.com.br$|tmartins.jelasticlw.com.br$', $_SERVER['HTTP_HOST'])) {
//         $emailsender='thamartins@msn.com';
// } else {
//         $emailsender='thamartins@msn.com';
// }