<?php

namespace Src\Models;

class WaiterModel
{
    public function __construct(
        private int $id,
        private int $title,
        private int $unitId,
    ) {
    }

public function getId() : int {
    return $this->id;
}

public function getTitle() : string {
    return $this->title;
}

public function getUnitId() : int {
    return $this->unitId;
}



}