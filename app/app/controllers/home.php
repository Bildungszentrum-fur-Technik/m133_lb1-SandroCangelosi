<?php

class Home extends Controller
{
    public function index($name = '')
    {

        // Wenn der "localhost:8000" aufgerufen wird, wird die View "home" mit dem Seitentitel "Home" angezeigt.
        echo $this->twig->render('home/index.twig.html', ['title' => "Home"] );                
    }
}