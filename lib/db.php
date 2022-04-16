<?
    $link = mysqli_connect('localhost','root','','yanki');

    if($link == false) {
        echo "Ошибка: Невозможно подключиться к БД" . mysqli_connect_error();
    }
  
?>