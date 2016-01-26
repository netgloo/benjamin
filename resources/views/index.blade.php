@extends($benjamin, ['bodyClass' => 'some-class'])

{{-- 
  -- --------------------------------------------------------------------------
  -- index (/)
  -- --------------------------------------------------------------------------
  --
  -- This is the index page.
  -- In this example is defined as a "stand-alone" page and directly extends 
  -- $benjamin.
  -- Extending $benjamin you can give it the parameter 'bodyClass' that will be 
  -- used as 'class' attribute in the '<body>' tag for this page.
  -- Sections 'title' and 'body' are always required and you should use them 
  -- to define respectively the page's title and the page's body.
  --
  -- --------------------------------------------------------------------------
  --}}

{{-- Title --}}
@section('title')
  Home - My Website
@endsection

{{-- Body --}}
@section('body')

  <div class="container">
    <div class="content">
      <div class="title">Welcome.</div>
      <p>You can customize this page from /resources/views/index.blade.php</p>
      <p><a href="/example">Go to /example</a></p>
    </div>
  </div>

@endsection
