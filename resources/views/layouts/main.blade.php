@extends($benjamin)

{{-- 
  -- --------------------------------------------------------------------------
  -- layouts.main
  -- --------------------------------------------------------------------------
  --
  -- This view defines the 'main' layout and extends $benjamin. You can see
  -- below the 'title' and the 'body' sections required for Benjamin.
  -- You can use this layout from other views extending it with the Blade's
  -- directive extends('layouts.main').
  -- Feel free to modify this layout page, to create new layouts views or also 
  -- to delete this view if you don't need this.
  --
  -- --------------------------------------------------------------------------
  --}}

{{-- Title --}}
@section('title')
  @yield('page-title') - My website
@endsection

{{-- Body --}}
@section('body')
  
  {{-- @ include('layouts.header') --}}

  <div class="container">
    <div class="content">

    @yield('content')

    </div>
  </div>

  {{-- @ include('layouts.footer') --}}

@endsection
