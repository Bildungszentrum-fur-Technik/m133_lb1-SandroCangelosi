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

    public function getBearbeitenList()
    {
        $this->db->query("SELECT * FROM `usereintritt` WHERE `eintrittstatus` = '1'");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getVorgesetzterList()
    {
        $this->db->query("SELECT * FROM `usereintritt` WHERE `eintrittstatus` = '2'");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getEinzelnerDatensatz($persnr){
        $this->db->query("SELECT * FROM `usereintritt` WHERE `personalnummer` =  $persnr");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getUpdateDBchecks($persnr, $checkneuerlaptop, $checkneueshandy, $checkneuestelefon, $checkwinuser, $checksapuser, $checkdrucker, $bemerkungenit){
        
        
        if($checkneuerlaptop == NULL){
            $checkneuerlaptop = 0;
        }

        if($checkneueshandy == NULL){
            $checkneueshandy = 0;
        }

        if($checkneuestelefon == NULL){
            $checkneuestelefon = 0;
        }

        if($checkwinuser == NULL){
            $checkwinuser = 0;
        }

        if($checksapuser == NULL){
            $checksapuser = 0;
        }

        if($checkdrucker == NULL){
            $checkdrucker = 0;
        }
        


        $this->db->query("UPDATE usereintritt SET `checkneuerlaptop` = $checkneuerlaptop, `checkneueshandy` = $checkneueshandy, `checkneuestelefon`= $checkneuestelefon, `checkwinuser` = $checkwinuser, `checksapuser` = $checksapuser, `checkdrucker` = $checkdrucker, `bemerkungenit` = '$bemerkungenit', `eintrittstatus` = 2  WHERE `personalnummer` = $persnr");
        
        $this->db->execute();
        
        /*$this->db->query("UPDATE usereintritt
        SET checkneuerlaptop = $checkneuerlaptop, checkneueshandy = $checkneueshandy, checkneuestelefon = $checkneuestelefon, checkwinuser = $checkwinuser, checksapuser = $checksapuser, checkdrucker = $checkdrucker, bemerkungenit = $bemerkungenit
        WHERE `personalnummer` = $persnr; ");
        */
    }

    public function DateninDBschreibenUserEintritt($data)
    {
        $this->db->query("INSERT INTO usereintritt(vorname, mittelname, nachname, jobtitel, eintrittdatum, neuerlaptop, neueshandy, neuestelefon, winuser, sapuser, bemerkungenhr, eintrittstatus) 
        VALUES (:vorname, :mittelname , :nachname, :jobtitel, :eintrittdatum, :neuerlaptop, :neueshandy, :neuestelefon, :winuser, :sapuser, :bemerkungenhr, :eintrittstatus)");
        

        // Standartwert von allen Boleans von Null auf 0 setzen. Wenn der Wert nicht auf 1 gesetzt ist. 
        if($data['neuerlaptop'] == NULL){
            $data['neuerlaptop'] = 0;
        }

        if($data['neueshandy'] == NULL){
            $data['neueshandy'] = 0;
        }

        if($data['neuestelefon'] == NULL){
            $data['neuestelefon'] = 0;
        }

        if($data['winuser'] == NULL){
            $data['winuser'] = 0;
        }

        if($data['sapuser'] == NULL){
            $data['sapuser'] = 0;
        }
        

        $this->db->bind(':vorname',$data['vorname']);
        $this->db->bind(':mittelname',$data['mittelname']);
        $this->db->bind(':nachname',$data['nachname']);
        $this->db->bind(':jobtitel',$data['jobtitel']);
        $this->db->bind(':eintrittdatum',$data['eintrittdatum']);
        $this->db->bind(':neuerlaptop',$data['neuerlaptop']);
        $this->db->bind(':neueshandy',$data['neueshandy']);
        $this->db->bind(':neuestelefon',$data['neuestelefon']);
        $this->db->bind(':winuser',$data['winuser']);
        $this->db->bind(':sapuser',$data['sapuser']);
        $this->db->bind(':bemerkungenhr',$data['bemerkungenhr']);

        $this->db->bind(':eintrittstatus',1); // Neuer Eintritt, Der Status wird immer automatisch auf 1 gesetzt

        return $this->db->execute(); // Gibt True im Erfolgsfall, False im Fehlerfall
    }

    public function VorgesetzterLoeschen($persnr)
    {
        $this->db->query("UPDATE usereintritt SET  `eintrittstatus` = 4 WHERE `personalnummer` = $persnr");

        $this->db->execute();
    }

    public function VorgesetzterAbschliessen($persnr)
    {
        $this->db->query("UPDATE usereintritt SET  `eintrittstatus` = 3, `alleserledigt` = 1 WHERE `personalnummer` = $persnr");

        $this->db->execute();
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
