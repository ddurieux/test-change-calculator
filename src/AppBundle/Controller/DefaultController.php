<?php

declare(strict_types=1);

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Registry\CalculatorRegistry;

class DefaultController extends Controller
{
    /**
     * @Route("/automaton/{model}/change/{amount}", name="getchange")
     */
    public function getchangeAction($model, $amount)
    {
        $calculator = new CalculatorRegistry();
        $modelCalculator = $calculator->getCalculatorFor($model);
        if (is_null($modelCalculator))
        {
            return new Response(
                null, 
                Response::HTTP_NOT_FOUND, 
                ['Content-Type' => 'application/json']
            );
        }
        else
        {
            return new Response(
                json_encode($modelCalculator->getChange((int)$amount)), 
                Response::HTTP_OK, 
                ['Content-Type' => 'application/json']
            );
        }
    }
}
