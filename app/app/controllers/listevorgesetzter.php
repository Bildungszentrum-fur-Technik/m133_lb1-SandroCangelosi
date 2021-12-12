<?php

class Listevorgesetzter extends Controller
{
    public function index($name = '')
    {
        // Holt sich vin dem EIntrittModel den einzelnen Datensatz. Wird unten für beide ifs verwendet.
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getVorgesetzterList();

        // Kürtzt den Array, damit die Werte ausgelesen werden können.
        $listekurz = $listearray[0];

        // Falls der Button mit dem Name "loeschen" von der View "listevorgesetzter" gedrückt wird, dann wird der untere Code ausgeführt.
        if (isset($_POST['loeschen'])) {

            // Die Personalnummer wird in einer Variable gespeichert
            $uebgergebenepersonalnummer = $_POST['loeschen'];

            // Löscht den Benutzer mit der übergebenen Personalnummer
            $liste->VorgesetzterLoeschen($uebgergebenepersonalnummer);

            // Holt sich jetzt die Liste für den Vorgesetzten.
            $listearray = $liste->getVorgesetzterList();

            // Falls das löschen erfolreich war wird der obere Code ausgeführt
            if ($liste == 1) {
                echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt konnte erfolgreich gelöscht werden", 'urlroot' => URLROOT, 'data' => $listearray, 'eintritterstellt' => 1]);
            } else {
                echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt konnte nicht gelöscht werden", 'urlroot' => URLROOT, 'data' => $listearray, 'eintritterstellt' => 2]);
            }

            // Falls der Button "loeschen" nicht gedrückt wird, wird der Coder hier unten ausgeführt.    
        } else {

            // Falls der Button "abschliessen" gedrückt wird, wird der Code hier unten ausgeführt.
            if (isset($_POST['abschliessen'])) {

                // Die Personalnummer wird hier in einer Variable gespeichert
                $uebergabepersonalnummer = $_POST['abschliessen'];

                // Ein einzelner Datensatz wird mit der Personalnummer geholt
                $listearray = $liste->getEinzelnerDatensatz($uebergabepersonalnummer);
                $listearraykurz = $listearray[0];

                // Rendert die View "abschliessen" mit dem Titel "Eintritt Liste Vorgesetzter". Der Datensatz von oben wird auch zum Anzeigen übergeben.
                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearraykurz]);
            } else {

                // Holt sich die Liste
                $liste = $this->model('EintrittModel');
                $listearray = $liste->getAdminList();

                // Rendert die Liste mit den Personen auf die "listevorgesetzter" View.
                echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearray]);
            }
        }
    }
}
