**!!! IMPORTANT !!!:** Benjamin in under construction in this moment. Version 1.0 will coming soon. Back to visit us in a few days.

## Benjamin

Benjamin is a PHP/JavaScript platform for easily building *static websites* with a really instant and smooth navigation out of the box.

You can try a Benjamin powered website here: http://benjamin.netgloo.com

### Everyone loves fast websites

Benjamin is made for building fast websites. With Benjamin you can rapidly create websites that load fast and with an amazing smooth and instant navigation between pages. Website's pages will be changed directly client-side, without any call to the server and without any loading time.

### Easy development

Benjamin is easy to use. You can start just adding new web pages and your website will be ready right away. Also you will find some very useful features out of the box. Like a painless [multi-language support](#multi-language) and an easy way for adding [transitions effects](#page-transitions) changing page. 

### Run everywhere

Almost all hosting services supports PHP nowadays, also on basic and cheaper plans. Benjamin is built on [Laravel](http://laravel.com/) and it only requires [PHP with some basic extensions](https://laravel.com/docs/5.2#installation). Very likely it will run on your current and favourite hosting service.

### Flexible

The main aim of Benjamin is to provide a platform for small and light websites. But no ones will stopping you to add new features if you need them. If you already have some experience with [Laravel](http://laravel.com/) framework, you will find really easy add your custom functionalities, like new routes, controllers, a database connection and anything else your website needs.

<!--
### Who is using Benjamin?

Netgloo's website is built using Benjamin. Take a look: [http://netgloo.com/en](http://netgloo.com/en).
-->


## Contents

* [Getting Started](#getting-started)
* [Website Pages](#website-pages)
* [Layouts](#layouts)
* [Scripts](#scripts)
* [Page Transitions](#page-transitions)
* [Forms](#forms)
* [Multi-Language](#multi-language)
* [Website Deployment](#website-deployment)
* [How It Works](#how-it-works)
* [Credits](#credits)
* [License](#license)

<!-- 
* [Getting Started](#getting-started) 
* [Setup]
  * [Installation]
  * ...
* [Basics](#basics) 
   * [Website Pages](#website-pages)
   * ...
   * [Development Workflow](#development-workflow) 
   * ...
* [Advanced](#advanced) 
   * [How It Works](#how-it-works)
   * [Optimizations](#optimizations) 
   * [Customizations](#customizations) 
   * ...
-->


## Getting Started

<!--
### Introduction
-->

<!--
Benjamin is a pre-configured [Laravel](http://laravel.com/docs/installation) application. 
-->

In order to getting started, you have only to [install Benjamin](#installation), run composer and [launch the application](#start-the-application) with `php artisan serve`. Then you can start to build your website.

Once installed, you can start [adding new web pages](#add-new-pages). You don't have to worry about URLs, they will be automatically deduced by the page's filename stripping out the file extension.

Client side you will have, out of the box, an instant navigation for each link between your web pages. Benjamin will use the `pushState` api to update the URL when a page is changed, but it will automatically fallback to a *standard* navigation if the browser doesn't support `pushState`. 

**Note**: when web pages are directly changed client-side you have to think to your website like a [single-page application](https://en.wikipedia.org/wiki/Single-page_application), this have some implications on how the javascript code is loaded and executed. Take a look to the [Scripts section](#scripts) for more informations.

After you added some web pages, you may want to create [layouts](#layouts) to share a common structure between pages, or you may want to play with [page transitions and callbacks](#page-transitions) if you need to control the switching process from a page to another one. Also you may need to add a [contact form](#forms) in your website that will [send an email](#sending-emails) when it is triggered, or you can enable the [multi-language support](#multi-language) if your website need to provide more than one language. You will find all this really simple and straightforward.

#### For what kind of websites you should consider Benjamin

You should consider to use Benjmian if your website is a *static website*, in the sense that content of pages is fixed and can change only when you *manually* modify it. 
<!--
Also Benjamin works by pre-loading client-side the html code for **all** website's pages, so use it for website with a relative small number of pages (let's say less than one hundred of pages, but some test are required).
-->

This is a list of functionalities already supported by Benjamin:

- Page layout
- Manage transitions from a page to another one (client-side)
- Sending forms to the server
- Multi-language

If your website must have all or some of the functionalities above you can consider to use Benjamin.

Benjamin is quite flexible and it can be customized adding new features. Anyway you should avoid to use it if:

- Your website have some dynamic content that could changes on different requests.
- Your website is constantly growing in the number of pages and constantly needs to add a lot of new pages.

### Requirements

You need to have [composer](http://getcomposer.org/) installed on your PC in order to be able to download all Benjamin's dependencies. This is not really required on the production server.

Also, these are PHP requirements from [Laravel](https://laravel.com/docs/5.2#installation):

- PHP >= 5.5.9
- Extensions: OpenSSL PHP, PDO PHP, Mbstring PHP, Tokenizer PHP.

### Installation

[Download Benjamin 1.0](https://github.com/netgloo/benjamin/archive/1.0.0.zip), extract it and rename the folder with the name of your project, e.g. `my-website`. Then from inside the project's folder type:

``` bash
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

The first command will download all PHP dependencies. Then you will create the `.env` file copying it from the example provided. This file will store all your configurations. Finally, the last command will automatically generate an unique [application key](https://laravel.com/docs/5.2#installation) for you, storing it inside the `.env` file.

#### Troubleshooting

If it is the first time you run Composer, can happen that you get an error like the one below when you run `composer install`:

``` 
Could not fetch https://api.github.com/repos/username/repo/zipball/863df9687835c62aa423a22412d26fa2ebde3fd3, please create a GitHub OAuth token to go over the API rate limit
Head to https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+my+PC
to retrieve a token. It will be stored in "/home/user/.composer/auth.json" for future use by Composer.
Token (hidden):
```

To solve this you need a GitHub account, then simply follow instructions from the error message, that are:

- Go to https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+my+PC to retrive a token to using with Composer.
- Give the token to composer pasting it when prompted, after `Token (hidden):`.

<!--
### Configurations

If you want to start developing the website you can [start now](#start-the-application). You don't have to configure anything more.

However, if you need some advanced configuration, you may find some useful information on how to configure a new Laravel application from [here](https://laravel.com/docs/5.2/configuration).
-->

### Start The Application

From the application root's folder just type:

``` bash
$ php artisan serve
```

Then visit [http://localhost:8000](http://localhost:8000) and you will see a welcome page.

Now you can start adding your own [web pages and folders](#website-pages), and building your website.

**Note**: in the production server you shouldn't use `php artisan serve` but rely on Apache (or Nginx) instead. Take a look on the [Website Deployment section](#website-deployment) for more informations.

### Application Structure

A Benjamin website is a [Laravel](https://laravel.com) application, so you can take a look [here](https://laravel.com/docs/5.2/structure#the-root-directory) for any detail about the whole application's structure.

However we want to create simple and static websites, so it is not needed to know in depth the whole structure.
You can build the website working only inside these two folders:

- `/public`: you should put here all public resources, as images, javascripts, stylesheets and fonts.
- `/resources`: inside `resources` there are views (the website pages), languages files (if your website is multi-language) and raw assets as SASS or development version of javascript files.


## Website Pages

Website pages are inside the folder `resources/views`. Each page file must be a [Blade view](https://laravel.com/docs/5.2/blade), ending with the extension `.blade.php`.

A Blade view is essentially a PHP file plus some really nice directives and an easy way for defining layouts. If you don't already know Blade, you will learn it effortless and very quickly. Take a look [here](https://laravel.com/docs/5.2/blade) for all the informations you need to know.

### Add New Pages

Just add new Blade views inside `resources/views`. 

Views will be available as pages for your website. The URL path will be composed by the view's path without the `.blade.php` extension. For example:

- The view `resources/views/page.blade.php` will be served at `http://example.com/page`.
- The view `resources/views/inside/a/folder.blade.php` will be served at `http://example.com/inside/a/folder`.

There are some exceptions to these rules, like the [index page](#index-page) served at the website's root path or some [special filenames and folder names](#ignored-pages-and-folders) that will be ignored by Benjamin.

Also, you should avoid to use names already used inside the `/public` folder. For example, if you have the folder `public/images` containing your images, you can't create a view named `images.blade.php`. 
<!--since at the url `http://example.com/images` will be served the `images` folder inside `public` and the view will be shadowed and never available. -->

To be correctly served with Benjamin, each view must follow the page structure described [next](#page-structure).

#### Page Structure

Each page file you add inside `resources/views` must:

- Extend `$benjamin`, with the directive `@extends($benjamin)`.
- Define a section `title`: you should set here the page's title that will go inside the `<title>` tag.
- Define a section `body`: here you can put the page's HTML content that will be inside the `<body>` tag.

For example, this is a valid Benjamin's page file:

``` html
<!-- File: resources/views/example.blade.php -->
@extends($benjamin)

@section('title')
  Page title
@endsection

@section('body')
  <p>
    Here the page's HTML content ...
  </p>
@endsection
```

The above view will generate the following HTML page:

``` html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script defer src="/vendor/jquery/jquery-1.11.3.min.js"></script>
  <script defer src="/vendor/benjamin/Benjamin.js"></script>
  <title>Page title</title>
</head>
<body>
  <p>
    Here the page's HTML content ...
  </p>
</body>
</html>
```

<!--
When you download Benjamin the first time, you will find under `resources/views` two example pages: `index.blade.php` and `example.blade.php`. The first one is the [website's index page](#index-page), served at the website's root (e.g. `http://example.com/`), and it is defined as a *stand-alone* view extending directly `$benjamin`. The second one instead is a normal page, served at the path defined by its filename (e.g. `http://example.com/page`); this view use a layout structure, extending a layout view defined inside the `layouts` folder. You can see more about layouts [here](#layouts).
-->

### Body Class Attribute

You may want to specify a value for the body's `class` attribute. You can do it using the `bodyClass` parameter, extending `$benjamin`:

```
@extends($benjamin, ['bodyClass' => 'some-class'])
```

The value `some-class` will be placed inside the `class` attribute in the `<body>` tag.

### Page Head

The content of the `<head>` tag will be shared between all the pages. Only the `<title>` will change when a page is changed.

You can find the head's content inside the view `layouts/head.blade.php`.

You can modify the head's content as you want, but you should leave jQuery and Benjamin.js inside it for the proper functioning of the Benjamin platform.

### Index Page

For the website's root will be served the content of the view named `index.blade.php` inside `resources/views`.

For example, if the below content is inside `resources/views/index.blade.php`:

``` html
@extends($benjamin)

@section('title', 'Welcome')

@section('body')
  <h1>Welcome</h1>
@endsection
```

will be showed this HTML page at `http://example.com/`:

``` html
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- scripts ... -->
  <title>Welcome</title>
</head>
<body>
  <h1>Welcome</h1>
</body>
</html>
```

### Ignored Pages And Folders

Following pages and folders, inside `resources/views`, will be ignored by Benjamin:

- Files not ending with `.blade.php`.
- Each file or directory starting with `_`: you can use the underscore prefix to temporarily disable a page or a whole folder from your website.
- Directory `/errors`: inside this directory you should put [error pages](#error-pages).
- Directory `/layouts`: use this folder to store all your layouts and layouts' parts (like the footer or the header). This is also the default folder for the [head view](#page-head).
- Directory `/templates`: you can optionally use this folder if you have commons pieces used around the website and you want to keep them separate from the layout folder.
- Directory `/vendor`: this is a Laravel's special folder and its content is ignored.
- Directory `/app`: you can use this folder in the case you want to add some functionalities to Benjamin and you need custom views, not processed by Benjamin itself.

### Error Pages

You can create a custom page for the 404 HTTP error (page not found) simply creating the view file `resources/views/errors/404.blade.php`.

Note that this page is ignored by the Benjamin platform and doesn't needs to follow the [page structure](#page-structure) of other web pages (then doesn't needs to extends `$benjamin`) but needs to define its own `<html>` and `<head>` tags.

### Links

If the browser [support the `pushState` api](http://caniuse.com/#search=pushState), each link between two pages internal to the website will be handled by Benjamin client side. When the user will click on a link for an internal page, the target page will be loaded directly client side, without any call to the server. This allow a true smooth navigation between pages, without requiring any loading time.

You don't need to do anything, just normally add links in your web pages.

#### Ignored links

By default following links will be ignored by Benjamin and will have a *standard* behaviour:

- Links poiting to another domain.
- Links with an application protocol different from the current one.
- Links with `data-bj-ignore` attribute.

### Ready callback

In the Javascript code, use Benjamin's [`ready`](#ready) callback to execute JavaScript code each time a page is loaded:

``` javascript
// File: public/js/main.js

Benjamin.on({
  
  'ready': function() {

    // Here your javascript code executed when a page is ready

    return;
  },

});
```

You should use this callback in place of jQuery's `$(document).ready`. If you have some JavaScript code that needs to run only once, use Benjamin's [`init`](#init) callback.

Take a look in the [Scripts section](#scripts) for more informations about how to properly use JavaScript in Benjamin.


## Layouts

If you need to structure your website using common layouts between pages you can just use [Blade's layout mechanisms](https://laravel.com/docs/5.2/blade#template-inheritance).

In general, within Benjamin you are free to use any Blade's directives, as `@extends`, `@section`, `@yield`, `@include`, and all the others. The only thing you have to keep in mind is that the resulting view must follow the page structure as described [here](#page-structure), that is: extend `$benjamin` (with `@extends($benjamin)`) and define sections `title` and `body`.

So, for example, we can define a `main` layout inside the `layouts` folder:

``` html
<!-- File: resources/views/layouts/main.blade.php -->

@extends($benjamin)

@section('title')
  @yield('page-title') - Website Name
@endsection

@section('body')
  
  <div class="content">

    @yield('content')

  </div>

@endsection
```

Note that the `layouts` folder's content is [ignored by Benjamin](#ignored-pages-and-folders), so it will be **not** exposed as web pages.

We can now define a couple of web pages using the above layout:

``` html
<!-- File: resources/views/index.blade.php -->

@extends('layouts.main')

@section('page-title', 'Index')

@section('content')
  <p>Index page content ...</p>
@endsection
```

``` html
<!-- File: resources/views/example.blade.php -->

@extends('layouts.main')

@section('page-title', 'Example')

@section('content')
  <p>Example page content ...</p>
@endsection
```

### Include layout's parts

Continuing the example above, we can also include in our layout a header and a footer using the `@include` directive:

``` html
<!-- File: resources/views/layouts/main.blade.php -->

@extends($benjamin)

@section('title')
  @yield('page-title') - Website Name
@endsection

@section('body')
  
  @include('layouts.header')

  <div class="content">

    @yield('content')

  </div>

  @include('layouts.footer')

@endsection
```

```
<!-- File: resources/views/layouts/header.blade.php -->
<header> 
  Here there will be the header content ...
</header>
```

```
<!-- File: resources/views/layouts/footer.blade.php -->
<footer> 
  Here there will be the footer content ...
</footer>
```

## Scripts

Using Benjamin you should think at your website as a [single-page applications](https://en.wikipedia.org/wiki/Single-page_application) (SPA). This implies that all the scripts included inside the `<head>` tag are loaded and executed only once, when the website is loaded from the server. If the page is directly changed client-side such scripts are **not** re-executed for the new page. jQuery's `$(document).ready` function also will run only when the website is loaded the first time and not each time a page is changed.

Use Benjamin's [`ready`](#ready) callback to execute JavaScript code each time a page is loaded. 

This callback will be executed each time a page will be loaded directly from the server, at the same time jQuery's `$(document).ready` would be executed, and each time a page will be changed directly on the client, after the page transition process is finished.

This is a good place for all the code that initializes page's elements or code that binds page's events. Likely you can put in this callback all the code you would have put inside jQuery's `ready`.

If you have code that must be executed only once and not executed anymore, even changing page, you may want to use the [`init` callback](#init) instead.

**Note**: jQuery is already included inside Benjamin. You can use it inside your custom javascript code.

### Scripts Inside Body

Scripts inside the `<body>` tag are executed each time a page is loaded.

### Google Analytics

If you want to add [Google Analytics](https://support.google.com/analytics/answer/1008015?hl=en) on your Benjamin website you should use Google's [`analytics.js` library](https://developers.google.com/analytics/devguides/collection/analyticsjs/). 

This library provides [functions and support for SPAs](https://developers.google.com/analytics/devguides/collection/analyticsjs/single-page-applications).

So, keeping in mind that web pages are loaded dynamically within a Benjamin website, you should add the following script inside the `<head>` tag:

``` html
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-XXXXX-Y', 'auto');
</script>
<!-- End Google Analytics -->
```

Replacing the string `'UA-XXXXX-Y'` with your tracking ID. 

The above JavaScript snippet is just the Google official one, taken from [here](https://developers.google.com/analytics/devguides/collection/analyticsjs/), without the last JavaScript instruction `ga('send', 'pageview');`.

You should move such instruction inside the Benjamin's [`ready`](#ready) callback, in this way:

```
Benjamin.on({
  
  'ready': function() {

    ga('set', { page: window.location.pathname, title: document.title });
    ga('send', 'pageview');

    //

    return;
  },

});
```

**Explanation**: ...



## Page Transitions

### Callbacks

Do NOT put them inside `$(document).ready`.

Global callbacks:

``` javascript
Benjamin.on({
  'init': function() {  /* ... */ },
  'ready', function() {  /* ... */ },
  'out', function(next) {  /* ... */ }
  'insert', function(next) {  /* ... */ },
});

```

*Per-page* callbacks:

``` javascript
// Callbacks for page '/'

Benjamin.on('/', {
  'ready': function() { /* ... */ },
  'out': function(next) { /* ... */ }
  'insert': function(next) { /* ... */ },
});

// Callbacks for page '/example'

Benjamin.on('/example', {
  'ready': function() { /* ... */ },
  'out': function(next) { /* ... */ }
  'insert': function(next) { /* ... */ },
});

// ...

```

#### init

Initialize your things.

- Executed only once, when the website is loaded from the server.
- Executed before any `ready` callback.
- Only global version exists.

#### ready

The page is ready.

- Executed when the page is loaded form the server in the jQuery's document ready event (`$(document).ready`) and after the `insert` callback when the page is changed client-side.
- Executed also when the browser's history is navigated (back and forward).
- This is a good place for binding things on your document (e.g. using `$('.some-element').on(...)`).
- Both global and per-page versions exists. The global one will be always executed first.

#### out (`next`)

The page is going to be changed with another page.

- If you are on page `/a` and a link is clicked, this callback is executed before the content of `/a` is replaced.
- It is **not** executed when the page is loaded from the server neither when the page is showed navigating in the browser's history.
- Both global and per-page versions exists. The global one will be always executed first.
- Remember to call `next()` to execute the `insert` callback for the page that will be displayed.

#### insert (`next`)

The page is changed.

- If a link to `/a` is clicked, this callback is executed when the content of the page `/a` is inside the body.
- The document's title and the page url refers to the page `/a`.
- It is **not** executed when the page is loaded from the server neither when the page is showed navigating in the browser's history.
- Both global and per-page versions exists. The global one will be always executed first.
- Remember to call `next()` to execute the `ready` callback for page `/a`.

<!--
- **Hint**: this is a good place for page transition effect since the page content is inside the `body` and ...
-->

### Example Of A Callbacks Chain

We are on page `/a` and we click on a link for `/b`, following callbacks are executed:

1. `out(next)` global.
1. `out(next)` for page `/a`.
1. `insert(next)` global.
1. `insert(next)` for page `/b`.
1. `ready()` global.
1. `ready()` for page `/b`.


<!--
### Effects

TODO

Note: you should avoid to apply transitions effects directly to the `body` element. 
-->


## Forms

TODO

### Sending Emails

TODO


## Multi-Language

Benjamin supports multi-language websites using sub-directories URL structure. 
If you enable the multi-langauge support you will have, out of the box, something like this:

    http://example.com       --> Website in the default language
    http://example.com/en    --> Website in English language
    http://example.com/fr    --> Website in French language

The subdirectories `en` and `fr` will be respectively the root for the website in English and the website in French.
At the web site root will be served the website in your default language.

If properly used, this method allow your website to be correctly indexed by search engines on all available languages.

### Enable Multi-Langauge Support

You can enable the Benjamin's multi-langauge support simply adding language folders inside the `resources/lang` directory. 
Each folder should be a supported language:

```
/resources
  /lang
    /en
      messages.php
    /es
      messages.php
    /fr
      messages.php
```

Within each language specific folder you should put a `messages.php` file containing language strings.

Learn more about the `lang` folder and language strings in Laravel from [here](https://laravel.com/docs/5.2/localization#introduction).

**Note**: if the multi-language is enabled, the language sub-directory name will always take precedence over views' names. So if you have, for example, the folder `resources/lang/en` and also a view `/en.blade.php`, this last one will always be ignored (if 'en' is not the default locale) and for the url `/en`  will be served the `/index.blade.php` view with `en` as locale (and not `/en.blade.php`).

### Configurations

Inside the `.env` configuration file you should have set these values:

- `APP_LOCALE`: the default locale. This locale will be used to serve your website in the default language, without any language sub-directory. There must be a language folder inside `resources/lang` having this value.
- `APP_FALLBACK_LOCALE`: if a string is not translated for the current locale, will be used this one as fallback (usually it is set equals to the default locale).

### Translated Texts Inside Views

You can use the `trans` helper function to translate messages inside your views. For example:

    <h1>{{ trans('messages.welcome') }}</h1>

Will print the string with key `welcome` inside the `messages.php` file for the current locale.

<!--
The right `messages.php` file will be choosen from the folder with the name of the current locale (e.g. the folder `en/` for the locale `en`) inside `resources/lang/`.
-->

Take a look at the [Laravel's documentation](https://laravel.com/docs/5.2/localization#basic-usage) for more features about how to use `trans` function and messages.

### Links

If you enable the multi-language support, you have to properly handle links in your web pages to be coherent with the current language.

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

### Switch Language

In the frontend you may want to provide a way for the user to switch the language. You can do it with a link for each language you support.

Use the `langswitch` helper function to create links for switching languages on the current page:

    <a href="{{ langswitch('en') }}" data-bj-ignore >English</a>
    <a href="{{ langswitch('es') }}" data-bj-ignore >Spanish</a>

Supposing the current page is `/about` and the default language is `es`, the code above will produce these links:

    <a href="/en/about" data-bj-ignore >English</a>
    <a href="/about" data-bj-ignore >Spanish</a>

Note that you don't have to give the current page to `langswitch`, it will be automatically deduced on each page.

The `data-bj-ignore` attribute will tell to Benjamin.js to ignore these links from the "on-client" navigation. When a user will click one of these links the website will be reloaded from the server in the selected language.

### Example

Look an example of a website with Benjamin configured for multilanguage on our demo here:

TODO


<!--
## Development Workflow

TODO

### Build Tool

#### Use a build tool

Splitting the javascript file on multiple files requires to include each javascript file in your head. 

A more practical solution is to use a build tool to concatenate all javascript files in one `main.js` file, than include only this one. The build tool solution will improve the website performance also, reducing the number of http request needed to get all your javascript files and allowing javascript's minimization.

TODO: link to the build tool section.

Note that you can use a build tool also if you have only a single javascript file.

### Working With SASS

TODO

### Working With Javascript

TODO
-->


## Website deployment

TODO


<!--
## Optimizations

TODO


#### Cache pages

- Abilitare CACHE_DRIVER=file in .env (abilitato di default)
- Per disabilitare: commentare (o rimuovere) la riga CACHE_DRIVER. Riavviare php artisan serve.
- Il risultato di /api/pages viene salvato nella cache e viene aggiornato 
  ad ogni modifica all'interno della cartella views

#### Minify pages

- ...

#### Cache Laravel's configurations

-->

## How It Works

*Coming Soon.*

<!--

How it works => Link to Netgloo's Blog

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
