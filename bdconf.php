<?php
       
    $mysqli = new mysqli('localhost','vvvooo_oboi','J7jfQxTU','vvvooo_oboi');
       if (mysqli_connect_errno()){
         printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n",mysqli_connect_errno());
      }
      else {
        $mysqli->query('SET NAMES utf8');}
?>