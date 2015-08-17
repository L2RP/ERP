<?php
/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 01/08/15
 * Time: 00:47
 */

require_once 'Config.php';

$tst = new Usuario();
$tst->setUserPassword('1234123');
echo $tst->getUserPassword();