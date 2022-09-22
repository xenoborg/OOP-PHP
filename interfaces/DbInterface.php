<?php

interface DbInterface
{

public function dbQuery(string $sql, array $values);
public function dbQueryResult($result);
public function dbQueryId($connect);

}

?>