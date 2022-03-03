# One Piece App

## Notes
### Sass
Je met en priorité les règles dans les fichiers Sass plutot qu'avec les classes Bootstrap car c'est plus simple de debugger avec le css au mme endroit plutot qu'une partie du css dans le HTML et une autre partie de CSS dans le fichier Sass, avec Bootstrap je n'utilise que les classes d'éléments

## Definitions

### BladeX

Ce paquet apporte une façon simple d'apporter des componants html

```
<x-my-div type="error" :message="$message" />
```

### @yield | @section

Permet d'inclure une section dans un layout

### @stack | @push

Permet de pousser une une partie de code dans un stack

### Components

C'est un composant html réutilisable (ex: boutton, menu, cartes, etc...)

### npm run dev , npm run watch

combine tous vos composants Vue et autres fichiers JavaScript dans un fichier combiné convivial pour le navigateur.

````json
 "dev" : "npm run development",
````
````json
"watch" : "mix watch",
````
ait de même, mais il reste ensuite actif et « surveille » les mises à jour de vos fichiers .vueet .js. S'il détecte un
changement, il reconstruira le fichier convivial pour le navigateur afin que vous puissiez simplement actualiser la pag

### Webpack

Webpack est un bundler de modules qui prépare les fichiers JavaScript et les ressources pour le navigateur.

### BelongsTo

sert de relation avec un autre modele il appartient a un autre modele

### HasMany

sert de relation avec plusieurs autres modeles il possède plusieurs modeles

### Factory

Crée un modèle de base pour faire savoir a Laravel à quoi devra ressembler les modèles générés "automatiquement"

### Use Turbolinks

J'utilise le packet Turbolinks pour faire un changement de route sans avoir à recharger la page

On le met dans le fichier ``resources/js/bootstrap.js``

```js
const Turbolinks = require("turbolinks")
Turbolinks.start()
```

### Function use

``function () use ()``

pour pouvoir utiliser une variable exterieure à une callback

### Return values

Permet d'imposer un type de retour

OK

```injectablephp
public function index(): View
{
    return view(...);  -> permet d'imposer un type de retour
}
```

Error

```injectablephp
public function index(): View
{
    return 'coucou';
}
```

### Routes use App\Http\Controllers

Utilise use App\Http\Controllers pour clean la page routes.php avec un seul use pour touute les pages

### Topic

Nouveau sujet

### Answer

Messages dans le sujet

### Utilisation du BEM

le principe du BEM sert a mieux organiser mon css

```html
HTML

<div class="foo">
    <div class="foo__bar">
    </div>
    <div>
```

```sass
.foo
    &__bar
```

```css
.foo {
}

.foo__bar {

}
```

## Forum

### Mise en place

- Générer des controllers
- Générer des models
- Générer des migrations
- Faire les vues

### mise en place des controllers pour le forum

- ForumController.php
- AnswerController.php
- SubCategory.php
- TopicController

### ForumController

#### mise en place de la route

```injectablephp
use App\Http\Controllers;

Route::get('forum', 
[Controllers\ForumController::class, 'index']) -> name('forum.index');
```

Cette route ma permie de faire la liaison entre ma vue et mon controller

### Environnement dev

- Générer des factory
- Générer des seeder

### Relations

- Lier les models:
    - Topic avec SubCategory et User
    - SubCategory avec Category
    - Answer avec Topic et User

### Actions

- Post d'un nouveau topic
- Post d'une réponse dans un topic
- Utilisation d'un modal Bootstrap pour faire les formulaires

### One page app

Utilisation de Turbolinks

## Chat

### Mise en place

- Générer des controllers
- Générer des models
- Générer des migrations
- Faire les vues

## Auth

### Laravel UI

#### Installation

```
composer require laravel/ui
```

#### Initialisation

Génère les fichier de base d'authentification

```
php artisan ui bootstrap --auth

npm install 

npm run dev 
```

## Permissions

### Spatie/Laravel-Permissions

#### Installation

```
composer require spatie/laravel-permission
```

## Dashboard

### Mise en place

- Générer des controllers
- Faire les vues

## Formulaire

### Mise en place

- Générer le controllers

````injectablephp
class ContactController extends Controller
{
    public function send(Request $request)
    {
        foreach (User::role(['super administrator', 'administrator', 'super moderator', 'moderator'])->get() as $user) {
            Notification::send($user, new ContactNotification($request->all()));
        }

        return redirect()->back();
    }
}

````
- Faire la vue


### Notification
- Générer une notification class
````
php artisan make:notification ContactNotification
````



#### Contenu
```injectablephp
    protected mixed $lastname;
    protected mixed $firstname;
    protected mixed $email;
    protected mixed $message;

    
    public function __construct($infos)
    {
        $this->lastname = $infos['lastname'];
        $this->firstname = $infos['firstname'];
        $this->email = $infos['email'];
        $this->message = $infos['message'];
    }

```


```injectablephp
 public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Nom: ' . $this->lastname)
                    ->line('Prenom: ' . $this->firstname)
                    ->line('Email: ' . $this->email)
                    ->line('Message:')
                    ->line($this->message);
    }
```


### Mail
Compte google


