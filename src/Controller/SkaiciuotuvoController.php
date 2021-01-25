<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SkaiciuotuvoController extends AbstractController
{
    public function suma(int $num1, int $num2)
    {
        return $this->render('skaiciuoti/suma.html.twig',[
            'sum' => $num1 + $num2
        ]);
    }
}