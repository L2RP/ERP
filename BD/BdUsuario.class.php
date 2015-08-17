<?php

/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 01/08/15
 * Time: 16:29
 */
class BdUsuario extends Bd
{
    public function __construct(){
        try {
            parent::conexao();
        } catch(Exceptions $e){
            die("Erro: <code>" . $e->getCode() ."</code>");
        }
    }
    public function __clone(){}

    public function inserirUsuario(Usuario $user){
        $sql = "INSERT INTO user (user_type,user_name,user_email,user_password,user_foto)VALUES(?,?,?,?,'padrao.png')";

        try{
            $smtp = parent::getCon()->prepare($sql);
            $smtp->bindValue(1, $user->getUserType(), PDO::PARAM_INT);
            $smtp->bindValue(2, $user->getUserName(), PDO::PARAM_STR);
            $smtp->bindValue(3, $user->getUserEmail(), PDO::PARAM_STR);
            $smtp->bindValue(4, $user->getUserPassword(), PDO::PARAM_STR);

            $response = $smtp->execute();

            if($response){
                return true;
            }else{
                return false;
            }
        }catch (PDOException $e){
            throw new PDOException($e);
        }
    }

    public function verificaExistencia(Usuario $user){
        $sql = "SELECT user_email FROM user WHERE user_email=?";

        try{
            $smtp = parent::getCon()->prepare($sql);
            $smtp->bindValue(1,$user->getUserEmail(), PDO::PARAM_STR);
            $smtp->execute();
            $response = count($smtp->fetchAll());

            if($response > 0){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e){
            throw new PDOException($e);
        }
    }

    public function login(Usuario $user){
        $sql = "SELECT user_foto,user_name,user_email,user_password FROM user WHERE user_email=?";
        $usr = new Usuario();
        try{
            $smtp = parent::getCon()->prepare($sql);
            $smtp->bindValue(1,$user->getUserEmail(), PDO::PARAM_STR);
            $smtp->execute();
            if($val = $smtp->fetch((PDO::FETCH_ASSOC))){
                $usr->setUserEmail($val['user_email']);
                $usr->setUserName($val['user_name']);
                $usr->setUserFoto($val['user_foto']);
                $usr->setUserPassword($val['user_password']);
            }

        }catch (PDOException $e){
            throw new PDOException($e);
        }
        return $usr;
    }

    public function atualizaSession(Usuario $user){
        $sql = "UPDATE user SET user_session_id=? WHERE user_email=?";
        try{
            $smtp = parent::getCon()->prepare($sql);
            $smtp->bindValue(1,$user->getUserSessionId(), PDO::PARAM_STR);
            $smtp->bindValue(2,$user->getUserEmail(),PDO::PARAM_STR);
            $response = $smtp->execute();
            if($response){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }

    public function verificaSession(Usuario $user){
        $sql= "SELECT user_email,user_session_id FROM user WHERE user_email=?";
        $usr = new Usuario();
        try{
            $smtp = parent::getCon()->prepare($sql);
            $smtp->bindValue(1,$user->getUserEmail(),PDO::PARAM_STR);
            $smtp->execute();
            if($val = $smtp->fetch((PDO::FETCH_ASSOC))){
                $usr->setUserEmail($val['user_email']);
                $usr->setUserName($val['user_name']);
                $usr->setUserSessionId($val['user_session_id']);
            }

        }catch(PDOException $e){
            throw new PDOException($e);

        }
        return $usr;
    }

    public function atualizaFoto(Usuario $user){
        $sql = "UPDATE user SET user_foto=? WHERE user_email=?";
        try{
            $smtp = parent::getCon()->prepare($sql);
            $smtp->bindValue(1,$user->getUserFoto(),PDO::PARAM_STR);
            $smtp->bindValue(2,$user->getUserEmail(),PDO::PARAM_STR);
            $response = $smtp->execute();
            if($response){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            throw new PDOException($e);
        }
    }


}