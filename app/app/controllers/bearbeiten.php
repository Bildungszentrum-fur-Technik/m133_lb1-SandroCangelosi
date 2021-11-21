<?php

class Bearbeiten extends Controller
{
    public function index($name = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
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
        $status = $listekurz['status'];


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
            'status' => $status,    // Form-Feld-Daten

        ];





        if (isset($_POST['bemerkungenit'])) {

            die(var_dump($data));

        } else {

            echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritts Checkliste bearbeiten", 'urlroot' => URLROOT, 'data' => $data] );   

        }




        
         
        //die(var_dump($data));

        }else{
        
       // Aufruf per URL
       $liste = $this->model('EintrittModel');
       $data = $liste->getFakeMenueDataArray();

        echo $this->twig->render('listeit/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $data] );    

        }
    }
}