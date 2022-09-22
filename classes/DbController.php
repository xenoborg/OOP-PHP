<?php

class DbController 
{

    public function __construct(DbInterface $database) 
    {
        $this->db = $database;
    }

    public function executeQuery(array $execute)
    {
        $sql = $execute['sql'];
        $return = $execute['return'];
        unset($execute['sql']);
        unset($execute['return']);

        $result = $this->db->dbQuery($sql, $execute);
        if ($return === 'row') 
        {
            $result = $this->db->dbQueryResult($result);
        }
        if ($return === 'id') 
        {
            $result = $this->connect->lastInsertId();
        }
        return $result;
    }


}

?>