<?php

class Abschliessen extends Controller
{
    public function index($name = '')
    {
        /*
        $user = $this->model('User');
        $user->name = $name;
        */

        echo $this->twig->render('abschliessen/index.twig.html', ['title' => "Eintritt abschliessen"] );                
        //echo $this->twig->render('base/layout.twig.html', ['title' => "Titel Page"] );
    }
}