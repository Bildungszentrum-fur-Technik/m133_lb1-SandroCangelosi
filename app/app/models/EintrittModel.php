<?php

class EintrittModel extends BaseModel
{
    /*
    // HR
    private $personalnummer;
    private $vorname;
    private $nachname;
    private $mittelname;
    private $jobtitel;
    private $eintrittdatum;
    private $neuerlaptop;
    private $neueshandy;
    private $neuestelefon;
    private $winuser;
    private $sapuser;
    private $bemerkungenhr;

    // IT
    private $checkneuerlaptop;
    private $checkneueshandy;
    private $checkneuestelefon;
    private $checkwinuser;
    private $checksapuser;
    private $checkdrucker;
    private $bemerkungenit;

    // Vorgesetzter
    private $alleserledigt;
    */

    public function getAdminList()
    {
        $this->db->query("SELECT * FROM usereintritt");
        $results = $this->db->resultSet();

        return $results;
    }


    // Liste von Fake Pesonen
    public function getFakePersonList()
    {
        $data = [
            ['personalnummer' => '1', 'vorname' => 'Max', 'nachname' => 'Muster', 'mittelname' => 'Heinz', 'jobtitel' => 'Informatiker', 'eintrittdatum' => '01.01.1990', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen, es ist dringend', 'checkneuerlaptop' => true, 'checkneueshandy' => true, 'checkneuestelefon' => true, 'checkwinuser' => true, 'checksapuser' => true, 'checkdrucker' => true, 'bemerkungenit' => 'Alles perfekt erledigt', 'alleserledigt' => true, 'status' => '3'],
            ['personalnummer' => '2', 'vorname' => 'Gustav', 'nachname' => 'Amtor', 'mittelname' => '', 'jobtitel' => 'Schreiner', 'eintrittdatum' => '23.09.2021', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen, es ist dringend', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => 'erledigt', 'alleserledigt' => false, 'status' => '2'],
            ['personalnummer' => '3', 'vorname' => 'Peter', 'nachname' => 'Linch', 'mittelname' => 'Rafael', 'jobtitel' => 'Mechaniker', 'eintrittdatum' => '19.12.2005', 'neuerlaptop' => false, 'neueshandy' => false, 'neuestelefon' => false, 'winuser' => false, 'sapuser' => false, 'bemerkungenhr' => 'Schnell machen bitte', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => '', 'alleserledigt' => false, 'status' => '1'],
            ['personalnummer' => '2', 'vorname' => 'Christoph', 'nachname' => 'Meier', 'mittelname' => '', 'jobtitel' => 'Vorgesetzter', 'eintrittdatum' => '23.09.2011', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen, es ist dringend', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => '', 'alleserledigt' => false, 'status' => '2'],
            ['personalnummer' => '3', 'vorname' => 'Michael', 'nachname' => 'Xing', 'mittelname' => '', 'jobtitel' => 'Pfleger', 'eintrittdatum' => '19.12.2015', 'neuerlaptop' => false, 'neueshandy' => false, 'neuestelefon' => false, 'winuser' => false, 'sapuser' => false, 'bemerkungenhr' => '', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => '', 'alleserledigt' => false, 'status' => '1'],
            ['personalnummer' => '4', 'vorname' => 'Jordan', 'nachname' => 'Belfort', 'mittelname' => '', 'jobtitel' => 'Anlagebreater', 'eintrittdatum' => '11.04.2020', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => false, 'winuser' => true, 'sapuser' => false, 'bemerkungenhr' => '', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => 'Bitte löschen, Schreibfehler', 'alleserledigt' => false, 'status' => '4'],

        ];

        return $data;
    }

    // Liste von einem einzelnen Datensatz von einer Person
    public function getFakeSingleDataSet()
    {
        $data = [
            ['personalnummer' => '1', 'vorname' => 'Sandro', 'nachname' => 'Cangelosi', 'mittelname' => 'Fritz', 'jobtitel' => 'Informatiker', 'eintrittdatum' => '01.01.1990', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen', 'checkneuerlaptop' => true, 'checkneueshandy' => true, 'checkneuestelefon' => true, 'checkwinuser' => true, 'checksapuser' => true, 'checkdrucker' => true, 'bemerkungenit' => 'Alles perfekt erledigt', 'alleserledigt' => true, 'status' => '3'],

        ];

        return $data;
    }
}
