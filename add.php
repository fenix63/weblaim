<?php
include "book.php";
$newBook = new Book();
$newBook->AddRecord($_POST["book"], $_POST["author"]);
// echo "test";
// return "test";

?>