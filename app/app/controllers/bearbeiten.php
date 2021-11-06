<?php

class Bearbeiten extends Controller
{
    public function index($name = '')
    {
        /*
        $user = $this->model('User');
        $user->name = $name;
        */

        echo $this->twig->render('bearbeiten/index.twig.html', ['title' => "Eintritts Checkliste bearbeiten"] );                
        //echo $this->twig->render('base/layout.twig.html', ['title' => "Titel Page"] );
    }
}