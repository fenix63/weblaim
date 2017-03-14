<?php
include "book.php";
$newBook = new Book();
$newBook->DelRecord($_POST["Id"]);
$newBook->ShowBooks();

?>