<?php

class BoulesTeams
{

private $table = "boulesTeams"; 

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesTeams(array $boulesTeams) 
    {
        $execute['sql'] = $this->sql->insertSql(['boulesVenue_ID','boulesTeam_name'])->statementSql();
        $execute = array_merge($execute, $boulesTeams);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesTeams(array $boulesTeams, $boulesTeamID)
    {
        $execute['sql'] = $this->sql->updateSql(['boulesVenue_ID','boulesTeam_name'])->whereSql('boulesTeam_ID')->statementSql();
        $execute = array_merge($execute, $boulesTeams);
        array_push($execute, $boulesTeamID);
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