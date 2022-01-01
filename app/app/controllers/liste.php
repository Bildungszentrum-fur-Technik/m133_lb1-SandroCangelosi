<?php

class Liste extends Controller
{
    public function index($name = '')
    {
        // Wird ausgeführt, wenn keiner angemeldet ist
        if (!isset($_SESSION['user_id'])) {

            // Variable wird auf true gesetzt, damit das Popup Fenster angezeigt wird.
            $nichteingeloggt = true;
            echo $this->twig->render('user/login.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'nichteingeloggt' => $nichteingeloggt]);
        } else {

            // Haben wir keine Berechtigung?
            if (!in_array("hr", $_SESSION['user_roles']) and !in_array("it", $_SESSION['user_roles']) and !in_array("vorgesetzter", $_SESSION['user_roles'])) {

                // Variable wird auf true gesetzt, damit das Popup Fenster angezeigt wird.
                $keineberechtigung = true;
                echo $this->twig->render('home/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'keineberechtigung' => $keineberechtigung]);
            } else {

                // Holt sich die Admin Liste
                $liste = $this->model('EintrittModel');
                $listearray = $liste->getAdminList();

                // Rendert die Adminliste mit den korreken Daten 
                echo $this->twig->render('liste/index.twig.html', ['title' => "Eintritt Liste", 'urlroot' => URLROOT, 'data' => $listearray]);
            }
        }
    }
}
