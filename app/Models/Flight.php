<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'startX',
        'startY',
        'endX',
        'endY',
        'speed',
        'code',
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    function getPoints () {
        $pathCalc = [];
        $x1 = $this->startX;
        $y1 = $this->startY;
        $x2 = $this->endX;
        $y2 = $this->endY;

        $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));

        $steps = floor(($distance * 100) / $this->speed);

        for ($steps; $steps > 0; $steps--) {
            $x1 += ($x2 - $x1) / $steps;
            $y1 += ($y2 - $y1) / $steps;
            $pathCalc[] = [$x1, $y1];
        }

        return $pathCalc;
    }

    function getPosition(){
        $pathCalc = $this->getPoints();
        $position = $pathCalc[$this->position];
        return $position;
    }
}
