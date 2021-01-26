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
     * @Route("/calculator", name="calculator", methods={"GET"})
     */
    public function index(): Response
    {
        $session = new Session();
        $result = $session->getFlashBag()->get('result', []);

        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
            'result' => $result[0] ?? ''
        ]);
    }
    /**
     * @Route("/calculator", name="count", methods={"POST"})
     */
    public function counter(Request $r): Response
    {
        $session = new Session();
        $sum = $r->request->get('x') + $r->request->get('y');

        // $session->set('result', $sum);
        $session->getFlashBag()->add('result', $sum);

        return $this->redirectToRoute('calculator');
        

    }
}
