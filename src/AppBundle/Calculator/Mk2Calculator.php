<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

class Mk2Calculator extends GenericCalculator
{
    public $model = 'mk2';
    public $coins = ['bill10' => 10, 'bill5' => 5, 'coin2' => 2];
}
