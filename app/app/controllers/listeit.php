<?php

class Listeit extends Controller
{
    public function index($name = '')
    {
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getFakeMenueDataArray();
        
        $vorname = "Test";
        $mittelname = "Testmittelname";
        $nachname = "Testnachname";
        $jobtitel = "TESTJOB";
        $eintrittdatum = "19.10.2021";
        $neuerlaptop = "true";
        $neueshandy = "true";
        $neuestelefon = "true";
        $winuser = "true";
        $sapuser = "true";
        $bemerkungenhr = "Testbemerkung";

        $data = [
            'vorname' => $vorname,          // Form-Feld-Daten
            'vorname_error' => '',          // Feldermeldung für Attribute
            'mittelname' => $mittelname,    // Form-Feld-Daten
            'mittelname_error' => '',       // Feldermeldung für Attribute
            'nachname' => $nachname,        // Form-Feld-Daten
            'nachname_error' => '',         // Feldermeldung für Attribute
            'jobtitel' => $jobtitel,        // Form-Feld-Daten
            'jobtitel_error' => '',         // Feldermeldung für Attribute
            'personalnummer' => '',  // Form-Feld-Daten
            'eintrittdatum' => $eintrittdatum,    // Form-Feld-Daten
            'eintrittdatum_error' => '',          // Feldermeldung für Attribute
            'neuerlaptop' => $neuerlaptop,        // Form-Feld-Daten
            'neueshandy' => $neueshandy,          // Form-Feld-Daten
            'neuestelefon' => $neuestelefon,      // Form-Feld-Daten
            'winuser' => $winuser,                // Form-Feld-Daten
            'sapuser' => $sapuser,                // Form-Feld-Daten
            'bemerkungenhr' => $bemerkungenhr,    // Form-Feld-Daten

        ];

        $data['vorname_error'] = 'TEST TEST TEST TEST';

        if (isset($_POST['bearbeiten'])) {
            //die(var_dump($listearray));
            die(var_dump($data));
            echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $data] );  

        } else {

            echo $this->twig->render('listeit/index.twig.html', ['title' => "Übersicht Eintritte IT", 'urlroot' => URLROOT, 'data' => $listearray]);

        }
    }
}