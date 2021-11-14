<?php

class Erstellen extends Controller
{
    public function index($name = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Zuerst mal trimen und filtern auf gesunde Daten
            $vorname = trim(
                filter_input(INPUT_POST, 'vorname', FILTER_SANITIZE_STRING)
            );
            
            // Daten setzen
            $data = [
                'vorname' => $vorname,       // Form-Feld-Daten
                'vorname_error' => '',   // Feldermeldung für Attribute

            ];


            // Gucken ob die Daten plausibel sind
            // Da müsste man aber noch mehr machen
            
            // * Überprüft, ob die Eingabe leer ist
            if(empty($data['vorname']))
            {
                $data['vorname_error'] = 'Bitte einen gültigen Vornamen eingeben';
            }

            // * Überprüft, ob die Eingabe nur Buchstaben enhält
            if(!ctype_alpha($data['vorname'])){
                $data['vorname_error'] = 'Bitte einen gültigen Vornamen eingeben';
            }

            $vorname_laenge = strlen($data['vorname']);

            // * Überprüfen, ob der Vorname kleiner als 3 ist
            if($vorname_laenge < 3){
                $data['vorname_error'] = 'Bitte einen längeren Vornamen eingeben';
            }

            if($vorname_laenge > 20){
                $data['vorname_error'] = 'Bitte einen kürzeren Vornamen eingeben';
            }

            // Keine Errors vorhanden
            if (empty($data['vorname_error']))
            {
                // Alles gut, keine Fehler vorhanden
                // Späteres TODO: Auf DB schreiben
                
                die(var_dump($data));

                //die(var_dump($data));
            }
            else {
                // Fehler vorhanden - Fehler anzeigen
                // View laden mit Fehlern

            
               echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'data' => $data] );
            }

        } else {
            // Init Form mit Default-Daten, weil Get-Aufruf
            
            $data = [
                'vorname' => '',       // Form-Feld-Daten
                'vorname_error' => '',   // Feldermeldung für Attribute

            ];
            
            
            
            echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'data' => $data]);
        }

        //echo $this->twig->render('erstellen/index.twig.html', ['title' => "User erstellen"] );                
        //echo $this->twig->render('base/layout.twig.html', ['title' => "Titel Page"] );
    }
}