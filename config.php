<?php
 session_start();
error_reporting(E_ALL);
  ini_set('display_errors', '1');
 
  
  define('ROOT_PATH', dirname(__FILE__));


  define('DB_HOST','mysql11.citynetwork.se'); 
  define('DB_USER','124020-zx50774');
  define('DB_PASS','fruitscrush73');
  define('DB_NAME','124020-fruitscrush');
 

  /*define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASS','');
  define('DB_NAME', '124020-fruitscrush');*/

  
  //define('UPLOAD_DIR', ROOT_PATH.'/public_html/img/thumbnail/');
 
  require_once('application/config/includes.php');
 

  ?>