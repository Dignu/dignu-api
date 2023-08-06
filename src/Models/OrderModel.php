<?php

namespace Src\Models;


class OrderModel
{
    public function __construct(
        private int $id,
        private int $unitId,
        private int $waiterId,
        private array $items,
    ) {
    }

    public function getId() : int {
        return $this->id;
    }
    public function getUnitId() : int {
        return $this->unitId;
    }
    public function getWaiterId() : int {
        return $this->waiterId;
    }
    public function setItems(ItemModel $itemModel){
        $this->items[] = $itemModel;
    }

    public function getItems() : array {
        return $this->items;
    }




}