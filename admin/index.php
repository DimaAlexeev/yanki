<? 
require_once("../lib/db.php");
$sql_text = 'SELECT * FROM katalog';
$result = mysqli_query($link,$sql_text);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>добавление товара</title>
</head>
<body>
    <form method="POST" action="index.php">
        <input type="text" name="name" placeholder="Наименование товара"> <br />
        <input type="text" name="cena" placeholder="Стоимость товара"> <br />
        <select name="id_color">
            <option value="white">white</option>
            <option value="Blue">Blue</option>
            <option value="yellow">yellow</option>
            <option value="black">black</option>
        </select>
        <br />
        <select name="id_size">
            <option value="xxs">xxs</option>
            <option value="xs">xs</option>
            <option value="s">s</option>
            <option value="m">m</option>
        </select>
        <br />
        <textarea name="description" placeholder="Описание"></textarea><br />
        <textarea name="sostav" placeholder="Состав"></textarea><br />
        <input type="number" name="length" placeholder="Количество товара"> <br />
        <select name="id_katalog">
        <?
         while($row_text = mysqli_fetch_array($result)) {
            echo '<option value="'.$row_text['id'].'">'.$row_text['name'].'</option>';
         }
        ?>
        </select>
        <br />
        <input type="submit" value="Добавить" >
    </form>
</body>
</html>

<?
if(!empty($_POST)){
    
    $name = $_POST['name'];
    $cena = $_POST['cena'];
    $id_color =  $_POST['id_color'];
    $id_size =  $_POST['id_size'];
    $description = $_POST['description'];
    $sostav = $_POST['sostav'];
    $length = $_POST['length'];
    $id_katalog = $_POST['id_katalog'];
 
    if($name  == ""){
        echo "Поле name обязательное";
        exit();
    }

    if($id_katalog == ""){
        echo "Поле id_katalog обязательное <a href='http://auto-site.com/addedText.php'>вернуться</a>";
        exit();
    }

    if($length == ""){
        echo "Поле length  обязательное <a href='http://auto-site.com/addedText.php'>вернуться</a>";
        exit();
    }

$sql = "INSERT INTO tovar (`name`, cena, id_color, id_size, `description`, sostav, `length`, id_katalog) VALUES (?,?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($link,$sql);
  mysqli_stmt_bind_param($stmt , 'sissssii' ,  $name , $cena  , $id_color  , $id_size, $description, $sostav, $length,  $id_katalog );
mysqli_stmt_execute($stmt); 
}
?>