<?php

namespace App\Classes;

use Twig\TwigFunction;
use Twig\TwigTest;

class Template
{
    public function loader(){
        return new \Twig\Loader\FilesystemLoader(['../App/Views/site','../App/Views/Admin']);
    }

    public function init(){
        return new \Twig\Environment($this->loader(), [
            'debug' => true,
            // 'cache' => ''
            'auto_reload' => true
        ]);
    }
}