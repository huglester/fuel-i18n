<?php

/**
 * file: fuel/app/classes/lang.php
 *
 * i18n support
 * by Tanel Tammik - keevitaja@gmail.com
 *
 */

class Lang extends Fuel\Core\Lang
{
  protected static $i18n_default;
  protected static $i18n_supported;
  
  // _init() - the awesome "static constructor"
  // will be called once on the first call of Lang::
  public static function _init()
  {
    parent::_init();
    
    Config::load('i18n.php');
    
    // default language is defined in app/config/config.php
    static::$i18n_default = Config::get('language');
    
    // supported languages are defined in app/config/i18n.php
    // supported languages must be added to app/config/routes.php as well
    static::$i18n_supported = Config::get('i18n_supported');
    
    $segment = Uri::segment(1, static::$i18n_default);
    
    // if uri first segment matches supported languages,
    // set language in config
    if(in_array($segment, static::$i18n_supported))
    {
      Config::set('language', $segment);
    }
  }
  
  // remove language segment from uri
  public static function i18n_clean_uri($uri = false)
  {
    $segments = ($uri === false) ? Uri::segments() : explode('/', trim($uri, '/'));
    
    if (in_array($segments[0], static::$i18n_supported))
    {
      array_shift($segments);
    }
    
    return implode('/', $segments);
  }
  
  // add language segment to uri
  public static function i18n_uri($uri, $segment = false)
  {    
    $uri = trim($uri, '/');
    $segment = ($segment === false) ? Config::get('language') : $segment;
    
    // check if default language is hidden in uri by config/i18n.php
    if (static::$i18n_default == $segment and Config::get('i18n_hide_default') == true)
    {
      return $uri;
    }
    
    $uri = explode('/', $uri);
    
    array_unshift($uri, $segment);
    
    return implode('/', $uri);
  }
  
  // add language segment to uri and return Html::anchor()
  public static function anchor($href, $text, $attributes = array(), $secure = null)
  {
    if ( ! preg_match('/^[a-z]+:\/\//', $href))
    {
      $href = static::i18n_uri($href);
    }
    
    return Html::anchor($href, $text, $attributes, $secure);
  }
  
  // return html formatted language bar links
  public static function langbar()
  {
    $uri = static::i18n_clean_uri(Uri::string());
    $text = Config::get('i18n_langbar_text');
    $wrapper = Config::get('i18n_langbar_wrapper');
    
    $html = '';
    
    foreach(static::$i18n_supported as $segment)
    {
      // do not linkify current language
      if ($segment == Config::get('language'))
      {
        $row = $text[$segment]['abbr'];
      }
      else
      {
        $row = Html::anchor(static::i18n_uri($uri, $segment), $text[$segment]['abbr'], array('title' => $text[$segment]['title']));
      }
      
      $html .= sprintf($wrapper, $row);
    }
    
    return $html;
  }
}