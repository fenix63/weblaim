<!doctype html>

<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">

    <script>

        $(document).ready(function(){

            $('button[type="submit"]').on('click', function(){

                $.ajax({

                    type: "POST",

                    url: 'add.php',

                    data: 'book='+ $('input[name="book_name"]').val() + '&author=' +$('input[name="author"]').val(),

                    success: function(){

                        

                            //Обновляем веб страницу после добавления записи в БД

                            $.ajax({

                                type: "GET",

                                url: 'getData.php',

                                data: '',

                                success: function(respone){

                                    $('.show_data').html(respone);

                                    //Надо по новой считать данные из таблицы БД, и сформировать таблицу заново

                                }

                            });

                        //Надо по новой считать данные из таблицы БД, и сформировать таблицу заново

                    }

                });

            });



            //Кнопка Получить данные

            $('#getData').on('click', function(){

                $.ajax({

                    type: "GET",

                    url: 'getData.php',

                    data: '',

                    success: function(respone){

                        $('.show_data').html(respone);

                        //Надо по новой считать данные из таблицы БД, и сформировать таблицу заново

                    }

                });

            });





            //Действия при клике на зночок удаления

            //надо удалить запись из БД, и обновить таблицу на веб-странице

            $('.show_data').on('click', '.del img', function(){

                var $len = $(this).attr('class').length;

                var $str = $(this).attr('class');

                var $number = $str.substring(8, $len);



                

                

                $.ajax({

                    type: "POST",

                    url: 'delete.php',

                    data: 'Id=' + $number,

                    success: function(respone){

                        //alert('test');

                        $('.show_data').html(respone);

                        //Надо по новой считать данные из таблицы БД, и сформировать таблицу заново

                    }

                });





            });





            $('.show_data').on('click', '.edit img', function(){

                

                var $len = $(this).attr('class').length;
                var $str = $(this).attr('class');
                var $number = $str.substring(5, $len);




                if($('.show_data .author_' + $number).attr("disabled"))
                {
                	$('.show_data .author_' + $number).removeAttr("disabled");
                	$('.show_data .book_' + $number).removeAttr("disabled");
                	$('.show_data .edit .edit_' + $number).attr("src","galka.png");	
                }
                else
                {
                	$('.show_data .author_' + $number).attr("disabled","enabled");
                	$('.show_data .book_' + $number).attr("disabled", "enabled");
                	$('.show_data .edit .edit_' + $number).attr("src","edit.png");

                	//тут должно идти сохранение

                	//alert('Id=' + $number + '&book='+ $('.show_data .book_' + $number).val() + '&author=' +$('.show_data .author_' + $number).val());
                	
                	
                	$.ajax({

	                    type: "POST",

	                    url: 'edit.php',

	                    data: 'Id=' + $number + '&book='+ $('.show_data .book_' + $number).val() + '&author=' +$('.show_data .author_' + $number).val(),

	                    success: function(respone){

	                        //alert('test');

	                        $('.show_data').html(respone);

	                        //Надо по новой считать данные из таблицы БД, и сформировать таблицу заново

	                    }

	                });
					
					

                }
            });

        });

    </script>



    <title>Weblaim test</title>

</head>

<body>









    Введите название книги:

    <input type="text" name="book_name"/><br/><br/><br/>



    Введите Автора:

    <input type="text" name="author"/><br/><br/><br/>



    <button type="submit">Добавить</button><br/><br/><br/>



    <button id="getData">Получить данные</button>

    <div class="show_data"></div>



<?php

include_once 'book.php';

$myBook = new Book();

echo "<br/><br/>";

?>

</body>

</html>



