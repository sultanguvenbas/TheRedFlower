function addToCart(id, name, tag, price) {
  let foundItem = false;
  for (let i of cart)
    if (i.name == name) {
      i.inCart++;
      foundItem = true;
    }
  if (!foundItem)
    cart.push({id, name, tag, price, inCart:1});
  saveCart();
}

function removeFromCart(id) {
  let index=0;
  for(let i=0; i<cart.length; i++){
    if(cart[i].id==id){
      index=i;
      break;
    }
  }

  let item = cart[index];
  if (item.inCart > 1)
    item.inCart--;
  else
    cart.splice(index,1);
  saveCart();
}


function addProduct(product){
  products.push(product);
  saveProducts();
}
