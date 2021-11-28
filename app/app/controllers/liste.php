<?php

class Liste extends Controller
{
    public function index($name = '')
    {
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getAdminList();

        echo $this->twig->render('liste/index.twig.html', ['title' => "Eintritt Liste", 'urlroot' => URLROOT, 'data' => $listearray]);
    }
}