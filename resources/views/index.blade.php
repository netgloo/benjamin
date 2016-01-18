{{-- 
  -- --------------------------------------------------------------------------
  -- index
  -- --------------------------------------------------------------------------
  --
  -- This page doesn't use any layout and directly extends $app.
  -- Extending $benjamin you can give it the parameter bodyClass that will be 
  -- used as 'class' attribute inside the 'body' tag for this page.
  -- Sections 'title' and 'body' are mandatory and you can use them to define
  -- respectively the page's title and the page's body.
  --
  -- --------------------------------------------------------------------------
  --}}

@extends($benjamin, ['bodyClass' => 'some-class'])


{{-- Title --}}
@section('title')
  Home - My website
@endsection


{{-- Body --}}
@section('body')

  <div class="content">
    <h1>Welcome</h1>

    <a href="/about">Go to About</a>
  </div>

@endsection
