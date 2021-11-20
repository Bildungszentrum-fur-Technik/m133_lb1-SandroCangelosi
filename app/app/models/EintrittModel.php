<?php

/**
 * Definition der MenueModel Attribute
 * 
 * id -> ID des Menü, wird referenziert werden von den Bestellungen
 * title -> Titel des Menüs
 * preis -> Preis, float
 * description -> Beschreibung
 * active -> steht das Menü aktuell zur Auswahl
 */
class EintrittModel extends BaseModel
{

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
    

    
    /**
     * TestMethode die einfach nur Fake-Daten liefert, solange man noch keine DB hat
     *
     * @return $data : Array aus Fake-Menues
     */
    public function getFakeMenueDataArray()
    {
        $data = [
            ['personalnummer' => '1', 'vorname' => 'Max', 'nachname' => 'Muster', 'mittelname' => 'Heinz', 'jobtitel' => 'Informatiker', 'eintrittdatum' => '01.01.1990', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen, es ist dringend', 'checkneuerlaptop' => true, 'checkneueshandy' => true, 'checkneuestelefon' => true, 'checkwinuser' => true, 'checksapuser' => true, 'checkdrucker' => true, 'bemerkungenit' => 'Alles perfekt erledigt', 'alleserledigt' => true, 'status' => '3'],
            ['personalnummer' => '2', 'vorname' => 'Gustav', 'nachname' => 'Amtor', 'mittelname' => '', 'jobtitel' => 'Schreiner', 'eintrittdatum' => '23.09.2021', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen, es ist dringend', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => '', 'alleserledigt' => false, 'status' => '2'],
            ['personalnummer' => '3', 'vorname' => 'Peter', 'nachname' => 'Linch', 'mittelname' => '', 'jobtitel' => 'Mechaniker', 'eintrittdatum' => '19.12.2005', 'neuerlaptop' => false, 'neueshandy' => false, 'neuestelefon' => false, 'winuser' => false, 'sapuser' => false, 'bemerkungenhr' => '', 'checkneuerlaptop' => false, 'checkneueshandy' => false, 'checkneuestelefon' => false, 'checkwinuser' => false, 'checksapuser' => false, 'checkdrucker' => false, 'bemerkungenit' => '', 'alleserledigt' => false, 'status' => '1'],

        ];

        return $data;
    }

}