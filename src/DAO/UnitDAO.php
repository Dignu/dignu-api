<?php

namespace Src\DAO;

use PDO;

class UnitDAO extends DBHelper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createUnit(string $title): void
    {
        $query = "INSERT INTO tab_units (title) VALUES (:title)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->execute();
    }


}
