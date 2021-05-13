function addItem() {
  let name = document.getElementById("name").value;
  let price = document.getElementById("price").value;
  let tag = document.getElementById("tag").value;
  let file = document.getElementById("file").files[0];
  let reader = new FileReader();//convert to base64
  reader.onload = function () {
    products[name] = new Product(name, tag, price, reader.result);
    saveProducts();
  };
  reader.readAsDataURL(file);
  clear(name + " was added!")
}

function deleteItem() {
  let itemname=document.getElementById("itemname");
  let name = itemname.value;
  if(!products[name])
    return alert(name+" was not found!");
  delete products[name];
  saveProducts();
  alert(name + " was deleted!")
  itemname.value = '';
}

function clear(message) {

  document.getElementById("name").value = '';
  document.getElementById("price").value = '';
  document.getElementById("tag").value = '';
  document.getElementById("file").value = '';
  alert(message);
}


function deleteItems(){
  localStorage.removeItem("products");
  alert("Items were reset to default products!");
}
