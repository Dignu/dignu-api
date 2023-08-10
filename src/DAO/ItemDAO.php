<?php

namespace Src\DAO;

use PDO;
use Src\Models\ItemModel;

class ItemDAO extends DBHelper
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createItem(ItemModel $item): ItemModel
    {
        try {
            $query = "INSERT INTO tab_items (unitId, title, description, price) VALUES (:unitId, :title, :description, :price)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(':unitId', $item->getUnitId(), PDO::PARAM_STR);
            $stmt->bindValue(':title', $item->getTitle(), PDO::PARAM_STR);
            $stmt->bindValue(':description', $item->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(':price', $item->getPrice(), PDO::PARAM_STR);
            $stmt->execute();
            return $item;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
