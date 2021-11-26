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
    bemerkungenhr VARCHAR(255)
);

INSERT INTO usereintritt(vorname, mittelname, nachname, jobtitel, eintrittdatum, neuerlaptop, neueshandy, neuestelefon, winuser, sapuser, bemerkungenhr) 
VALUES ('Sandro', 'Fritz', 'Cangelosi', 'IT', '12.12.2021', true, true, true, true, true, 'Bitte schnell erledigen');

