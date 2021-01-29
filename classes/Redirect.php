<?php
/*
*! class for redirect specific url
*/
class Redirect{

  public static function to($location = null){
    if ($location) {
      if (is_numeric($location)) {
        switch ($location) {
        case 404:
        header('HTTP/1.0 404 Not Found');
        exit(); break;
        }
      }else{
        header('Refresh:0; url='.$location);
        exit();
      }
    }
  }

}
/*
*! class for redirect specific url
*/
?> 
