<?php

class Erstellen extends Controller
{
    public function index($name = '')
    {
        /*
        $user = $this->model('User');
        $user->name = $name;
        */

        echo $this->twig->render('erstellen/index.twig.html', ['title' => "User erstellen"] );                
        //echo $this->twig->render('base/layout.twig.html', ['title' => "Titel Page"] );
    }
}