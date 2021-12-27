<?php

class Test extends Controller
{
    public function index($name = '')
    {

        $user = [
            'user_id' => $_SESSION['user_id'],
            'user_email' => $_SESSION['user_email'],
            'user_name' => $_SESSION['user_name'],
            'user_roles' => $_SESSION['user_roles'],
        ];

        // Wenn der "localhost:8000" aufgerufen wird, wird die View "home" mit dem Seitentitel "Home" angezeigt.
        echo $this->twig->render('test/index.twig.html', ['title' => "Test", 'urlroot' => URLROOT, 'user' => $user]);

     }
}
