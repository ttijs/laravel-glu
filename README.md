# Laraval Workshop 2020

# Programma

    - Wat is Laravel?
    - Waarom Laravel?
    - Wat kan ik ermee?
    - Wat voor kansen biedt het me?
    - Achtergrondinformatie MVC
    - Model
    - View
    - Controller
    - De kracht van Artisan
    - Wat is een Migration?
    - Hoe maak ik een Migration met Artisan?
    - Wat is een Seeder?
    - Hoe maak ik een Seeder met Artisan?
    - Wat zijn Routes?
    - Controllers aanroepen vanuit Routes

## Samen maken we een nieuw Blog project

### Doelstelling van dit project: 

Snappen hoe je met Laravel een werkende pagina kunt maken door gebruik te maken van Artisan en MVC.

## Een benaderbare blogs pagina maken

De site noem ik voor nu mijnproject.nl en moet benaderbaar zijn via de browser. Op mijnproject.nl moet de blogs pagina benaderbaar zijn als ik naar mijnproject.nl/blogs ga.

Stap 1: Maak een BlogController aan: 
```
php artisan make:controller BlogController
```

Stap 2: 

Maak een route aan in /routes/web.php: 

```php
Route::get('/blogs', 'BlogController@index');
```
Hierboven staat eigenlijk: Als ik naar de browser ga en typ de URL `mijnproject.nl/blogs`, dan roep de functie index() in `/app/Https/Controllers/BlogController` aan.

Stap 3: 

Open het bestand `/app/Http/Controllers/BlogController.php`

Voeg in deze controller de functie index() toe: 

```php
    public function index() { 
        return view('blog.index'); 
    }
```

De functie index() geeft aan de browser een view terug. Deze view moet nog gemaakt worden.

Stap 4: 

Maak een view aan: `/resources/views/blog/index.blade.php` en voeg wat tekst toe, bijvoorbeeld 'Hoi allemaal'.

Stap 5: 

Test of je in de browser 'Hoi allemaal' ziet door naar de url `mijnproject.nl/blogs` te gaan

Als je bovenstaande stappen hebt uitgevoerd, dan heb je een Blogs pagina gemaakt. De pagina moet nog uitgebreid worden, maar je hebt Laravel componenten gebruikt om een webpagina in Laravel werkend te krijgen. Misschien heb je gemerkt dat je MVC toegpast hebt en heb je de kracht van Artisan beleefd.

## Een blog tabel aanmaken en een blog toevoegen

Stap 1: 

Maak een Model aan met een migration: 
```
php artisan make:model Blog -m
```

Er wordt in `/app/` een Blog.php aangemaakt en in `/database/migrations/` een migratie bestand gemaakt zoals `2020_01_07_074346_create_blogs_table.php`.

Stap 2: 

Open de migration /database/migrations/2020_01_02_204508_create_blogs_table.php

Voor nu bestaat een blog uit een titel, inhoud en een auteur, dus we passen de migration aan:

```php
public function up()
{
    Schema::create('blogs', function (Blueprint $table) {
        $table->bigIncrements('id'); // Iedere rij die je toevoegt krijgt automatisch een ophogend getalletje
        $table->string('titel'); // Dit is een varchar 255, maximaal 255 karakters
        $table->text('inhoud'); // Dit is een TEXT, kan oneindig veel tekst in
        $table->string('auteur');
        $table->timestamps(); // Dit zijn de created_at, updated_at velden, dit zijn DATETIME velden
    });
}
```

Stap 3: 

Draai de migratie: 
```
php artisan migrate
```

Met deze commando start je de migration en de migration voegt de blogs tabel toe met de velden die je omschreven hebt

Stap 4: 

Maak een route aan: 

```php
Route::get('/blogs/create', 'BlogController@create');
```

Stap 5: 

Maak de functie 'create()' aan in BlogController: 

```php
public function create() { 
    return view('blogs.create'); 
}
```

Stap 6: 

Maak een view aan: `/resources/views/blogs/create.blade.php`

Stap 7.a: 

Voeg een form toe aan de create.blade.php

```html
<form action="/blogs/create" method="post">
    @csrf
    <input type="text" name="titel"></input><br>
    <input type="text" name="inhoud"></input><br>
    <input type="text" name="auteur"></input><br>
    <button type="submit">Maak blog aan</button>
</form>
```

Stap 7.b: 

Maak een route aan voor het opslaan van de nieuwe blog

```php
Route::post('/blogs/create', 'BlogController@store');
```

Stap 7.c: 

Maak de functie 'store()' aan in `/app/Https/Controllers/BlogController.php`

```php
public function store() {
	$titel = request('titel');
	$inhoud = request('inhoud');
	$auteur = request('auteur');

	// nieuwe blog toevoegen aan de database
	$blog = new \App\Blog();
	$blog->titel = $titel;
	$blog->inhoud = $inhoud;
	$blog->auteur = $auteur;

	// Hier slaan we het in de blogs tabel op:
	$blog->save();

	// Stuur de browser door naar /blogs
	return redirect('/blogs');
}
```

Stap 7.d: Test je formulier uit

Stap 7.e: Controleer in PHPMyAdmin of de blog is toegevoegd

Gefeliciteerd! Je hebt een blog aangemaakt via Laravel, je hebt ook de kracht van Artisan ervaren.

## Wat is Laravel?

Laravel is een framework dat bedoeld is om sneller een applicatie te maken. Een framework bestaat uit stukjes code dat het ontwikkelen sneller en beter moet maken met als doel dat je het wiel niet opnieuw hoeft uit te vinden tijdens het ontwikkelen.

Een voorbeeld: Als je als ontwikkelaar een systeem moet gaan maken zodat gebruikers in kunnen loggen dan is het wenselijk dat er een database met een tabel is waarin gebruikers vermeld staan die in mogen loggen. Je hebt een formulier nodig om een gebruikersnaam met wachtwoord in te voeren en vervolgens met PHP deze waarden te controleren. Bij een foutieve combinatie moet er een goede melding aan de gebruiker getoond worden. Bij een correcte combinatie moet de gebruiker doorgeleid worden naar de omgeving waarin de gebruiker mag komen. Als de gebruiker zijn wachtwoord niet meer weet, dan moet de gebruiker zijn wachtwoord kunnen resetten. 

Met Laravel kun je middels de standaard meegeleverde migrations de database prepareren om gebruikers te laten inloggen en een wachtwoord te laten resetten.

De migrations zijn hier te vinden:

	- /database/migrations/2014_10_12_000000_create_users_table
	- /database/migrations/2014_10_12_100000_create_password_resets_table

Zoals je hierboven ziet helpt Laravel om bepaalde dingen niet te hoeven doen, in dit geval de tabellen aan te maken. Dus niet het wiel opnieuw hoeven uitvinden

## Waarom Laravel?

	- Komt met kant en klare server
	- Up-2-date met de laatste security issues
	- Is geprepareerd met een gebruikers authenticatie tabel
	- Laravel komt met vele handige tools om snel code te generen
	- Laravel is een LTS framework (long term support)
	- Een populair framework, lage leercurve en voorzien van MVC
	- Laravel kan ingezet worden voor zowel kleine als grote applicaties
	- Veel laagdrempelige documentatie aanwezig
	- en nog veel meer
	
## Wat kan ik ermee?

    - Niet steeds het wiel opnieuw hoeven uit vinden, sneller applicaties maken
    - Code structureren waardoor de kwaliteit van code optimaal is
    - Transparant maken van wat het proces is van bijvoorbeeld een pagina bezoek (request)
    - Front-end code scheiden van back-end code
    - Beheren van versies van database tabellen
    - Database dynamisch opvullen met Seeders
    - Gebruik maken van de laatste technieken
    - En natuurlijk nog veel meer

## Wat voor kansen geeft het me?

Als je Laravel beheerst, dan toon je aan dat je ook gedegen kennis hebt van MVC, PHP, databases front-end, Command Line Interface (CLI) etc. Je bent hierdoor breed inzetbaar als je als Laravel programmeur aan de slag wilt. 

Als je zelf ooit een goed idee hebt en je wilt het uitwerken in code, dan kun je met Laravel snel iets bereiken. Zo ken ik iemand die graag babykleding online wou verkopen, een beetje verstand had van programmeren in PHP maar graag snel wilde verkopen. Binnen een week had hij zijn eerste rompertje verkocht met behulp van Laravel.

Laravel wordt door veel bedrijven toegepast om hun wensen te implementeren. Dit betekent dat als jij gedegen kennis hebt van Laravel, dat jij hierin een rol kan spelen. Hoe meer kennis je hebt, des te aantrekkelijker het voor een bedrijf is om je in te huren. Mocht je jezelf willen onderscheiden van alle andere ontwikkelaars en je wilt verder gaan met Laravel, probeer Laravel gecertificeerd te raken alvorens je in loondienst treedt. 

# Achtergrondinformatie MVC

MVC is een design pattern en staat voor Model-View-Controller. Laat je niet afschrikken door dit jargon want het is simpeler dan dat het klinkt. MVC is een manier van denken tijdens het programmeren om code op een bepaalde manier een plek te geven in je folders. Een design pattern is een soort afspraak waaraan programmeurs zich aan houden. 

## Model

Dit kan op 2 manieren geïnterpreteerd worden. Vroeger implementeerde de programmeur alle wensen van het bedrijf in Model Classes. Deze wensen worden ook wel Business Logic genoemd. Terwijl de hedendaagse programmeur een Model ziet als een Class dat rechtstreeks met een database tabel spreekt en de resultaten onthoudt. Dit laatste heeft Laravel ook zo gehanteerd.

Als je in de mappenstructuur van Laravel kijkt, dan worden alle Models geplaatst in de /app/ folder. Er geldt een afspraak binnen Laravel voor het benoemen van je Models: dit moet altijd in de enkelvoud benoemd worden. Bijvoorbeeld: Item, Visit, Person. 

## View

De View is een bestand waarin output voor de browser geprepareerd wordt. De view kan op meerdere plekken in Laravel opgeroepen worden. In MVC gebeurt dat doorgaans vanuit de Controller. Je kunt in Laravel ook views vanuit de Route aanroepen.

## Controller

De Controller is een bestand dat door de /routes/web.php aangesproken kan worden. In MVC is de Controller die een Model aan spreekt om data op te halen uit een database tabel en die data in een View stopt. De View wordt uiteindelijk vanuit de Controller terug gegeven aan de browser.

Er geldt een afspraak binnen Laravel voor het benoemen van je Controllers: dit moet altijd in de meervoud benoemd worden. Bijvoorbeeld: ItemsController, VisitsController, PersonsController. 

## De kracht van Artisan

Laravel wordt geleverd met Artisan. Artisan is een programma die je vanuit een opdrachtvenster met PHP kunt aanroepen. De opdrachtvenster, ook wel terminal of Command Line Interface (CLI) genoemd, kun je commando's in typen om bijvoorbeeld een programma op te starten. Artisan is een PHP programma die volledig aan sluit op Laravel en neemt het werk weg waarmee je normaal gesproken meer tijd kwijt bent om bepaalde PHP bestanden volledig uit schrijven. 

Bijvoorbeeld: 
Genereer een Controller met de naam HomeController. In Terminal ga je naar je Laravel project en type de volgende commando in: 
```
php artisan make:controller HomeController
```

Als je daarna in de folder /app/Http/Controllers kijkt, dan zie je dat er een HomeController.php gemaakt is met inhoud. Je hoeft enkel nog de functies toe te voegen in de HomeController.php.

Bovenstaand voorbeeld laat zien dat je geen Controller met de hand hoeft uit te typen, dus het spaart je uiteindelijk tijd uit.

Zo zijn er een hoop Artisan commando's die je het leven makkelijk maakt. Als je wilt zien welke commando's Artisan kan uitvoeren, voer dan in de terminal de volgende commando uit: 
```
php artisan
```

# Migration en Seeders
Een Migration is een bestand dat de staat van je database verandert. Als je bijvoorbeeld een kolom wilt toevoegen aan een tabel, dan doe je dit middels een Migration. De Migrations kun je vinden in de folder /database/migrations/.

_Kanttekening: Waarom zou je niet rechtstreeks aanpassingen in PHPMyAdmin doen? Dit betekent dat je ook handmatig op de live-omgeving moet doen dat foutgevoelig kan zijn met als gevolg een niet correct werkende site._

### Hoe maak ik een Migration?
 
In terminal voer je de volgende opdracht uit: 
```
php artisan make:migration CreatePersonTable
```

Hier geldt net als Controllers en Models de regel dat je de Migration noemt naar hetgeen wat het doet. In dt voorbeeld maken we een Persons tabel aan door de Migration zo te noemen. Het bestand moet altijd eindigen met `Table` en de woorden moeten gescheiden worden met beginnend hoofdletter (PascalCase).

In de les zal ik uitleggen hoe je de migration moet bewerken om de staat van een tabel aan te passen en het daadwerkelijk migreren van een database tabel.  Dit gebeurt middels de terminal commando: 
```
php artisan migrate
```

## Wat is een Seeder?
Een Seeder is een bestand dat een tabel vult. Seeders zijn te vinden in de folder /database/seeds

## Hoe maak ik een Seeder?
In terminal voer je de volgende opdracht uit: 
```
php artisan make:seeder PersonSeeder
```

Je ziet vervolgens /database/seeds/PersonSeeder.php verschijnen.

In de les zal ik uitleggen hoe je de Seeder moet vullen met geprepareerde data.

_Kanttekening: Waarom zou je gebruik willen maken van Seeders? Als je in een team van ontwikkelaars werkt, dan is het verstandig dat iedereen dezelfde informatie in de database heeft staan. Zo kan een team bijvoorbeeld testen of verder werken aan de staat van de database etc._

## Wat zijn Routes?
Routes is een soort landkaart. Als je in je browser naar de URL van je Laravel applicatie gaat, dan gaat de Laraval applicatie de URL op zoeken in de Routes landkaart. Als de URL gevonden is en de juiste request gelijk is met wat er ingesteld staat in je Routes, dan volgt de applicatie de instructies op die gedefinieerd staat voor die URL met request.

Routes zijn gedefinieerd in de folder /routes/web.php. Hierin worden alle front-end requests afgevangen.

Een voorbeeld:

```php
Route::get('/blog', function () {
    return view('blog');
});
```

In bovenstaand voorbeeld wordt er gekeken naar een GET request en als de URL '/blog' is dan geef de output van de view 'blog' terug. De view is te vinden in de folder /resources/views/blog.blade.php

## Controllers aanroepen in Routes
Als je MVC wilt toepassen, dan kun je de route instellen om een bestaande Controller aan te roepen.

```php
Route::get('/blog', 'BlogsController@list');
```

In bovenstaand voorbeeld wordt de functie list() aangeroepen van /app/Http/Controllers/BlogController.php

## Routes Lijst
Het kan zijn dat er na verloop van tijd een gigantisch lijst van routes zijn gemaakt en je wilt een duidelijk overzicht hebben van alle routes, dan kun je in terminal de volgende commando uit voeren: 
```
php artisan route:list
```

## Data ophalen in Models
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
$item = PortfolioItem::where('id', 10)->get();
```


# Git repository installatie

Ik heb een voorbeeld git repository klaar gezet zodat je kunt zien hoe ik de portfolio heb gemaakt.

De repository bevat een voorbeeld van routes, migrations, seeder, controller, model en views.

## Installatie

Voer de volgende regel uit in je Terminal

```
git clone https://github.com/geoffsmiths/laravel-glu.git portfolio
```

Bovenstaande opdracht maakt een exacte kopie van de laravel portfolio repository naar de folder portfolio.

Ga vervolgens naar die directory en voer de volgende commando's achter elkaar uit:

```
composer install
npm install
cp .env.example .env
```

Pas dan de .env bestand aan met de volgende gegevens:

```
APP_NAME="Portfolio"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Zorg ervoor dat de database `portfolio` bestaat en controleer of de DB_USERNAME en DB_PASSWORD correct zijn ingesteld.

Genereer een key:
```
php artisan key:generate
```

Voer de Migrations uit:
```
php artisan migrate:refresh
```

En vul dan de database tabellen:
```
php artisan db:seed
```

Persoonlijk gebruik ik Homestead en dit draai ik op een vagrant box met VirtualBox. 

De laatste stap is om er zelf voor te zorgen dat het project via de browser met een URL benaderbaar is.

Klaar!
