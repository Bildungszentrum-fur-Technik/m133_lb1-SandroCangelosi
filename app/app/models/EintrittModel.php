<?php

class EintrittModel extends BaseModel
{
    // Liste für den Administrator
    public function getAdminList()
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("SELECT * FROM usereintritt");
        $results = $this->db->resultSet();

        return $results;
    }

    // Liste für die IT
    public function getBearbeitenList()
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("SELECT * FROM `usereintritt` WHERE `eintrittstatus` = '1'");
        $results = $this->db->resultSet();

        return $results;
    }

    // Liste für den Vorgesetzen
    public function getVorgesetzterList()
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("SELECT * FROM `usereintritt` WHERE `eintrittstatus` = '2'");
        $results = $this->db->resultSet();

        return $results;
    }

    // Holt sich einen einzelnen Datensazu mit der Personalnummer
    public function getEinzelnerDatensatz($persnr)
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("SELECT * FROM `usereintritt` WHERE `personalnummer` = :personalnummer");

        // Falls die rechte Variable gültig ist wird diese in einem Erfolgsfall an die linkt übergeben
        $this->db->bind(':personalnummer', $persnr);

        $results = $this->db->resultSet();

        return $results;
    }

    // Fügt neue Daten der Datenbank hinzu
    public function getUpdateDBchecks($persnr, $checkneuerlaptop, $checkneueshandy, $checkneuestelefon, $checkwinuser, $checksapuser, $checkdrucker, $bemerkungenit)
    {
        // Standartwert von allen Boleans von Null auf 0 setzen. Wenn der Wert nicht auf 1 gesetzt ist. 
        if ($checkneuerlaptop == NULL) {
            $checkneuerlaptop = 0;
        }

        if ($checkneueshandy == NULL) {
            $checkneueshandy = 0;
        }

        if ($checkneuestelefon == NULL) {
            $checkneuestelefon = 0;
        }

        if ($checkwinuser == NULL) {
            $checkwinuser = 0;
        }

        if ($checksapuser == NULL) {
            $checksapuser = 0;
        }

        if ($checkdrucker == NULL) {
            $checkdrucker = 0;
        }

        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("UPDATE usereintritt SET `checkneuerlaptop` = :checkneuerlaptop, `checkneueshandy` = :checkneueshandy, `checkneuestelefon`= :checkneuestelefon, `checkwinuser` = :checkwinuser, `checksapuser` = :checksapuser, `checkdrucker` = :checkdrucker, `bemerkungenit` = :bemerkungenit, `eintrittstatus` = 2  WHERE `personalnummer` = :persnr");

        // Falls die rechte Variable gültig ist wird diese in einem Erfolgsfall an die linkt übergeben
        $this->db->bind(':checkneuerlaptop', $checkneuerlaptop);
        $this->db->bind(':checkneueshandy', $checkneueshandy);
        $this->db->bind(':checkneuestelefon', $checkneuestelefon);
        $this->db->bind(':checkwinuser', $checkwinuser);
        $this->db->bind(':checksapuser', $checksapuser);
        $this->db->bind(':checkdrucker', $checkdrucker);
        $this->db->bind(':bemerkungenit', $bemerkungenit);
        $this->db->bind(':persnr', $persnr);

        // Gibt True im Erfolgsfall, False im Fehlerfall
        return $this->db->execute();
    }

    // Fügt neue Daten in die DB ein
    public function DateninDBschreibenUserEintritt($data)
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("INSERT INTO usereintritt(vorname, mittelname, nachname, jobtitel, eintrittdatum, neuerlaptop, neueshandy, neuestelefon, winuser, sapuser, bemerkungenhr, eintrittstatus) 
        VALUES (:vorname, :mittelname , :nachname, :jobtitel, :eintrittdatum, :neuerlaptop, :neueshandy, :neuestelefon, :winuser, :sapuser, :bemerkungenhr, :eintrittstatus)");


        // Standartwert von allen Boleans von Null auf 0 setzen. Wenn der Wert nicht auf 1 gesetzt ist. 
        if ($data['neuerlaptop'] == NULL) {
            $data['neuerlaptop'] = 0;
        }

        if ($data['neueshandy'] == NULL) {
            $data['neueshandy'] = 0;
        }

        if ($data['neuestelefon'] == NULL) {
            $data['neuestelefon'] = 0;
        }

        if ($data['winuser'] == NULL) {
            $data['winuser'] = 0;
        }

        if ($data['sapuser'] == NULL) {
            $data['sapuser'] = 0;
        }

        // Falls die rechte Variable gültig ist wird diese in einem Erfolgsfall an die linkt übergeben
        $this->db->bind(':vorname', $data['vorname']);
        $this->db->bind(':mittelname', $data['mittelname']);
        $this->db->bind(':nachname', $data['nachname']);
        $this->db->bind(':jobtitel', $data['jobtitel']);
        $this->db->bind(':eintrittdatum', $data['eintrittdatum']);
        $this->db->bind(':neuerlaptop', $data['neuerlaptop']);
        $this->db->bind(':neueshandy', $data['neueshandy']);
        $this->db->bind(':neuestelefon', $data['neuestelefon']);
        $this->db->bind(':winuser', $data['winuser']);
        $this->db->bind(':sapuser', $data['sapuser']);
        $this->db->bind(':bemerkungenhr', $data['bemerkungenhr']);

        // Neuer Eintritt, Der Status wird immer automatisch auf 1 gesetzt
        $this->db->bind(':eintrittstatus', 1);

        // Gibt True im Erfolgsfall, False im Fehlerfall
        return $this->db->execute();
    }

    // Setzt einen Eintritt mittels Personalnummer auf gelöscht
    public function VorgesetzterLoeschen($persnr)
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("UPDATE usereintritt SET  `eintrittstatus` = 4 WHERE `personalnummer` = :personalnummer");

        // Falls die rechte Variable gültig ist wird diese in einem Erfolgsfall an die linkt übergeben
        $this->db->bind(':personalnummer', $persnr);

        // Gibt True im Erfolgsfall, False im Fehlerfall
        return $this->db->execute();
    }

    // Schliesst einen Eintritt mit der Personalnummer
    public function VorgesetzterAbschliessen($persnr)
    {
        // SQL Befehl mit Variablen welche von unten befüllt werden
        $this->db->query("UPDATE usereintritt SET `eintrittstatus` = 3, `alleserledigt` = 1 WHERE `personalnummer` = :personalnummer");

        // Falls die rechte Variable gültig ist wird diese in einem Erfolgsfall an die linkt übergeben
        $this->db->bind(':personalnummer', $persnr);

        // Gibt True im Erfolgsfall, False im Fehlerfall
        return $this->db->execute();
    }
}
