<?php

class BoulesRules
{

private $table = "boulesRules";

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }
    
    public function editBoulesRules(string $boulesRules, int $boulesRulesID)
    {
        $execute['sql'] = $this->sql->updateSql('boulesRules_rules')->whereSql('boulesRules_ID')->statementSql();
        array_push($execute, $boulesRules, $boulesRulesID);
        $this->sql->clearSql();
        return $execute;
    }

    public function getBoulesRules(int $boulesRulesID = 0)
    {
        if($boulesRulesID != 0) 
        { 
            $this->sql->whereSql('boulesRules_ID'); 
            $execute[] = $boulesRulesID;
        }
        $execute['sql'] = $this->sql->selectSql()->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }
    
}
