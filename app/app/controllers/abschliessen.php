<?php

class Abschliessen extends Controller
{
    public function index($name = '')
    {
        // Wird ausgeführt, wenn keiner angemeldet ist
        if (!isset($_SESSION['user_id'])) {

            // Variable wird auf true gesetzt, damit das Popup Fenster angezeigt wird.
            $nichteingeloggt = true;
            echo $this->twig->render('user/login.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'nichteingeloggt' => $nichteingeloggt]);
        } else {
            // Eingeloggt

            // Haben wir keine Berechtgung?
            if (!in_array("vorgesetzter", $_SESSION['user_roles'])) {

                // Variable wird auf true gesetzt, damit das Popup Fenster angezeigt wird.
                $keineberechtigung = true;
                echo $this->twig->render('home/index.twig.html', ['title' => "Eintritt erstellen", 'urlroot' => URLROOT, 'keineberechtigung' => $keineberechtigung]);
            } else {
                // Wir sind berechtigt

                // Falls der Aufruf auf die Webseite einen POST Request wäre, würde der untere Code ausgeführt werden.
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    // Holt sich die Liste von dem Vorgesetzen
                    $liste = $this->model('EintrittModel');
                    $listearray = $liste->getVorgesetzterList();

                    // Falls der Button "fertigabschliessen" aus der View "abschliessen" gedrückt wird, würde der untere Code ausgeführt werden.
                    if (isset($_POST['fertigabschliessen'])) {

                        // Der Wert des Buttons wird hier übergeben
                        $fertigabschliessen = $_POST['fertigabschliessen'];

                        // Schliesst den Eintritt komplett ab
                        $liste->VorgesetzterAbschliessen($fertigabschliessen);

                        // Holt sich die Admin Liste
                        $listearray = $liste->getAdminList();

                        // Falls es einen Error geben sollte wird das else Ausgegeben
                        if ($liste == 1) {
                            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt wurde erfolgreich abgeschlossen", 'urlroot' => URLROOT, 'data' => $listearray, 'eintritterstellt' => 1]);
                        } else {
                            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt konnte nicht abgeschlossen werden", 'urlroot' => URLROOT, 'data' => $listearray, 'eintritterstellt' => 2]);
                        }
                    } else {

                        // Die Personalnummer wird hier über den Button übergeben
                        $uebgergebenepersonalnummer2 = $_POST['abschliessen'];

                        // Holt sich den einzelnen Datensatz mithilfe der Personalnummer
                        $listearray = $liste->getEinzelnerDatensatz($uebgergebenepersonalnummer2);

                        // Kürtzt den geholten Array, damit er einfach verwendet werden kann 
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

                        ];

                        // Rendert die View "abschliessen" mit einem Seitentitel.
                        echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data]);
                    }
                } else {

                    // Holt sich die Liste für den Vorgesetzen
                    $liste = $this->model('EintrittModel');
                    $data = $liste->getVorgesetzterList();

                    // Lädt die Liste für den Vorgesetzen mit der Liste von oben
                    echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data]);
                }
            }
        }
    }
}
