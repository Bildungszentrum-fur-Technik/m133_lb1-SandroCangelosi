ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';

CREATE TABLE usereintritt (
    personalnummer INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vorname VARCHAR(20) NOT NULL,
    mittelname VARCHAR(20),
    nachname VARCHAR(20) NOT NULL,
    jobtitel VARCHAR(255) NOT NULL,
    eintrittdatum date NOT NULL,
    neuerlaptop tinyint(1) default false,
    neueshandy tinyint(1) default false,
    neuestelefon tinyint(1) default false,
    winuser tinyint(1) default false,
    sapuser tinyint(1) default false,
    bemerkungenhr VARCHAR(255),
    checkneuerlaptop tinyint(1) default false,
    checkneueshandy tinyint(1) default false,
    checkneuestelefon tinyint(1) default false,
    checkwinuser tinyint(1) default false,
    checksapuser tinyint(1) default false,
    checkdrucker tinyint(1) default false,
    bemerkungenit VARCHAR(255),
    alleserledigt tinyint(1) default false,
    eintrittstatus tinyint(1)
);


INSERT INTO usereintritt(vorname, mittelname, nachname, jobtitel, eintrittdatum, neuerlaptop, neueshandy, neuestelefon, winuser, sapuser, bemerkungenhr, checkneuerlaptop, checkneueshandy, checkneuestelefon, checkwinuser, checksapuser, checkdrucker, bemerkungenit, alleserledigt, eintrittstatus) 
VALUES ('Gustav', NULL , 'Oper', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '1'),
('Leonard', NULL , 'Geiger', 'Lehrer', '1970.01.20', true, true, true, true, true, 'Maus und Tastatur wird von dem Vorgaenger uebernommen' , true, true, true, true, true, true, 'Alles nach Checkliste erledigt', false, '2'),
('Sandro', 'Fritz', 'Cangelosi', 'IT', '2021.12.30', true, true, true, true, true, 'Bitte schnell erledigen', true, true, true, true, true, true, 'Alles korrekt erledigt', true, '3'),
('Christoph', NULL , 'Mueller', 'IT', '1991.06.01', false, false, false, false, false, 'Wichtig' , false, false, false, false, false, false, 'Bitte loeschen, Schreibfehler', false, '4'),
('Gustav2', NULL , 'Oper2', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '1'),
('Gustav3', NULL , 'Oper3', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '1'),
('Gustav4', NULL , 'Oper4', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '1'),
('Gustav5', NULL , 'Oper5', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '2'),
('Gustav6', NULL , 'Oper6', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '2'),
('Gustav7', NULL , 'Oper7', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '2'),
('Gustav8', NULL , 'Oper8', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '2'),
('Gustav9', NULL , 'Oper9', 'KV', '2021.11.27', true, true, true, true, true, 'Arbeitsplatz neben Gustav' , false, false, false, false, false, false, NULL, false, '2');
