console.log("hi");

// NAVBAR
const navbarind = document.getElementById("navbarind");
const home = document.getElementById("menu-home");
const order = document.getElementById("menu-order");
const history = document.getElementById("menu-history");
const account = document.getElementById("menu-account");

home.addEventListener("click", function () {
	console.log("clicked HOME!");
	navbarind.classList.remove("pos-2");
	navbarind.classList.remove("pos-3");
	navbarind.classList.remove("pos-4");
	navbarind.classList.add("pos-1");
});
order.addEventListener("click", function () {
	console.log("clicked HOME!");
	navbarind.classList.remove("pos-1");
	navbarind.classList.remove("pos-3");
	navbarind.classList.remove("pos-4");
	navbarind.classList.add("pos-2");
});
history.addEventListener("click", function () {
	console.log("clicked HOME!");
	navbarind.classList.remove("pos-1");
	navbarind.classList.remove("pos-2");
	navbarind.classList.remove("pos-4");
	navbarind.classList.add("pos-3");
});
account.addEventListener("click", function () {
	console.log("clicked HOME!");
	navbarind.classList.remove("pos-1");
	navbarind.classList.remove("pos-2");
	navbarind.classList.remove("pos-3");
	navbarind.classList.add("pos-4");
});

order.addEventListener("click", function () {
	console.log("clicked ORDER!");
});

history.addEventListener("click", function () {
	console.log("clicked HISTORY!");
});

account.addEventListener("click", function () {
	console.log("clicked ACCOUNT!");
});