<?php 
$pageTitle = 'Contact';
$isSubpage = true;
include 'views/layouts/header.php'; 
?>

    <!-- ===============================
         PAGE HEADER
    ================================ -->
    <header class="page-header fade-in">
      <h1>Let's Connect</h1>
      <p>Have a question? We're here to help.</p>
    </header>

    <!-- ===============================
         CONTACT SECITON
    ================================ -->
    <section class="section-padding fade-in">
      <div class="container contact-container">
        
        <!-- Details Column -->
        <div class="contact-info">
          <div class="contact-block">
            <h3>Find Us</h3>
            <p>ArbyHairDesign</p>
            <p>Los Angeles, CA</p>
            <p>hello@arbyhairdesign.com</p>
          </div>

          <div class="contact-block">
            <h3>Business Hours</h3>
            <p>Mon–Wed: 10am – 6pm</p>
            <p>Thursday: 10am – 3pm</p>
            <p>Fri–Sun: Closed</p>
          </div>

          <div class="contact-block">
            <h3>Social</h3>
            <div class="social-links" style="margin-top:1rem;">
              <a href="#" style="color:var(--color-charcoal); border-bottom:1px solid currentColor;">Instagram</a>
              <a href="#" style="color:var(--color-charcoal); border-bottom:1px solid currentColor;">TikTok</a>
              <a href="#" style="color:var(--color-charcoal); border-bottom:1px solid currentColor;">Pinterest</a>
            </div>
          </div>
        </div>

        <!-- Form Column -->
        <div class="contact-form-wrapper">
          <form class="booking-form" style="margin:0; width:100%; box-shadow:none; padding:0; border-left:1px solid rgba(26,26,26,0.1); padding-left: 4rem;" onsubmit="event.preventDefault(); alert('Message sent!');">
            
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" required placeholder="John Doe" name="name">
            </div>

            <div class="form-group">
              <label>Email Address</label>
              <input type="email" class="form-control" required placeholder="john@example.com" name="email">
            </div>

            <div class="form-group">
              <label>Subject</label>
              <select class="form-control" name="subject" required>
                <option value="">-- Choose Category --</option>
                <option>General Inquiry</option>
                <option>Booking Problem</option>
                <option>Education / Class Hosting</option>
                <option>Brand Collaboration</option>
              </select>
            </div>

            <div class="form-group">
              <label>Message</label>
              <textarea class="form-control" required placeholder="How can we help?" name="message"></textarea>
            </div>

            <button type="submit" class="btn btn-solid">Send Message</button>
          </form>
        </div>

      </div>
    </section>

<?php include 'views/layouts/footer.php'; ?>
