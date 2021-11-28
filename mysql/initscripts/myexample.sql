ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';

CREATE TABLE usereintritt (
    personalnummer INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vorname VARCHAR(20) NOT NULL,
    mittelname VARCHAR(20),
    nachname VARCHAR(20) NOT NULL,
    jobtitel VARCHAR(255) NOT NULL,
    eintrittdatum date NOT NULL,
    neuerlaptop boolean default false,
    neueshandy boolean default false,
    neuestelefon boolean default false,
    winuser boolean default false,
    sapuser boolean default false,
    bemerkungenhr VARCHAR(255),
    checkneuerlaptop boolean default false,
    checkneueshandy boolean default false,
    checkneuestelefon boolean default false,
    checkwinuser boolean default false,
    checksapuser boolean default false,
    checkdrucker boolean default false,
    bemerkungenit VARCHAR(255),
    alleserledigt boolean default false,
    eintrittstatus tinyint(1)
);


INSERT INTO usereintritt(vorname, mittelname, nachname, jobtitel, eintrittdatum, neuerlaptop, neueshandy, neuestelefon, winuser, sapuser, bemerkungenhr, checkneuerlaptop, checkneueshandy, checkneuestelefon, checkwinuser, checksapuser, checkdrucker, bemerkungenit, alleserledigt, eintrittstatus) 
VALUES ('Gustav', NULL , 'Oper', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '1'),
('Leonard', NULL , 'Geiger', 'Lehrer', '1970.01.20', true, true, true, true, true, 'Maus und Tastatur wird von dem Vorgänger übernommen' , true, true, true, true, true, true, 'Alles nach Checkliste erledigt', false, '2'),
('Sandro', 'Fritz', 'Cangelosi', 'IT', '2021.12.30', true, true, true, true, true, 'Bitte schnell erledigen', true, true, true, true, true, true, 'Alles korrekt erledigt', true, '3'),
('Christoph', NULL , 'Mueller', 'IT', '1991.06.01', false, false, false, false, false, NULL , false, false, false, false, false, false, 'Bitte loeschen, Schreibfehler', false, '4');

