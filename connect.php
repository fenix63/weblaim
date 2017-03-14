<?php

$host = 'mysql.hostinger.ru'; // адрес сервера
$database = 'u260225172_test'; // имя базы данных
$user = 'u260225172_test'; // имя пользователя
$password = '509912'; // пароль

// подключаемся к серверу
try {
    $dbh = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
    //foreach($dbh->query('SELECT * from Books') as $row) {
      //  print_r($row["Author_Name"]."  ".$row["Book_Name"]."<br/>");
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// выполняем операции с базой данных

// закрываем подключение

?>