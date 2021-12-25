<?php

class Home extends Controller
{
    public function index($name = '')
    {

        session_start();

        // Wenn der "localhost:8000" aufgerufen wird, wird die View "home" mit dem Seitentitel "Home" angezeigt.
        echo $this->twig->render('home/index.twig.html', ['title' => "Home"]);

        // Verweist auf die Login View mit dem Browser Tab Titel "Login"  
        
        // //Nicht vergessen
        // $name = $_POST['name'];
        
        // if(!isset($name) OR empty($name)) {
        // $name = "Gast";
        // }

        // //Session registrieren
        // $_SESSION['username'] = $name;
        
        // //Text ausgeben
        // echo "Hallo $name <br />
        // <a href=\"seite2.php\">Seite 2</a><br />
        // <a href=\"logout.php\">Logout</a>";
    }
}
