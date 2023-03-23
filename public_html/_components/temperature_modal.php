<?php
    $site_url = site_url();

?>

<div class="temperature_container">
    <h4 class="temperature_container_title">How would you like it done?</h4>
    <div class="temperature_images">
        <input id="rare" value="rare" type="radio" name="temperature" hidden>
        <label class="" for="rare">
            <div class="temperature_image js-rare-btn">
                <img class="temperature_image--img js-rare-btn-img" src="<?php $site_url?>/_dist/images/customize_page/ion_rare.svg" alt="rare">
                <p class="temperature_title js-rare-title">Rare</p>
            </div>
        </label>
        <input id="medium" value="medium" type="radio" name="temperature" hidden>
        <label class="" for="medium">
            <div class="temperature_image temperature_selected js-medium-btn">
                <img class="temperature_image--img js-medium-btn-img" src="<?php $site_url?>/_dist/images/customize_page/ion_medium.svg" alt="medium">
                <p class="temperature_title js-medium-title">Medium</p>
            </div>
        </label>
        <input id="well-done" value="well-done" type="radio" name="temperature" hidden>
        <label class="" for="well-done">
            <div class="temperature_image js-well-done-btn">
                <img class="temperature_image--img js-well-done-btn-img" src="<?php $site_url?>/_dist/images/customize_page/ion_well-done.svg" alt="well done">
                <p class="temperature_title js-well-done-title">Well-Done</p>
            </div>
        </label>
    </div>
</div>

<script>
/* TEMPERATURE MODAL ELEMENTS */
const rare_btn = document.querySelector(".js-rare-btn");
const rare_title = document.querySelector(".js-rare-title");
const medium_btn = document.querySelector(".js-medium-btn");
const medium_title = document.querySelector(".js-medium-title");
const well_done_btn = document.querySelector(".js-well-done-btn");
const well_done_title = document.querySelector(".js-well-done-title");

/* TEMPERATURE MODAL FUNCTIONALITY */
rare_btn.addEventListener("click", function () {
	rare_btn.classList.toggle("temperature_selected");
	rare_title.classList.toggle("temperature_selected");

	medium_btn.classList.remove("temperature_selected");
	medium_title.classList.remove("temperature_selected");

	well_done_btn.classList.remove("temperature_selected");
	well_done_title.classList.remove("temperature_selected");
});

medium_btn.addEventListener("click", function () {
	medium_btn.classList.toggle("temperature_selected");
	medium_title.classList.toggle("temperature_selected");

	rare_btn.classList.remove("temperature_selected");
	rare_title.classList.remove("temperature_selected");

	well_done_btn.classList.remove("temperature_selected");
	well_done_title.classList.remove("temperature_selected");
});

well_done_btn.addEventListener("click", function () {
	well_done_btn.classList.toggle("temperature_selected");
	well_done_title.classList.toggle("temperature_selected");

	rare_btn.classList.remove("temperature_selected");
	rare_title.classList.remove("temperature_selected");

	medium_btn.classList.remove("temperature_selected");
	medium_title.classList.remove("temperature_selected");
});
</script>