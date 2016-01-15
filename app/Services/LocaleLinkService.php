<?php 

namespace App\Services;

class LocaleLinkService
{

  /**
   * Return the language key.
   * 
   * @return (String)
   */
  public static function getLang() {
    return self::$lang;
  }


  /**
   * Return the language directory.
   * 
   * @return (String)
   */
  public static function getLangDir() {
    return self::$langDir;
  }


  /**
   * Return the page path.
   * 
   * @return (String)
   */
  public static function getPagePath() {
    return self::$pagePath;
  }


  /**
   * Set the language key.
   * 
   * @param (String)
   */
  public static function setLang($lang) {
    self::$lang = $lang;
  }


  /**
   * Set the language directory.
   * 
   * @param (String)
   */
  public static function setLangDir($langDir) {
    self::$langDir = $langDir;
  }


  /**
   * Set the page path.
   * 
   * @param (String)
   */
  public static function setPagePath($pagePath) {
    self::$pagePath = $pagePath;
  }


  // ---------------------------------------------------------------------------
  // PRIVATES 
  // ---------------------------------------------------------------------------

  public static $lang = '';
  public static $langDir = '';
  public static $pagePath = '';

} // class
