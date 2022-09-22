<?php

class PdoMysqlSql implements SqlBuilderInterface
{

private $select;
private $insert;
private $update;
private $delete;
private $table;
private $where;
private $joins;
private $order;
private $limit;
private $offset;
private $manual;

    public function selectSql(array|string $selects = '*') 
    {
        $selects = is_array($selects) ? implode(",",$selects) : $selects;
        $result = "SELECT $selects FROM $this->table";
        $this->select = $result;
        return $this;
    }
    
    public function insertSql(array|string $inserts) 
    {
        if(is_array($inserts))
        {
            for($a=0;$a<count($inserts);$a++) 
            { 
                $values[] = "?"; 
            }
            $inserts = implode(",",$inserts); 
            $values = implode(",",$values);
        } 
        else 
        {
            $values = "?";
        }
        $result = "INSERT INTO $this->table ($inserts) VALUES ($values)";
        $this->insert = $result;
        return $this;
    }
    
    public function updateSql(array|string $updates)
    {
        if(is_array($updates))
        {
            foreach($updates as $update)
            {
                $result[] = "$update = ?";
            }
            $result = implode(",",$result);
        }
        else 
        {
            $result = "$update = ?";
        }
        $result = "UPDATE $this->table SET $result";
        $this->update = $result;
        return $this;
    }
    
    public function deleteSql(int $deleteAll = 0) 
    {
     // Prevent accidental delete if $this->where is empty unless $deleteAll = 1;
        if(!empty($this->where) || $deleteAll === 1)
        {
            $result = "DELETE FROM $this->table";
        }
        $this->delete = $result;
        return $this;
    }

    public function tableSql(string $table) 
    {
        $this->table = $table;
        return $this;
    }

    public function whereSql(array|string $wheres, array|string $operators = '=') 
    {
        if(is_array($wheres)) 
        { 
            $a=0;
            foreach($wheres as $where) 
            { 
                $operator = is_array($operators) ? $operators[$a] : $operators;
                $result[] = "$where $operator ?";
                $a++;
            }
            $result = implode(" AND ", $result);
        }
        else
        { 
            $result = "$wheres $operators ?"; 
        }
        $result = " WHERE $result";
        $this->where = $result;
        return $this;
    }
    
    public function joinSql(array|string $joinTables, array|string $joinRows, array|string $joinTypes = 'LEFT')
    {
        if(is_array($joinTables)) 
        {
            $a=0;
            foreach($joinTables as $joinTable)
            {
                $joinType = is_array($joinTypes) ? $joinTypes[$a] : $joinTypes;
                $joinRow = is_array(joinRows) ? $joinRows[$a] : $joinRows;

                $result[] = "$joinType JOIN $joinTable ON $this->table.$joinRow = $joinTable.$joinRow";
                $a++;
            }
            $result = implode(" ",$result);
        }
        else 
        {
            $result = "$joinTypes JOIN $joinTables ON $this->table.$joinRows = $joinTables.$joinRows";
        }
        $this->joins = $result;
        return $this;
    }
    
    public function orderSql(array|string $orders, array|string $operators = 'ASC')
    {
        if(is_array($orders)) 
        { 
            $a=0;
            foreach($orders as $order) 
            { 
                $operator = is_array($operators) ? $operators[$a] : $operators;
                $result[] = "$order $operator";
                $a++;
            }
            $result = implode(",", $result);
        }
        else
        { 
            $result = "$orders $operators"; 
        }
        $result = " ORDER BY $result";
        $this->order = $result;
        return $this;
    }
    
    public function limitSql(int $limit)
    {
        $result = " LIMIT $limit";
        $this->limit = $result;
        return $this;
    }
    
    public function offsetSql(int $offset)
    {
        $result = " OFFSET $offset";
        $this->offset = $result;
        return $this;
    }
    
    public function manualSql(string $manualSql, string $sqlType = 'manual')
    {
        $this->$sqlType = $manualSql;
        return $this;
    }
    
    public function statementSql() 
    {
        $statementSql = "$this->manual $this->select $this->insert $this->update $this->delete $this->joins $this->where $this->order $this->limit";
        return $statementSql;
    }
    
    public function clearSql()
    {
        $this->select = ""; $this->insert = ""; $this->update = ""; $this->delete = ""; $this->where = ""; $this->joins = ""; $this->order = ""; $this->limit = ""; $this->manual = "";
        return $this;
    }

}

?>