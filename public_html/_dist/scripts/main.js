// NAVBAR
const navbar = document.getElementById("navbar");
const navbarind = document.getElementById("navbarind");
const home = document.getElementById("menu-home");
const order = document.getElementById("menu-order");
const history = document.getElementById("menu-history");
const account = document.getElementById("menu-account");

let current_url = window.location.href;

function goHome(){
	navbarind.classList.remove("pos-2");
	navbarind.classList.remove("pos-3");
	navbarind.classList.remove("pos-4");
	navbarind.classList.add("pos-1");
}
function goOrder(){
	navbarind.classList.remove("pos-1");
	navbarind.classList.remove("pos-3");
	navbarind.classList.remove("pos-4");
	navbarind.classList.add("pos-2");
}
function goHistory(){
	navbarind.classList.remove("pos-1");
	navbarind.classList.remove("pos-2");
	navbarind.classList.remove("pos-4");
	navbarind.classList.add("pos-3");
}
function goAccount(){
	navbarind.classList.remove("pos-1");
	navbarind.classList.remove("pos-2");
	navbarind.classList.remove("pos-3");
	navbarind.classList.add("pos-4");
}

if (current_url.includes("order") || current_url.includes("checkout") || current_url.includes("cart")) {
	goOrder();
}
else if (current_url.includes("history")) {
	goHistory();
}
else if (current_url.includes("account")) {
	goAccount();
}
else{
	goHome();
}

home.addEventListener("click", function () {
	goHome();
});
order.addEventListener("click", function () {
	goOrder();
});
history.addEventListener("click", function () {
	goHistory();
});
account.addEventListener("click", function () {
	goAccount();
});
