<?php

// DB-Params (die Werte sind im Docker-Compose definiert)
define('DB_HOST', 'mysql');
define('DB_USER', 'mensaUser');
define('DB_PASS', 'userpass');
define('DB_NAME', 'mensa');


// Unsere APP-Root 
define('APPROOT', dirname(dirname(__FILE__)));

// Unsere URL-Root
define('URLROOT', 'http://localhost:8000');

