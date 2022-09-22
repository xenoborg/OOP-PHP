<?php

class DbConnection1 implements DbConnectionInterface
{

private $host = "localhost:3306";
private $username = "root";
private $password = "";
private $db = "boules";

    public function getDbHost() 
    {
        return $this->host;
    }

    public function getDbUsername() 
    {
        return $this->username;
    }

    public function getDbPassword() 
    {
        return $this->password;
    }

    public function getDb() 
    {
        return $this->db;
    }

}

?>