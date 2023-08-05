<?php

namespace Src\Models;


class OrderModel
{
    public function __construct(
        private int $id,
        private array $items,
    ) {
    }

    public function setItems(ItemModel $itemModel){
        $this->items[] = $itemModel;
    }

    public function getItems() : array {
        return $this->items;
    }

    public function getId() : int {
        return $this->id;
    }


}