<?php
require_once '../../Config.php';
session_start();
$user = new Usuario();
$result;

$user->setUserEmail(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
$user->setUserPassword($_POST['senha']);
$bdu = new BdUsuario();
$userReturn = $bdu->login($user);
if(Password::password_verify($user->getUserPassword(),$userReturn->getUserPassword())){


    $user->setUserSessionId(session_id());
    if($bdu->atualizaSession($user)){
        $_SESSION['EMAIL'] = $userReturn->getUserEmail();
        $_SESSION['NOME'] = $userReturn->getUserName();
        $_SESSION['FOTO'] = $userReturn->getUserFoto();
        $result = array('status'=>'OK');
    }else{
        $result = array('status'=>'ERROR_UPDATE_SESSION');
    }

}else{
    $result = array('status'=>'ERROR_LOGIN');
}
print json_encode($result);