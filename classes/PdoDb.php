<?php

class PdoDb implements DbInterface {

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
        
        $options = [ PDO::ATTR_EMULATE_PREPARES => false, 
        // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        //make the default fetch be an associative array
        ];
        
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db;
        
        $this->connect = new PDO($dsn,$this->username,$this->password, $options);
    }
    
    public function dbQuery(string $sql, array $values = []) 
    {
        $result = $this->connect->prepare($sql);
        $result->execute($values);
        return $result; 
    }
    
    public function dbQueryResult($result) 
    {
        $array = $result->fetchAll();
        return $array;
    }
    
    public function dbQueryId($connect) 
    {
        $rowID = $this->connect->lastInsertId();
        return $rowID;
    }

}

?>