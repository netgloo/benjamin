@extends('layouts.main')

{{-- 
  -- --------------------------------------------------------------------------
  -- example (/example)
  -- --------------------------------------------------------------------------
  --
  -- This example page shows you how to use a layout. In this case it extends 
  -- the 'main' layout (defined in the view layouts/main.blade.php).
  -- Here you can define the title and the content of the page, respectively in
  -- the 'page-title' section and in the 'content' section. These two sections
  -- are used inside the main layout, where you can define a common structure 
  -- used among all your pages.
  --
  -- --------------------------------------------------------------------------
  --}}

{{-- Page Title --}}
@section('page-title')
  Example page
@endsection

{{-- Layout Content --}}
@section('content')
  
  <div class="title">This is an example page.</div>
  <p>You can open and customize this page from /resources/views/example.blade.php</p>
  <p><a href="/">Go to /</a></p>

@endsection
