<?php

class BoulesDivisions
{

private $table = "boulesDivisions"; 

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesDivisions(array $boulesDivisions)
    {
        $execute['sql'] = $this->sql->insertSql(['boulesSeason_ID','boulesTeam_ID','boulesDivision_division'])->statementSql();
        $execute['return'] = 'id';
        $execute = array_merge($execute, $boulesDivisions);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesDivisions(array $boulesDivisions, int $boulesdivisionID)
    {
        $execute['sql'] = $this->sql->updateSql(['boulesSeason_ID','boulesTeam_ID','boulesDivision_division'])->whereSql('boulesDivision_ID')->statementSql();
        $boulesDivisions[] = $boulesdivisionID;
        $execute = array_merge($execute, $boulesDivisions);
        $this->sql->clearSql();
        return $execute;
    }

    public function getBoulesDivisions($boulesDivisionID = 0, $boulesSeasonID = 0, $boulesTeamID = 0, $boulesDivision = 0)
    {
        if($boulesDivisionID !== 0)
        {
            $wheres[] = 'boulesDivision_ID';
            $execute[] = $boulesDivisionID;
        }
        if($boulesSeasonID !== 0)
        {
            $wheres[] = 'boulesSeason_ID';
            $execute[] = $boulesSeasonID;
        }
        if($boulesTeamID !== 0)
        {
            $wheres[] = 'boulesTeam_ID';
            $execute[] = $boulesTeamID;
        }
        if($boulesDivision !== 0)
        {
            $wheres[] = 'boulesDivision_division';
            $execute[] = $boulesDivision;
        }
        if(!empty($wheres)) 
        {
            $this->sql->whereSql($wheres);
        }
        
        $execute['sql'] = $this->sql->selectSql()->orderSql('boulesDivision_division')->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }

}

?>