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

            $uebgergebenepersonalnummer = $_POST['loeschen'];

            $liste->VorgesetzterLoeschen($uebgergebenepersonalnummer);
            $listearray = $liste->getVorgesetzterList();

            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearray]);

            // Falls der Button "loeschen" nicht gedrückt wird, wird der Coder hier unten ausgeführt.    
        } else {

            // Falls der Button "abschliessen" gedrückt wird, wird der Code hier unten ausgeführt.
            if (isset($_POST['abschliessen'])) {
                
                
            
                $uebergabepersonalnummer = $_POST['abschliessen'];
        
                //echo $uebergabepersonalnummer;
                $listearray = $liste->getEinzelnerDatensatz($uebergabepersonalnummer);
                $listearraykurz = $listearray[0];
                    

                // Aus dem "listearraykurz" Array werden die Variablen geholt und gespeichert.
                $vorname = $listearraykurz['vorname'];
                $mittelname = $listearraykurz['mittelname'];
                $nachname = $listearraykurz['nachname'];
                $jobtitel = $listearraykurz['jobtitel'];
                $personalnummer = $listearraykurz['personalnummer'];
                $eintrittdatum = $listearraykurz['eintrittdatum'];
                $neuerlaptop = $listearraykurz['neuerlaptop'];
                $neueshandy = $listearraykurz['neueshandy'];
                $neuestelefon = $listearraykurz['neuestelefon'];
                $winuser = $listearraykurz['winuser'];
                $sapuser = $listearraykurz['sapuser'];
                $bemerkungenhr = $listearraykurz['bemerkungenhr'];
                $checkneuerlaptop = $listearraykurz['checkneuerlaptop'];
                $checkneueshandy = $listearraykurz['checkneueshandy'];
                $checkneuestelefon = $listearraykurz['checkneuestelefon'];
                $checkwinuser = $listearraykurz['checkwinuser'];
                $checksapuser = $listearraykurz['checksapuser'];
                $checkdrucker = $listearraykurz['checkdrucker'];
                $bemerkungenit = $listearraykurz['bemerkungenit'];
                $alleserledigt = $listearraykurz['alleserledigt'];
                $status = $listearraykurz['status'];


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

                //$liste->VorgesetzterAbschliessen($data);
                //$listearray = $liste->getAdminList();

                

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
