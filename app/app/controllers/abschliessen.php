<?php

class Abschliessen extends Controller
{
    public function index($name = '')
    {
        // Falls der Aufruf auf die Webseite einen POST Request wäre, würde der untere Code ausgeführt werden.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Holt sich einen einzelnen Datensatz aus dem Model "EintrittModel".
            $liste = $this->model('EintrittModel');
            $listearray = $liste->getFakeSingleDataSet();

            // Kürtzt den oberen Datensatz, damit die Daten ausgelesen werden können.
            $listekurz = $listearray[0];

            // Setzt lokale Variablen aus dem Model.
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
            $checkneuerlaptop = $listekurz['checkneuerlaptop'];
            $checkneueshandy = $listekurz['checkneueshandy'];
            $checkneuestelefon = $listekurz['checkneuestelefon'];
            $checkwinuser = $listekurz['checkwinuser'];
            $checksapuser = $listekurz['checksapuser'];
            $checkdrucker = $listekurz['checkdrucker'];
            $bemerkungenit = $listekurz['bemerkungenit'];
            $alleserledigt = $listekurz['alleserledigt'];
            $status = $listekurz['status'];

            // Speichert die lokalen Variablen in einen schön sortierten Array.
            $data = [
                'vorname' => $vorname,
                'nachname' => $nachname,
                'mittelname' => $mittelname,
                'jobtitel' => $jobtitel,
                'personalnummer' => $personalnummer,
                'eintrittdatum' => $eintrittdatum,
                'neuerlaptop' => $neuerlaptop,
                'neueshandy' => $neueshandy,
                'neuestelefon' => $neuestelefon,
                'winuser' => $winuser,
                'sapuser' => $sapuser,
                'bemerkungenhr' => $bemerkungenhr,
                'checkneuerlaptop' => $checkneuerlaptop,
                'checkneueshandy' => $checkneueshandy,
                'checkneuestelefon' => $checkneuestelefon,
                'checkwinuser' => $checkwinuser,
                'checksapuser' => $checksapuser,
                'checkdrucker' => $checkdrucker,
                'bemerkungenit' => $bemerkungenit,
                'alleserledigt' => $alleserledigt,
                'status' => $status,

            ];

            // Falls der Button "fertigabschliessen" aus der View "abschliessen" gedrückt wird, würde der untere Code ausgeführt werden.
            if (isset($_POST['fertigabschliessen'])) {

                // Setzt Alleserledigt auf "true" sowie den Status auf "3". 
                // Das wird für die View gemacht, damit die Daten richtig angezeigt werden. Der EIntritt wird auf geschlossen gestellt.
                $data['alleserledigt'] = 'true';
                $data['status'] = '3';

                // Zeigt den Datensatz an
                die(var_dump($data));
            } else {

                // Rendert die View "abschliessen" mit einem Seitentitel und den obenere Fake Daten.
                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data]);
            }
        } else {

            // Die Personen Liste wird aus dem Model "EintrittModel" geholt, damit die Liste für den Vorgesetzten Daten enhält.
            $liste = $this->model('EintrittModel');
            $data = $liste->getFakePersonList();

            // Zeigt die Liste für den Vorgesetzten an (listevorgesetzter) mit Fake Daten und einem Webseitentitel.
            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data]);
        }
    }
}
