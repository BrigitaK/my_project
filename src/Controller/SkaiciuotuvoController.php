<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SkaiciuotuvoController extends AbstractController
{
    public function suma(int $num1, int $num2)
    {
        $dalybaUrl = $this->generateUrl('dalyba', ['num1' => $num1, 'num2' => $num2]);
        $daugybaUrl = $this->generateUrl('daugyba', ['num1' => $num1, 'num2' => $num2]);
        $atimtisUrl = $this->generateUrl('atimtis', ['num1' => $num1, 'num2' => $num2]);

        return $this->render('skaiciuoti/suma.html.twig',[
            'sum' => $num1 + $num2,
            'num1' => $num1,
            'num2' => $num2,
            'goDal' => $dalybaUrl,
            'goDaug' => $daugybaUrl,
            'goAti' => $atimtisUrl
        ]);
    }
    public function dalyba(int $num1, int $num2)
    {
        $sumaUrl = $this->generateUrl('suma', ['num1' => $num1, 'num2' => $num2]);
        $daugybaUrl = $this->generateUrl('daugyba', ['num1' => $num1, 'num2' => $num2]);
        $atimtisUrl = $this->generateUrl('atimtis', ['num1' => $num1, 'num2' => $num2]);

        return $this->render('skaiciuoti/dalyba.html.twig',[
            'dal' => $num1 / $num2,
            'num1' => $num1,
            'num2' => $num2,
            'goSum' => $sumaUrl,
            'goDaug' => $daugybaUrl,
            'goAti' => $atimtisUrl
        ]);
    }
    public function daugyba(int $num1, int $num2)
    {
        $sumaUrl = $this->generateUrl('suma', ['num1' => $num1, 'num2' => $num2]);
        $dalybaUrl = $this->generateUrl('dalyba', ['num1' => $num1, 'num2' => $num2]);
        $atimtisUrl = $this->generateUrl('atimtis', ['num1' => $num1, 'num2' => $num2]);

        return $this->render('skaiciuoti/daugyba.html.twig',[
            'daug' => $num1 * $num2,
            'num1' => $num1,
            'num2' => $num2,
            'goSum' => $sumaUrl,
            'goDal' => $dalybaUrl,
            'goAti' => $atimtisUrl
        ]);
    }
    public function atimtis(int $num1, int $num2)
    {
        $sumaUrl = $this->generateUrl('suma', ['num1' => $num1, 'num2' => $num2]);
        $dalybaUrl = $this->generateUrl('dalyba', ['num1' => $num1, 'num2' => $num2]);
        $daugybaUrl = $this->generateUrl('daugyba', ['num1' => $num1, 'num2' => $num2]);

        return $this->render('skaiciuoti/atimtis.html.twig',[
            'ati' => $num1 - $num2,
            'num1' => $num1,
            'num2' => $num2,
            'goSum' => $sumaUrl,
            'goDal' => $dalybaUrl,
            'goDaug' => $daugybaUrl
        ]);
    }
}