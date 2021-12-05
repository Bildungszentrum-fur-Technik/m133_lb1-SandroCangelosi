<?php

class Listeit extends Controller
{
    public function index($name = '')
    {
        // Holt sich die Fake Personen Liste aus dem Model. Damit diese auf der Liste angezeigt werden können.
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getBearbeitenList();

        // Wenn der Button "bearbeiten" geklickt wird, dann wird das if aktiviert.
        if (isset($_POST['bearbeiten'])) {
            
            $uebergabepersonalnummer = $_POST['bearbeiten'];

            //echo $uebergabepersonalnummer;
            $listearray = $liste->getEinzelnerDatensatz($uebergabepersonalnummer);
            $listearrayob1 = $listearray[0];
            
            $vorname = $listearrayob1['vorname'];
            $nachname = $listearrayob1['nachname'];
            $mittelname = $listearrayob1['mittelname'];
            $jobtitel = $listearrayob1['jobtitel'];
            $personalnummer = $listearrayob1['personalnummer'];
            $eintrittdatum = $listearrayob1['eintrittdatum'];
            $neuerlaptop = $listearrayob1['neuerlaptop'];
            $neueshandy = $listearrayob1['neueshandy'];
            $neuestelefon = $listearrayob1['neuestelefon'];
            $winuser = $listearrayob1['winuser'];
            $sapuser = $listearrayob1['sapuser'];
            $bemerkungenhr = $listearrayob1['bemerkungenhr'];



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

            
                

            // Rendert die View "bearbeiten" und setzt den Webseitentitel auf "Eintritt bearbeiten".
            echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $data]);
        } else {

            /* Rendert standarmässig die Liste für die IT (View: "listeit"). Mit einem Webseitentitel und mit Fakedaten. 
            Wenn auf den Header geklickt wird, wird die Liste angezeigt.*/
            echo $this->twig->render('listeit/index.twig.html', ['title' => "Übersicht Eintritte IT", 'urlroot' => URLROOT, 'data' => $listearray]);
        }
    }
}
