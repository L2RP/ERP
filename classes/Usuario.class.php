<?php

/**
 * <b> Usuario: </b>
 * Todos os campos existentes do Objeto Usuario
 * User: robsonjean
 * Date: 01/08/15
 * Time: 00:15
 * @ copyright (c) 2015,Robson Jean L2RP
 */
class Usuario
{

    /**
     * @var int Id do Usuario auto-increment do MySQL
     */
    private $user_id;
    /**
     * @var int Id do tipo de Usuario, da tabela user_types
     */
    private $user_type;
    /**
     * @var String Nome do usuario
     */
    private $user_name;
    /**
     * @var String Email de acesso do Usuario
     */
    private $user_email;
    /**
     * @var String Hash do Bcrypt da senha do usuario
     */
    private $user_password;
    /**
     * @var String SessionId: Id da Sessão atual do usuarios
     */
    private $user_session_id;
    /**
     * @var String Foto: Url da Foto do usuario na pasta (user_foto)
     */
    private $user_foto;

    /**
     * @return String
     */
    public function getUserFoto()
    {
        return $this->user_foto;
    }

    /**
     * @param String $user_foto
     * @return Usuario
     */
    public function setUserFoto($user_foto)
    {
        $this->user_foto = $user_foto;
        return $this;
    }


    /**
     * @return String
     */
    public function getUserSessionId()
    {
        return $this->user_session_id;
    }

    /**
     * @param String $user_session_id
     */
    public function setUserSessionId($user_session_id)
    {
        $this->user_session_id = $user_session_id;
    }


    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @param int $user_type
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

    /**
     * @return String
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param String $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return String
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param String $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return String
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * @param String $user_password
     */
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

}