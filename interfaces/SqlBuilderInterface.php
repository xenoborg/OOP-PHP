<?php

interface SqlBuilderInterface 
{

public function selectSql(array|string $selects); 
public function insertSql(array|string $inserts);
public function updateSql(array|string $updates);
public function deleteSql(int $deleteAll);
public function tableSql(string $table);
public function whereSql(array|string $wheres, array|string $operators);
public function joinSql(array|string $joinTables, array|string $joinRows, array|string $joinTypes);
public function orderSql(array|string $orders, array|string $operators);
public function limitSql(int $limit);
public function offsetSql(int $offset);
public function manualSql(string $manualSql, string $sqlType);
public function statementSql();
public function clearSql();

}

?>