<?php

// if $page_title variable doesn't exist, create a default one
if (!isset($page_title)) {
    $page_title = '🚨 Missing Title 🚨';
}
$site_title = 'Fortes Fresh Burger';
$document_title = $page_title . ' | ' . $site_title;

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
  <link rel="stylesheet" href="<?php echo site_url(); ?>/_dist/styles/style.css">
  <!-- <link rel="stylesheet" href="<?php echo site_url(); ?>/_dist/styles/team-style.css">
  <link rel="stylesheet" href="<?php echo site_url(); ?>/_dist/styles/alpha-style.css"> -->
  <title><?php echo $document_title ; ?></title>
</head>
<body>
  <div class="main_container">
  <!-- Main Content Begins -->