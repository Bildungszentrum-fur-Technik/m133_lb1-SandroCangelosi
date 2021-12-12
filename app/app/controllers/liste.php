<?php

class Liste extends Controller
{
    public function index($name = '')
    {
        // Holt sich die Admin Liste
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getAdminList();

        // Rendert die Adminliste mit den korreken Daten 
        echo $this->twig->render('liste/index.twig.html', ['title' => "Eintritt Liste", 'urlroot' => URLROOT, 'data' => $listearray]);
    }
}
