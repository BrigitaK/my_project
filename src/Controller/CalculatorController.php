<?php

namespace App\Controller;

use App\Entity\Result;
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

        $res = $this->getDoctrine()
        ->getRepository(Result::class)
        ->findAll();

        return $this->render('calculator/index.html.twig', [
            'controller_name' => 'CalculatorController',
            'result' => $result[0] ?? '',
            'history' => $res
        ]);
    }
    /**
     * @Route("/calculator", name="count", methods={"POST"})
     */
    public function counter(Request $r): Response
    {
        $session = new Session();
        $sum = $r->request->get('x') + $r->request->get('y');


        $res = new Result; //naujas intity

        $res->
        setEnter1($r->request->get('x'))->
        setEnter2($r->request->get('y'))->
        setRed($sum);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($res);
        $entityManager->flush();

        //reikia irasyti i duomenu baze

        // $session->set('result', $sum);
        $session->getFlashBag()->add('result', $sum);

        return $this->redirectToRoute('calculator');
        

    }
}
