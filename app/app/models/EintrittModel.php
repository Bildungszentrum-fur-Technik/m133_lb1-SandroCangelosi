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
    /* private $vorname;
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
    private $checkactivedirectory;
    private $checksap;
    private $checkdrucker;
    private $bemerkungenit;

    // Vorgesetzter
    private $alleserledigt;
    */

    
    /**
     * TestMethode die einfach nur Fake-Daten liefert, solange man noch keine DB hat
     *
     * @return $data : Array aus Fake-Menues
     */
    public function getFakeMenueDataArray()
    {
        $data = [
            ['personalnummer' => '1']
            // ['personalnummer' => '1', 'vorname' => 'Peter', 'nachname' => 'Weber', 'mittelname' => '', 'jobtitel' => 'Informatiker', 'eintrittdatum' => '01.01.1990', 'neuerlaptop' => true, 'neueshandy' => true, 'neuestelefon' => true, 'winuser' => true, 'sapuser' => true, 'bemerkungenhr' => 'Bitte schnell machen'],
            // ['personalnummer' => '2', 'vorname' => 'Heinz', 'nachname' => 'Yung', 'mittelname' => 'Samuel', 'jobtitel' => 'Schneider', 'eintrittdatum' => '23.07.1995', 'neuerlaptop' => false, 'neueshandy' => true, 'neuestelefon' => false, 'winuser' => false, 'sapuser' => false, 'bemerkungenhr' => ''],
            // ['personalnummer' => '3', 'vorname' => 'Gisela', 'nachname' => 'Deutsch', 'mittelname' => '', 'jobtitel' => 'Schreiner', 'eintrittdatum' => '13.02.2003', 'neuerlaptop' => false, 'neueshandy' => false, 'neuestelefon' => false, 'winuser' => false, 'sapuser' => false, 'bemerkungenhr' => 'Bitte schnell machen'],
        ];

        return $data;
    }

}