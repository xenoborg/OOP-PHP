<?php

class BoulesGames
{

private $table = "boulesGames"; 

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }

    public function insertBoulesGames(array $boulesGames)
    {
        $execute['sql'] = $this->sql->insertSql(['boulesFixture_ID','boulesGame_home','boulesGame_away']);
        $execute['return'] = 'id';
        $execute = array_merge($execute, $boulesGames);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateScore(array $boulesGames, int $boulesGameID)
    {
        $execute['sql'] = $this->sql->updateSql(['boulesGame_home','boulesGame_away'])->whereSql('boulesGame_ID')->statementSql();
        $execute = array_merge($execute, $boulesGames);
        array_push($execute, $boulesGameID);
        $this->sql->clearSql();
        return $execute;
    }

}

?>