## CheckJeStress
[![Build Status](https://travis-ci.org/MateyByrd/CheckJeStress.svg?branch=master)](https://travis-ci.org/MateyByrd/CheckJeStress)

Vernieuwing van de website [Check Je Stress](http://checkjestress.nl/)

### Setup
Om de website werkend te krijgen, moet er een aantal dingen gedaan worden:
* Pas de waarden in het scriptje `setup_website.sh` aan zodat de website o.a. in de goede map geïnstalleerd wordt
* Voer het scriptje uit met het commando `./setup_website.sh`
* Ga met je browser naar de website :smile:

### Taakverdeling
| Onderdeel | Persoon |
|-----------|---------|
| Opmaak / CSS | MateyByrd |
| PHP | Omniscimus |
| Database / SQL | Omniscimus |
| Communicatie | thealias |
| Planning | thealias |
| Verbeteren teksten | thealias & Omniscimus |

### MySQL
tabel `pages`:

| Kolom | Data type | Opmerking |
|-------|-----------|-----------|
| `id` | `TINYINT UNSIGNED UNIQUE AUTO_INCREMENT` ||
| `page` | `TINYTEXT` | pad naar de pagina vanaf [src/](https://github.com/MateyByrd/CheckJeStress/tree/master/src) |
| `title` | `TINYTEXT` | paginatitel |
| `head` | `TEXT` | extra dingen voor in de head tag |
| `body` | `TEXT` | inhoud van de body tag |

### Aantekeningen
##### Tests
* Vragen weglaten op basis van score
* Vragen mogen veranderd worden **in overleg met de opdrachtgever**
* De vragen van de tests moeten zoveel mogelijk hetzelfde blijven.
* Het resultaat van de tests kan worden weergegeven met een metertje. Huidige versie is met Javalogo, dit kan beter met JavaScript / CSS3 / HTML5.
* Er is al een database met een grote hoeveelheid resultaten van de huidige tests: dit is waardevol en kan niet zomaar weggegooid worden. Het zou het best zijn als we deze gegevens op de een of andere manier konden integreren met het nieuwe systeem.
* De vragen in de tests moeten 6 opties hebben in plaats van 5
* Laten zien waar het resultaat vandaan komt

##### Algemeen
* De website moet responsive worden. We kunnen hier makkelijk het [Foundation framework](http://foundation.zurb.com/) voor gebruiken.
* Logo vernieuwing: zie issue [#3](https://github.com/MateyByrd/CheckJeStress/issues/3)
* De kleur BLAUW (rond de #3C96C8) heeft de voorkeur. Verder rustige foto's.
* Aanpassen van tekst is niet zeer belangrijk, maar kunnen we wel hier en daar doen om het er wat mooier / professioneler uit te laten zien.
* Op [de pagina](https://github.com/MateyByrd/CheckJeStress/blob/master/old_website/page1.php) met 'steunpunten bij jou in de buurt' kunnen we een kaartje zetten waarop alle locaties zichtbaar zijn (bijv. een clickable map).
* Ria mag verdwijnen uit de pagina's met medewerkers
* Plaatjes / Foto's auteurrechtvrij (duuh)
* Links naar social media (Facebookpagina, evt. Twitter)
