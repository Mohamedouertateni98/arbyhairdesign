<?php 
$pageTitle = 'Services & Pricing';
$isSubpage = true;
include 'views/layouts/header.php'; 
?>

    <!-- ===============================
         PAGE HEADER
    ================================ -->
    <header class="page-header fade-in">
      <h1>Investment in You</h1>
      <p>Bespoke Color & Custom Tailored Services</p>
    </header>

    <!-- ===============================
         PRICING TABLE
    ================================ -->
    <section class="section-padding fade-in">
      <div class="container pricing-container">
        
        <div class="pricing-category">
          <h3>Color Services</h3>
          <div class="pricing-item"><span class="name">Full Highlights</span><span class="dots"></span><span class="price">$550+</span></div>
          <div class="pricing-item"><span class="name">Half Head Highlights</span><span class="dots"></span><span class="price">$450+</span></div>
          <div class="pricing-item"><span class="name">Partial Highlights</span><span class="dots"></span><span class="price">$400+</span></div>
          <div class="pricing-item"><span class="name">Face Frame</span><span class="dots"></span><span class="price">$325+</span></div>
          <div class="pricing-item"><span class="name">Base Color / Grey Coverage</span><span class="dots"></span><span class="price">$175</span></div>
          <div class="pricing-item"><span class="name">Toner / Gloss</span><span class="dots"></span><span class="price">$175</span></div>
          <div class="pricing-item"><span class="name">Root Shadow / Melt</span><span class="dots"></span><span class="price">$175</span></div>
          <div class="pricing-item"><span class="name">Color Correction</span><span class="dots"></span><span class="price">$650+</span></div>
        </div>

        <div class="pricing-category">
          <h3>Cut Services</h3>
          <div class="pricing-item"><span class="name">Cut & Color</span><span class="dots"></span><span class="price">$650+</span></div>
          <div class="pricing-item"><span class="name">Cut Only</span><span class="dots"></span><span class="price">$125</span></div>
        </div>

        <div class="pricing-category">
          <h3>Specialty</h3>
          <div class="pricing-item"><span class="name">Brazilian Blowout</span><span class="dots"></span><span class="price">$450+</span></div>
          <div class="pricing-item"><span class="name">Balayage / Lived-In Color</span><span class="dots"></span><span class="price">$500+</span></div>
        </div>

        <div class="pricing-category">
          <h3>Extensions (Consultation Required)</h3>
          <div class="pricing-item"><span class="name">Sew-In Weft</span><span class="dots"></span><span class="price">Email</span></div>
          <div class="pricing-item"><span class="name">Tape-In</span><span class="dots"></span><span class="price">Email</span></div>
          <div class="pricing-item"><span class="name">K-Tips / Keratin Bond</span><span class="dots"></span><span class="price">Email</span></div>
          <div class="pricing-item"><span class="name">I-Tips</span><span class="dots"></span><span class="price">Email</span></div>
        </div>

        <div class="text-center" style="margin-top: 3rem;">
          <a href="index.php?url=booking" class="btn btn-solid">Book a Consultation</a>
        </div>

        <div class="disclaimer">
          Prices are starting rates and may vary based on hair length, density, and desired results.<br>
          A formal consultation is required for all color corrections and extensions padding.
        </div>

      </div>
    </section>

<?php include 'views/layouts/footer.php'; ?>
