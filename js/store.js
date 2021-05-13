function loadProducts() {
  let itemsGrid = document.getElementById("itemsGrid");
  for (let i in products) {
    let item=products[i];
    itemsGrid.innerHTML += `
    <div class="item">
      <img src="${item.image || `img/${item.name}.png`}" alt="pic"/>
      <h3>${item.name}</h3>
      <h4 style="margin:0">${item.tag}</h4>
      <h3 class="price">$${item.price},00</h3>
      <button class="store-button" onClick="addToCart('${item.name}')">Add to basket</button>
    </div>
    `;
  }
}
