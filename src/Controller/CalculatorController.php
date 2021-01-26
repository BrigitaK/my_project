<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{

    # @Route("/calculator", name="calculator", methods:"get")

    public function index(): Response
    {
        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }

    # @Route("/calculator", name="count", methods:"post")

    public function counter(): Response
    {
        dd($r->request->all());
    }
}
