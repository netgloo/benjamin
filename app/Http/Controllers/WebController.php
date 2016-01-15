<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Exceptions\PathNotFoundException;
use App\Services\LocaleService;
use App\Services\LocaleLinkService;

class WebController extends BaseController
{

  /**
   * Show the selected page
   *
   * @param $pagePath (String)
   * @return Response
   */
  public function showPage($path = '')
  {
    // Parse the request path and set the locale value
    $pathInfo = LocaleService::parsePath($path);
    $pagePath = $pathInfo->pagePath;
    app('translator')->setLocale($pathInfo->lang);

    // 'index' is a reserved name
    if ($pagePath === 'index') {
      error_log("index is a reserved name.");
      abort(404);
    }

    // Get the views' directory
    $viewsPath = base_path() . '/resources/views/';
    if (!is_dir($viewsPath)) {
      error_log("The directory /resources/views/ doesn't exists.");
      throw new PathNotFoundException();
    }

    // Compute the view name to be showed
    $showView = ($pagePath === '/') ? 
      'index' : str_replace('/', '.', $pagePath);

    // Initialize the LocaleLinkService used inside views to set links
    LocaleLinkService::setLang($pathInfo->lang);
    LocaleLinkService::setLangDir($pathInfo->langDir);
    LocaleLinkService::setPagePath($pathInfo->pagePath);

    // Return the requested view
    return view($showView, ['app' => 'app.html']);
  }


} // class
