<?php

class Abschliessen extends Controller
{
    public function index($name = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $alleserledigt = trim(
                filter_input(INPUT_POST, 'alleserledigt', FILTER_UNSAFE_RAW)
            );

            $data = [
                'alleserledigt' => $alleserledigt,    // Form-Feld-Daten
            ];

            
            if (isset($_POST['abschliessen'])) {

                //$data['alleserledigt'] = 'true';
                //die(var_dump($data));
                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data] ); 

            } else {

                echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data] ); 

            }

        }else{

            $data = [
                'alleserledigt' => $alleserledigt,    // Form-Feld-Daten    
            ];

            echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen", 'urlroot' => URLROOT, 'data' => $data] ); 
        }         
          
    }
}