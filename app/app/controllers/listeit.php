<?php

class Listeit extends Controller
{
    public function index($name = '')
    {
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getFakeMenueDataArray();
        
        echo $this->twig->render('listeit/index.twig.html', ['title' => "Eintritt Liste IT", 'urlroot' => URLROOT, 'data' => $listearray]);
    }
}