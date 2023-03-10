<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Project Description';
include_once __DIR__ . '/../_components/header.php';
?>

<body>
    <div class="header">
        <div class="header_images">
            <img class="specs_logo" src="../_dist/images/specs_logo.svg" alt="Specs Logo">
            <h1 class="header_x">X</h1>
            <img class="fortes_logo" src="../_dist/images/forte's-fresh-logo.png" alt="Forte's Logo">
        </div>
    </div>
    <div class="hero">
        <div class="description">
            <h1 class="description_title">Forte's Fresh Burger</h1>
            <p class="description_text">
                Formerly known as the $5 Burger Stop, Forte’s Fresh Burgers is a franchise of burger carts providing fresh food to college campuses in Philadelphia. The owner, Damon Forte, hopes to expand and bring his carts to other campuses all across the US.
            </p>
        </div>
        <div class="hero_image">
            <img class="damon_image" src="../_dist/images/Damon_Forte_with_Truck.jpeg" alt="Damon Forte">
        </div>
    </div>
    <div class="asset_wrapper">
        <div class="user_personas">
            <h1 class="asset_header">User Personas</h1>
            <div class="user_persona_images">
                <picture>
                    <source media="(min-width: 880px)" srcset="../_dist/images/the-spender-desktop.png">
                    <source media="(min-width: 465px)" srcset="../_dist/images/the-spender-mobile.png">
                    <img class="user_persona_image" src="../_dist/images/the-spender-mobile.png">
                </picture>
                <picture>
                    <source media="(min-width: 880px)" srcset="../_dist/images/the-explorer-desktop.png">
                    <source media="(min-width: 465px)" srcset="../_dist/images/the-explorer-mobile.png">
                    <img class="user_persona_image" src="../_dist/images/the-explorer-mobile.png">
                </picture>
                <picture>
                    <source media="(min-width: 880px)" srcset="../_dist/images/the-go-getter-desktop.png">
                    <source media="(min-width: 465px)" srcset="../_dist/images/the-go-getter-mobile.png">
                    <img class="user_persona_image" src="../_dist/images/the-go-getter-mobile.png">
                </picture>
            </div>
        </div>
        <div class="journey_map">
            <h1 class="asset_header">Journey Map</h1>
            <!-- <img class="journey_map_image" src="/images/journey-map.png" alt="journey map"> -->
            <div class="journey_map_images--desktop">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM-User-DT.png" alt="Journey Map User">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM1-DT.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM2-DT.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM3-DT.png" alt="Journey Map">
            </div>
            <div class="journey_map_images--mobile">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM-User.png" alt="Journey Map User">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM1.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM2.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM3.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM4.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM5.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM6.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM7.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM8.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM9.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM10.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM11.png" alt="Journey Map">
                <img class="journey_map_image" src="../_dist/images/journey_map/JM12.png" alt="Journey Map">
            </div>
        </div>
        <div class="style_sheet">
            <h1 class="asset_header">Style Sheet</h1>
            <img class="style_sheet_image" src="../_dist/images/fortes_stylesheet.png" alt="style sheet">
        </div>
        <div class="mood_board">
            <h1 class="asset_header">Mood Board</h1>
            <img class="mood_board_image" src="../_dist/images/moodboard.png" alt="mood board">
        </div>
        <div class="critical_path">
            <h1 class="asset_header">Critical Path</h1>
            <iframe class = "figma_embed" style="border: 1px solid rgba(0, 0, 0, 0.1);" width="800" height="450" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Fproto%2FpwKcdOrudis4BYIxwYcyIA%2FForte'sFreshBurgers%3Fpage-id%3D18%253A9247%26node-id%3D498%253A10666%26viewport%3D341%252C-779%252C0.16%26scaling%3Dscale-down%26starting-point-node-id%3D498%253A10665%26show-proto-sidebar%3D1" allowfullscreen></iframe>
        </div>
    </div>
<?php include_once __DIR__ . '/../_components/footer.php'; ?>