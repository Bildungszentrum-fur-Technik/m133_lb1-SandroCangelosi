<?php

class Listevorgesetzter extends Controller
{
    public function index($name = '')
    {
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getFakeMenueDataArray();
        
        echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearray]);
    }
}