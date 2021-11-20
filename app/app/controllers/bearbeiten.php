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



        $data = $listearray;

        /*$data = [
            'checkneuerlaptop' => $checkneuerlaptop,    // Form-Feld-Daten
            'checkneueshandy' => $checkneueshandy,        // Form-Feld-Daten
            'checkneuestelefon' => $checkneuestelefon,          // Form-Feld-Daten
            'checkwinuser' => $checkwinuser,      // Form-Feld-Daten
            'checksapuser' => $checksapuser,                // Form-Feld-Daten
            'checkdrucker' => $checkdrucker,                // Form-Feld-Daten
            'bemerkungenit' => $bemerkungenit,    // Form-Feld-Daten

        ];*/
        
        echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritts Checkliste bearbeiten", 'urlroot' => URLROOT, 'data' => $data] );    
        //die(var_dump($data));

        }else{
        
        $data = [
            'checkneuerlaptop' => '',    // Form-Feld-Daten
            'checkneueshandy' => '',        // Form-Feld-Daten
            'checkneuestelefon' => '',          // Form-Feld-Daten
            'checkwinuser' => '',      // Form-Feld-Daten
            'checksapuser' => '',                // Form-Feld-Daten
            'checkdrucker' => '',                // Form-Feld-Daten
            'bemerkungenit' => '',    // Form-Feld-Daten

        ];           

        echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritt bearbeiten", 'urlroot' => URLROOT, 'data' => $data] );    

        }
    }
}