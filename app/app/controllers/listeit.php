<?php

class Listeit extends Controller
{
    public function index($name = '')
    {
        // Haben wir die entsprechenden Berechtigungen?
        if (!isset($_SESSION['user_id'])) {
            // Kein Login, Keine Bestellungen -> möglich wäre auch eine Weiterleitung auf Login

            $nichteingeloggt = true;
            echo $this->twig->render('user/login.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'nichteingeloggt' => $nichteingeloggt]);
        } else {

            if (!in_array("it", $_SESSION['user_roles'])) {
                // Wir sind zwar eingeloggt, sind aber nicht berechtigit
                $keineberechtigung = true;
                echo $this->twig->render('home/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'keineberechtigung' => $keineberechtigung]);
            } else {

                // Holt sich die Liste für den Bearbeiter
                $liste = $this->model('EintrittModel');
                $listearray = $liste->getBearbeitenList();

                // Wenn der Button "bearbeiten" geklickt wird, dann wird das if aktiviert.
                if (isset($_POST['bearbeiten'])) {

                    // Die übergebene Personalnummer wird in eine Variable gesetzt
                    $uebergabepersonalnummer = $_POST['bearbeiten'];

                    // Holt sich den einzelnen Datensazu mit der Personalnummer
                    $listearray = $liste->getEinzelnerDatensatz($uebergabepersonalnummer);

                    // Kürtzt den Array
                    $listearrayob1 = $listearray[0];

                    // Rendert die View "bearbeiten" und setzt den Webseitentitel auf "Eintritt bearbeiten".
                    echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $listearrayob1]);
                } else {

                    /* Rendert standarmässig die Liste für die IT (View: "listeit"). Mit einem Webseitentitel und mit Fakedaten. 
                    Wenn auf den Header geklickt wird, wird die Liste angezeigt.*/
                    echo $this->twig->render('listeit/index.twig.html', ['title' => "Übersicht Eintritte IT", 'urlroot' => URLROOT, 'data' => $listearray]);
                }
            }
        }
    }
}
