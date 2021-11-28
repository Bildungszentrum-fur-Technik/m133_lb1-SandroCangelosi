<?php

// DB-Params (die Werte sind im Docker-Compose definiert)
define('DB_HOST', 'mysql');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'usereintritt');


// Unsere APP-Root 
define('APPROOT', dirname(dirname(__FILE__)));

// Unsere URL-Root
define('URLROOT', 'http://localhost:8000');

