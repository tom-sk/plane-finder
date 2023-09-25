<?php

namespace App\DataTransferObjects;

class PositionData
{
    public function __construct(
        public string $id,
        public string $position,
    ) {
    }
}
