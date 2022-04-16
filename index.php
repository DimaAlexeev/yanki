<!DOCTYPE html>
<html lang="ru">
<head>
    <?require_once('block/head.php');?>
</head>
<body>
    <div class="header">
        <div class="headerMenu">
            <div class="menuLinks">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="katalog.php">КАТАЛОГ</a></li>
                    <li><a href="onas.php">О НАС</a></li>
                </ul>
            </div>
            <div class="nameSite"> YANKI </div>
            <div class="menuIcons">
                <img src="img/search.png" alt="поиск">
                <img src="img/user.png" alt="пользователь">
                <img src="img/izbrannoe.png" alt="избранное">
                <img src="img/cart.png"  onClick="showCart()" alt="Корзина">
            </div>
        </div>
        <div class="headerCenter">
            <p>Новая коллекция</p>
            <span></span>
            <a href="#">Смотреть Новинки <img src="img/shevron.svg" alt=""></a>
        </div>
    </div>

    <div class="categorii">
        <div class="title">
            <p>
                Категории
            </p>
        </div>
        <div class="content">
            <div id="polosa">

                <div class="cartImg">
                    <img src="img/item1.png" alt="">
                    <div class="name">Куртки</div>
                </div>

                <div class="cartImg">
                    <img src="img/item2.png" alt="">
                    <div class="name">Куртки</div>
                </div>

                <div class="cartImg">
                    <img src="img/item3.png" alt="">
                    <div class="name">Куртки</div>
                </div>

                <div class="cartImg">
                    <img src="img/item4.png" alt="">
                    <div class="name">Куртки</div>
                </div>

                <div class="cartImg">
                    <img src="img/item3.png" alt="">
                    <div class="name">Куртки</div>
                </div>
                <div class="cartImg">
                    <img src="img/item3.png" alt="">
                    <div class="name">Куртки</div>
                </div>
                   
            </div>
        </div>
        <button id="categoriiLeft">
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0H40V40H0V0Z" fill="#E0BEA2"/>
            <path d="M21.8818 20.1334L13.0666 11.3182L15.5847 8.80005L26.9181 20.1334L15.5847 31.4667L13.0666 28.9486L21.8818 20.1334Z" fill="white"/>
            </svg>
        </button>
    </div>

    <div class="newFirst">
        <div class="title">Узнайте  первым о новинках</div>
        <div class="content">
            <input type="mail" placeholder="Ваш e-mail*">
            <input type="button" value="ПОДПИСАТЬСЯ">
            <p>
                Нажимая на кнопку «Подписаться», я соглашаюсь на обработку моих персональных данных и ознакомлен(а) с условиями конфиденциальности.
            </p>
        </div>
    </div>
    <?
     require_once('block/footer.php');
     require_once('block/modalCart.php');
     ?>
    <script src="script/script.js"></script>
</body>
</html>