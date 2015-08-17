<?php
/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 01/08/15
 * Time: 00:47
 */

require_once '../Config.php';

$tst = new Usuario();
//$ts = new BdUsuario();
$tst->setUserPassword('1234123');
echo $tst->getUserPassword();
$hash = Password::password_hash($tst->getUserPassword(),PASSWORD_BCRYPT);
echo $hash;

if(Password::password_verify($tst->getUserPassword(),$hash)){
    echo "senha certa";

}else{
    echo "senha errada";
}

print_r (Password::password_get_info($hash));