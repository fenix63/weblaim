<?php





interface IRecord

{

    public function AddRecord($book_name, $author_name);

    public function EditRecord($id, $book_name, $author_name);

    public function DelRecord($id);

    public function ShowBooks();

}









class Book implements IRecord{



    var $book_name;//Название книги

    var $author;//Автор книги



    function ShowBooks(){

        $con = new Connect();

        $con->getConnection('mysql.hostinger.ru','u260225172_test', 'u260225172_test', '509912');

        $con->getData($con->connection);

        $con->closeConnection();

    }



    function AddRecord($book_name, $author_name){



        $con = new Connect();

        $con->getConnection('mysql.hostinger.ru','u260225172_test', 'u260225172_test', '509912');

        $con->insertData($con->connection, $book_name, $author_name);

        $con->closeConnection();

    }



    function EditRecord($id, $book_name, $author){

        $con = new Connect();
        $con->getConnection('mysql.hostinger.ru','u260225172_test', 'u260225172_test', '509912');
        $con->updateData($con->connection, $id, $book_name, $author);
        $con->closeConnection();

    }



    function DelRecord($id){
        $con = new Connect();
        $con->getConnection('mysql.hostinger.ru','u260225172_test', 'u260225172_test', '509912');
        $con->deleteData($con->connection, $id);
        $con->closeConnection();

    }

}





class Connect

{

    

    var $host = 'mysql.hostinger.ru'; // адрес сервера

    var $database = 'u260225172_test'; // имя базы данных

    var $user = 'u260225172_test'; // имя пользователя

    var $password = '509912'; // пароль

    var $connection;



    function getData($connection){

        echo "<table border=1 cellspacing=0 cellpadding=0>";

        echo "<th>ID</th><th>Название</th><th>Автор</th>";

        foreach($connection->query('SELECT * from Books') as $row) {

            print_r("<tr><td>");

            print_r($row["Id"]."</td>");



            print_r("<td><input class=book_".$row["Id"]." type=text value='".$row["Book_Name"]."' disabled>");

            print_r("</td><td><input class=author_".$row["Id"]." type=text value='".$row["Author_Name"]."' disabled>");

            print_r("<div class=edit><img src=edit.png class='edit_".$row["Id"]."'></div><div class=del><img src=del.jpg class='element_".$row["Id"]."'></div></td></tr>");



            //print_r($row["Author_Name"]."  ".$row["Book_Name"]."<br/>");

        }

        echo "</table>";

    }



    function insertData($connection, $book_name, $author){

        $connection->query('INSERT INTO Books (Book_Name, Author_Name) VALUES ("'.$book_name.'", "'.$author.'")'  );

    }



    function updateData($connection, $id, $book, $author){

        $connection->query('UPDATE Books SET Book_Name="'.$book.'", Author_Name="'.$author.'" WHERE Id='.$id);

    }



    function deleteData($connection, $id){

        $connection->query('DELETE FROM Books WHERE Id='.$id);

    }



    function getConnection($host, $database, $user, $password){

        try {

            //Устанавливаем подключение к БД

            $this->connection = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);



            //$dbh = null;//закрываем соединение

        } catch (PDOException $e) {

            print "Error!: " . $e->getMessage() . "<br/>";

            die();

        }

    }



    function closeConnection(){

        $this->connection = null;

    }

}













?>