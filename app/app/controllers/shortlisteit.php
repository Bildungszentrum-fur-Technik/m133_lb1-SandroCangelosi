<?php

class Shortlisteit extends Controller
{
    public function index($name = '')
    {
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getFakeMenueDataArray();
        
        
        if (isset($_POST['bearbeiten'])) {

            echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' ] );  

        } else {

            echo $this->twig->render('shortlisteit/index.twig.html', ['title' => "Übersicht Eintritte IT", 'urlroot' => URLROOT, 'data' => $listearray]);

        }
    }
}