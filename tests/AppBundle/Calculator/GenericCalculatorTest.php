<?php

namespace Tests\AppBundle\Calculator;

use AppBundle\Calculator\CalculatorInterface;
use AppBundle\Model\Change;
use AppBundle\Calculator\GenericCalculator;
use PHPUnit\Framework\TestCase;

class GenericCalculatorTest extends TestCase
{
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    protected function setUp()
    {
        $this->calculator = new GenericCalculator();
        $this->calculator->model = "mk0";
        $this->calculator->coins = ["bill10" => 10, 'bill5' => 5, 'coin2' => 2];
    }

    public function testGetSupportedModel()
    {
        $this->assertEquals('mk0', $this->calculator->getSupportedModel());
    }

    public function testGetChangeEasy()
    {
        $change = $this->calculator->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertEquals(1, $change->coin2);
    }

    public function testGetChangeHard()
    {
        $change = $this->calculator->getChange(39);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertEquals(3, $change->bill10);
        $this->assertEquals(1, $change->bill5);
        $this->assertEquals(2, $change->coin2);
        $this->assertEquals(0, $change->coin1);
    }

    public function testGetChangeImpossible()
    {
        $change = $this->calculator->getChange(1);
        $this->assertNull($change);
    }

    /**
     * Be sure not give money when have negative value (can be a bug)
     */
    public function testGetChangeNegative()
    {
        $change = $this->calculator->getChange(-10);
        $this->assertNull($change);
    }

}