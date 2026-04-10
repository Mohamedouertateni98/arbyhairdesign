<?php 
$pageTitle = 'Education';
$isSubpage = true;
include 'views/layouts/header.php'; 
?>

    <!-- ===============================
         PAGE HEADER
    ================================ -->
    <header class="page-header fade-in">
      <h1>Learn With Arby</h1>
      <p style="max-width:600px; margin: 1rem auto 0; text-transform:none; letter-spacing: normal;">Whether you're a new stylist or a seasoned pro, my education programs are designed to elevate your craft, grow your clientele, and unlock your full creative potential.</p>
    </header>

    <!-- ===============================
         EDUCATION TIERS
    ================================ -->
    <section class="section-padding fade-in">
      <div class="container">

        <div class="education-cards">
          
          <div class="edu-card">
            <span class="edu-tier">Mentorship</span>
            <h3>Shadow Day</h3>
            <h4>Starting at $500</h4>
            <p>1-on-1 Private Education. Watch live demos, ask any business or formula questions. Coffee & lunch included.</p>
            <a href="#education-booking" class="btn">Inquire Now →</a>
          </div>

          <div class="edu-card">
            <span class="edu-tier">Community</span>
            <h3>Group Workshop</h3>
            <h4>Starting at $350</h4>
            <p>Hands-On class + Live Model Demo. Interactive, immersive, and fundamentally focused.</p>
            <a href="#education-booking" class="btn">Get Tickets →</a>
          </div>

          <div class="edu-card">
            <span class="edu-tier">Collaboration</span>
            <h3>Host a Class</h3>
            <h4>Email for Pricing</h4>
            <p>Bring Arby to your city. Host an immersive workshop directly at your salon or venue.</p>
            <a href="#education-booking" class="btn">Contact Us →</a>
          </div>

        </div>
      </div>
    </section>

    <!-- ===============================
         TOUR DATES
    ================================ -->
    <section id="tour" class="section-padding fade-in" style="padding-top:0;">
      <div class="container tour-list">
        <h2 class="text-center" style="font-size:2.5rem; margin-bottom:3rem;">Upcoming Events</h2>
        
        <div class="tour-item">
          <div class="tour-date">Sept 12, 2025</div>
          <div class="tour-title">Fundamentals Workshop — Miami, FL</div>
          <a href="#education-booking" class="btn">Get Tickets</a>
        </div>

        <div class="tour-item">
          <div class="tour-date">Oct 4, 2025</div>
          <div class="tour-title">Signature Blonding Class — New York, NY</div>
          <a href="#education-booking" class="btn">Get Tickets</a>
        </div>

        <div class="tour-item">
          <div class="tour-date">Nov 1, 2025</div>
          <div class="tour-title">Shadow Day (Private) — Los Angeles, CA</div>
          <a href="#education-booking" class="btn">Inquire</a>
        </div>

        <div class="tour-item">
          <div class="tour-date">Dec 6, 2025</div>
          <div class="tour-title">Group Workshop — Chicago, IL</div>
          <a href="#education-booking" class="btn">Get Tickets</a>
        </div>
        
      </div>
    </section>

    <!-- ===============================
         TESTIMONIAL
    ================================ -->
    <section class="testimonial fade-in">
      <div class="container">
        <p class="testimonial-quote">"This was THE best hair education experience I've ever had. Arby was so generous with her knowledge and incredibly inspiring for my own business."</p>
        <span class="testimonial-author">— @stylist_handle</span>
      </div>
    </section>

    <!-- ===============================
         EDUCATION BOOKING FORM
    ================================ -->
    <section id="education-booking" class="section-padding fade-in" style="background-color: var(--surface-color);">
      <div class="container">
        <h2 class="text-center" style="font-size:2.5rem; margin-bottom:1rem;">Reserve Your Spot</h2>
        <p class="text-center" style="margin-bottom:3rem; max-width:600px; margin-left:auto; margin-right:auto;">Ready to elevate your craft? Fill out the form below to secure your date.</p>

        <?php if(isset($_GET['status']) && $_GET['status'] == 'booking_success'): ?>
          <div style="background-color: #d4edda; color: #155724; padding: 1rem; margin-bottom: 2rem; border: 1px solid #c3e6cb; border-radius: 4px; text-align: center;">
            Request Submitted! You will receive confirmation shortly.
          </div>
        <?php endif; ?>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'booking_error'): ?>
          <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; margin-bottom: 2rem; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
            There was an error submitting your request. Please try again.
          </div>
        <?php endif; ?>

        <form class="booking-form" action="index.php?url=submit_education_booking" method="POST">
          <input type="hidden" name="source" value="education">
          
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required placeholder="Jane Doe">
          </div>
          
          <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div>
              <label>Email Address</label>
              <input type="email" name="email" class="form-control" required placeholder="jane@example.com" style="width:100%;">
            </div>
            <div>
              <label>Phone Number</label>
              <input type="tel" name="phone" class="form-control" required placeholder="(555) 000-0000" style="width:100%;">
            </div>
          </div>
          
          <div class="form-group">
            <label>Education Type</label>
            <select name="service_requested" class="form-control" required>
              <option value="">-- Select an Option --</option>
              <option value="Education: Shadow Day">Shadow Day (Private) - $500+</option>
              <option value="Education: Group Workshop">Group Workshop - $350+</option>
              <option value="Education: Host a Class">Host a Class - Inquiry</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>Preferred Date (Refer to Tour Dates)</label>
            <input type="date" name="preferred_date" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Questions / Additional Info</label>
            <textarea name="special_requests" class="form-control" placeholder="What are you hoping to focus on?"></textarea>
          </div>
          
          <button type="submit" class="btn btn-solid btn-full">Submit Request</button>
        </form>
      </div>
    </section>

    <!-- ===============================
         EDUCATION NEWSLETTER
    ================================ -->
    <section id="newsletter" class="newsletter-section section-padding fade-in">
      <div class="container">
        <?php if(isset($_GET['status']) && $_GET['status'] == 'subscribe_success'): ?>
          <div style="background-color: #d4edda; color: #155724; padding: 1rem; margin-bottom: 2rem; border: 1px solid #c3e6cb; border-radius: 4px; text-align: center;">
            You have successfully subscribed to the newsletter! Thank you.
          </div>
        <?php endif; ?>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'subscribe_error'): ?>
          <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; margin-bottom: 2rem; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
            There was an error subscribing. Please try again.
          </div>
        <?php endif; ?>
        <p>Be the first to know about new class dates and digital masterclasses.</p>
        <form class="newsletter-form" action="index.php?url=subscribe" method="POST">
          <input type="email" name="email" placeholder="Enter your email address" required>
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </section>

<?php include 'views/layouts/footer.php'; ?>
