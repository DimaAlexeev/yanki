document.getElementById('categoriiLeft').onclick = slider;
let itemPosition = 0;
let sumItem = document.getElementsByClassName('cartImg');
let sumPolosa = sumItem.length * 289;
console.log(sumPolosa);
function slider(){
    const polosa = document.getElementById('polosa');
    if(itemPosition <= -sumPolosa + 1240){
        itemPosition = 0;
        polosa.style.left = itemPosition+'px';
        return;
    }
    
    itemPosition -= 289;
    polosa.style.left = itemPosition+'px';
    console.log(itemPosition);
}