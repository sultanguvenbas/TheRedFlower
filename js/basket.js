function loadBasketItems() {
  let total = document.getElementById("totalText");
  let cartList = document.getElementById("cartList");
  cartList.innerHTML = "";
  let pricefull = 0;
  for (let i = 0; i < cart.length; i++) {
    let item = cart[i];
    pricefull += item.price * item.inCart;
    cartList.innerHTML += `
            <div class="item">
            <img src="${item.image || `img/${item.name}.png`}" alt="pic"/>
            <div class="item-texts">
                <h3>${item.name}</h3>
                <h4>${item.tag}</h4>
                <h3 class="price">$${item.price},00</h3>
            </div>
            <div class="item-nums">
            <form method='post'>
                <input name='itemId' style='display: none' value='${item.id}'/>
                <button class="store-button" formaction='actions/removeFromBasket.php'>-</button>
                <h3 style="margin:0.5em">Amount: ${item.inCart}</h3>
                <button class="store-button"  formaction='actions/addToBasket.php'>+</button>
            </form>
            </div>
        </div>
    `
  }
  if (pricefull == 0) {
    document.getElementById("nothing").style.display = "unset";
    total.innerText = "";
  } else {
    document.getElementById("nothing").style.display = "none";
    total.innerText = `Total: $${pricefull},00`;
  }
}


function select(index) {
  for (let el of document.getElementsByName("creditcard"))
    el.style.display = index == 0 ? 'flex' : 'none';
  for (let el of document.getElementsByName("wiretransfer"))
    el.style.display = index == 0 ? 'none' : 'flex';
}

function purchase() {
  let style = document.getElementById("payment-options").style;
  style.display = style.display == 'none' ? 'flex' : 'none';
  let button=document.getElementById("purchase-button");
  button.innerText=style.display=='none'?'Purchase now':'Hide form';
}
