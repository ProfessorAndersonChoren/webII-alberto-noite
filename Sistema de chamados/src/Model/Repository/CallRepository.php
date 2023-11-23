<?php

namespace QI\SistemaDeChamados\Model\Repository;

class CallRepository{
    private $connection;
    private const TABLE = "calls";

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

    public function insert($call){
        $stmt = $this->connection->prepare("insert into calls values(null,?,?,?,?,?);");
        $stmt->bindParam(1, $call->user->id);
        $stmt->bindParam(2, $call->equipment->id);
        $stmt->bindParam(3, $call->classification);
        $stmt->bindParam(4, $call->description);
        $stmt->bindParam(5, $call->notes);
        return $stmt->execute();
    }
}