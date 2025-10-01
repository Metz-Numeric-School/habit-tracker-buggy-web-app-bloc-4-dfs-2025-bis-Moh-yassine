<?php
namespace Mns\Buggy\Core;

abstract class AbstractRepository
{   
    public function getConnection() {
        return MySqlConnector::getInstance()->getConnection();
    }

    public abstract function findAll();

    public abstract function find(int $id);
}