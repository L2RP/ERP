<?php
require_once '../../Config.php';

$user = new Usuario();
$result;

$user->setUserName(filter_var($_POST['nome'], FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH));
$user->setUserEmail(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
if(filter_var($user->getUserEmail(), FILTER_VALIDATE_EMAIL)) {
    $user->setUserPassword(Password::password_hash(filter_var($_POST['senha'], FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH),PASSWORD_BCRYPT));
    $user->setUserType(0);

    $bdu = new BdUsuario();

    if(!$bdu->verificaExistencia($user)){
        if($result = $bdu->inserirUsuario($user)){
            $result = array('status'=>'OK');
        }else{
            $result = array('status'=>'ERROR_INSERT');
        }
    }else{
        $result = array('status'=>'ALREADY_EXISTS');
    }

}else{
    $result = array('status'=>'INVALID_EMAIL');
}
echo json_encode($result);

