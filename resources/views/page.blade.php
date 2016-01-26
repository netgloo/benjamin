@extends('layouts.main')

{{-- 
  -- --------------------------------------------------------------------------
  -- page (/page)
  -- --------------------------------------------------------------------------
  --
  -- This page use the 'main' layout (layouts/main.blade.php) extending it.
  -- Here you can define the content and the title of the page. Inside the
  -- main layout you can define a common structure used among all your pages.
  --
  -- --------------------------------------------------------------------------
  --}}

{{-- Page Title --}}
@section('page-title')
  Page
@endsection

{{-- Layout Content --}}
@section('content')
  
  <h1>This is the about page</h1>
  <p>You can open and customize this page from <code>resources/about.blade.php</code></p>
  <a href="/">Go to Home</a>
  
@endsection
