let usersObj = localStorage.getItem("usersObj");
if (usersObj)
  usersObj = JSON.parse(usersObj)
else
  usersObj = {"waseem": {password: "admin", "type": "Admin"}}

function signUp() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let type = document.getElementById("userTypeSelect").value;
  if (usersObj[username]) {
    alert("Already existed try another username");
    return;
  }
  usersObj[username] = {password: password, type: type};
  localStorage.setItem("usersObj", JSON.stringify(usersObj));
}

function login() {
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;

  if (usersObj[username] && password == usersObj[username].password) {
    alert("Login Successful");
    localStorage.setItem("loggedUser", username);
  } else {
    alert("check password");
  }
  window.location.href = "./index.html";
  changeButtons();
}

function logOut() {
  localStorage.removeItem("loggedUser");
  alert("You have logged out. Tesekkur")
  changeButtons();
}

function changeButtons() {
  let loggedUser = localStorage.getItem("loggedUser");
  if (loggedUser) {
    document.getElementById("loginLink").style.display = "none";
    document.getElementById("logoutLink").style.display = "flex";

    //document.getElementById("welcomeName").innerText = `Welcome, ${loggedUser} [${usersObj[loggedUser].type}]`;
  } else {
    document.getElementById("loginLink").style.display = "flex";
    document.getElementById("logoutLink").style.display = "none";
    //document.getElementById("welcomeName").innerText ="";

  }
}

changeButtons();
