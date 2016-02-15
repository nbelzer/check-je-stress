## Website content

De teksten van de website staan in de MySQL database, en niet in de bestanden zelf. Op deze manier kunnen de teksten makkelijk worden aangepast via het Content Management Systeem. (a.k.a. src/admin/)

Deze teksten moeten in de database gezet worden als de website voor het eerst geïnstalleerd wordt. Daarom staan in deze map bestanden met de content. Bij het installeren leest een scriptje de inhoud van de bestanden hier en zet ze in de MySQL database. Hierbij is het belangrijk dat de structuur van deze map hetzelfde is als de src/ map, zodat de content in de juiste pagina's komt te staan.
