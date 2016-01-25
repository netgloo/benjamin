@extends($benjamin)

{{-- 
  -- --------------------------------------------------------------------------
  -- layouts.main
  -- --------------------------------------------------------------------------
  --
  -- This view defines the 'main' layout and extends $benjamin. You can see
  -- below the 'title' and the 'body' sections needed for Benjamin.
  -- You can use this layout from other views, extending it with the blade's
  -- directive extends('layouts.main').
  --
  -- --------------------------------------------------------------------------
  --}}

{{-- Title --}}
@section('title')
  @yield('page-title') - My website
@endsection

{{-- Body --}}
@section('body')
  
  {{-- include('layouts.header') --}}

  <div class="content">

    @yield('content')

  </div>

  {{-- include('layouts.footer') --}}

@endsection
