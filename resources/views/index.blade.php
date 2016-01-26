@extends($benjamin, ['bodyClass' => 'some-class'])

{{-- 
  -- --------------------------------------------------------------------------
  -- index (/)
  -- --------------------------------------------------------------------------
  --
  -- This page directly extends $benjamin.
  -- Extending $benjamin you can give it the parameter 'bodyClass' that will be 
  -- used as 'class' attribute inside the 'body' element for this page.
  -- Sections 'title' and 'body' are always required and you should use them 
  -- to define respectively the page's title and the page's body.
  --
  -- --------------------------------------------------------------------------
  --}}

{{-- Title --}}
@section('title')
  Home - My website
@endsection

{{-- Body --}}
@section('body')

  <div class="content">
    <h1>Welcome</h1>
    <p>You can customize this page from <code>resources/index.blade.php</code></p>
    <a href="/page">Go to <code>/page</code></a>
  </div>

@endsection
