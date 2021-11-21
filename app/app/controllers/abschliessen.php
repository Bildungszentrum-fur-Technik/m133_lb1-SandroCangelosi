<?php

class Abschliessen extends Controller
{
    public function index($name = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            /*$alleserledigt = trim(
                filter_input(INPUT_POST, 'alleserledigt', FILTER_UNSAFE_RAW)
            );

            $data = [
                'alleserledigt' => $alleserledigt,    // Form-Feld-Daten
            ];*/

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
            $checkneuerlaptop = $listekurz['checkneuerlaptop'];
            $checkneueshandy = $listekurz['checkneueshandy'];
            $checkneuestelefon = $listekurz['checkneuestelefon'];
            $checkwinuser = $listekurz['checkwinuser'];
            $checksapuser = $listekurz['checksapuser'];
            $checkdrucker = $listekurz['checkdrucker'];
            $bemerkungenit = $listekurz['bemerkungenit'];
            $alleserledigt = $listekurz['alleserledigt'];
            $status = $listekurz['status'];
    
    
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

            
            if (isset($_POST['fertigabschliessen'])) {

                $data['alleserledigt'] = 'true';
                $data['status'] = '4';
                die(var_dump($data));
                

            } else {

                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data] ); 
                
            }

        }else{
            /*
            $data = [
                'alleserledigt' => $alleserledigt,    // Form-Feld-Daten    
            ];*/

            $liste = $this->model('EintrittModel');
            $data = $liste->getFakeMenueDataArray();
            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data] ); 

            
        }         
          
    }
}