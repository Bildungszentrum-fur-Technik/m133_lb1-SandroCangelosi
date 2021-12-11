<?php

class Abschliessen extends Controller
{
    public function index($name = '')
    {
        // Falls der Aufruf auf die Webseite einen POST Request wäre, würde der untere Code ausgeführt werden.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            
            
            //die(var_dump($data));
            $liste = $this->model('EintrittModel');
            $listearray = $liste->getVorgesetzterList();

            

            

            // Falls der Button "fertigabschliessen" aus der View "abschliessen" gedrückt wird, würde der untere Code ausgeführt werden.
            if (isset($_POST['fertigabschliessen'])) {

                //echo $uebgergebenepersonalnummer2;

                

                // Setzt Alleserledigt auf "true" sowie den Status auf "3". 
                // Das wird für die View gemacht, damit die Daten richtig angezeigt werden. Der EIntritt wird auf geschlossen gestellt.
                //$data['alleserledigt'] = 'true';
                //$data['status'] = '3';
                //$test ="aaaaaaaaaaaaaaaaaaa";
                //die(var_dump($test));
                $fertigabschliessen = $_POST['fertigabschliessen'];
                $liste->VorgesetzterAbschliessen($fertigabschliessen);
                $listearray = $liste->getAdminList();

                if($liste == 1){

                    echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt wurde erfolgreich abgeschlossen", 'urlroot' => URLROOT, 'data' => $listearray, 'eintritterstellt'=>1]);
                }else{
                    echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt konnte nicht abgeschlossen werden", 'urlroot' => URLROOT, 'data' => $listearray ,'eintritterstellt'=>2]);
                    
                }
                

                // Zeigt den Datensatz an
                //die(var_dump($listearray));
                
            } else {

                // Holt sich einen einzelnen Datensatz aus dem Model "EintrittModel".
            

            $uebgergebenepersonalnummer2 = $_POST['abschliessen'];

            // die(var_dump($uebgergebenepersonalnummer2));
            
            $listearray = $liste->getEinzelnerDatensatz($uebgergebenepersonalnummer2);
            $listearraykurz = $listearray[0];

            //die(var_dump($uebgergebenepersonalnummer2));
            // Kürtzt den oberen Datensatz, damit die Daten ausgelesen werden können.
            $listekurz = $listearraykurz;

            //die(var_dump($listekurz));

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
                // die(var_dump($fertigabschliessen));
                //die(var_dump($_POST['fertigabschliessen']));

                // Rendert die View "abschliessen" mit einem Seitentitel und den obenere Fake Daten.
                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data]);
            }
        } else {

            // Die Personen Liste wird aus dem Model "EintrittModel" geholt, damit die Liste für den Vorgesetzten Daten enhält.
            $liste = $this->model('EintrittModel');
            $data = $liste->getVorgesetzterList();

            // Zeigt die Liste für den Vorgesetzten an (listevorgesetzter) mit Fake Daten und einem Webseitentitel.
            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data]);
        }
    }
}
