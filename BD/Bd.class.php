<?php

/**
 * Created by PhpStorm.
 * User: robsonjean
 * Date: 01/08/15
 * Time: 16:20
 */
class Bd
{
    public function __construct(){}
    public function __clone(){}
    public function __destruct(){
        $this->disconnect();
        foreach($this as $key => $value){
            unset($this->$key);
        }
    }

    private static $dbtype   = "";
    private static $host     = "";
    private static $port     = "";
    private static $user     = "";
    private static $password = "";
    private static $db       = "";
    private 	   $con 	 = NULL;

    private function getDBType()  {return self::$dbtype;}
    private function getHost()    {return self::$host;}
    private function getPort()    {return self::$port;}
    private function getUser()    {return self::$user;}
    private function getPassword(){return self::$password;}
    private function getDB()      {return self::$db;}

    public function conexao()
    {
        try {
            $this->con = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB().";charset=utf8", $this->getUser(), $this->getPassword());
        }catch (PDOException $e){
            die("Erro: <code>" .$e->getCode() . "</code>");
        }
    }

    public function disconnect()
    {
        $this->con = null;
    }
    public function getCon()
    {
        return $this->con;
    }
    public function setCon($con)
    {
        $this->con = $con;
        return $this;
    }

}