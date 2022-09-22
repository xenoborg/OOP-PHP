<?php

class MysqliDb implements DbInterface
{

private $host;
private $username;
private $password;
private $db;
private $connect;

    public function __construct(DbConnectionInterface $connections) 
    {
        $this->connections = $connections;
        $this->host = $this->connections->getDbHost();
        $this->username = $this->connections->getDbUsername();
        $this->password = $this->connections->getDbPassword();
        $this->db = $this->connections->getDb();
        $this->connect = mysqli_connect($this->host, $this->username, $this->password) or die (mysqli_error("database connection error"));
        mysqli_select_db($this->connect, $this->db) or die (mysqli_error("database selection error"));
    }
    
    public function dbQuery(string $sql, array $values = []) 
    {
        //$result = $this->db_query_result($sql);
        //$rows = $this->db_get_data($result);
        //return $rows;
        //echo $sql;
    }
    
    public function dbQueryResult($result) 
    {
        $array = array();
        while ($rows = mysqli_fetch_assoc($result)) {
        $array[] = $rows;
        }
        return $array;
    }
    
    public function dbQueryId($connect) 
    {
        $rowID = mysqli_insert_id($connect);
        return $rowID;
    }
    
}

?>