<?php

/**
 * file: fuel/app/config/i18n.php
 *
 * i18n support config file
 * by Tanel Tammik - keevitaja@gmail.com
 *
 * this config file is autoloaded by fuel/app/classes/lang.php 
 *
 * i18n_supported       - supprted languages, must be manually set in fuel/app/config/routes.php as well
 * i18n_hide_default    - whether to hide language segment for the default language
 * i18n_langbar_text    - names for the browser output
 * i18n_langbar_wrapper - wrap around language abbr name/link in the langbar
 *
 */

return array(
  'i18n_supported' => array('en', 'et', 'ru'),
  'i18n_hide_default' => true,
  'i18n_langbar_text' => array(
    'en' => array('title' => 'In English', 'abbr' => 'ENG'),
    'et' => array('title' => 'Eesti Keeles', 'abbr' => 'EST'),
    'ru' => array('title' => 'По-Русски', 'abbr' => 'RUS'),
  ),
  'i18n_langbar_wrapper' => '<span>%s</span>',
);