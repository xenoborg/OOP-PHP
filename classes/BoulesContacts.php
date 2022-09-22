<?php

class BoulesNews
{

private $table = "boulesContacts";

    public function __construct(SqlBuilderInterface $sql)
    {
        $this->sql = $sql;
        $this->sql->tableSql($this->table);
    }
    
    public function insertBoulesContacts(string $boulesContacts) 
    {
        $execute['sql'] = $this->sql->insertSql('boulesContacts_contacts')->statementSql();
        array_push($execute, $boulesContacts);
        $this->sql->clearSql();
        return $execute;
    }

    public function updateBoulesContacts(string $boulesContacts, int $boulesContactsID)
    {
        $execute['sql'] = $this->sql->updateSql('boulesContacts_contactsNews_news')->whereSql('boulesContacts_ID')->statementSql();
        array_push($execute, $boulesContacts, $boulesContactsID);
        $this->sql->clearSql();
        return $execute;
    }

    public function getBoulesContacts(int $boulesContactsID = 0)
    {
        if($boulesContactsID !== 0) 
        { 
            $this->sql->whereSql('boulesContacts_ID'); 
            $execute[] = $boulesContactsID;
        }
        $execute['sql'] = $this->sql->selectSql()->statementSql();
        $execute['return'] = 'row';
        $this->sql->clearSql();
        return $execute;
    }

}




?>