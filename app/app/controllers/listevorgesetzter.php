<?php

class Listevorgesetzter extends Controller
{
    public function index($name = '')
    {
        // Holt sich vin dem EIntrittModel den einzelnen Datensatz. Wird unten für beide ifs verwendet.
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getFakeSingleDataSet();

        // Kürtzt den Array, damit die Werte ausgelesen werden können.
        $listekurz = $listearray[0];

        // Falls der Button mit dem Name "loeschen" von der View "listevorgesetzter" gedrückt wird, dann wird der untere Code ausgeführt.
        if (isset($_POST['loeschen'])) {

            // Aus dem "listekurz" Array werden die Variablen geholt und gespeichert.
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

            // Die geholten Daten von oben werden hier in einen einzelnen Array verpackt. Die 4 im Status steht dafür, das der Eintritt gelöscht wird.
            $data = [
                'vorname' => $vorname,
                'mittelname' => $mittelname,
                'nachname' => $nachname,
                'jobtitel' => $jobtitel,
                'personalnummer' => $personalnummer,
                'eintrittdatum' => $eintrittdatum,
                'neuerlaptop' => $neuerlaptop,
                'neueshandy' => $neueshandy,
                'neuestelefon' => $neuestelefon,
                'winuser' => $winuser,
                'sapuser' => $sapuser,
                'bemerkungenhr' => $bemerkungenhr,
                'status' => '4',
            ];

            // Der Array von Oben wird hier mittel dump angezeigt. 
            die(var_dump($data));

            // Falls der Button "loeschen" nicht gedrückt wird, wird der Coder hier unten ausgeführt.    
        } else {

            // Falls der Button "abschliessen" gedrückt wird, wird der Code hier unten ausgeführt.
            if (isset($_POST['abschliessen'])) {

                // Aus dem "listekurz" Array werden die Variablen geholt und gespeichert.
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

                // Die geholten Daten von oben werden hier in einen einzelnen Array verpackt.
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
                ];

                // Rendert die View "abschliessen" mit dem Titel "Eintritt Liste Vorgesetzter". Der Datensatz von oben wird auch zum Anzeigen übergeben.
                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $data]);
            } else {

                // Holt sich die Liste von den Fake Personen.
                $liste = $this->model('EintrittModel');
                $listearray = $liste->getAdminList();

                // Rendert die Fake Personen auf die "listevorgesetzter" View.
                echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearray]);
            }
        }
    }
}
