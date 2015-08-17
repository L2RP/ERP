<?php
/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 07/08/15
 * Time: 01:33
 */
session_start();
require_once '../../Config.php';
    $pasta = "../../user_foto/";
    $retorno;

    /* formatos de imagem permitidos */
    $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");

        $nome_imagem    = $_FILES['imagem']['name'];
        $tamanho_imagem = $_FILES['imagem']['size'];

        /* pega a extensão do arquivo */
        $ext = strtolower(strrchr($nome_imagem,"."));
        //print_r($_FILES['imagem']);
        /*  verifica se a extensão está entre as extensões permitidas */
        if(in_array($ext,$permitidos)){

            /* converte o tamanho para KB */
            $tamanho = round($tamanho_imagem / 1024);

            if($tamanho < 1024){ //se imagem for até 1MB envia
                $nome_atual = $_SESSION['EMAIL'].$ext; //nome que dará a imagem
                $tmp = $_FILES['imagem']['tmp_name']; //caminho temporário da imagem

                /* se enviar a foto, insere o nome da foto no banco de dados */
                if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                    $usr = new Usuario();
                    $usr->setUserEmail($_SESSION['EMAIL']);
                    $usr->setUserFoto($nome_atual);
                    $bdu = new BdUsuario();
                   if($bdu->atualizaFoto($usr)){
                       $retorno = array('status'=>'OK');
                   }else{
                       $retorno = array('status'=>'ERROR_UPDATE');
                   }

                }else{
                    $retorno = array('status'=>'ERROR_MOVE');
                }
            }else{
                $retorno = array('status'=>'ERROR_SIZE');
            }
        }else{
            $retorno = array('status'=>'ERROR_TYPE');
        }
print json_encode($retorno);

