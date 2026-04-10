<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArbyHairDesign | <?= isset($pageTitle) ? $pageTitle : 'Where Artistry Meets Transformation' ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- ===============================
       NAVIGATION
  ================================ -->
  <header>
    <nav class="navbar <?= isset($isSubpage) && $isSubpage ? 'subpage-nav' : '' ?>">
      <div class="nav-brand">A.H.D</div>
      <div class="nav-links">
        <a href="index.php" class="<?= (isset($_GET['url']) && $_GET['url'] == '') || !isset($_GET['url']) ? 'active' : '' ?>">Home</a>
        <a href="index.php?url=about" class="<?= (isset($_GET['url']) && $_GET['url'] == 'about') ? 'active' : '' ?>">About</a>
        <a href="index.php?url=services" class="<?= (isset($_GET['url']) && $_GET['url'] == 'services') ? 'active' : '' ?>">Services</a>
        <a href="index.php?url=booking" class="<?= (isset($_GET['url']) && $_GET['url'] == 'booking') ? 'active' : '' ?>">Booking</a>
        <a href="index.php?url=education" class="<?= (isset($_GET['url']) && $_GET['url'] == 'education') ? 'active' : '' ?>">Education</a>
        <a href="index.php?url=contact" class="<?= (isset($_GET['url']) && $_GET['url'] == 'contact') ? 'active' : '' ?>">Contact</a>
      </div>
      <button class="hamburger" aria-label="Toggle Navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </nav>
  </header>

  <main>
