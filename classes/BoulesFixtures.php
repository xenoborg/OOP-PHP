<?php

class BoulesFixtures
{

private $table = "boulesFixtures";

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesFixtures(array $boulesFixtures)
    {
        $execute['sql'] = $this->sql->insertSql(['boulesSeason_ID', 'boulesFixture_win', 'boulesFixture_home', 'boulesFixture_away', 'boulesFixture_division', 'boulesFixture_type', 'boulesFixture_date'])->statementSql();
        $execute['return'] = 'id';
        $execute = array_merge($execute, $boulesFixtures);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesFixtures(array $boulesFixtures, int $boulesFixtureID)
    {
        $execute['sql'] = $this->sql->updateSql(['boulesSeason_ID', 'boulesFixture_win', 'boulesFixture_home', 'boulesFixture_away', 'boulesFixture_division', 'boulesFixture_type'])->whereSql('boulesFixture_ID')->statementSql();
        $boulesFixtures[] = $boulesFixtureID;
        $execute = array_merge($execute, $boulesFixtures);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateWin(array $boulesFixtures, int $boulesFixtureID)
    {
        $execute['sql'] = $this->sql->updateSql('boulesFixture_win')->whereSql('boulesFixture_ID')->statementSql();
        $execute = array_merge($execute, $boulesFixtures);
        array_push($execute, $boulesFixtureID);
        $this->sql->clearSql();
        return $execute;
    }

    public function getBoulesFixtures($boulesFixtureID = 0, $boulesSeasonID = 0, $boulesTeamID = 0, $boulesFixtureDivision = 0, $boulesFixtureType = 0, $boulesFixtureDate = 0, int $newest = 0)
    {
        if($boulesFixtureID !== 0) 
        {
            $wheres[] = 'boulesFixture_ID';
            $execute[] = $boulesFixtureID;
        }
        if($boulesSeasonID !== 0)
        {
            $wheres[] = 'boulesSeason_ID';
            $execute[] = $boulesSeasonID;
        }
        if($boulesTeamID !== 0)
        {
            $wheres[] = 'boulesFixture_home';
            $execute[] = $boulesTeamID;
        }
        if($boulesFixtureDivision !== 0)
        {
            $wheres[] = 'boulesFixture_division';
            $execute[] = $boulesFixtureDivision;
        }
        if($boulesFixtureType !== 0)
        {
            $wheres[] = 'boulesFixture_type';
            $execute[] = $boulesFixtureType;
        }
        if($boulesFixtureDate !== 0)
        {
            $wheres[] = 'boulesFixture_date';
            $execute[] = $boulesFixtureDate;
        }
        if(!empty($wheres)) 
        {
            $this->sql->whereSql($wheres);
        }
        if($newest === 1)
        {
            $this->sql->orderSql('boulesFixture_ID', 'DESC');
        }
        else
        {
            $this->sql->orderSql(['boulesFixture_division','boulesFixture_date']);
        }

        $execute['sql'] = $this->sql->tableSql($this->table)->selectSql()->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }

    public function getWeeks(int $boulesSeasonID, int $boulesFixtureDivision)
    {
        $execute['sql'] = $this->sql->manualSql('SELECT DISTINCT boulesFixture_date','select')->whereSql(['boules_season_ID','boulesFixture_division'])->orderSql('boulesFixture_date')->statementSql();
        $execute['return'] = 'row';
        array_push($execute, $boulesSeasonID, $boulesFixtureDivision);
        $this->sql->clearSql();
        return $execute;
    }

}