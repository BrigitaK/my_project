<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpesController extends AbstractController
{
    public function bebras(string $pasveikinimas, int $kiekis)
    {
        $name = 'Bebras';
        $udraUrl = $this->generateUrl('udra');

        return $this->render('upe/bebras.html.twig',[
            'say' => $pasveikinimas, 
            'count' => $kiekis,
            'name' => $name,
            'go' => $udraUrl
        ]);
    }

    public function udra()
    {
        $name = 'Ūdros';
        $d = 'Viso-Gero';
        $bebrasUrl = $this->generateUrl('bebras', ['pasveikinimas' => $d, 'kiekis' => rand(100, 200)]);

        return $this->render('upe/udra.html.twig', [
            'name' => $name,
            'go' => $bebrasUrl
        ]);
    }
}