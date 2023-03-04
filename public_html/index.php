<?php
include_once __DIR__ . '/app.php';
$page_title = 'Team';
include_once __DIR__ . '/_components/header.php';
?>

<body>
  <img class="background-image" src="_dist/images/team_page/background-image.png" alt="background">
    <div class="page_contain">
    <img class="logo" src="_dist/images/specs_logo.svg" alt="logo">
    <div class="card_contain">
      <!-- KARA'S CARD -->
      <div class="card_base flip-card js-card" id="card_kara">
        <div class="flip-card-inner js-inner-card">
          <div class="flip-card-front js-front-card">
            <img class="image" src="_dist/images/team_page/kara.png" alt="profile">
            <div class="card_info">
              <h3 class="role">Designer | Data Architect</h3>
              <h2 class="name">KARA BUTLER</h2>
              <hr class="card_hr">
              <a href="mailto:kjb389@drexel.edu" class="contact">kjb389@drexel.edu</a>
            </div>
            <!-- <div class="readmore">
              <p>READ BIO</p>
            </div> -->
          </div>
          <div class="flip-card-back js-back-card">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.” </p>
          </div>
        </div>
      </div>

      <!-- ALEXIS'S CARD -->
      <div class="card_base flip-card js-card" id="card_alexis">
        <div class="flip-card-inner js-inner-card">
          <div class="flip-card-front js-front-card">
            <img class="image" src="_dist/images/team_page/alexis.png" alt="profile">
            <div class="card_info">
              <h3 class="role">Coder | Project Manager</h3>
              <h2 class="name">ALEXIS RAYA</h2>
              <hr class="card_hr">
              <a href="mailto:aar335@drexel.edu" class="contact">aar335@drexel.edu</a>
            </div>
            <!-- <div class="readmore">
              <p>READ BIO</p>
            </div> -->
          </div>
          <div class="flip-card-back js-back-card">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.” </p>
          </div>
        </div>
      </div>

      <!-- SYDNEY'S CARD -->
      <div class="card_base flip-card js-card" id="card_syndey">
        <div class="flip-card-inner js-inner-card">
          <div class="flip-card-front js-front-card">
            <img class="image" src="_dist/images/team_page/sydney.png" alt="profile">
            <div class="card_info">
              <h3 class="role">Date Architect | Coder</h3>
              <h2 class="name">SYDNEY HARVEY</h2>
              <hr class="card_hr">
              <a href="mailto:sjh348@drexel.edu" class="contact">sjh348@drexel.edu</a>
            </div>
            <!-- <div class="readmore">
              <p>READ BIO</p>
            </div> -->
          </div>
          <div class="flip-card-back js-back-card">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.” </p>
          </div>
        </div>
      </div>

      <!-- CINDY'S CARD -->
      <div class="card_base flip-card js-card" id="card_cindy">
        <div class="flip-card-inner js-inner-card">
          <div class="flip-card-front js-front-card">
            <img class="image" src="_dist/images/team_page/cindy.png" alt="profile">
            <div class="card_info">
              <h3 class="role">Project Manager | Designer</h3>
              <h2 class="name">CINDY QUACH</h2>
              <hr class="card_hr">
              <a href="mailto:cq63@drexel.edu" class="contact">cq63@drexel.edu</a>
            </div>
            <!-- <div class="readmore">
              <p>READ BIO</p>
            </div> -->
          </div>
          <div class="flip-card-back js-back-card">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.” </p>
          </div>
        </div>
      </div>

    </div>
  </div>
  

<?php
include_once __DIR__ . '/_components/footer.php';
?>