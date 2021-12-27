<?php

class Bearbeiten extends Controller
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
                // Wenn die Seite mit einem POST Request Aufgerufen wurde, wird die View gelanden.
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    // Die Eingabe der Checks wird eingelesen.
                    $checkneuerlaptop = trim(
                        filter_input(INPUT_POST, 'checkneuerlaptop', FILTER_UNSAFE_RAW)
                    );

                    $checkneueshandy = trim(
                        filter_input(INPUT_POST, 'checkneueshandy', FILTER_UNSAFE_RAW)
                    );

                    $checkneuestelefon = trim(
                        filter_input(INPUT_POST, 'checkneuestelefon', FILTER_UNSAFE_RAW)
                    );

                    $checkwinuser = trim(
                        filter_input(INPUT_POST, 'checkwinuser', FILTER_UNSAFE_RAW)
                    );

                    $checksapuser = trim(
                        filter_input(INPUT_POST, 'checksapuser', FILTER_UNSAFE_RAW)
                    );

                    $checkdrucker = trim(
                        filter_input(INPUT_POST, 'checkdrucker', FILTER_UNSAFE_RAW)
                    );

                    $bemerkungenit = trim(
                        filter_input(INPUT_POST, 'bemerkungenit', FILTER_UNSAFE_RAW)
                    );

                    // Holt sich die Liste für das bearbeiten
                    $liste = $this->model('EintrittModel');
                    $data = $liste->getBearbeitenList();

                    // Falls der Button "aktualisieren" gedrückt wird, wird der untere Code ausgeführt.
                    if (isset($_POST['aktualisieren'])) {

                        // Holt sich die übergebene Personalnummer
                        $uebgergebenepersonalnummer = $_POST['aktualisieren'];

                        // Führt den Update aus
                        $errormessage = $liste->getUpdateDBchecks($uebgergebenepersonalnummer, $checkneuerlaptop, $checkneueshandy, $checkneuestelefon, $checkwinuser, $checksapuser, $checkdrucker, $bemerkungenit);

                        // Holt sich die Lsite des Bearbeiters
                        $data = $liste->getBearbeitenList();

                        // Falls es keinen Fehler gegeben hat wird der obere Code ausgeführt. Eine Fehler oder erfolgreiche Meldung wird erscheinen
                        if (!$errormessage == NULL) {
                            echo $this->twig->render('listeit/index.twig.html', ['title' => "Eintritt wurde erfolgreich bearbeitet", 'urlroot' => URLROOT, 'data' => $data, 'eintritterstellt' => 1]);
                        } else {
                            echo $this->twig->render('listeit/index.twig.html', ['title' => "Eintritt konnte nicht bearbeitet werden", 'urlroot' => URLROOT, 'data' => $data, 'eintritterstellt' => 2]);
                        }
                    } else {
                        // Die Seite "bearbeiten" wird geladen
                        echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritts Checkliste bearbeiten", 'urlroot' => URLROOT, 'data' => $data]);
                    }

                    // Fall der Webseitenaufruf eine GET Request wäre, dann würde der untere Code ausgeführt werden.
                } else {

                    // Holt sich die Liste mit den Personen aus dem Model "EintrittModel".
                    $liste = $this->model('EintrittModel');
                    $listearray = $liste->getAdminList();

                    // Rendert die View "listeit" mit einem Webseitentitel.
                    echo $this->twig->render('listeit/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $listearray]);
                }
            }
        }
    }
}
