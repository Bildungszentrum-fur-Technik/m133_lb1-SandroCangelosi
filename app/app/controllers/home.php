<?php

class Home extends Controller
{
    public function index($name = '')
    {
        
        // var_dump($_SESSION['user_id']);
        // var_dump($_SESSION['user_email']);
        // var_dump($_SESSION['user_name']);
        // die(var_dump($_SESSION['user_roles']));

        // Wenn der "localhost:8000" aufgerufen wird, wird die View "home" mit dem Seitentitel "Home" angezeigt.
        echo $this->twig->render('home/index.twig.html', ['title' => "Home"]);

     }
}
