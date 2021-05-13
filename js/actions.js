function addToCart(itemName) {
  let foundItem = false;
  for (let i of cart)
    if (i.name == itemName) {
      i.inCart++;
      foundItem = true;
    }
  if (!foundItem)
    cart.push(products[itemName]);

  saveCart();
}

function removeFromCart(id) {
  let item = cart[id];
  if (item.inCart > 1)
    item.inCart--;
  else
    cart.splice(id,1);
  saveCart();
}


function addProduct(product){
  products.push(product);
  saveProducts();
}
