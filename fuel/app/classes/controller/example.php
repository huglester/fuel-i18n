<?php

/**
 * file: fuel/app/controller/example.php
 *
 * i18n support example controller
 * by Tanel Tammik - keevitaja@gmail.com
 *
 */

class Controller_Example extends Controller_Template
{
  public function before()
  {
    parent::before();
    
    Lang::load('example.php');
    
    $this->template->i18n = Config::get('language');
    $this->template->title = 'i18n support example for FuelPHP';
  }
  
  public function after($response)
  {
    $response = parent::after($response);
    
    return $response;
  }
  
  public function action_index()
  {
    $this->template->content = View::forge('example/index');
  }
  
  public function action_test()
  {
    $this->template->content = View::forge('example/test');
  }
}