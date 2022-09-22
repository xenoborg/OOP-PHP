<?php

class BoulesNews
{

private $table = "boulesNews";

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }
    
    public function insertBoulesNews(string $boulesNews) 
    {
        $execute['sql'] = $this->sql->insertSql('boulesNews_news')->statementSql();
        array_push($execute, $boulesNews);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesNews(string $boulesNews, int $boulesNewsID)
    {
        $execute['sql'] = $this->sql->updateSql('boulesNews_news')->whereSql('boulesNews_ID')->statementSql();
        array_push($execute, $boulesNews, $boulesNewsID);
        $this->sql->clearSql();
        return $execute;
    }

    public function getBoulesNews(int $boulesNewsID = 0, int $limit = 0, int $offset = 0)
    {
        if($boulesNewsID !== 0) 
        { 
            $this->sql->whereSql('boulesNews_ID'); 
            $execute[] = $boulesNewsID;
        }
        if($limit != 0)
        {
            $this->sql->limitSql($limit);
        }
        if($offset != 0)
        {
            $this->sql->offset($offset);
        }
        $execute['sql'] = $this->sql->selectSql()->orderSql('boulesNews_ID', 'DESC')->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }

}




?>