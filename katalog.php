<?
     require_once('lib/db.php');
     // todo 
        if (isset($_GET['id_katalog']) && $_GET['id_katalog'] != 10 ) {
            $id_katalog = htmlspecialchars($_GET['id_katalog']);
            $sql_text = 'SELECT * FROM tovar where id_katalog ='.$id_katalog.'';
        }
        else{
            $id_katalog = 10;
            $sql_text = 'SELECT * FROM tovar ORDER BY id limit 20';
        }
     //
     $result_tovar = mysqli_query($link,$sql_text);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
   <? require_once('block/head.php') ?>
    <link rel="stylesheet" href="menu.children.style.css">
</head>
<body>
<?
require_once('block/menu.php');
require_once('block/modalCart.php');
?>
  
<div class="bread">
    <ul>
        <li>
            <a href="#">Главная</a>
        </li>
        <li>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.88906 9L6 5.11094L7.11094 4L12.1109 9L7.11094 14L6 12.8891L9.88906 9Z" fill="#E0BEA2"/>
            </svg>
        </li>
        <li>
            <a href="#">Каталог</a>
        </li>
    </ul>
</div>

<div class="wriper">
    <div class="itemList">
        <? require_once('block/katalog.php'); ?>
    </div>
    <div class="Product">

        <div class="filter">
            <select name="" id="">
                <option value="">Размер</option>
            </select>
            <select name="" id="">
                <option value="">Цвет</option>
            </select>
            <select name="" id="">
                <option value="">Цена</option>
            </select>
            <select name="" id="">
                <option value="">Сортировать по</option>
            </select>
        </div>
         
        <div class="block">

        <?
        
            while($row_text = mysqli_fetch_array($result_tovar)) {
        
                $arraySize = explode(",", $row_text['id_size']);
                $lineSize = "";
               
                for($i=0; $i <= COUNT($arraySize); $i++) {
                    $lineSize .= "<span>".trim($arraySize[$i])."</span>";
                }
               
                $arrayColor = explode(",", $row_text['id_color']);
                $lineColor = "";
               
                for($i=0; $i <= COUNT($arrayColor); $i++) {
                    $lineColor .= "<span class='".trim($arrayColor[$i])."'></span>";
                }

                printf(
                    '<div class="cartBlock">
                        <a href="show.php?tovar=%s">
                            <div class="itemSave">
                                <button>
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.50061 1.89671C9.26233 0.314993 11.9848 0.367492 13.682 2.06771C15.3785 3.76868 15.437 6.47763 13.859 8.24459L7.49911 14.6135L1.14073 8.24459C-0.437237 6.47763 -0.377988 3.76418 1.31773 2.06771C3.01645 0.369742 5.73365 0.312743 7.50061 1.89671ZM12.62 3.12744C11.495 2.00096 9.68007 1.95521 8.50259 3.01269L7.50136 3.91118L6.49938 3.01344C5.31816 1.95446 3.50694 2.00096 2.37896 3.12894C1.26148 4.24642 1.20523 6.03514 2.23496 7.21711L7.49986 12.4903L12.7648 7.21786C13.7952 6.03514 13.739 4.24867 12.62 3.12744Z" fill="white"/>
                                        </svg>
                                </button>
                            </div>
                            <div class="itemImage">
                                <img src="%s" alt="">
                            </div>
                            <div class="itemName">
                                <p>%s <span>new</span></p>
                            </div>
                            <div class="itemByu">
                                <p>%s руб.</p>
                            </div>
                            <div class="itemSize">
                                %s
                            </div>
                            <div class="itemColor">
                                %s
                            </div>
                        </a>
                     </div>
                ',$row_text['id'],$row_text['title_img'], $row_text['name'], $row_text['cena'], $lineSize,  $lineColor);

            } ?>
        
        </div>

    </div>
</div>


<? require_once('block/footer.php'); ?>

    <script src="script/script.js"></script>
</body>
</html>