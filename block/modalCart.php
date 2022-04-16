
<!-- модалка -->
<div id="myCart">
    <div class="title">
        <button onClick="CloseCart()">X</button>
    </div>
    <div id="wriper">
    </div>
    <div class="footer">
        <div class="inputUser">
            <input type="text" placeholder="Введите ваше имя!" id="orderName">
            <input type="text" placeholder="Введите ваш номер телефона" id="orderPhone">
            <input type="button" value="Заказать" onClick="onOrders('orderName', 'orderPhone');">
        </div>
        <div class="itog"></div>
    </div>
</div>