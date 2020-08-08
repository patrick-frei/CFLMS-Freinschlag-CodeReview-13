<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('base64', [$this, 'base64']),
        ];
    }

    function base64(string $image)
        {
            $extension = pathinfo($image)['extension'];
            return 'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($image));
        }
}