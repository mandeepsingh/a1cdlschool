<?php
/**
 * Template for the Contact Us | A1 CDL School, Dayton, Ohio page (generated from contact.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <section class="page-hero page-hero-photo hero-contact">
      <div class="container">
        <span class="rule"></span>
        <h1>Contact Us</h1>
        <p>Questions about training, schedules or pricing? We're here to help.</p>
      </div>
    </section>

    <section class="section contact" id="contact">
      <div class="container contact-grid">
        <div class="contact-info reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Start Your <span class="text-red">CDL Journey</span></h2>
          <p>Tell us a little about yourself and an instructor will reach out to answer your questions and help you
            choose the right program.</p>
          <ul class="contact-list">
            <li>
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2" />
              </svg>
              <div><small>Call us</small><a href="tel:+19376185304">(937) 618-5304</a></div>
            </li>
            <li>
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <rect x="3" y="5" width="18" height="14" rx="2" />
                <path d="M3 7l9 6 9-6" />
              </svg>
              <div><small>Email</small><a href="mailto:admin@a1cdlschool.com">admin@a1cdlschool.com</a></div>
            </li>
            <li>
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 21s-7-6.2-7-11.5A7 7 0 0112 2.5a7 7 0 017 7C19 14.8 12 21 12 21z" />
                <circle cx="12" cy="9.5" r="2.5" />
              </svg>
              <div><small>Training yard</small><a
                  href="https://www.google.com/maps/dir/?api=1&amp;destination=2700+W+National+Rd,+Dayton,+OH+45414"
                  target="_blank" rel="noopener">2700 W National Rd, Dayton, OH 45414</a></div>
            </li>
            <li>
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <circle cx="12" cy="12" r="9" />
                <path d="M12 7v5l3 2" />
              </svg>
              <div><small>Office hours</small><span>Mon–Fri 9am–6pm · Sat 1pm–6pm</span></div>
            </li>
          </ul>
        </div>

        <form class="contact-form reveal" id="contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
          <?php a1cdl_contact_form_fields(); ?>
          <h3>Request Information</h3>
          <div class="form-row">
            <div class="field">
              <label for="name">Full name</label>
              <input id="name" name="name" type="text" autocomplete="name" required />
              <span class="error" aria-live="polite"></span>
            </div>
            <div class="field">
              <label for="phone">Phone</label>
              <input id="phone" name="phone" type="tel" autocomplete="tel" required />
              <span class="error" aria-live="polite"></span>
            </div>
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" autocomplete="email" required />
            <span class="error" aria-live="polite"></span>
          </div>
          <div class="field">
            <label for="program">Program of interest</label>
            <select id="program" name="program">
              <option>Class A CDL Training</option>
              <option>Class B CDL Training</option>
              <option>Passenger Endorsement</option>
              <option>Tanker Endorsement</option>
              <option>Hazmat Endorsement</option>
              <option>Not sure yet</option>
            </select>
          </div>
          <div class="field">
            <label for="message">Message <span class="optional">(optional)</span></label>
            <textarea id="message" name="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Send Request <svg class="chev"
              viewBox="0 0 24 24" aria-hidden="true">
              <path d="M9 6l6 6-6 6" />
            </svg></button>
          <?php a1cdl_contact_form_error(); ?>
          <p class="form-success" role="status"<?php a1cdl_contact_form_success_attr(); ?>>Thanks! Your request was received. An instructor will contact you
            shortly.</p>
        </form>
      </div>
    </section>

    <!-- ============ Areas ============ -->
    <section class="section areas">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Students From Ohio and <span class="text-red">Many Other States</span></h2>
          <p>Our training yard is in Dayton, and our students come from every major city in Ohio, including
            Cincinnati, Columbus, Toledo and Cleveland. We also train drivers and work with companies from across
            the country.</p>
        </div>
        <ul class="area-list reveal" aria-label="Cities our students come from">
          <li>Dayton</li>
          <li>Cincinnati</li>
          <li>Columbus</li>
          <li>Toledo</li>
          <li>Cleveland</li>
        </ul>
      </div>
    </section>

    <!-- ============ Map ============ -->
    <section class="contact-map" aria-label="Map to our training yard">
      <iframe title="Map to A1 CDL School, 2700 W National Rd, Dayton, OH 45414"
        src="https://www.google.com/maps?q=2700+W+National+Rd,+Dayton,+OH+45414&amp;output=embed" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
  </main>

<?php
get_footer();
