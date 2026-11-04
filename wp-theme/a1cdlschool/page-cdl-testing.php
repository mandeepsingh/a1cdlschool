<?php
/**
 * Template for the CDL Skills Testing in Dayton, Ohio | A1 CDL School page (generated from cdl-testing.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <!-- Test and rental prices come from the client's CDL testing flyer; practice rates come from the client's
         pricing update. The cancellation policy comes from the flyer. PLACEHOLDER CONTENT: the third-party testing status is a sample
         detail. Confirm A1 CDL School is an approved Ohio third-party CDL testing site before launch. -->

    <section class="page-hero page-hero-photo hero-testing">
      <div class="container">
        <span class="rule"></span>
        <h1>CDL Testing</h1>
        <p>Ready to take your CDL test? Schedule your Class A or Class B skills test, with truck rental available.</p>
        <a href="#schedule" class="btn btn-primary btn-lg">Schedule Your Test <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
      </div>
    </section>

    <section class="section section-intro">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Test with <span class="text-red">Confidence</span></h2>
          <p>A1 CDL School is a third-party CDL testing site offering Class A and Class B skills tests at our Dayton training yard. Truck rental is available, whether you trained with us or somewhere else.</p>
        </div>
      </div>
    </section>

    <section class="section bg-soft" id="schedule">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Request an <span class="text-red">Appointment</span></h2>
          <p>Choose your test, tell us when you'd like to come in, and we'll contact you to confirm.</p>
        </div>
        <div class="contact-grid schedule-grid">
          <div class="contact-info reveal">
            <h3>Tests &amp; Fees</h3>
            <dl class="cost-list">
              <div>
                <dt>Full Test<small>Pre-trip inspection, maneuvers and road test</small></dt>
                <dd>$165</dd>
              </div>
              <div>
                <dt>Skills &amp; Road<small>Maneuvers and road test</small></dt>
                <dd>$135</dd>
              </div>
              <div>
                <dt>Road Only<small>Road test</small></dt>
                <dd>$85</dd>
              </div>
              <div>
                <dt>Class A Truck Rental<small>Added to your test fee</small></dt>
                <dd>$250</dd>
              </div>
              <div>
                <dt>Class B Truck Rental<small>Added to your test fee</small></dt>
                <dd>$225</dd>
              </div>
            </dl>
            <p>This is a request, not a confirmed appointment. We'll contact you to confirm your date and time. Prefer
              to talk? Call <a href="tel:+19376185304">(937) 618-5304</a>.</p>
            <p><strong>Cancellations:</strong> All cancellations must be made at least 48 business hours in advance.</p>
          </div>

          <form class="contact-form reveal" id="schedule-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
          <?php a1cdl_contact_form_fields( 'a1cdl_schedule' ); ?>
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
            <div class="form-row">
              <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" autocomplete="email" required />
                <span class="error" aria-live="polite"></span>
              </div>
              <div class="field">
                <label for="cdl_class">CDL class</label>
                <select id="cdl_class" name="cdl_class">
                  <option data-rental="250">Class A</option>
                  <option data-rental="225">Class B</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="field">
                <label for="service">What do you need?</label>
                <select id="service" name="service">
                  <option>CDL test only</option>
                  <option>CDL test and truck rental</option>
                </select>
              </div>
              <div class="field">
                <label for="test">Test and fee</label>
                <select id="test" name="test">
                  <option data-fee="165">Full Test: $165</option>
                  <option data-fee="135">Skills &amp; Road: $135</option>
                  <option data-fee="85">Road Only: $85</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="field">
                <label for="preferred_date">Preferred day</label>
                <input id="preferred_date" name="preferred_date" type="date" required />
                <span class="error" aria-live="polite"></span>
              </div>
              <div class="field">
                <label for="preferred_time">Preferred time</label>
                <select id="preferred_time" name="preferred_time">
                  <option>Morning</option>
                  <option>Afternoon</option>
                  <option>Any time</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="field">
                <label for="practice">Practice <span class="optional">(optional)</span></label>
                <select id="practice" name="practice">
                  <option data-fee="0">No practice session</option>
                  <option data-fee="500">1 hour: $500</option>
                  <option data-fee="1200">3 hours: $1,200</option>
                </select>
              </div>
              <div class="field">
                <label for="message">Message <span class="optional">(optional)</span></label>
                <textarea id="message" name="message" rows="1"></textarea>
              </div>
            </div>
            <div class="schedule-submit">
              <p class="schedule-total">Estimated total <strong id="schedule-total">$165</strong></p>
              <button type="submit" class="btn btn-primary btn-lg">Send Request <svg class="chev" viewBox="0 0 24 24"
                  aria-hidden="true">
                  <path d="M9 6l6 6-6 6" />
                </svg></button>
            </div>
            <?php a1cdl_contact_form_error(); ?>
          <p class="form-success" role="status"<?php a1cdl_contact_form_success_attr(); ?>>Thanks! Your request was received. We'll contact you to confirm
              your appointment.</p>
          </form>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Not Ready to <span class="text-red">Test Yet?</span></h2>
          <p>Add practice time before your test, or get full training first. We'll get you there.</p>
        </div>
        <div class="cards">
          <article class="card card-wide reveal">
            <div class="card-tag">Optional</div>
            <h3>Practice Sessions</h3>
            <p class="card-desc">Additional preparation and practice in our equipment are available, but not
              required to test with us.</p>
            <dl class="cost-list">
              <div>
                <dt>1 hour of road and range practice</dt>
                <dd>$500</dd>
              </div>
              <div>
                <dt>3 hours (1 hour road, 2 hours range)</dt>
                <dd>$1,200</dd>
              </div>
            </dl>
            <a href="#schedule" class="btn btn-outline-dark" data-practice="1 hour">Book Practice Time</a>
          </article>
          <article class="card reveal">
            <h3>CDL School Training</h3>
            <p class="card-desc">Complete Class A and Class B programs for individuals, from theory to test day.</p>
            <a href="<?php echo esc_url( a1cdl_link( 'cdl-school-training' ) ); ?>" class="text-link">View program <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          </article>

          <article class="card reveal">
            <h3>Company Contract Training</h3>
            <p class="card-desc">Flexible training packages for companies and owner-operators.</p>
            <a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>" class="text-link">View program <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          </article>

          <article class="card reveal">
            <h3>Class B to Class A Upgrade</h3>
            <p class="card-desc">Already have a Class B CDL? Move up to a Class A license.</p>
            <a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>" class="text-link">View upgrade <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          </article>
        </div>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>CDL Testing <span class="text-red">FAQs</span></h2>
          <p>Answers to the questions drivers ask us most.</p>
        </div>
        <div class="faq reveal">
          <details>
            <summary>How do I know if I am ready for my CDL test?</summary>
            <p>You're ready when you can safely and confidently complete the pre-trip inspection, basic vehicle control and the road test. Our instructors can help you decide if you are ready.</p>
          </details>
          <details>
            <summary>Can I take my CDL test at A1 CDL School?</summary>
            <p>Yes. We are a third-party CDL testing site for Class A and Class B skills tests.</p>
          </details>
          <details>
            <summary>Do you offer Class A and Class B testing?</summary>
            <p>Yes, we offer skills testing for both.</p>
          </details>
          <details>
            <summary>Can I use your equipment for my test?</summary>
            <p>Yes. Truck rental is $250 for Class A or $225 for Class B, added to your test fee.</p>
          </details>
          <details>
            <summary>Can other schools send their students to test here?</summary>
            <p>In many cases, yes. Contact us to confirm availability and requirements.</p>
          </details>
          <details>
            <summary>Do I have to train with you to test with you?</summary>
            <p>No. You can test with us even if you trained somewhere else. Contact us to confirm your test.</p>
          </details>
          <details>
            <summary>What does the CDL skills test include?</summary>
            <p>The full test has three parts: a pre-trip vehicle inspection, basic vehicle control (backing maneuvers) and an on-road driving test.</p>
          </details>
          <details>
            <summary>Can I upgrade from a Class B to a Class A CDL?</summary>
            <p>Yes. See our <a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>">Class B to Class A upgrade</a> package, or contact us to schedule your Class A test.</p>
          </details>
          <details>
            <summary>Why test with A1 CDL School?</summary>
            <p>Affordable pricing, flexible scheduling, experienced staff and test-ready equipment.</p>
          </details>
          <details>
            <summary>How do I schedule my CDL test?</summary>
            <p><a href="#schedule">Request an appointment</a> or call (937) 618-5304. We will go over your options, available dates, equipment, cost and what to bring on test day.</p>
          </details>
          <details>
            <summary>Who is eligible to test with A1 CDL School?</summary>
            <p>Must be a U.S. citizen, OR must be a lawful permanent resident (Green card holder). Permanent residents must possess a valid 10-year Green Card.</p>
          </details>
        </div>
      </div>
    </section>

    <section class="cta-band">
      <div class="cta-bg" aria-hidden="true"></div>
      <div class="container cta-inner reveal">
        <div>
          <h2>Ready to Take Your Test?</h2>
          <p>Pick your test, choose a date, and get one step closer to your CDL.</p>
        </div>
        <div class="cta-actions">
          <a href="#schedule" class="btn btn-primary btn-lg">Schedule Your Test <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          <a href="tel:+19376185304" class="btn btn-outline btn-lg">Call (937) 618-5304</a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
