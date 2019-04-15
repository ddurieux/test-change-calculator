<?php

declare(strict_types=1);

namespace AppBundle\Calculator;

use AppBundle\Model\Change;

class GenericCalculator implements CalculatorInterface
{
    public $model = '';
    public $coins = [];


    public function getSupportedModel() : string
    {
        return $this->model;
    }

    public function getChange(int $amount) : ?Change
    {
        if ($amount < end($this->coins))
        {
            return null;
        }
        $remain_amount = $amount;
        $change = new Change();
        foreach ($this->coins as $key => $value)
        {
            $change->{$key} = (int)($remain_amount/$value);
            $remain_amount -= ($change->{$key} * $value);
        }
        return $change;
    }
}
