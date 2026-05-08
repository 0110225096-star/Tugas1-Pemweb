<?php
switch($page){
  case 'about': include "about.php"; break;
  case 'contact': include "contact.php"; break;
  case 'login': include "login.php"; break;
  case 'level': include "level.php"; break;
  case 'studies': include "studies.php"; break;
  default: include "home.php"; break;
}
?>