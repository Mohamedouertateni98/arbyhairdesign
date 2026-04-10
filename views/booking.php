<?php 
$pageTitle = 'Booking';
$isSubpage = true;
include 'views/layouts/header.php'; 
?>

    <!-- ===============================
         PAGE HEADER
    ================================ -->
    <header class="page-header fade-in">
      <h1>Reserve Your Seat</h1>
      <p>We can't wait to see you</p>
    </header>

    <!-- ===============================
         BOOKING STEPS & WIDGET
    ================================ -->
    <section class="section-padding fade-in">
      <div class="container">
        
        <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
          <div style="background-color: #d4edda; color: #155724; padding: 1rem; margin-bottom: 2rem; border: 1px solid #c3e6cb; border-radius: 4px; text-align: center;">
            Appointment Requested! You will receive confirmation shortly.
          </div>
        <?php endif; ?>
        <?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>
          <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; margin-bottom: 2rem; border: 1px solid #f5c6cb; border-radius: 4px; text-align: center;">
            There was an error submitting your request. Please try again.
          </div>
        <?php endif; ?>

        <div class="booking-steps">
          <div class="step">
            <div class="step-num">01</div>
            <h4>Choose Your Service</h4>
          </div>
          <div class="step">
            <div class="step-num">02</div>
            <h4>Pick Date & Time</h4>
          </div>
          <div class="step">
            <div class="step-num">03</div>
            <h4>Confirm & Deposit</h4>
          </div>
        </div>

        <form class="booking-form" action="index.php?url=submit_booking" method="POST">
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
            <label>Service Requested</label>
            <select name="service_requested" class="form-control" required>
              <option value="">-- Select a Service --</option>
              <option value="Full Highlights">Full Highlights ($550+)</option>
              <option value="Balayage">Balayage / Lived-In Color ($500+)</option>
              <option value="Base Color">Base Color / Grey Coverage ($175)</option>
              <option value="Cut & Color">Cut & Color ($650+)</option>
              <option value="Consultation">Consultation (Extensions/Correction)</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>Preferred Date</label>
            <input type="date" name="preferred_date" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label>Special Requests / Notes</label>
            <textarea name="special_requests" class="form-control" placeholder="Tell me about your hair history..."></textarea>
          </div>
          
          <button type="submit" class="btn btn-solid btn-full">Request Appointment</button>
          <p class="text-center" style="font-size:0.8rem; margin-top:1rem; opacity:0.7;">You'll receive a confirmation email within 24 hours.</p>
        </form>

        <div class="cancellation-card">
          <h4>Cancellation Policy</h4>
          <p style="margin-top:0.5rem; font-size:0.95rem;">Cancellations require 48 hours notice. A 50% deposit is required to hold your appointment. No-shows will be charged in full.</p>
        </div>

      </div>
    </section>

    <!-- ===============================
         FAQ ACCORDION
    ================================ -->
    <section class="section-padding fade-in" style="background:var(--color-offwhite);">
      <div class="container faq-section">
        <h2 class="text-center" style="font-size:2.5rem; margin-bottom:3rem;">Frequently Asked Questions</h2>
        
        <div class="faq-item">
          <button class="faq-question">Do you take walk-ins?</button>
          <div class="faq-answer">
            <p>No, we operate strictly by appointment only to ensure every client receives the uninterrupted focus and time they deserve.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">What should I bring to my appointment?</button>
          <div class="faq-answer">
            <p>Reference photos are always welcome! Bring photos of what you love, and even photos of what you <em>don't</em> like, to help us align our vision.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">How long will my appointment take?</button>
          <div class="faq-answer">
            <p>It varies widely based on the service and your hair density. A standard lived-in color appointment usually takes between 3 to 4.5 hours. We never rush the process.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">Do you offer consultations?</button>
          <div class="faq-answer">
            <p>Yes, we offer both in-person and virtual consultations. These are mandatory for color correction services and new extension clients.</p>
          </div>
        </div>

        <div class="faq-item">
          <button class="faq-question">What forms of payment do you accept?</button>
          <div class="faq-answer">
            <p>We accept all major credit cards, Apple Pay, Venmo, Zelle, and Cash.</p>
          </div>
        </div>
      </div>
    </section>

<?php include 'views/layouts/footer.php'; ?>
