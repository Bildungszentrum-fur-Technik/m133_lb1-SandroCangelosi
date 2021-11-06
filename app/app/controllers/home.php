<?php

class Home extends Controller
{
    public function index($name = '')
    {
        /*
        $user = $this->model('User');
        $user->name = $name;
        */

        echo $this->twig->render('home/index.twig.html', ['title' => "Home / Index"] );                
        //echo $this->twig->render('base/layout.twig.html', ['title' => "Titel Page"] );
    }
}