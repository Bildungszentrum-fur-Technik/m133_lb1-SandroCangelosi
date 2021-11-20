<?php

class Login extends Controller
{
    public function index($name = '')
    {
        /*
        $user = $this->model('User');
        $user->name = $name;
        */

        echo $this->twig->render('login/index.twig.html', ['title' => "Login"] );                
    }
}