<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpesController extends AbstractController
{
    public function bebras(Request $r,string $pasveikinimas, int $kiekis)
    {
        $name = 'Bebras';
        $udraUrl = $this->generateUrl('udra');
        $order = $r->query->get('order');

        return $this->render('upe/bebras.html.twig',[
            'say' => $pasveikinimas, 
            'count' => $kiekis,
            'name' => $name,
            'go' => $udraUrl,
            'o' => $order
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