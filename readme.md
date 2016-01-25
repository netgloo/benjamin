## Benjamin

Benjamin is a PHP/Javascript platform for easily building *static websites* with a really instant and smooth navigation out of the box.

You can try a Benjamin powered website here: http://benjamin.netgloo.com

### Everyone loves fast websites

Benjamin is made for building fast websites. With Benjamin you can rapidly create websites that load fast and with an amazing smooth and instant navigation between pages. Website's pages will be changed directly client-side, without any call to the server.

### Easy development

Benjamin is easy to use. Also you will find some very useful features out of the box. Like a painless [multi-language support](#multi-language) and an easy way for adding [transitions effects](#page-transitions) changing page. Moreover you don't have to worry about URLs, fallbacks for browsers who doesn't supports `pushState`, or server side rendering, all this will be managed by Benjamin.

### Run everywhere

Almost all hosting services supports PHP nowadays, also on basic and cheaper plans. Benjamin is built on [Laravel](http://laravel.com/) and it only requires [PHP with some basic extensions](https://laravel.com/docs/5.2#installation). Very likely it will run on your current and favourite hosting service.

### Flexible

The main aim of Benjamin is to provide a platform for small and light websites. But no ones will stopping you to add new features if you need them. If you already have some experience with [Laravel](http://laravel.com/) framework, you will find really easy add your custom functionalities, like new routes, controllers, a database connection and anything else your website needs.

<!--
### Who is using Benjamin?

Netgloo's website is built using Benjamin. Take a look: [http://netgloo.com/en](http://netgloo.com/en).
-->


## Contents

* [Getting started](#getting-started)
* [Application structure](#application-structure)
* [Website Pages](#website-pages)
* [Layouts](#layouts)
* [Multi-language](#multi-language)
* [Scripts](#scripts)
* [Callbacks](#callbacks)
* [Page transitions](#page-transitions)
* [Forms](#forms)
* [Workflow](#workflow)
* [Production](#production)
* [Optimizations](#optimizations)
* [How it works](#how-it-works)
* [Credits](#credits)
* [License](#license)


## Getting started

Benjamin is a pre-configured [Laravel](http://laravel.com/docs/installation) application. In order to getting started, you have only to [download it](#installation), run composer and start the application with `php artisan serve`. Then you can start to build your website.

### Requirements

You need to have [composer](http://getcomposer.org/) installed on your PC in order to be able to download all Benjamin's dependencies. This is not really required on the production server.

Also, these are PHP requirements from [Laravel](https://laravel.com/docs/5.2#installation):

- PHP >= 5.5.9
- Extensions: OpenSSL PHP, PDO PHP, Mbstring PHP, Tokenizer PHP.

### Installation

[Download Benjamin 1.0](https://github.com/netgloo/benjamin/archive/1.0.0.zip), extract it and rename the folder with your project name, e.g. `my-website`. Then from inside the project's folder type:

``` bash
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

The first command will download all PHP dependencies. Then you will create the `.env` file copying it from the example provided. This file will store all your configurations. Finally, the last command will automatically generate an unique [application key](https://laravel.com/docs/5.2#installation) for you, storing it inside the `.env` file.

#### Troubleshooting

Due to GitHub's API rate limits, can happen that you will get an error like this when you run `composer install`:

``` bash
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
- Installing username/repo (1.2.3)
Downloading: Connecting...
Could not fetch https://api.github.com/repos/username/repo/zipball/863df9687835c62aa423a22412d26fa2ebde3fd3, please create a GitHub OAuth token to go over the API rate limit
Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+my+PC
to retrieve a token. It will be stored in "/home/user/.composer/auth.json" for future use by Composer.
Token (hidden):
```

To solve this you need a GitHub account, then simply follow instructions from the error message, that are:

- Go to https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+my+PC to retrive a token
- Give the token to composer pasting it when prompted, after `Token (hidden):`

### Configurations

If you want to start developing the website you can [start now](#start-the-application). You don't have to configure anything more.

<!--
However, if you need some advanced configuration, you may find some useful information on how to configure a new Laravel application from [here](https://laravel.com/docs/5.2/configuration).
-->

### Start the application

From the application root's folder just type:

``` bash
$ php artisan serve
```

Then visit [http://localhost:8000](http://localhost:8000) and you will see a welcome page.

Now you can start adding your own [web pages](#website-pages) or [folders](#folders) and building your own website.

**Note**: in the production server you shouldn't use `php artisan serve` but rely on Apache (or Nginx) instead. Take a look on the [Production section](#production) for more informations.

## Application structure

A Benjamin website is a Laravel application, so you can take a look [here](https://laravel.com/docs/5.2/structure#the-root-directory) for any detail about the whole application's structure.

However we want to create simple and static websites, so it is not needed to go in depth about the whole application's structure.
You can build the website working only inside these two folders:

- `/public`: you should put here all public resources, as images, javascripts, stylesheets and fonts.
- `/resources`: inside `resources` there are views (the website pages), languages files (if your website is multi-language) and raw assets as SASS or development version of javascript files.


## Website Pages

You can place all your website pages inside the folder `/resources/views`. Each page file must be a [Blade view](https://laravel.com/docs/5.2/blade), ending with the `.blade.php` extension.

A Blade view is essentially a PHP file plus some really nice directives and an easy way for defining pages' layouts; if you don't already know it, you will learn it effortless and very quickly. Take a look [here](https://laravel.com/docs/5.2/blade) for more informations.

### Page structure

To be well processed by Benjamin, each view have to follow these rules:

1. Extend `$benjamin`
1. Define a section `title`
1. Define a section `body`

For example, this is the minimum structure for a valid Benjamin's page:

``` PHP
@extends($benjamin)

@section('title')
  Here the page's title ...
@endsection

@section('body')
  Here the page's body content ...
@endsection
```

Inside the section `title` you can put the page's title that will go inside the `<title>` tag in the final HTML page. Inside the `body` section you can put the page's content that will go inside the `<body>` tag.

#### Body's class attribute

You may want to specify a value for the body's `class` attribute. You can do it with the `bodyClass` parameter, extending `$benjamin`:

``` PHP
@extends($benjamin, ['bodyClass' => 'some-class'])
```

The value `some-class` will be placed inside the `class` attribute in the `<body>` tag.


### Add new pages

Each view you will add inside `/resources/views` will be available as a website page at the URL composed by the view's path without the `blade.php` extension. For example:

- The view `page1.blade.php` will be showed at `http://<your-website.com>/page1`.
- The view `page/inside/a-folder.blade.php` will be showed at `http://<your-website.com>/page/inside/a-folder`.



Note: Do not use file names used inside the public folder.
Examples if you have /public/images do NOT create a view images.blade.php
since it will respond for the user /images that is already covered by
the public folder!

Reserved names:
- /index is a reserved name (but not /folder/index is not)
- Variable $app inside views


### Page's head



### Index page

TODO


### Ignored pages

Following pages will be ignored by Benjamin:

- Each file or directory starting with '_'
- Directory /errors
- Directory /layouts
- Directory /templates
- Directory /vendor
- Directory /app
- Files not ending with '.blade.php'

### Folders

TODO

### Error pages

TODO

Add the view errors/404.blade.php

### Ready callback

TODO

### Links

TODO

#### Ignored links

TODO

## Layouts

TODO


## Multi-language

Benjamin supports multi-language websites using sub-directories URL structure. 
If you enable the multi-langauge support you will have, out of the box, something like this:

    http://example.com       --> Website in the default language
    http://example.com/en    --> Website in English language
    http://example.com/fr    --> Website in French language

The subdirectories `en` and `fr` will be respectively the root for the website in English and the website in French.
At the web site root will be served the website in your default language.

If properly used, this method allow your website to be correctly indexed by search engines on all available languages.

### Enable multi-langauge support

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

Learn more about the `lang` folder and language strings in Laravel from [here](https://laravel.com/docs/5.2/localization#introduction).

**Note**: if the multi-language is enabled, the language sub-directory name will always take precedence over views' names. So if you have, for example, the folder `resources/lang/en` and also a view `/en.blade.php`, this last one will always be ignored (if 'en' is not the default locale) and for the url `/en`  will be served the `/index.blade.php` view with `en` as locale (and not `/en.blade.php`).

### Configurations

Inside the `.env` configuration file you should set these values:

- `APP_LOCALE`: the default locale. This locale will be used to serve your website in the default language, without any language sub-directory. There must be a language folder inside `resources/lang` having this value.
- `APP_FALLBACK_LOCALE`: if a string is not translated for the current locale, will be used this one as fallback (usually it is set equals to the default locale).

### Translated texts inside views

You can use the `trans` helper function to translate messages inside your views. For example:

    <h1>{{ trans('messages.welcome') }}</h1>

Will print the string with key `welcome` inside the `messages.php` file for the current locale.

<!--
The right `messages.php` file will be choosen from the folder with the name of the current locale (e.g. the folder `en/` for the locale `en`) inside `resources/lang/`.
-->

Take a look at the [Laravel's documentation](https://laravel.com/docs/5.2/localization#basic-usage) for more features about how to use `trans` function and messages.

### Links

If you enable the multi-language support, you have to properly handle links in your web pages.

You can use the `trlink` helper function for links, inside Blade's views, in this way:

    <a href="{{ trlink('/about') }}">About</a>
    <a href="{{ trlink('page2') }}">Page 2</a>
    <a href="{{ trlink('http://www.example.com') }}">Example</a>

Absolute paths (e.g. `/about`) are translated for the current language, automatically prepending the language subdirectory.
Relative paths (e.g. `page1`) are translated to absolute paths where the root is the language subdirectory.
Absolute urls (e.g. `http://www.example.com`) are left as they are. 

So, if the current locale is `en` (and it is not set as default) and the current page is `/some/page1`, then the three links above will be translated to:

    <a href="/en/about">About</a>
    <a href="/en/some/page2">Page 2</a>
    <a href="http://www.example.com">Example</a>

### Switch language

In the frontend you may want to provide a way for the user to switch the language. You can do it with a link for each language you support.

Use the `langswitch` helper function to create links for switching languages on the current page:

    <a href="{{ langswitch('en') }}" data-bj-ignore >English</a>
    <a href="{{ langswitch('es') }}" data-bj-ignore >Spanish</a>

Supposing the current page is `/about` and the default language is `es`, the code above will produce these links:

    <a href="/en/about" data-bj-ignore="true">English</a>
    <a href="/about" data-bj-ignore="true">Spanish</a>

Note that you don't have to give the current page to `langswitch`, it will be automatically deduced on each page.

The `data-bj-ignore` attribute will tell to Benjamin.js to ignore these links from the "on-client" navigation. When a user will click one of these links the website will be reloaded from the server in the selected language.

### Example

Look an example of a website with Benjamin configured for multilanguage on our demo here:

TODO


## Scripts

TODO

### Google Analytics

TODO

<!--
### Split Benjamin.config in multiple files

Perhaps you want to better organize your code and have a javascript file for each page.
You can easily split the Benjamin's configuration on multiple javascript files. For example:

``` javascript
// main.js

Benjamin.on({

  'ready': function() {
    //
  }
  
  //

});

// index.js

Benjamin.on('/', {
  
  'ready': function() {
    //
  }
  
});

// about.js

Benjamin.config('/about', {
  
  'ready': function() {
    //
  }

});
```

Obviously you must avoid to repeat the global configuration and pages configurations in more than one place.

#### Use a build tool

Splitting the javascript file on multiple files requires to include each javascript file in your head. 

A more practical solution is to use a build tool to concatenate all javascript files in one `main.js` file, than include only this one. The build tool solution will improve the website performance also, reducing the number of http request needed to get all your javascript files and allowing javascript's minimization.

TODO: link to the build tool section.

Note that you can use a build tool also if you have only a single javascript file.
-->


## Callbacks

``` javascript
// Global callbacks (do NOT put them inside $(document).ready)

Benjamin.on({
  'init': function() {  /* ... */ },
  'ready', function() {  /* ... */ },
  'after', function() {  /* ... */ },
  'out', function() {  /* ... */ }
});

// Callbacks for page '/'

Benjamin.on('/', {
  'ready': function() { /* ... */ },
  'after': function() { /* ... */ },
  'out': function() { /* ... */ }
});

// Callbacks for page '/about'

Benjamin.on('/about', {
  'ready': function() { /* ... */ },
  'after': function() { /* ... */ },
  'out': function() { /* ... */ }
});

// ...

```

### Init

Initialize your things.

- Executed only once, when the website is loaded from the server.
- Executed before any `ready` callback.
- Only global version exists.

### Ready

The page is ready.

- Executed when the page is loaded form the server in the JQuery's document ready event (`$(document).ready`) and after the `display` callback when the page is changed client-side.
- Executed also when browsing the history.
- This is a good place for binding things on your document (e.g. using `$('.some-element').on(...)`).
- Both global and per-page versions exists. The global one will be always executed first.


<!--
### Before

Before a page is changed.

- If a link to `/a` is clicked this callback is executed before the content of `/a` is inside the body.
- It is **not** executed when the page is loaded from the server. 
- You can stop to change page avoiding to call the `next()` function. This will also prevent `after` and `ready` callbacks to be executed.

Example: we are on page `/`, click on a link for page `/a`, the `before` callback is executed and inside the callback's function we have:

- Current page is `/`.
- You need to call `next()` to display the page `/a`.
-->

### After

After a page is changed.

- If a link to `/a` is clicked, this callback is executed when the content of the page `/a` is inside the body.
- The document's title and the page url refers to the page `/a`.
- It is **not** executed when the page is loaded from the server neither browsing the history.
- Both global and per-page versions exists. The global one will be always executed first.
- Remember to call `next()` to execute the `ready` callback for page `/a`.

<!--
- **Hint**: this is a good place for page transition effect since the page content is inside the `body` and ...
-->

### Out

The page is going to be changed with another page.

- If you are on page `/a` and a link is clicked, this callback is executed before the content of `/a` is replaced.
- It is **not** executed when the page is loaded from the server neither browsing the history.
- Both global and per-page versions exists. The global one will be always executed first.
- Remember to call `next()` to execute the `after` callback for the page that will be displayed.

### Example of a callbacks chain

We are on page `/` and we click on a link for `/a`, following callbacks are executed:

1. `out` global
1. `out` for page `/`
1. `after` global
1. `after` for page `/a`
1. `ready` global
1. `ready` for page `/a`


## Page transitions

TODO

### Effects

TODO

<!--
Important: you should avoid to apply transitions effects directly to the `body` element. 
-->


## Forms

TODO

### Sending emails

TODO


## Workflow

TODO

### Build tool

TODO

### Working with SASS

TODO

### Working with Javascript

TODO


## Production

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

- ...

#### Cache Laravel's configurations

-->

## How it works

TODO

<!--

How it works: details => Link to Netgloo's Blog

-->

<!--

## Limits

#### Javascript run once for "on-site" navigation

TODO

#### Code inside JQuery document ready will NOT works as expected

TODO

#### Does not support dynamic content

TODO
-->

## Credits

A lot of credits go to [Lavarel](http://laravel.com) since Benjamin leans on this great PHP framework.

## License

Benjamin is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
