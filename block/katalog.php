<?
    require_once('lib/db.php');

    $sql_text = 'SELECT * FROM katalog where visible = 1';
    $result_text = mysqli_query($link,$sql_text);
?>
<p>Каталог</p>
<ul>
    <?
     while($row_text = mysqli_fetch_array($result_text)) {
            echo '<li><a href="?id_katalog='.$row_text['id'].'">'.$row_text['name'].'</a></li>';
        }
    ?>
</ul>