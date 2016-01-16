{{-- 
  -- --------------------------------------------------------------------------
  -- layouts.main
  -- --------------------------------------------------------------------------
  --
  -- This view defines the 'main' layout and extends $benjamin.
  -- You can use this layout extending it with extends('layouts.main') from
  -- other views.
  --
  -- --------------------------------------------------------------------------
  --}}

@extends($benjamin)


{{-- Title --}}
@section('title')
  @yield('page-title') - My website
@endsection


{{-- Body --}}
@section('body')
  
  {{-- include('layouts.header') --}}

  @yield('content')

  {{-- include('layouts.footer') --}}

@endsection
