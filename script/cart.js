function inCart(id,name,bye,img){
    let cart = JSON.parse(localStorage.getItem('item'));
    let insert = true;

    selectColor = document.getElementById('selectColor').value;
    selectSize = document.getElementById('selectSize').value;

    if(!cart) {
        cart = [];
    }

    cart?.forEach((element, key) => {
        if(element.id === id){
            cart[key].summ += 1;
            insert = false;
        }
    });
    
    if(insert){
        cart.push(
            {
                id,
                name, 
                bye,
                selectColor,
                selectSize,
                img,
                summ: 1,
            }
        );
    }
    
    localStorage.setItem('item', JSON.stringify(cart));
}

function showCart() {
    const myCart = document.getElementById("myCart");
    myCart.style = "display: block";
    const wriper = myCart.children[1];
    const footer = myCart.children[2];

    let cart = JSON.parse(localStorage.getItem('item'));
    
    if(!cart) {
        wriper.innerHTML = '<h1>Корзина пуста!!</h1>';
    }

    let textWriper = "";
    let itog = 0;
    cart.map((value) => {
        textWriper += `<div class="cartRow">`;
        textWriper += `<div> ${value.name} </div>`;
        textWriper += `<div> ${value.selectColor} </div>`;
        textWriper += `<div> ${value.selectSize} </div>`;
        textWriper += `<div> ${value.bye} </div>`;
        textWriper += `<div> <input type="number" value='${value.summ}' onBlur="updateSumm(${value.id},this)"></div>`;
        textWriper += `<div> <img src='${value?.img}'> </div>`;
        textWriper += `<div> <button onClick="DeleteItem(${value.id})" class='deleteItemCart'>X</button> </div>`;
        textWriper += `</div>`;
        itog += value.bye * value.summ;
    })

    footer.children[1].innerHTML = 'К оплате: '+itog+' руб.';
    wriper.innerHTML = textWriper;
}

function CloseCart() {
    document.getElementById("myCart").style = "display: none";
}

function DeleteItem(id) {
    let cart = JSON.parse(localStorage.getItem('item'));
    let newCart = cart.filter((value)=> value.id !== id);
    localStorage.setItem('item', JSON.stringify(newCart));
    showCart();
}

function updateSumm(id,num){
    let cart = JSON.parse(localStorage.getItem('item'));
    cart?.forEach((element, key) => {
        if(element.id === id){
            cart[key].summ = num.value;
        }
    });
    localStorage.setItem('item', JSON.stringify(cart));
    showCart();
}

function onOrders(id_name, id_phone) {
    let cart = JSON.parse(localStorage.getItem('item'));
    let name = document.getElementById(id_name).value;
    let phone = document.getElementById(id_phone).value;
    let order = JSON.stringify([cart, name, phone]);
     
    fetch('lib/order.php', {
        method:"POST",
        headers:{
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: order
    }).then(() => {
        alert("Ваш заказ принят! Ожидайте звонка от специалиста!");
        localStorage.clear();
        showCart();
    });
}