<?php

class Listevorgesetzter extends Controller
{
    public function index($name = '')
    {





        if (isset($_POST['loeschen'])) {


            $liste = $this->model('EintrittModel');
            $listearray = $liste->getFakeSingleDataSet();

            $listekurz = $listearray[0];

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


            $data = [
                'vorname' => $vorname,          // Form-Feld-Daten
                'mittelname' => $mittelname,    // Form-Feld-Daten
                'nachname' => $nachname,        // Form-Feld-Daten
                'jobtitel' => $jobtitel,        // Form-Feld-Daten
                'personalnummer' => $personalnummer,  // Form-Feld-Daten
                'eintrittdatum' => $eintrittdatum,    // Form-Feld-Daten
                'neuerlaptop' => $neuerlaptop,        // Form-Feld-Daten
                'neueshandy' => $neueshandy,          // Form-Feld-Daten
                'neuestelefon' => $neuestelefon,      // Form-Feld-Daten
                'winuser' => $winuser,                // Form-Feld-Daten
                'sapuser' => $sapuser,                // Form-Feld-Daten
                'bemerkungenhr' => $bemerkungenhr,    // Form-Feld-Daten
                'status' => '5',    // Form-Feld-Daten

            ];

            die(var_dump($data));
            
        } else {

            if (isset($_POST['abschliessen'])) {

                $liste = $this->model('EintrittModel');
                $listearray = $liste->getFakeSingleDataSet();

                $listekurz = $listearray[0];

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
                /*$checkneuerlaptop = $checkneuerlaptop['checkneuerlaptop'];
                $checkneueshandy = $checkneueshandy['checkneueshandy'];
                $checkneuestelefon = $checkneuestelefon['checkneuestelefon'];
                $checkwinuser = $checkwinuser['checkwinuser'];
                $checksapuser = $checksapuser['checksapuser'];
                $checkdrucker = $checkdrucker['checkdrucker'];
                $checkbemerkungenit = $checkbemerkungenit['checkbemerkungenit'];
                $alleserledigt = $alleserledigt['alleserledigt'];
                */
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
                    /*'checkneuerlaptop' => $checkneuerlaptop,
                    'checkneueshandy' => $checkneueshandy,
                    'checkneuestelefon' => $checkneuestelefon,
                    'checkwinuser' => $checkwinuser,
                    'checksapuser' => $checksapuser,
                    'checkdrucker' => $checkdrucker,
                    'bemerkungenit' => $checkbemerkungenit,
                    'alleserledigt' => $alleserledigt,
                    'status' => '3',*/

                ];

                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $data]);
            } else {
                
                $liste = $this->model('EintrittModel');
                $listearray = $liste->getFakeMenueDataArray();

                echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearray]);
            }
        }
    }
}
