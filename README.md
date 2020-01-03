# Laraval Workshop 2020

##Wat is Laravel?

Laravel is een framework dat bedoeld is om sneller een applicatie te maken. Een framework bestaat uit stukjes code dat het ontwikkelen sneller en beter moet maken met als doel dat je het wiel niet opnieuw hoeft uit te vinden tijdens het ontwikkelen.

Een voorbeeld: Als je als ontwikkelaar een systeem moet gaan maken zodat gebruikers in kunnen loggen dan is het wenselijk dat er een database met een tabel is waarin gebruikers vermeld staan die in mogen loggen. Je hebt een formulier nodig om een gebruikersnaam met wachtwoord in te voeren en vervolgens met PHP deze waarden te controleren. Bij een foutieve combinatie moet er een goede melding aan de gebruiker getoond worden. Bij een correcte combinatie moet de gebruiker doorgeleid worden naar de omgeving waarin de gebruiker mag komen. Als de gebruiker zijn wachtwoord niet meer weet, dan moet de gebruiker zijn wachtwoord kunnen resetten. 

Met Laravel kun je middels de standaard meegeleverde migrations de database prepareren om gebruikers te laten inloggen en een wachtwoord te laten resetten.

De migrations zijn hier te vinden:

	- /database/migrations/2014_10_12_000000_create_users_table
	- /database/migrations/2014_10_12_100000_create_password_resets_table

Zoals je hierboven ziet helpt Laravel om bepaalde dingen niet te hoeven doen, in dit geval de tabellen aan te maken. Dus niet het wiel opnieuw hoeven uitvinden

##Waarom Laravel?

	- Komt met kant en klare server
	- Up-2-date met de laatste security issues
	- Is geprepareerd met een gebruikers authenticatie tabellen
	- Laravel komt met vele handige tools om snel code te generen
	- Laravel is een LTS framework (long term support)
	- Een populair framework, lage leercurve en voorzien van MVC
	- Laravel kan ingezet worden voor zowel kleine als grote applicaties
	- Veel laagdrempelige documentatie aanwezig
	- en nog veel meer
	
##Wat kan ik ermee?

    - Niet steeds het wiel opnieuw hoeven uit vinden, sneller applicaties maken
    - Code structureren waardoor de kwaliteit van code optimaal is
    - ransparant maken van wat het proces is van bijvoorbeeld een pagina bezoek (request)
    - Front-end code scheiden van back-end code
    - Beheren van versies van database tabellen
    - Database dynamisch opvullen met Seeders
    - Gebruik maken van de laatste technieken

##Wat voor kansen geeft het me?

Als je Laravel beheerst, dan toon je aan dat je ook gedegen kennis hebt van MVC, PHP, databases front-end, Command Line Interface (CLI) etc. Je bent hierdoor breed inzetbaar als je als Laravel programmeur aan de slag wilt. 

Laravel wordt door veel bedrijven toegepast om hun wensen te implementeren. Dit betekent dat als jij gedegen kennis hebt van Laravel, dat jij hierin een rol kan spelen. Mocht je jezelf willen onderscheiden van alle andere ontwikkelaars en je wilt verder gaan met Laravel, probeer Laravel gecertificeerd te raken voor als je in loondienst treedt. 

Als je zelf ooit een goed idee hebt en je wilt het uitwerken in code, dan kun je met Laravel snel iets bereiken. Zo ken ik iemand die graag babykleding online wou verkopen, een beetje verstand had van programmeren in PHP maar graag snel wilde verkopen. Binnen een week had hij zijn eerste rompertje verkocht met behulp van Laravel.

#Achtergrondinformatie MVC

MVC is een design pattern en staat voor Model-View-Controller. Laat je niet afschrikken door dit jargon want het is simpeler dan dat het klinkt. MVC is een manier van denken tijdens het programmeren om code op een bepaalde manier een plek te geven in je folders. Een design pattern is een soort afspraak waaraan programmeurs zich aan houden. 

##Model

Dit kan op 2 manieren geïnterpreteerd worden. Vroeger implementeerde de programmeur alle wensen van het bedrijf in Models. Deze wensen worden ook wel Business Logic genoemd. Terwijl de hedendaagse programmeur een Model ziet als een Class dat rechtstreeks met een database tabel spreekt en de resultaten onthoudt. Dit laatste heeft Laravel ook zo gehanteerd.

Als je in de mappenstructuur van Laravel kijkt, dan worden alle Models geplaatst in de /app/ folder. Er geldt een afspraak binnen Laravel voor het benoemen van je Models: dit moet altijd in de enkelvoud benoemd worden. Bijvoorbeeld: Item, Visit, Person. 

##View

De View is een bestand waarin output voor de browser geprepareerd wordt. De view kan op meerdere plekken in Laravel opgeroepen worden. In MVC gebeurt dat doorgaans vanuit de Controller. Je kunt in Laravel ook views

##Controller

De Controller is een bestand dat door de /routes/web.php aangesproken kan worden. In MVC is de Controller die een Model aan spreekt om data op te halen uit een database tabel en die data in een View stopt. De View wordt uiteindelijk vanuit de Controller terug gegeven aan de browser.

Er geldt een afspraak binnen Laravel voor het benoemen van je Controllers: dit moet altijd in de meervoud benoemd worden. Bijvoorbeeld: ItemsController, VisitsController, PersonsController. De kracht van Artisan

Laravel wordt geleverd met Artisan. Artisan is een programma die je vanuit een opdrachtvenster met PHP kunt aanroepen. De opdrachtvenster, ook wel terminal of Command Line Interface (CLI) genoemd, kun je commando’s in typen om bijvoorbeeld een programma op te starten. Artisan is een PHP programma die volledig aan sluit op Laravel en neemt het werk weg waarmee je normaal gesproken meer tijd kwijt bent om bepaalde PHP bestanden volledig uit schrijven. 

Bijvoorbeeld: 
Genereer een Controller met de naam HomeController. In Terminal ga je naar je Laravel project en type de volgende commando in: 
```
php artisan make:controller HomeController
```

Als je daarna in de folder /app/Http/Controllers kijkt, dan zie je dat er een HomeController.php gemaakt is met inhoud. Je hoeft enkel nog de functies toe te voegen in de HomeController.php.

Bovenstaand voorbeeld laat zien dat je geen Controller met de hand hoeft uit te typen, dus het spaart je uiteindelijk tijd uit.

Zo zijn er een hoop Artisan commando’s die je het leven makkelijk maakt. Als je wilt zien welke commando’s Artisan kan uitvoeren, voer dan in de terminal de volgende commando uit: 
```
php artisan
```

#Migration en Seeders
Een Migration is een bestand dat de staat van je database verandert. Als je bijvoorbeeld een kolom wilt toevoegen aan een tabel, dan doe je dit middels een Migration. De Migrations kun je vinden in de folder /database/migrations/.

_Kanttekening: Waarom zou je niet rechtstreeks aanpassingen in PHPMyAdmin doen? Dit betekent dat je ook handmatig op de live-omgeving moet doen dat foutgevoelig kan zijn met als gevolg een niet correct werkende site._

###Hoe maak ik een Migration?
 
In terminal voer je de volgende opdracht uit: 
```
php artisan make:migration CreatePersonTable
```

Hier geldt net als Controllers en Models de regel dat je de Migration noemt naar hetgeen wat het doet. In dt voorbeeld maken we een Persons tabel aan door de Migration zo te noemen. Het bestand moet altijd eindigen met `Table` en de woorden moeten gescheiden worden met beginnend hoofdletter (PascalCase).

In de les zal ik uitleggen hoe je de migration moet bewerken om de staat van een tabel aan te passen en het daadwerkelijk migreren van een database tabel.  
Dit gebeurt middels de terminal commando: 
```
php artisan migrate:<commando>
```

##Wat is een Seeder?
Een Seeder is een bestand dat een tabel vult. Seeders zijn te vinden in de folder /database/seeds

##Hoe maak ik een Seeder?
In terminal voor je de volgende opdracht uit: 
```
php artisan make:seeder PersonSeeder
```

Je ziet vervolgens in de folder /database/seeds/PersonSeeder.php verschijnen.

In de les zal ik uitleggen hoe je de Seeder moet vullen met geprepareerde data.

_Kanttekening: Waarom zou je gebruik willen maken van Seeders? Als je in een team van ontwikkelaars werkt, dan is het verstandig dat iedereen dezelfde informatie in de database heeft staan. Zo kan een team bijvoorbeeld testen of verder werken aan de staat van de database etc.Wat zijn Routes?
Routes is een soort landkaart. Als je in je browser naar de URL van je Laravel applicatie gaat, dan gaat de Laraval applicatie de URL op zoeken in de Routes landkaart. Als de URL gevonden is en de juiste request gelijk is met wat er ingesteld staat in je Routes, dan volgt de applicatie de instructies op die gedefinieerd staat voor die URL met request._

Routes zijn gedefinieerd in de folder /routes/web.php. Hierin worden alle front-end requests afgevangen.

Een voorbeeld:

```php
Route::get('/blog', function () {
    return view('blog');
});
```

In bovenstaand voorbeeld wordt er gekeken naar een GET request en als de URL ‘/blog’ is dan geef de output van de view ‘blog’ terug. De view is te vinden in de folder 
/resources/views/blog.blade.php

##Controllers aanroepen in Routes
Als je MVC wilt toepassen, dan kun je de route instellen om een bestaande Controller aan te roepen.

```php
Route::get('/blog', 'BlogsController@list');
```

In bovenstaand voorbeeld wordt de functie list() aangeroepen van /app/Http/Controllers/BlogController.php

##Routes Lijst
Het kan zijn dat er na verloop van tijd een gigantisch lijst van routes zijn gemaakt en je wilt een duidelijk overzicht hebben van alle routes, dan kun je in terminal de volgende commando uit voeren: php artisan route:listData ophalen in Models
In het volgende voorbeeld ga ik ervan uit dat er een Model bestaat en een database tabel met informatie die op de Model slaat en pas het toe in MVC.

Ik heb de volgende files aangemaakt:
- /app/PortfolioItem.php
- /app/Http/Controllers/PortfolioItemsController.php

PortfolioItemsController.php:

```php
<?php

namespace App\Http\Controllers;

use App\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemsController extends Controller
{
    public function list()
    {
        $items = PortfolioItem::all(); // Haal alle items op

        return view('my_work', ['items' => $items]);
    }
}

?>
```

In bovenstaand voorbeeld haal ik alle items op om PortfolioItem::all() aan te roepen. Het resultaat sla ik op in $items en die geef ik door aan de view /resources/views/my_work.blade.php 

Als je 1 item wilt ophalen dan moet je de volgende snippen invoeren:

```php
$item = PortfolioItem::where(‘id’, 10)->get();
```


