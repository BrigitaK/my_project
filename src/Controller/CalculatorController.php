<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator")
     */
    #[Route('/calculator', name: 'calculator', methods: ['GET'])]
    public function index(): Response
    {
        $session = new Session();
        $session->start();
        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }
    /**
     * @Route("/calculator", name="count")
     */
    #[Route('/calculator', name: 'count', methods: ['POST'])]
    public function counter(Request $r): Response
    {
        $session = new Session();
        $session->start();
        $sum = $r->request->get('x') + $r->request->get('y');

        $session->set('result', $sum);
        

    }
}
