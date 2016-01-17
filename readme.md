## Benjamin

Benjamin is a platform for easily building *static websites* with a really instant and smooth navigation out of the box.

You can try a Benjamin powered website here: http://benjamin.netgloo.com

### We love fast websites

Benjamin is made for building fast websites. With Benjamin you can rapidly create websites that load fast and with an amazing smooth and instant navigation between pages.

### Easy development

Benjamin is easy to use. Also you will find some very useful features out of the box. Like a painless [multi-language support](#multi-language) and an easy way for adding [transitions effects](#page-transitions) changing page.

### Run everywhere

Almost all hosting services supports PHP nowadays, also on basic and cheaper plans. Benjamin is built on (Laravel)[http://laravel.com/] and it only requires (PHP with some basic extensions)[https://laravel.com/docs/5.2#installation]. Very likely it will run on your current and favourite hosting service.

### Flexible

The main aim of Benjamin is to provide a platform for small and light websites, but no ones will stopping you to add new features to it as you need. Since it is built on top of (Laravel)[http://laravel.com/] will be really easy add your custom functionality, as new routes, controllers, a database connection and anything your website needs.

### Who is using Benjamin?

Netgloo's website is built using Benjamin. Take a look here: http://netgloo.com/en

## Getting started

Benjamin is a (Laravel)[http://laravel.com/docs/installation] project, already configured, with a couple of Controllers and a Javascript library.

In order to getting started, you have only to download it, run composer, setup the `.env` file and start the Lumen application with `php artisan serve`. Then you can start to build your website.

#### Installation

TODO

    $ cd benjamin/
    $ composer install

Copy the `.env.example` file to `.env` and set the property `APP_KEY` with a 
random key of 32 characters for security reasons.

More here: http://lumen.laravel.com/docs/installation#configuration

Key generator:
http://www.unit-conversion.info/texttools/random-string-generator/

##### Troubleshooting

(composer key)

TODO

#### Configuration

TODO

#### Start the application

    $ php artisan serve

TODO


## Pages

#### Index page

TODO

#### Add new pages

TODO

Note: Do not use file names used inside the public folder.
Examples if you have /public/images do NOT create a view images.blade.php
since it will respond for the user /images that is already covered by
the public folder!

Reserved names:
- /index is a reserved name (but not /folder/index is not)
- Variable $app inside views

#### Folders

TODO

#### Error page

TODO

Add the view errors/404.blade.php

#### Ready callback

TODO

#### Links

TODO


## Layouts

TODO


## Callbacks

TODO

#### Before

TODO

#### After

TODO

#### Ready

TODO

#### Out

TODO

#### Split Benjamin.config in multiple files

Perhaps you want to better organize your code and have a javascript file for each page.
You can easly split the Benjamin's configuration on multiple javascript files. For example:

    // main.js
    
    Benjamin.config({
    
      'ready': function() {
        //
      }
      
      //
    
    });
    
    // index.js
    
    Benjamin.config({
      
      '/': {
    
        'ready': function() {
          //
        }
      
        //
    
      }
    
    });
    
    // about.js
    
    Benjamin.config({
      
      '/about': {
    
        'ready': function() {
          //
        }
      
        //
    
      }
    
    });

Obviously you must avoid to repeat the global configuration and pages configurations in more than one place.

##### Use a build tool

Splitting the javascript file on multiple files requires to include each javascript file in your head. 

A more practical solution is to use a build tool to concatenate all javascript files in one `main.js` file, than include only this one. The build tool solution will improve the website performance also, reducing the number of http request needed to get all your javascript files and allowing javascript's minimization.

TODO: link to the build tool section.

Note that you can use a build tool also if you have only a single javascript file.


## Forms

TODO

#### Sending emails

TODO


## Page transitions

TODO


## Multi-language

We support multi-language websites using sub-directories URL structure.
If you enable the multi-langauge support you will have, out of the box, something like this:

    http://example.com       --> Website in the default language
    http://example.com/en    --> Website in English language
    http://example.com/fr    --> Website in French language

The subdirectories `en` and `fr` will be respectively the root for the website in English and the website in French.
At the web site root will be served the website in your default language.

If properly used, this method allow your website to be correctly indexed by search engines on all available languages.

#### Enable multi-langauge support

You can enable the Benjamin's multi-langauge support simply adding language folders inside the `resources/lang` directory. 
Each folder should be a supported language:

    /resources
      /lang
        /en
          messages.php
        /es
          messages.php
        /fr
          messages.php

Within each language specific folder you should put a `messages.php` file containing language strings.

Learn more about the `lang` folder and language strings in Laravel from here: https://laravel.com/docs/5.2/localization#introduction

**Note (1)**: if there is only one langauge directory the multi-language support is not enabled.

**Note (2)**: if the multi-language is enabled, the language sub-directory name will always take precedence over views' names. So if you have, for example, the folder `resources/lang/en` and also a view `/en.blade.php`, this last one will always be ignored (if 'en' is not the default locale) and for the url `/en`  will be served the `/index.blade.php` view with `en` as locale (and not `/en.blade.php`).

#### Configurations

Inside the `.env` configuration file you should set these values:

- `APP_LOCALE`: the default locale. This locale will be used to serve your website in the default language, without any language sub-directory.
- `APP_FALLBACK_LOCALE`: if a string is not translated for the current locale, will be used this one as fallback (usually it is setted equals to the default locale).

#### Localized texts inside views

You can use the `trans` helper function to translate messages inside your views.
For example:

    <h1>{{ trans('messages.welcome') }}</h1>

Will print the string with key `welcome` inside the `messages.php` file for the current locale. The right `messages.php` file will be choosen from the folder with the name of the current locale (e.g. the folder `en/` for the locale `en`) inside `resources/lang/`.

Take a look at the Laravel's documentation for more features about how to use `trans` function and messages files: https://laravel.com/docs/5.2/localization#basic-usage

#### Links

If you enable the multi-language support, you have to properly handle links in your web pages.

You can use the `trlink` helper function for links, inside Blade's views, in this way:

    <a href="{{ trlink('/about') }}">About</a>
    <a href="{{ trlink('page2') }}">Page 2</a>
    <a href="{{ trlink('http://www.example.com') }}">Example</a>

Absolute paths (e.g. `/about`) are translated for the current language, automatically prepending the language subdirectory.
Relative paths (e.g. `page1`) are translated to absolute paths where the root is the language subdirectory.
Absolute urls (e.g. `http://www.example.com`) are left as they are. 

So, if the current locale is `en` (not setted as default language) and the current page is `/page1`, then the three links above will be translated to:

    <a href="/en/about">About</a>
    <a href="/en/page2">Page 2</a>
    <a href="http://www.example.com">Example</a>

#### Switch language

In the frontend you want to provide a way for the user to switch the language. You can do it with a link for each language you support.

Use the `langswitch` helper function to create links for switching languages on the current page:

    <a href="{{ langswitch('en') }}" data-bj-ignore="true">English</a>
    <a href="{{ langswitch('es') }}" data-bj-ignore="true">Spanish</a>

Supposing the current page is `/about` and the default language is `es`, the code above will produce these links:

    <a href="/en/about" data-bj-ignore="true">English</a>
    <a href="/about" data-bj-ignore="true">Spanish</a>

Note that you don't have to give the current page to `langswitch`, it will be automatically deduced on each page.

The `data-bj-ignore="true"` attribute will tell to Benjamin.js to ignore these links from the "on-client" navigation. When a user will click one of these links the website will be reloaded from the server in the selected language.

#### Example

Look an example of a website with Benjamin configured for multilanguage on our demo here:

TODO

<!--

## Workflow

TODO

#### Build tool

TODO

#### Split javascript files

TODO

#### Working with SASS

TODO
-->

## Deploy

TODO


## Optimizations

TODO

<!--

#### Cache pages

- Abilitare CACHE_DRIVER=file in .env (abilitato di default)
- Per disabilitare: commentare (o rimuovere) la riga CACHE_DRIVER. Riavviare php artisan serve.
- Il risultato di /api/pages viene salvato nella cache e viene aggiornato 
  ad ogni modifica all'interno della cartella views

#### Minify pages

- Disabled by default (???)

-->

<!--

## How it works

TODO

Fast navigation is a Lumen project with a predefined router, a simple (about 
100 lines of code) Controller class and some Blade views (inside the app 
folder). Plus a JQuery plugin client side we built appositely to support what 
is created server side.

Why Laravel?

- Is PHP: you can use it in almost any (shared) hosting, also with basic 
  plans.
- Laravel is one of the most used PHP framework today so likely you already 
  know it or maybe you will soon.
- Have a great, simple and clear documentation.
- Blade is the template engine and it is very simple to learn and use so
  if you don't know it you can learn without very much effort.
- Is a PHP framework we already know and used (for reasons above) and we didn't 
  want to learn some other PHP framework.

How it works: details

=> Link al Blog

-->

<!--

## Limits

#### Javascript run once for "on-site" navigation

TODO

#### Code inside JQuery document ready will NOT works as expected

TODO

#### Do not support dynamic content

TODO
-->

## License

Benjamin is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)## License

Benjamin is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
