<?php

namespace Src\DAO;

use PDO;
use Src\Models\WaiterModel;

class WaiterDAO extends DBHelper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createWaiter(WaiterModel $waiter): WaiterModel
    {
        try {
            $query = "INSERT INTO tab_waiters (unitId, title) VALUES (:unitId, :title)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':unitId', $waiter->getUnitId(), PDO::PARAM_STR);
            $stmt->bindValue(':title', $waiter->getTitle(), PDO::PARAM_STR);
            $stmt->execute();
            return $waiter;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
