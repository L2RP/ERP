<?php
/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 07/08/15
 * Time: 00:12
 */

session_start();
$user = $_SESSION['NOME'];
$img = $_SESSION['FOTO'];

print json_encode(array(
    'nome'=>$user,
    'foto'=>$img
));
