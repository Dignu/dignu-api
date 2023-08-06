<?php

namespace Src\Models;

class ItemModel
{
    public function __construct(
        private int $id,
        private int $unitId,
        private string $title,
        private string $description,
        private float $price,
    ) {
    }

public function getId() : int {
    return $this->id;
}

public function getUnitId() : int {
    return $this->unitId;
}

public function getTitle() : string {
    return $this->title;
}
public function getDescription() : string {
    return $this->description;
}

public function getPrice() : float {
    return $this->price;
}

}