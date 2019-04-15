<?php

declare(strict_types=1);

namespace AppBundle\Registry;
use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Calculator\Mk1Calculator;
use AppBundle\Calculator\Mk2Calculator;
use AppBundle\Registry\CalculatorRegistryInterface;
use AppBundle\Model\Change;

class CalculatorRegistry implements CalculatorRegistryInterface
{
    public function getCalculatorFor(string $model) : ?CalculatorInterface
    {
        $calculator = null;
        if ($model == 'mk1')
        {
            $calculator = new Mk1Calculator();
        }
        elseif ($model == 'mk2')
        {
            $calculator = new Mk2Calculator();
        }
        return $calculator;
    }
}
