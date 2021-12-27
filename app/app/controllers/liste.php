<?php

class Liste extends Controller
{
    public function index($name = '')
    {
        if (!isset($_SESSION['user_id'])) {
            // Kein Login, Keine Bestellungen -> möglich wäre auch eine Weiterleitung auf Login

            $nichteingeloggt = true;
            echo $this->twig->render('user/login.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'nichteingeloggt' => $nichteingeloggt]);
        } else {

            if (!in_array("hr", $_SESSION['user_roles']) AND !in_array("it", $_SESSION['user_roles']) AND !in_array("vorgesetzter", $_SESSION['user_roles'])) {
                // Wir sind zwar eingeloggt, sind aber nicht berechtigit
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
