<?php
include_once __DIR__ . '/../app.php';
$page_title = 'Alpha';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tiny.cloud/1/cqfi5zr7u3ffymv0qnpgpnuun8v5avkspcekezmg25ooe5kh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="icon" type="image/x-icon" href="<?php echo site_url(); ?>/_dist/images/favicon.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <title><?php echo $document_title ; ?></title>
</head>
<body>

    <div class="header">
        <div class="header_images">
            <img class="logo" src="images/homescreen_logo.png" alt="burger logo">
        </div>
        <button class="start_button">Start Order</button>
    </div>

    <div class="burg_of_month_container">
        <h1>Burger of the Month</h1>
        <div class="burg_of_month_image">
            <img class="burg" src="../_dist/images/alpha_page/burger.png" alt="burger of the month">
            <div class="burg_of_month_text">
                <h2>The Forte Fresh Burger</h2>
                <p>With grilled onions, lettuce, pickles, and double patties, this is a SPECIAL ORDER just for you!</p>
            </div>
        </div>
    </div>
    <div class="about_container">
        <h1> What We Do </h1>
        <h1>Fresh. Burgers.</h1>
        <p>Plain and simple, fast and fresh. Forte’s Fresh Burgers brings the freshest tasting beef burgers to communities and campuses all across the nation.</p>
        <button class="locations_button">Locations</button>
    </div>

</body>
</html>