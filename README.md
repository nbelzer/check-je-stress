## CheckJeStress
[![Build Status](https://travis-ci.org/MateyByrd/CheckJeStress.svg?branch=master)](https://travis-ci.org/MateyByrd/CheckJeStress)

Vernieuwing van de website [Check Je Stress](http://checkjestress.nl/)

### Systeemvereisten
* Apache webserver
* PHP ≥ 5.6
* MySQL
* Securimage vereisten voor de captcha (test met [dit scriptje](https://www.phpcaptcha.org/downloads/securimage_test.php))
* Mogelijk vereisten voor PHPMailer

### Setup
Voor het daadwerkelijk in gebruik nemen van de website, moet er even goed gekeken worden of alle inhoud wel klopt. We hebben gevraagd wat er precies veranderd moest worden aan de inhoud, aangezien _Steunpunt Stress Burnout Nederland_ niet meer bestaat, maar hier kregen we betrekkelijk weinig reactie op.

##### Script
Er zit een Bash scriptje bij de website genaamd `setup_website.sh`. Dit script zet automatisch de website op. Voorwaarde is dat de server op dezelfde computer runt als waar het scriptje uitgevoerd wordt. Dit werkt dus niet op een webhosting server.
Het scriptje kan worden uitgevoerd op een Linux server met het commando `./setup_website.sh`.

##### Alternatief:
1. Upload alle bestanden in de map src/ naar de gewenste locatie op de webserver. De website moet in de root directory van de website staan. Zorg ervoor dat de Apache user de owner permissions heeft. De map /tests/bedrijven moet ook niet alleen lees- maar ook write permissions hebben voor de Apache user.
2. Genereer een .htpasswd bestand met login gegevens voor de administrator van de website en upload het bij voorkeur naar een map *BUITEN* de webserver bestanden (voor veiligheid). Met dit wachtwoord kunnen bijvoorbeeld de testresultaten worden ingezien. Het genereren van het bestand kan bijvoorbeeld gedaan worden met het commando `htpasswd`. Verwijder het bestand genaamd .htpasswd in de web root.
3. Zet in het bestand admin/.htaccess het pad naar het zojuist gemaakte .htpasswd bestand (vervang `/absolute/path/to/.htpasswd`).
4. Zet in het bestand config.php in de web root de juiste waarden (MySQL en SMTP server gegevens, en het e-mailadres van de administrator).
5. Zet de MySQL database en tables op met de commando's die gevonden kunnen worden in het bestandje `mysql-setup.txt` van dit project.

### MySQL
tabel `test_testname` (testname is naam van test, voor elke test een tabel):

| Kolom | Data type | Opmerking |
|-------|-----------|-----------|
| `id` | `MEDIUMINT UNSIGNED UNIQUE AUTO_INCREMENT` | ID van de test entry |
| `time` | `DATETIME DEFAULT CURRENT_TIMESTAMP` | Wanneer de test is ingevuld. Geen `TIMESTAMP` omdat die maar tot januari 2038 gaat. |
| `ip` | `INT UNSIGNED` | IP heeft 4 bytes. Dit past precies in INT |
| `questionm` | `TINYINT(3) UNSIGNED NOT NULL` | m is het nummer van de vraag; voor elke vraag een kolom. Bevat het antwoord op de vraag in het formaat van 0 t/m 5, dus 3 bits. |

### Aantekeningen
##### Tests [#5](https://github.com/MateyByrd/CheckJeStress/issues/5)
* Vragen weglaten op basis van score
* Vragen mogen veranderd worden **in overleg met de opdrachtgever**
* De vragen van de tests moeten zoveel mogelijk hetzelfde blijven.
* Het resultaat van de tests kan worden weergegeven met een metertje. Huidige versie is met Javalogo, dit kan beter met JavaScript / CSS3 / HTML5.
* Er is al een database met een grote hoeveelheid resultaten van de huidige tests: dit is waardevol en kan niet zomaar weggegooid worden. Het zou het best zijn als we deze gegevens op de een of andere manier konden integreren met het nieuwe systeem.
* De vragen in de tests moeten 6 opties hebben in plaats van 5
* Laten zien waar het resultaat vandaan komt

##### Algemeen
* Logo vernieuwing. [#3](https://github.com/MateyByrd/CheckJeStress/issues/3)
* Op [de pagina](http://checkjestress.nl/page1.php) met 'steunpunten bij jou in de buurt' kunnen we een kaartje zetten waarop alle locaties zichtbaar zijn (bijv. een clickable map). [#9](https://github.com/MateyByrd/CheckJeStress/issues/9)
* De website moet responsive worden. We kunnen hier makkelijk het [Foundation framework](http://foundation.zurb.com/) voor gebruiken.
* De kleur BLAUW (rond de #3C96C8) heeft de voorkeur. Verder rustige foto's.
* Aanpassen van tekst is niet zeer belangrijk, maar kunnen we wel hier en daar doen om het er wat mooier / professioneler uit te laten zien.
* Ria mag verdwijnen uit de pagina's met medewerkers
* Plaatjes / Foto's auteurrechtvrij (duuh)
* Links naar social media (Facebookpagina, evt. Twitter)

##### Technisch
* PHP versie: 5.6
* Er is 'genoeg' ruimte beschikbaar voor de database
* We krijgen de source niet

### Vragen
✓=gesteld, nog geen antwoord
##### SJA
* Als je naar [Voor wie](http://checkjestress.nl/page5.php) gaat en het preventieplan downloadt (links), dan krijg je een document zonder .doc extensie en met alleen een inhoudsopgave. Pls better version. ✓
* Steunpunt Stress Burnout Nederland bestaat niet meer en Ria is weg; blijven alle producten wel hetzelfde, of moet er iets aan veranderd worden? Is het bijv. nog steeds mogelijk om een burnout risicoanalyse voor je bedrijf te laten maken?✓
