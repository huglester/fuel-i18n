<?php
return array(
	'_root_'  => 'example/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
  
  '^(en|et|ru)$' => 'example/index', // remap uri's with language as first segment
  '^(en|et|ru)/(.+)$' => '$2', // remap uri's with language as first segment
);