<?php

namespace App\Http\Middleware;

use Closure;

class RedirectTrailingSlash
{

  /**
   * Redirect Trailing Slashes
   *
   * @param $request (\Illuminate\Http\Request)
   * @param $next (\Closure)
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $uri = $request->getRequestUri();
    // if (preg_match('/(.+)\/$/', $request->getRequestUri()) !== 0)
    if (count($uri) > 1 && substr($uri, -1) === '/') {
      return redirect(rtrim($request->path(), '/'), 301);
    }
    return $next($request);
  }

}
