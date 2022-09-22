<?php

class BoulesSeasons
{

private $table = "boulesSeasons"; 

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesSeasons(array $boulesSeasons) 
    {
        $execute['sql'] = $this->sql->insertSql('boulesSeason_year')->statementSql();
        $execute = array_merge($execute, $boulesSeasons);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesSeasons(array $boulesSeasons, int $boulesSeasonID)
    {
        $execute['sql'] = $this->sql->updateSql('boulesSeason_year')->whereSql('boulesSeason_ID')->statementSql();
        $execute = array_merge($execute, $boulesSeasons);
        array_push($execute, $boulesSeasonID);
        $this->sql->clearSql();
        return $execute;
    }
    
    public function getBoulesSeasons(int $boulesSeasonID = 0)
    {
        if($boulesSeasonID != 0) 
        { 
            $this->sql->whereSql('boulesSeason_ID');
            $execute[] = $boulesSeasonID;
        }

        $execute['sql'] = $this->sql->selectSql()->orderSql('boulesSeason_year')->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }

}

?>