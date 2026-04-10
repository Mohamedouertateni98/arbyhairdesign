<?php 
$pageTitle = 'Home';
$isSubpage = false;
include 'views/layouts/header.php'; 
?>

    <!-- ===============================
         HERO SECTION
    ================================ -->
    <section class="hero">
      <div class="hero-slideshow">
        <img src="pics/IMG_6183.JPG" alt="Salon interior" class="slide active">
        <img src="pics/IMG_6184.JPG" alt="Blonde hair texture" class="slide">
        <img src="pics/IMG_6186.JPG" alt="Stylist working on hair" class="slide">
        <div class="hero-overlay"></div>
      </div>
      <div class="hero-content fade-in">
        <h1>ArbyHairDesign</h1>
        <p>Where Artistry Meets Transformation</p>
        <a href="index.php?url=booking" class="btn">Book Now</a>
      </div>
    </section>

    <!-- ===============================
         AS SEEN IN
    ================================ -->
    <section class="as-seen-in fade-in">
      <p>As Seen In</p>
      <div class="logos">
        <span class="logo-item">L'ORÉAL</span>
        <span class="logo-item">WELLA</span>
        <span class="logo-item">REDKEN</span>
        <span class="logo-item">SCHWARZKOPF</span>
      </div>
    </section>

    <!-- ===============================
         ABOUT TEASER
    ================================ -->
    <section class="about-teaser section-padding fade-in">
      <div class="container">
        <h2>Behind The Brand</h2>
        <p>Hey, I'm Arby! I've spent years behind the chair crafting luxury extensions, lived-in color, and transformative blondes. My approach is tailored, blending artistry with education to empower both clients and stylists alike.</p>
        <a href="index.php?url=about" class="btn btn-solid">Meet Arby</a>
      </div>
    </section>

    <!-- ===============================
         HOW TO WORK WITH ME
    ================================ -->
    <section class="work-with-me section-padding">
      <div class="container">
        <h2 class="fade-in">How To Work With Me</h2>
        <div class="cards-grid">
          <div class="card fade-in" onclick="location.href='index.php?url=booking'">
            <img src="pics/behind_the_chair_design.png" alt="Behind the Chair">
            <div class="card-overlay">
              <h3 class="card-title">Behind the Chair</h3>
            </div>
          </div>
          <div class="card fade-in" onclick="location.href='index.php?url=education'">
            <img src="pics/education_design.png" alt="Education">
            <div class="card-overlay">
              <h3 class="card-title">Education</h3>
            </div>
          </div>
          <div class="card fade-in" onclick="location.href='index.php?url=contact'">
            <img src="pics/collaborations_design.png" alt="Collaborations">
            <div class="card-overlay">
              <h3 class="card-title">Collaborations</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===============================
         MARQUEE
    ================================ -->
    <section class="marquee-section">
      <div class="marquee-content">
        <span>STYLIST</span> • <span>COLORIST</span> • <span>EDUCATOR</span> • <span>ARBYHAIRDESIGN</span> • 
        <span>STYLIST</span> • <span>COLORIST</span> • <span>EDUCATOR</span> • <span>ARBYHAIRDESIGN</span> • 
        <span>STYLIST</span> • <span>COLORIST</span> • <span>EDUCATOR</span> • <span>ARBYHAIRDESIGN</span> • 
      </div>
    </section>

    <!-- ===============================
         INSTAGRAM FEED
    ================================ -->
    <section class="instagram-section section-padding">
      <div class="container fade-in">
        <h2>Follow on Instagram</h2>
        <div class="ig-grid">
          <a href="#" class="ig-item">
            <img src="pics/6ECB4DC0-0428-42F1-98B4-A198B660EF58.jpg" loading="lazy" alt="Instagram Post 1">
            <div class="ig-overlay"><span class="ig-icon">📸</span></div>
          </a>
          <a href="#" class="ig-item">
            <img src="pics/55772FF3-9D6B-44A5-93F9-7FD8C01F2011.jpg" loading="lazy" alt="Instagram Post 2">
            <div class="ig-overlay"><span class="ig-icon">📸</span></div>
          </a>
          <a href="#" class="ig-item">
            <img src="pics/21BA7698-DFE0-477F-8A82-414388D445E9.jpg" loading="lazy" alt="Instagram Post 3">
            <div class="ig-overlay"><span class="ig-icon">📸</span></div>
          </a>
          <a href="#" class="ig-item">
            <img src="pics/IMG_1745.PNG" loading="lazy" alt="Instagram Post 4">
            <div class="ig-overlay"><span class="ig-icon">📸</span></div>
          </a>
          <a href="#" class="ig-item">
            <img src="pics/IMG_1746.PNG" loading="lazy" alt="Instagram Post 5">
            <div class="ig-overlay"><span class="ig-icon">📸</span></div>
          </a>
          <a href="#" class="ig-item">
            <img src="pics/IMG_1747.PNG" loading="lazy" alt="Instagram Post 6">
            <div class="ig-overlay"><span class="ig-icon">📸</span></div>
          </a>
        </div>
      </div>
    </section>

    <!-- ===============================
         NEWSLETTER
    ================================ -->
    <section class="newsletter-section section-padding fade-in">
      <div class="container">
        <p>Stay in the loop — get updates on classes & availability</p>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
          <p style="color: green;">Successfully subscribed!</p>
        <?php endif; ?>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>
          <p style="color: red;">Subscription failed. Please try again.</p>
        <?php endif; ?>
        <form class="newsletter-form" action="index.php?url=subscribe" method="POST">
          <input type="email" name="email" placeholder="Enter your email address" required>
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </section>

<?php include 'views/layouts/footer.php'; ?>
