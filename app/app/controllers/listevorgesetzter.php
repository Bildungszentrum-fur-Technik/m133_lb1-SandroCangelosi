<?php

class Listevorgesetzter extends Controller
{
    public function index($name = '')
    {
        $liste = $this->model('EintrittModel');
        $listearray = $liste->getFakeMenueDataArray();
        
        

        if (isset($_POST['abschliessen'])) {
            
            echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen" ] );  

        } else {

            echo $this->twig->render('listevorgesetzter/index.twig.html', ['title' => "Eintritt Liste Vorgesetzter", 'urlroot' => URLROOT, 'data' => $listearray]);

        }
    }
}