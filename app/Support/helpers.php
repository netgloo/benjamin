<?php

use App\Services\LocaleLinkService;
use App\Services\LocaleService;


/**
 * Given an url, returns the actual link, taking in accounts the current 
 * language subdirectory and the current path. 
 * If the url is an absolute path (i.e. starting with '/') will be prepended
 * the current language sub-directory.
 * If the url is a relative path, will translated to an absolute path where
 * the root is the language subdirectory.
 * If the url is not a path (absolute urls, fragments, etc) is left as it is.
 * 
 * The current language subdirectory and the current path are taken from the 
 * LocaleLinkService.
 * 
 * If the multi-language support is disabled this method will do nothing and
 * returns the path as given.
 * 
 * @param $url (String)
 * @return (String)
 */
function trlink($url)
{
  // Check if the multi-language support is enabled
  if (!LocaleService::isMultilangEnabled()) {
    return $url;
  }

  // Parse the url
  $linkParts = parse_url($url);
  if ($linkParts === false) {
    return $url;
  }

  // It is an absolute url or there isn't no any path
  if (isset($linkParts['host']) || !isset($linkParts['path'])) {
    return $url;
  }

  // The link's path
  $linkPath = $linkParts['path'];

  // Get the current lang dir and the current page path
  $langDir = LocaleLinkService::getLangDir();
  $currentPath = LocaleLinkService::getPagePath();

  // Join the current path with the link path
  $resultUrl = '';
  if (substr($linkPath, 0, 1) === '/') {
    // An absolute path => Replace the current one
    $resultUrl = $linkPath;
  }
  else {
    // Relative paths => Merge with the current one
    // Note: the $currentPath is always absolute (start with '/') and it never
    // contains a trailing slash ('/')
    if ($currentPath === '/') {
      $resultUrl = '/' . $linkPath;
    }
    else {
      $resultUrl = dirname($currentPath) . '/' . $linkPath;
    }
  }
  
  // Using http_build_url
  // Available here without PECL: 
  // // Join the current path with the link path
  // $resParts = [];
  // $linkParts['path'] = $currentPath;
  // http_build_url(
  //   $linkParts, 
  //   array('path' => $linkPath),
  //   HTTP_URL_JOIN_PATH,
  //   $resParts
  // );
  // // Add the language dir
  // if (!empty($langDir)) {
  //   $resParts['path'] = "/{$langDir}" . $resParts['path'];
  // }
  // return http_build_url($resParts);

  // Add the language dir
  if (!empty($langDir)) {
    $resultUrl = "/{$langDir}" . $resultUrl;
  }

  // Build the final url, preserving query string and fragment
  if (isset($linkParts['query'])) {
    $resultUrl .= '?' . $linkParts['query'];
  }
  if (isset($linkParts['fragment'])) {
    $resultUrl .= '#' . $linkParts['fragment'];
  }

  return $resultUrl;
}


/**
 * Given the language key $lang, will return a link for switching to $lang
 * remaining on the current page path.
 * 
 * The current page path is taken from the LocaleLinkService.
 * 
 * If the multi-language support is disabled this method will only return the 
 * current page path.
 * 
 * @param $lang (String)
 * @return (String)
 */
function langswitch($lang)
{
  // The page path (an absolute path, starting with '/')
  $pagePath = LocaleLinkService::getPagePath();

  // Check if the multi-language support is enabled
  if (!LocaleService::isMultilangEnabled()) {
    return $pagePath;
  }

  // Empty lang
  if (empty($lang)) {
    return $pagePath;
  }

  // Is it the default lang?
  if ($lang === LocaleService::getDefaultLang()) {
    return $pagePath;
  }

  // Get the list of available languages
  $availableLangs = LocaleService::getAvailableLangs();

  // Isn't the language supported?
  if (!in_array($lang, $availableLangs)) {
    return $pagePath;
  }

  return "/{$lang}{$pagePath}";
}

