<?php
/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 06/08/15
 * Time: 22:42
 */
session_start();
require_once 'Config.php';
$user = new Usuario();
$user->setUserEmail($_SESSION['EMAIL']);
$bdu = new BdUsuario();
$result = $bdu->verificaSession($user);
if($result->getUserSessionId()!=session_id()){
    $_SESSION['email']= '';
    session_destroy();
    header("Location:login.php");
    exit();
}
?>