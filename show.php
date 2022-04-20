<?
     require_once('lib/db.php');
     // todo 
        if (isset($_GET['tovar'])) {
            $tovar = htmlspecialchars($_GET['tovar']);
            $sql_text = 'SELECT * FROM tovar where id ='.$tovar.'';
        }
        else{
          exit("нет такой страницы");
        }
     //
     $result_tovar = mysqli_query($link,$sql_text);
     $row_text = mysqli_fetch_array($result_tovar);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <?require_once('block/head.php');?>
    <link rel="stylesheet" href="menu.children.style.css">
</head>
<body>
<? require_once('block/menu.php');?>
<? require_once('block/modalCart.php');?>
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
        <li>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.88906 9L6 5.11094L7.11094 4L12.1109 9L7.11094 14L6 12.8891L9.88906 9Z" fill="#E0BEA2"/>
            </svg>
        </li>
        <li>
            <a href="#">Пальто</a>
        </li>
        <li>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.88906 9L6 5.11094L7.11094 4L12.1109 9L7.11094 14L6 12.8891L9.88906 9Z" fill="#E0BEA2"/>
            </svg>
        </li>
        <li>
            <a href="#">Кремовое пальто</a>
        </li>
    </ul>
</div>
<?
 $dir = "admin/upload/".$row_text['article'].'/';
 $img = scandir($dir);
?>
<div class="showCart">
    <div class="left"> 
        <div class="slimImg" onclick="showImg(event)">
            <img src="<?=$dir.$img[2]?>">
            <?
                foreach($img as $value) {
                    if($value == '.' || $value == "..")  {} else {
                         echo '<img src="'.$dir.$value.'">';
                    }
                }
            ?>
        </div>
        <div class="BigImg" >
            <img src="<?=$dir.$img[2]?>" id="bigImg">
        </div>
    </div>

    <div class="right">
        <div class="title">
            <?=$row_text['name']?>
        </div>
        <div class="bye">
        <?=$row_text['cena']?> руб.
        </div>
        <div class="color">
            <select id="selectColor">
                <option>Выберите Цвет</option>
                <option value="white">white</option>
                <option value="Blue">Blue</option>
                <option value="yellow">yellow</option>
            </select>
        </div>

        <div class="size">
            <select id="selectSize">
                <option>Выберите размер</option>
                <option value="XXS">XXS</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
            </select>
        </div>

        <div class="buttons">
            <button class="inCart" onClick="inCart(<?=$row_text['id']?>,'<?=$row_text['name']?>', <?=$row_text['cena']?> ,'<?=$row_text['title_img']?>' )" >В КОРЗИНУ</button>
            <button class="inSave" >В ИЗБРАННОЕ</button>
        </div>

        <div class="description">
            <div class="title">
                Подробности
            </div>
            <div class="textOne" id="textOne">
                <div class="title">
                Размеры и описание
                <img src="img/down.png" onClick="showText(this,'textOne')" alt="">
                </div>
                <div class="text">
                <?=$row_text['description']?>
                </div>
            </div>
            <div class="textTwo" id="textTwo">
                <div class="title">
                Состав и уход
                <img src="img/down.png" onClick="showText(this,'textTwo')" alt="">
                </div>
                <div class="text">
                <?=$row_text['sostav']?>
            </div>
            </div>
        
        </div>

    </div>
</div>

<div class="obraz">
    <p>Весь образ</p>
    <div class="cart">
    <div class="cartBlock">
                <div class="itemSave">
                    <button>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.50061 1.89671C9.26233 0.314993 11.9848 0.367492 13.682 2.06771C15.3785 3.76868 15.437 6.47763 13.859 8.24459L7.49911 14.6135L1.14073 8.24459C-0.437237 6.47763 -0.377988 3.76418 1.31773 2.06771C3.01645 0.369742 5.73365 0.312743 7.50061 1.89671ZM12.62 3.12744C11.495 2.00096 9.68007 1.95521 8.50259 3.01269L7.50136 3.91118L6.49938 3.01344C5.31816 1.95446 3.50694 2.00096 2.37896 3.12894C1.26148 4.24642 1.20523 6.03514 2.23496 7.21711L7.49986 12.4903L12.7648 7.21786C13.7952 6.03514 13.739 4.24867 12.62 3.12744Z" fill="white"/>
                            </svg>
                    </button>
                </div>
                <div class="itemImage">
                    <img src="img/item1.png" alt="">
                </div>
                <div class="itemName">
                    <p>Белая куртка <span>new</span></p>
                </div>
                <div class="itemByu">
                    <p>2900 руб.</p>
                </div>
                <div class="itemSize">
                   <span>XXS</span>
                   <span>XS</span>
                   <span>S</span>
                </div>
                <div class="itemColor">
                   <span class="white"></span>
                   <span class="Blue"></span>
                   <span class="yellow"></span>
                </div>
            </div>
            <div class="cartBlock">
                <div class="itemSave">
                    <button>
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.50061 1.89671C9.26233 0.314993 11.9848 0.367492 13.682 2.06771C15.3785 3.76868 15.437 6.47763 13.859 8.24459L7.49911 14.6135L1.14073 8.24459C-0.437237 6.47763 -0.377988 3.76418 1.31773 2.06771C3.01645 0.369742 5.73365 0.312743 7.50061 1.89671ZM12.62 3.12744C11.495 2.00096 9.68007 1.95521 8.50259 3.01269L7.50136 3.91118L6.49938 3.01344C5.31816 1.95446 3.50694 2.00096 2.37896 3.12894C1.26148 4.24642 1.20523 6.03514 2.23496 7.21711L7.49986 12.4903L12.7648 7.21786C13.7952 6.03514 13.739 4.24867 12.62 3.12744Z" fill="white"/>
                            </svg>
                    </button>
                </div>
                <div class="itemImage">
                    <img src="img/item1.png" alt="">
                </div>
                <div class="itemName">
                    <p>Белая куртка <span>new</span></p>
                </div>
                <div class="itemByu">
                    <p>2900 руб.</p>
                </div>
                <div class="itemSize">
                   <span>XXS</span>
                   <span>XS</span>
                   <span>S</span>
                </div>
                <div class="itemColor">
                   <span class="white"></span>
                   <span class="Blue"></span>
                   <span class="yellow"></span>
                </div>
            </div>
    </div>
    
</div>


<?  require_once('block/footer.php'); ?>
<script>
    let showOne = false;
    function showText(img, id) {
        let block = document.getElementById(id);
        if(showOne === false){
            block.style = 'height: 60px;';
            img.style = 'transform: rotate(180deg);';
            showOne = true;

        }
        else if (showOne === true){
            block.style = 'height:auto;';
            img.style = 'transform: rotate(0deg);';
            showOne = false;
        }
    }
    function showImg(event)
    {
        event = event || window.event; // получаем объект события
        var iconImg = event.Target || event.srcElement; // определяем текущий объект
        if (iconImg.tagName == "IMG"){ // если тип элемента - изображение, то
            document.getElementById("bigImg").src = iconImg.getAttribute('src');  // меняем значение src у элемента с id="bigImg" на src текущего объекта 
        }
    }
</script>
</body>
</html>