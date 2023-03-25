<?php
include_once __DIR__ . '/../../app.php';

// get menu data from database
$id = sanitize_value($_GET['id']);
$query = "SELECT * FROM menu WHERE id='{$id}'";
$result = mysqli_query($db_connection, $query);
$menuItems = get_menu();
if ($result->num_rows > 0) {
    // Get row from results and assign to $menuItem variable;
    $menuItem = mysqli_fetch_assoc($result);
} else {
    $error_message = 'Menu item does not exist';
}

$page_title = 'Order';
include_once __DIR__ . '/../../_components/header.php';
include_once __DIR__ . '/../../_components/order_header.php';
?>

<?php
    $site_url = site_url();
    echo"
        <div class='top_nav'>
            <a class='back_button' href='{$site_url}/final/order/index.php'>
                <img src='{$site_url}/_dist/images/final/arrow.png' alt='back'>
            </a>
            <h1 class='top_nav_title'>{$menuItem['name']}</h1>
        </div>
    ";
	echo"<div class='customize_container'>";
		echo"<div class='customize_toppings_and_info'>";

		include_once __DIR__ . '/../../_components/toppings.php';

		echo"
			<div class='order_item_info'>
				<img class='info-icon' src='{$site_url}/_dist/images/final/info-icon.png' alt='info'>
				<p class='info_text'>{$menuItem['item_description']}</p>
			</div>
		</div>
		";
		
		echo"
			<form class='customize_form' action='{$site_url}/_includes/add_order.php' method='POST'>
				<input type='hidden' name='item_name' value='{$menuItem['name']}'>
		";
		include_once __DIR__ . '/../../_components/added_toppings.php';
	echo"</div>";

    include_once __DIR__ . '/../../_components/temperature_modal.php';

    $price = '$' . number_format($menuItem['price']/100, 2);

    echo"
            <div class='order_footer'>
                <h1 class='order_price js-order-price'>{$price}</h1>
                <input type='hidden' name='item_price' id='order_price' value='{$price}'>
                <button class='button add_cart_button' type='submit'>ADD TO CART</button>
            </div>
    ";
?>
            <input type='hidden' name='order_id' id='order_id' value='<?php echo $userOrder['id'] ?>'>
            <input type='hidden' name='menu_item_id' id='menu_id' value='<?php echo $menuItem['id'] ?>'>
        </form>

<?php
include_once __DIR__ . '/../../_components/footer.php';
?>

<script>
/* TOPPINGS ELEMENTS */
const order_price_obj = document.querySelector(".js-order-price");

let order_price = Number(document.querySelector(".js-order-price").innerHTML.substring(1));

// for bacon
const bacon_plus_btn = document.querySelector(".js-plus-bacon");
const bacon_minus_btn = document.querySelector(".js-minus-bacon");
let bacon_value = document.querySelector(".js-value-bacon");
let bacon_ammount = 1;
// for egg
const egg_plus_btn = document.querySelector(".js-plus-fried_egg");
const egg_minus_btn = document.querySelector(".js-minus-fried_egg");
let egg_value = document.querySelector(".js-value-fried_egg");
let egg_ammount = 1;
// for mushroom
const mushroom_plus_btn = document.querySelector(".js-plus-mushroom");
const mushroom_minus_btn = document.querySelector(".js-minus-mushroom");
let mushroom_value = document.querySelector(".js-value-mushroom");
let mushroom_ammount = 1;
// for onions
const onions_plus_btn = document.querySelector(".js-plus-onions");
const onions_minus_btn = document.querySelector(".js-minus-onions");
let onions_value = document.querySelector(".js-value-onions");
let onions_ammount = 1;
// for double meat
const meat_plus_btn = document.querySelector(".js-plus-double_meat");
const meat_minus_btn = document.querySelector(".js-minus-double_meat");
let meat_value = document.querySelector(".js-value-double_meat");
let meat_ammount = 1;
// for tomato
const tomato_plus_btn = document.querySelector(".js-plus-tomato");
const tomato_minus_btn = document.querySelector(".js-minus-tomato");
let tomato_value = document.querySelector(".js-value-tomato");
let tomato_ammount = 1;
// for lettuce
const lettuce_plus_btn = document.querySelector(".js-plus-lettuce");
const lettuce_minus_btn = document.querySelector(".js-minus-lettuce");
let lettuce_value = document.querySelector(".js-value-lettuce");
let lettuce_ammount = 1;
// for pickles
const pickles_plus_btn = document.querySelector(".js-plus-pickles");
const pickles_minus_btn = document.querySelector(".js-minus-pickles");
let pickles_value = document.querySelector(".js-value-pickles");
let pickles_ammount = 1;

const bacon_btn = document.querySelector(".js-bacon-btn");
const egg_btn = document.querySelector(".js-fried_egg-btn");
const mushroom_btn = document.querySelector(".js-mushroom-btn");
const onions_btn = document.querySelector(".js-onions-btn");
const meat_btn = document.querySelector(".js-double_meat-btn");
const tomato_btn = document.querySelector(".js-tomato-btn");
const lettuce_btn = document.querySelector(".js-lettuce-btn");
const pickles_btn = document.querySelector(".js-pickles-btn");

const bacon_btn_img = document.querySelector(".js-bacon-btn-img");
const egg_btn_img = document.querySelector(".js-fried_egg-btn-img");
const mushroom_btn_img = document.querySelector(".js-mushroom-btn-img");
const onions_btn_img = document.querySelector(".js-onions-btn-img");
const meat_btn_img = document.querySelector(".js-double_meat-btn-img");
const tomato_btn_img = document.querySelector(".js-tomato-btn-img");
const lettuce_btn_img = document.querySelector(".js-lettuce-btn-img");
const pickles_btn_img = document.querySelector(".js-pickles-btn-img");

const bacon_modal = document.querySelector(".js-bacon-modal");
const egg_modal = document.querySelector(".js-fried_egg-modal");
const mushroom_modal = document.querySelector(".js-mushroom-modal");
const onions_modal = document.querySelector(".js-onions-modal");
const meat_modal = document.querySelector(".js-double_meat-modal");
const tomato_modal = document.querySelector(".js-tomato-modal");
const lettuce_modal = document.querySelector(".js-lettuce-modal");
const pickles_modal = document.querySelector(".js-pickles-modal");

/* FUNCTIONALITY TO INCREASE AND DECREASE THE AMMOUNT OF TOPPINGS USING THEIR RESPECTIVE + AND - BTNS */
const formatter = new Intl.NumberFormat('en-US', {
	style: 'currency',
	currency: 'USD',
  });

function updatePrice(){
	document.getElementById("order_price").setAttribute("value", order_price);
}

bacon_plus_btn.addEventListener("click", function () {
	if (bacon_ammount <5) {
		bacon_ammount+=1;
		bacon_value.innerHTML = bacon_ammount.toString();
		order_price +=2;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});
bacon_minus_btn.addEventListener("click", function () {
	if (bacon_ammount >1) {
		bacon_ammount-=1;
		bacon_value.innerHTML = bacon_ammount.toString();
		order_price -=2;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		bacon_modal.classList.add("hide");
		bacon_btn_img.classList.remove("selected");
		bacon_ammount = 0;
		order_price -=2;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});

egg_plus_btn.addEventListener("click", function () {
	if (egg_ammount <5) {
		egg_ammount+=1;
		egg_value.innerHTML = egg_ammount.toString();
		order_price +=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});
egg_minus_btn.addEventListener("click", function () {
	if (egg_ammount >1) {
		egg_ammount-=1;
		egg_value.innerHTML = egg_ammount.toString();
		order_price -=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		egg_modal.classList.add("hide");
		egg_btn_img.classList.remove("selected");
		egg_ammount = 0;
		order_price -=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});

mushroom_plus_btn.addEventListener("click", function () {
	if (mushroom_ammount <5) {
		mushroom_ammount+=1;
		mushroom_value.innerHTML = mushroom_ammount.toString();
		order_price +=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});
mushroom_minus_btn.addEventListener("click", function () {
	if (mushroom_ammount >1) {
		mushroom_ammount-=1;
		mushroom_value.innerHTML = mushroom_ammount.toString();
		order_price -=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		mushroom_modal.classList.add("hide");
		mushroom_btn_img.classList.remove("selected");
		mushroom_ammount = 0;
		order_price -=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});

onions_plus_btn.addEventListener("click", function () {
	if (onions_ammount <5) {
		onions_ammount+=1;
		onions_value.innerHTML = onions_ammount.toString();
		order_price +=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});
onions_minus_btn.addEventListener("click", function () {
	if (onions_ammount >1) {
		onions_ammount-=1;
		onions_value.innerHTML = onions_ammount.toString();
		order_price -=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		onions_modal.classList.add("hide");
		onions_btn_img.classList.remove("selected");
		onions_ammount = 0;
		order_price -=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});

meat_plus_btn.addEventListener("click", function () {
	if (meat_ammount <5) {
		meat_ammount+=1;
		meat_value.innerHTML = meat_ammount.toString();
		order_price +=5;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});
meat_minus_btn.addEventListener("click", function () {
	if (meat_ammount >1) {
		meat_ammount-=1;
		meat_value.innerHTML = meat_ammount.toString();
		order_price -=5;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		meat_modal.classList.add("hide");
		meat_btn_img.classList.remove("selected");
		meat_ammount = 0;
		order_price -=5;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	updatePrice();
});

tomato_plus_btn.addEventListener("click", function () {
	if (tomato_ammount <5) {
		tomato_ammount+=1;
		tomato_value.innerHTML = tomato_ammount.toString();
	}
	updatePrice();
});
tomato_minus_btn.addEventListener("click", function () {
	if (tomato_ammount >1) {
		tomato_ammount-=1;
		tomato_value.innerHTML = tomato_ammount.toString();
	}
	else{
		tomato_modal.classList.add("hide");
		tomato_btn_img.classList.remove("selected");
		tomato_ammount = 0;
	}
	updatePrice();
});

lettuce_plus_btn.addEventListener("click", function () {
	if (lettuce_ammount <5) {
		lettuce_ammount+=1;
		lettuce_value.innerHTML = lettuce_ammount.toString();
	}
	updatePrice();
});
lettuce_minus_btn.addEventListener("click", function () {
	if (lettuce_ammount >1) {
		lettuce_ammount-=1;
		lettuce_value.innerHTML = lettuce_ammount.toString();
	}
	else{
		lettuce_modal.classList.add("hide");
		lettuce_btn_img.classList.remove("selected");
		lettuce_ammount = 0;
	}
	updatePrice();
});

pickles_plus_btn.addEventListener("click", function () {
	if (pickles_ammount <5) {
		pickles_ammount+=1;
		pickles_value.innerHTML = pickles_ammount.toString();
	}
	updatePrice();
});
pickles_minus_btn.addEventListener("click", function () {
	if (pickles_ammount >1) {
		pickles_ammount-=1;
		pickles_value.innerHTML = pickles_ammount.toString();
	}
	else{
		pickles_modal.classList.add("hide");
		pickles_btn_img.classList.remove("selected");
		pickles_ammount = 0;
	}
	updatePrice();
});

/* FUNCTIONALITY TO SHOW THE TOPPING MODAL WHEN THE RESPECTIVE TOPPING BUTTON IS CLICKED */
bacon_btn.addEventListener("click", function () {
	if (bacon_modal.classList.contains("hide")){
		bacon_modal.classList.remove("hide");
		bacon_btn_img.classList.add("selected");
		bacon_ammount = 1;
		order_price +=2;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		bacon_modal.classList.add("hide");
		bacon_btn_img.classList.remove("selected");
		order_price -=2*bacon_ammount;
		bacon_ammount = 0;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	bacon_value.innerHTML = bacon_ammount.toString();
	updatePrice();
});

egg_btn.addEventListener("click", function () {
	if (egg_modal.classList.contains("hide")){
		egg_modal.classList.remove("hide");
		egg_btn_img.classList.add("selected");
		egg_ammount = 1;
		order_price +=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		egg_modal.classList.add("hide");
		egg_btn_img.classList.remove("selected");
		order_price -=1*egg_ammount;
		egg_ammount = 0;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	egg_value.innerHTML = egg_ammount.toString();
	updatePrice();
});

mushroom_btn.addEventListener("click", function () {
	if (mushroom_modal.classList.contains("hide")){
		mushroom_modal.classList.remove("hide");
		mushroom_btn_img.classList.add("selected");
		mushroom_ammount = 1;
		order_price +=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		mushroom_modal.classList.add("hide");
		mushroom_btn_img.classList.remove("selected");
		order_price -=1*mushroom_ammount;
		mushroom_ammount = 0;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	mushroom_value.innerHTML = mushroom_ammount.toString();
	updatePrice();
});

onions_btn.addEventListener("click", function () {
	if (onions_modal.classList.contains("hide")){
		onions_modal.classList.remove("hide");
		onions_btn_img.classList.add("selected");
		onions_ammount = 1;
		order_price +=1;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		onions_modal.classList.add("hide");
		onions_btn_img.classList.remove("selected");
		order_price -=1*onions_ammount;
		onions_ammount = 0;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	onions_value.innerHTML = onions_ammount.toString();
	updatePrice();
});

meat_btn.addEventListener("click", function () {
	if (meat_modal.classList.contains("hide")){
		meat_modal.classList.remove("hide");
		meat_btn_img.classList.add("selected");
		meat_ammount = 1;
		order_price +=5;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	else{
		meat_modal.classList.add("hide");
		meat_btn_img.classList.remove("selected");
		order_price -=5*meat_ammount;
		meat_ammount = 0;
		order_price_obj.innerHTML = formatter.format(order_price);
	}
	meat_value.innerHTML = meat_ammount.toString();
	updatePrice();
});

tomato_btn.addEventListener("click", function () {
	if (tomato_modal.classList.contains("hide")){
		tomato_modal.classList.remove("hide");
		tomato_btn_img.classList.add("selected");
		tomato_ammount = 1;
	}
	else{
		tomato_modal.classList.add("hide");
		tomato_btn_img.classList.remove("selected");
		tomato_ammount = 0;
	}
	tomato_value.innerHTML = tomato_ammount.toString();
	updatePrice();
});

lettuce_btn.addEventListener("click", function () {
	if (lettuce_modal.classList.contains("hide")){
		lettuce_modal.classList.remove("hide");
		lettuce_btn_img.classList.add("selected");
		lettuce_ammount = 1;
	}
	else{
		lettuce_modal.classList.add("hide");
		lettuce_btn_img.classList.remove("selected");
		lettuce_ammount = 0;
	}
	lettuce_value.innerHTML = lettuce_ammount.toString();
	updatePrice();
});

pickles_btn.addEventListener("click", function () {
	if (pickles_modal.classList.contains("hide")){
		pickles_modal.classList.remove("hide");
		pickles_btn_img.classList.add("selected");
		pickles_ammount = 1;
	}
	else{
		pickles_modal.classList.add("hide");
		pickles_btn_img.classList.remove("selected");
		pickles_ammount = 0;
	}
	pickles_value.innerHTML = pickles_ammount.toString();
	updatePrice();
});
</script>