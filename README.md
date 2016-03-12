## CheckJeStress
[![Build Status](https://travis-ci.org/MateyByrd/CheckJeStress.svg?branch=master)](https://travis-ci.org/MateyByrd/CheckJeStress)

Vernieuwing van de website [Check Je Stress](http://checkjestress.nl/)

### Setup
Om de website werkend te krijgen, moet er een aantal dingen gedaan worden:
* Pas de waarden in het scriptje `setup_website.sh` aan zodat de website o.a. in de goede map geïnstalleerd wordt
* Voer het scriptje uit met het commando `./setup_website.sh`
* Ga met je browser naar de website :smile:

### MySQL
tabel `pages`:

| Kolom | Data type | Opmerking |
|-------|-----------|-----------|
| `id` | `TINYINT UNSIGNED UNIQUE AUTO_INCREMENT` ||
| `page` | `VARCHAR(255) UNIQUE KEY` | pad naar de pagina vanaf [src/](https://github.com/MateyByrd/CheckJeStress/tree/master/src) |
| `title` | `TINYTEXT` | paginatitel |
| `head` | `TEXT` | extra dingen voor in de head tag |
| `body` | `TEXT` | inhoud van de body tag |

tabel `test_testnaam` (testnaam is nummer van test, voor elke test een tabel):

| Kolom | Data type | Opmerking |
|-------|-----------|-----------|
| `id` | `TINYINT UNSIGNED UNIQUE AUTO_INCREMENT` | ID van de test entry |
| `tijd` | `DATETIME DEFAULT CURRENT_TIMESTAMP` | Wanneer de test is ingevuld. Geen `TIMESTAMP` omdat die maar tot januari 2038 gaat. |
| `ip` | `INT UNSIGNED` | IP heeft 4 bytes. Dit past precies in INT |
| `vraagn` | `TINYINT(3) UNSIGNED` | n is het nummer van de vraag; voor elke vraag een kolom. Bevat het antwoord op de vraag in het formaat van 0 t/m 5, dus 3 bytes. |

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
✓=gesteld
##### SJA
* Als je naar [Voor wie](http://checkjestress.nl/page5.php) gaat en het preventieplan downloadt (links), dan krijg je een document zonder .doc extensie en met alleen een inhoudsopgave. Pls better version. ✓
* Steunpunt Stress Burnout Nederland bestaat niet meer en Ria is weg; blijven alle producten wel hetzelfde, of moet er iets aan veranderd worden? Is het bijv. nog steeds mogelijk om een burnout risicoanalyse voor je bedrijf te laten maken?✓

##### PDY
Op het moment geen vragen
