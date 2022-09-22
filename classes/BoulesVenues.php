<?php

class BoulesVenues
{

private $table = "boulesVenues"; 

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesVenues(array $boulesVenues) 
    {
        $execute['sql'] = $this->sql->insertSql(['boulesVenue_name','boulesVenue_pitches'])->statementSql();
        $execute = array_merge($execute, $boulesVenues);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesVenues(array $boulesVenues, $boulesVenueID)
    {
        $execute['sql'] = $this->sql->updateSql(['boulesVenue_name','boulesVenue_pitches'])->whereSql('boulesVenue_ID')->statementSql();
        $execute = array_merge($execute, $boulesVenues);
        array_push($execute, $boulesVenueID);
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