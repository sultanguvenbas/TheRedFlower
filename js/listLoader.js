class Product {
  constructor(name, tag, price, image) {
    this.name = name;
    this.tag = tag;
    this.price = price;
    this.inCart = 1;
    this.image = image;
  }
}

let products = localStorage.getItem("products");
if (products)
  products = JSON.parse(products)
else
  products = {
    '7 Kırmızı Gül': new Product('7 Kırmızı Gül', '7 Kırmızı Gül', 69),
    'Doğal Ahşap Kütükte Papatya Aranjmanı': new Product('Doğal Ahşap Kütükte Papatya Aranjmanı', 'Doğal Ahşap Kütükte Papatya Aranjmanı', 49),
    'Pembe Rüyalar Karanfil Aranjmanı': new Product('Pembe Rüyalar Karanfil Aranjmanı', 'Pembe Rüyalar Karanfil Aranjmanı', 79),
    'Orkideler': new Product('Orkideler', 'Orkideler', 64),
    'Papatya Karnavalı': new Product('Papatya Karnavalı', 'Papatya Karnavalı', 69),
    'Lilyum Aranjmanı': new Product('Lilyum Aranjmanı', 'Lilyum Aranjmanı', 74),
    'Aşk Pembesi Gerberalar': new Product('Aşk Pembesi Gerberalar', 'Aşk Pembesi Gerberalar', 59),
    'Sevgi Bahçesi 11 Kırmızı Gül': new Product('Sevgi Bahçesi 11 Kırmızı Gül', 'Sevgi Bahçesi 11 Kırmızı Gül', 79),
    'Kütükte Çiçek Bahçesi': new Product('Kütükte Çiçek Bahçesi', 'Kütükte Çiçek Bahçesi', 59),
    'Papatya Bahçesi': new Product('Papatya Bahçesi', 'Papatya Bahçesi', 65),
    '9 Beyaz Gül Aranjmanı': new Product('9 Beyaz Gül Aranjmanı', '9 Beyaz Gül Aranjmanı', 79),
    'Doğal Ahşap Kütükte Renkli Papatya Aranjmanı': new Product('Doğal Ahşap Kütükte Renkli Papatya Aranjmanı', 'Doğal Ahşap Kütükte Renkli Papatya Aranjmanı', 59),
    '2 Dal Beyaz Orkide Çiçeği': new Product('2 Dal Beyaz Orkide Çiçeği', '2 Dal Beyaz Orkide Çiçeği', 139),
    'Kar Beyaz Gül ve Lilyum': new Product('Kar Beyaz Gül ve Lilyum', 'Kar Beyaz Gül ve Lilyum', 129),
    'Bahar Büyüsü Sarı Gerberalar': new Product('Bahar Büyüsü Sarı Gerberalar', 'Bahar Büyüsü Sarı Gerberalar', 59)
  };

let cart = localStorage.getItem("cart");
if (cart)
  cart = JSON.parse(cart);
else
  cart = [];

function saveProducts() {
  localStorage.setItem("products", JSON.stringify(products));
}

//saving local
function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  setBasketName()
  if (loadBasketItems)
    loadBasketItems();
}


function setBasketName() {
  let basket = document.getElementById("basket");
  let name = "Basket";
  if (cart.length > 0)
    name += ` (${cart.length})`;
  basket.innerHTML = name;
}
