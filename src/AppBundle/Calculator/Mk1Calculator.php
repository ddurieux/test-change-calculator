<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Model\Change;
use AppBundle\Calculator\GenericCalculator;

class Mk1Calculator extends GenericCalculator
{
    public $model = 'mk1';
    public $coins = ['coin1' => 1];
}
