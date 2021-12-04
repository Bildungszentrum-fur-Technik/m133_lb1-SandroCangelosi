<?php

class Bearbeiten extends Controller
{
    public function index($name = '')
    {
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

            // Holt sich einen Fake Datensatz aus dem Model.
            
            /*$liste = $this->model('EintrittModel');
            $listearray = $liste->getFakeSingleDataSet();

            // Kürzt den Array, damit die Daten ausgelesen werden können.
            $listekurz = $listearray[0];

            // Setzt lokale Variablen, aus dem gekürtzten Array oben.
            $vorname = $listekurz['vorname'];
            $mittelname = $listekurz['mittelname'];
            $nachname = $listekurz['nachname'];
            $jobtitel = $listekurz['jobtitel'];
            $personalnummer = $listekurz['personalnummer'];
            $eintrittdatum = $listekurz['eintrittdatum'];
            $neuerlaptop = $listekurz['neuerlaptop'];
            $neueshandy = $listekurz['neueshandy'];
            $neuestelefon = $listekurz['neuestelefon'];
            $winuser = $listekurz['winuser'];
            $sapuser = $listekurz['sapuser'];
            $bemerkungenhr = $listekurz['bemerkungenhr'];
            $status = $listekurz['status'];
            */

            $liste = $this->model('EintrittModel');
            $data = $liste->getBearbeitenList();
            
            
            
            //die(var_dump($data));
            // Wenn der Button "bemerkungenit" gedrückt wird wird der Datensazu "data" angezeigt.
            /*if (isset($_POST['bemerkungenit'])) {

                // Zeigt den Datensatz an
                die(var_dump($data));
            } else {

                // Zeigt die View "bearbeiten" an, mit dem Seitentitel "Eintritts Checkliste bearbeiten".
                
            }*/
            echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritts Checkliste bearbeiten", 'urlroot' => URLROOT, 'data' => $data]);
            // Fall der Webseitenaufruf eine GET Request wäre, dann würde der untere Code ausgeführt werden.
        } else {

            // Holt sich die Liste mit den Personen aus dem Model "EintrittModel".
            $liste = $this->model('EintrittModel');
            $listearray = $liste->getAdminList();

            // Rendert die View "listeit" mit einem Webseitentitel. Mit den Fake Daten "data".
            echo $this->twig->render('listeit/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $listearray]);
        }
    }
}
