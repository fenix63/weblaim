<?php



include "book.php";

$newBook = new Book();

/*
echo $_POST["Id"];
echo $_POST["book"];
echo $_POST["author"];
*/
$newBook->EditRecord($_POST["Id"], $_POST["book"], $_POST["author"]);

$newBook->ShowBooks();

?>