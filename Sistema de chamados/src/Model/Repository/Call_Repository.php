<?php

namespace QI\SistemaDeChamados\Model\Repository;

class CallRepository{
    private $connection;
    private const TABLE = "calls";

    public function __construct(){
        $connection = Connection::getConnection();
    }

    public function insert($call){}
}