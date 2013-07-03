<?php
class DataBase 
{
  static function connex()
  {
    return $mysqli = new mysqli('localhost', 'root', '', 'exphbb');
  }
}
?>