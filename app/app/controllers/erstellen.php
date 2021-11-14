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

            $mittelname = trim(
                filter_input(INPUT_POST, 'mittelname', FILTER_SANITIZE_STRING)
            );

            $nachname = trim(
                filter_input(INPUT_POST, 'nachname', FILTER_SANITIZE_STRING)
            );

            $jobtitel = trim(
                filter_input(INPUT_POST, 'jobtitel', FILTER_SANITIZE_STRING)
            );
            
            // Daten setzen
            $data = [
                'vorname' => $vorname,          // Form-Feld-Daten
                'vorname_error' => '',          // Feldermeldung für Attribute
                'mittelname' => $mittelname,    // Form-Feld-Daten
                'mittelname_error' => '',       // Feldermeldung für Attribute
                'nachname' => $nachname,        // Form-Feld-Daten
                'nachname_error' => '',         // Feldermeldung für Attribute
                'jobtitel' => $jobtitel,        // Form-Feld-Daten
                'jobtitel_error' => '',         // Feldermeldung für Attribute
                'personalnummer' => $personalnummer,  // Form-Feld-Daten
                'personalnummer_error' => '',         // Feldermeldung für Attribute

            ];



            
            // * Überprüft, ob die Eingabe leer ist
            if(empty($data['vorname']))
            {
                $data['vorname_error'] = 'Bitte einen gültigen Vornamen eingeben';
            }

            $vorname_laenge = strlen($data['vorname']);
            // * Überprüfen, ob die Anzahl von Buchstaben aus dem Vornamen kleiner als 3 ist
            if($vorname_laenge < 3){
                $data['vorname_error'] = 'Bitte einen längeren Vornamen eingeben';
            }

            // * Überprüfen, ob die Anzahl von Buchstaben aus dem Vornamen grösser als 20 ist
            if($vorname_laenge > 20){
                $data['vorname_error'] = 'Bitte einen kürzeren Vornamen eingeben';
            }

            //  * Überprüfen, ob der Vorname mit einen Grossbuchstaben beginnt
            if(!preg_match('~^\p{Lu}~u', $data['vorname'])){
                $data['vorname_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
            }

            //* Überprüfen, ob der Vorname nach dem ersten Buchstaben kleingeschrieben ist
            if(!ctype_lower((substr($data['vorname'], 1)))){
                $data['vorname_error'] = 'Bitte nach dem ersten Buchstaben klein schreiben';
            }

            // * Überprüft, ob die Eingabe nur Buchstaben enhält
            if(!ctype_alpha($data['vorname'])){
                $data['vorname_error'] = 'Bitte nur gültige Buchstaben verwenden';
            }
            


            //* Falls der Mittelname befüllt wird, wird die Eingabe validiert
            if(!empty($data['mittelname'])){

                $mittelname_laenge = strlen($data['mittelname']);
                // * Überprüfen, ob die Anzahl von Buchstaben aus dem Mittelname kleiner als 3 ist
                if($mittelname_laenge < 3){
                    $data['mittelname_error'] = 'Bitte einen längeren Mittelname eingeben';
                }

                // * Überprüfen, ob die Anzahl von Buchstaben aus dem Mittelname grösser als 20 ist
                if($mittelname_laenge > 20){
                    $data['mittelname_error'] = 'Bitte einen kürzeren Mittelname eingeben';
                }

                //  * Überprüfen, ob der Mittelname mit einen Grossbuchstaben beginnt
                if(!preg_match('~^\p{Lu}~u', $data['mittelname'])){
                    $data['mittelname_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
                }

                //* Überprüfen, ob der Mittelname nach dem ersten Buchstaben kleingeschrieben ist
                if(!ctype_lower((substr($data['mittelname'], 1)))){
                    $data['mittelname_error'] = 'Bitte nach dem ersten Buchstaben klein schreiben';
                }

                // * Überprüft, ob die Eingabe nur Buchstaben enhält
                if(!ctype_alpha($data['mittelname'])){
                    $data['mittelname_error'] = 'Bitte nur gültige Buchstaben verwenden';
                }
            }




            // * Überprüft, ob die Eingabe leer ist
            if(empty($data['nachname']))
            {
                $data['nachname_error'] = 'Bitte einen gültigen Nachnamen eingeben';
            }

            $nachname_laenge = strlen($data['nachname']);
            // * Überprüfen, ob die Anzahl von Buchstaben aus dem Nachnamen kleiner als 3 ist
            if($nachname_laenge < 3){
                $data['nachname_error'] = 'Bitte einen längeren Nachnamen eingeben';
            }

            // * Überprüfen, ob die Anzahl von Buchstaben aus dem Nachnamen grösser als 20 ist
            if($nachname_laenge > 20){
                $data['nachname_error'] = 'Bitte einen kürzeren Nachnamen eingeben';
            }

            //  * Überprüfen, ob der Nachnamen mit einen Grossbuchstaben beginnt
            if(!preg_match('~^\p{Lu}~u', $data['nachname'])){
                $data['nachname_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
            }

            //* Überprüfen, ob der Nachnamen nach dem ersten Buchstaben kleingeschrieben ist
            if(!ctype_lower((substr($data['nachname'], 1)))){
                $data['nachname_error'] = 'Bitte nach dem ersten Buchstaben klein schreiben';
            }

            // * Überprüft, ob die Eingabe nur Buchstaben enhält
            if(!ctype_alpha($data['nachname'])){
                $data['nachname_error'] = 'Bitte nur gültige Buchstaben verwenden';
            }





            

            //  * Überprüfen, ob der Jobtitel mit einen Grossbuchstaben beginnt
            if(!preg_match('~^\p{Lu}~u', $data['jobtitel'])){
                $data['jobtitel_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
            }

            // * Überprüft, ob die Eingabe leer ist
            if(empty($data['jobtitel']))
            {
                $data['jobtitel_error'] = 'Bitte einen gültigen Jobtitel eingeben';
            }





            // * Überprüft, ob die Eingabe leer ist
            if(empty($data['personalnummer']))
            {
                $data['personalnummer_error'] = 'Bitte einen gültige Personalnummer eingeben';
            }

            // * Überprüft, ob die Eingabe der Personalnummer mit Zahlen von 0-9 befüllt wurde.
            // * Dazu muss die Zahl positiv sein
            if(!ctype_digit($data['personalnummer'])){
                $data['personalnummer_error'] = 'Bitte eine gültige Personanummer eingeben';
            }

            $EintrittModel = $this->model('EintrittModel');
            $Arry_for_pnr = $EintrittModel->getFakeMenueDataArray();
            
            $test=1;
            foreach ($Arry_for_pnr as &$list) {
                if($list == 123){
                    print_r($list);
                }
                
                
            }


            // Keine Errors vorhanden
            if (empty($data['vorname_error']) && empty($data['mittelname_error']) && empty($data['nachname_error']) && empty($data['jobtitel_error']) && empty($data['personalnummer_error']))
            {
                // Alles gut, keine Fehler vorhanden
                // Späteres TODO: Auf DB schreiben
                
                die(var_dump($data));

                //die(var_dump($data));
            }
            else {
                // Fehler vorhanden - Fehler anzeigen
                // View laden mit Fehlern

                die(var_dump($Arry_for_pnr));
                echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'data' => $data] );
            }

        } else {
            // Init Form mit Default-Daten, weil Get-Aufruf
            
            $data = [
                'vorname' => '',       // Form-Feld-Daten
                'vorname_error' => '',   // Feldermeldung für Attribute
                'mittelname' => $mittelname,    // Form-Feld-Daten
                'mittelname_error' => '',       // Feldermeldung für Attribute
                'nachname' => $nachname,        // Form-Feld-Daten
                'nachname_error' => '',         // Feldermeldung für Attribute
                'jobtitel' => $jobtitel,        // Form-Feld-Daten
                'jobtitel_error' => '',         // Feldermeldung für Attribute
                'personalnummer' => $personalnummer,  // Form-Feld-Daten
                'personalnummer_error' => '',         // Feldermeldung für Attribute
            ];
            
            
            
            echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'data' => $data]);
        }
    }
}