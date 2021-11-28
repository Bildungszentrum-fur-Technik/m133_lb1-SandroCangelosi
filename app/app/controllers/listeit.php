<?php

class Listeit extends Controller
{
    public function index($name = '')
    {
        // Holt sich die Fake Personen Liste aus dem Model. Damit diese auf der Liste angezeigt werden können.
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getAdminList();

        // Wenn der Button "bearbeiten" geklickt wird, dann wird das if aktiviert.
        if (isset($_POST['bearbeiten'])) {

            // Rendert die View "bearbeiten" und setzt den Webseitentitel auf "Eintritt bearbeiten".
            echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritt bearbeiten"]);
        } else {

            /* Rendert standarmässig die Liste für die IT (View: "listeit"). Mit einem Webseitentitel und mit Fakedaten. 
            Wenn auf den Header geklickt wird, wird die Liste angezeigt.*/
            echo $this->twig->render('listeit/index.twig.html', ['title' => "Übersicht Eintritte IT", 'urlroot' => URLROOT, 'data' => $listearray]);
        }
    }
}
