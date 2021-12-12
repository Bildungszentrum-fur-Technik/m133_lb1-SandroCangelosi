<?php

class Erstellen extends Controller
{
    public function index($name = '')
    {
        // Wenn der Aufruf ein POST Request ist, wird dieses if ausgeführt.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Trim schneidet die Leerzeichen links und rechts weg. Die Eingabe wird als Variable zwischengespeichert.
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

            $eintrittdatum = trim(
                filter_input(INPUT_POST, 'eintrittdatum', FILTER_SANITIZE_STRING)
            );

            $neuerlaptop = trim(
                filter_input(INPUT_POST, 'neuerlaptop', FILTER_UNSAFE_RAW)
            );

            $neueshandy = trim(
                filter_input(INPUT_POST, 'neueshandy', FILTER_UNSAFE_RAW)
            );

            $neuestelefon = trim(
                filter_input(INPUT_POST, 'neuestelefon', FILTER_UNSAFE_RAW)
            );

            $winuser = trim(
                filter_input(INPUT_POST, 'winuser', FILTER_UNSAFE_RAW)
            );

            $sapuser = trim(
                filter_input(INPUT_POST, 'sapuser', FILTER_UNSAFE_RAW)
            );

            $bemerkungenhr = trim(
                filter_input(INPUT_POST, 'bemerkungenhr', FILTER_UNSAFE_RAW)
            );


            // Der Array "data" wird mit den oberen Daten befüllt. Die Error Meldungen sind zurzeit leer.
            $data = [
                'vorname' => $vorname,
                'vorname_error' => '',
                'mittelname' => $mittelname,
                'mittelname_error' => '',
                'nachname' => $nachname,
                'nachname_error' => '',
                'jobtitel' => $jobtitel,
                'jobtitel_error' => '',
                'personalnummer' => '',
                'eintrittdatum' => $eintrittdatum,
                'eintrittdatum_error' => '',
                'neuerlaptop' => $neuerlaptop,
                'neueshandy' => $neueshandy,
                'neuestelefon' => $neuestelefon,
                'winuser' => $winuser,
                'sapuser' => $sapuser,
                'bemerkungenhr' => $bemerkungenhr,

            ];


            // Überprüfung des Vornamens
            // Überprüft, ob die Eingabe leer ist, dann wird im Array die Vorname Fehlermeldung beschrieben.
            if (empty($data['vorname'])) {
                $data['vorname_error'] = 'Bitte einen gültigen Vornamen eingeben';
            }

            // Länge des Vornamen
            $vorname_laenge = strlen($data['vorname']);

            // Überprüfen, ob die Anzahl von Buchstaben aus dem Vornamen kleiner als 3 ist.
            if ($vorname_laenge < 3) {
                $data['vorname_error'] = 'Bitte einen längeren Vornamen eingeben';
            }

            // Überprüfen, ob die Anzahl von Buchstaben aus dem Vornamen grösser als 20 ist.
            if ($vorname_laenge > 20) {
                $data['vorname_error'] = 'Bitte einen kürzeren Vornamen eingeben';
            }

            // Überprüfen, ob der Vorname mit einen Grossbuchstaben beginnt.
            if (!preg_match('~^\p{Lu}~u', $data['vorname'])) {
                $data['vorname_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
            }

            // Überprüfen, ob der Vorname nach den ersten Buchstaben kleingeschrieben wurde.
            if (!ctype_lower((substr($data['vorname'], 1)))) {
                $data['vorname_error'] = 'Bitte nach dem ersten Buchstaben klein schreiben';
            }

            // Überprüft, ob die Eingabe nur Buchstaben enhält.
            if (!ctype_alpha($data['vorname'])) {
                $data['vorname_error'] = 'Bitte nur gültige Buchstaben verwenden';
            }


            // Überprüfung des Mittelnamens
            // Falls der Mittelname befüllt wird, wird die Eingabe validiert.
            if (!empty($data['mittelname'])) {

                // Länge des Mittelnamens.
                $mittelname_laenge = strlen($data['mittelname']);

                // Überprüfen, ob die Anzahl von Buchstaben aus dem Mittelname kleiner als 3 ist.
                if ($mittelname_laenge < 3) {
                    $data['mittelname_error'] = 'Bitte einen längeren Mittelname eingeben';
                }

                // Überprüfen, ob die Anzahl von Buchstaben aus dem Mittelname grösser als 20 ist.
                if ($mittelname_laenge > 20) {
                    $data['mittelname_error'] = 'Bitte einen kürzeren Mittelname eingeben';
                }

                // Überprüfen, ob der Mittelname mit einen Grossbuchstaben beginnt.
                if (!preg_match('~^\p{Lu}~u', $data['mittelname'])) {
                    $data['mittelname_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
                }

                // Überprüfen, ob der Mittelname nach dem ersten Buchstaben kleingeschrieben wurden.
                if (!ctype_lower((substr($data['mittelname'], 1)))) {
                    $data['mittelname_error'] = 'Bitte nach dem ersten Buchstaben klein schreiben';
                }

                // Überprüft, ob die Eingabe nur Buchstaben enhält.
                if (!ctype_alpha($data['mittelname'])) {
                    $data['mittelname_error'] = 'Bitte nur gültige Buchstaben verwenden';
                }
            }


            // Überprüfung des Nachnamens
            // Überprüft, ob die Eingabe leer ist.
            if (empty($data['nachname'])) {
                $data['nachname_error'] = 'Bitte einen gültigen Nachnamen eingeben';
            }

            // Länge des Nachnamens.
            $nachname_laenge = strlen($data['nachname']);

            // Überprüfen, ob die Anzahl von Buchstaben aus dem Nachnamen kleiner als 3 ist.
            if ($nachname_laenge < 3) {
                $data['nachname_error'] = 'Bitte einen längeren Nachnamen eingeben';
            }

            // Überprüfen, ob die Anzahl von Buchstaben aus dem Nachnamen grösser als 20 ist.
            if ($nachname_laenge > 20) {
                $data['nachname_error'] = 'Bitte einen kürzeren Nachnamen eingeben';
            }

            // Überprüfen, ob der Nachnamen mit einen Grossbuchstaben beginnt.
            if (!preg_match('~^\p{Lu}~u', $data['nachname'])) {
                $data['nachname_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
            }

            // Überprüfen, ob der Nachnamen nach dem ersten Buchstaben kleingeschrieben ist.
            if (!ctype_lower((substr($data['nachname'], 1)))) {
                $data['nachname_error'] = 'Bitte nach dem ersten Buchstaben klein schreiben';
            }

            // Überprüft, ob die Eingabe nur Buchstaben enhält.
            if (!ctype_alpha($data['nachname'])) {
                $data['nachname_error'] = 'Bitte nur gültige Buchstaben verwenden';
            }


            // Überprüfung des Jobtitels
            // Überprüfen, ob der Jobtitel mit einen Grossbuchstaben beginnt.
            if (!preg_match('~^\p{Lu}~u', $data['jobtitel'])) {
                $data['jobtitel_error'] = 'Bitte mit einem Grossbuchstaben beginnen';
            }

            // Überprüft, ob die Eingabe leer ist.
            if (empty($data['jobtitel'])) {
                $data['jobtitel_error'] = 'Bitte einen gültigen Jobtitel eingeben';
            }


            // Überprüfung des Eintrittsdatum
            // Überprüft, ob die Eingabe leer ist.
            if (empty($data['eintrittdatum'])) {
                $data['eintrittdatum_error'] = 'Bitte einen gültiges Eintrittsdatum eingeben';
            }


            // Falls die obere Validierung keine Errors verursacht hat, wird der untere Code ausgesührt.
            if (empty($data['vorname_error']) && empty($data['mittelname_error']) && empty($data['nachname_error']) && empty($data['jobtitel_error'])  && empty($data['eintrittdatum_error'])) {

                $EintrittModel = $this->model('EintrittModel');

                // Falls es keinen Fehler gegeben hat, werden die Daten in die DB geschrieben
                if ($EintrittModel->DateninDBschreibenUserEintritt($data)) {
                    // Erfolgsfall
                    // Umleiten auf Liste meiner Bestellungen
                    echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erfolgreich erstellen", 'eintritterstellt' => 1]);
                } else {
                    // Fehlerfall
                    echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen fehlgeschlagen", 'eintritterstellt' => 2]);
                }
            } else {

                // Bei einem Fehler, wird die "erstellen" View nochmals gerendet. Durch das übergebene "data" werden die Fehlermeldungen angezeigt. Der Seitentitel wird natürlcih auch gesetzt.
                echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'data' => $data,]);
            }
        } else {

            // Bei einem GET Aufruf, werden alle Elemente des "data" Array auf nichts zurückgesetzt.
            $data = [
                'vorname' => '',
                'vorname_error' => '',
                'mittelname' => '',
                'mittelname_error' => '',
                'nachname' => '',
                'nachname_error' => '',
                'jobtitel' => '',
                'jobtitel_error' => '',
                'personalnummer' => '',
                'eintrittdatum' => '',
                'eintrittdatum_error' => '',
                'neuerlaptop' => '',
                'neueshandy' => '',
                'neuestelefon' => '',
                'winuser' => '',
                'sapuser' => '',
                'bemerkungenhr' => '',
            ];

            // Bei einem GET Aufruf wird die "erstellen" View standartmässig mit einem Webseitentitel gelanden.
            echo $this->twig->render('erstellen/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'data' => $data]);
        }
    }
}
