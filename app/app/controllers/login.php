<?php

class Login extends Controller
{
    public function index($name = '')
    {
        // Verweist auf die Login View mit dem Browser Tab Titel "Login"  
        echo $this->twig->render('login/index.twig.html', ['title' => "Login"]);
    }
}
