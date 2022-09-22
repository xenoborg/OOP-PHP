<?php

class BoulesKnockouts
{

    private $table = "boulesKnockouts"; 

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesKnockouts(array $boulesKnockouts)
    {
        $execute['sql'] = $this->sql->insertSql(['boulesFixture_ID', 'boulesKnockout_round'])->statementSql();
        $execute['return'] = 'id';
        $execute = array_merge($execute,$boulesKnockouts);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesKnockouts(array $boulesKnockouts, int $boulesKnockoutID)
    {
        $execute['sql'] = $this->sql->updateSql(['boulesFixture_ID','boulesKnockout_round'])->whereSql('boulesKnockout_ID')->statementSql();
        $execute = array_merge($execute, $boulesKnockouts);
        array_push($execute, $boulesKnockoutID);
        $this->sql->clearSql();
        return $execute;
    }

    public function getBoulesKnockouts($boulesKnockoutID = 0, $boulesFixtureID = 0, $boulesKnockoutRound = 0)
    {
        if($boulesKnockoutID !== 0)
        {
            $wheres[] = 'boulesKnockout_ID';
            $execute[] = $boulesKnockoutID;
        }
        if($boulesFixtureID !== 0)
        {
            $wheres[] = 'boulesFixture_ID';
            $execute[] = $boulesFixtureID;
        }
        if($boulesKnockoutRound !== 0)
        {
            $wheres[] = 'boulesKnockout_round';
            $execute[] = $boulesKnockoutRound;
        }
        if(!empty($wheres)) 
        {
            $this->sql->whereSql($wheres);
        }

        $this->sql->orderSql(['boulesFixture_division','boulesFixture_date']);
        $execute['sql'] = $this->sql->selectSql()->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }
    
}