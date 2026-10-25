<?php
/**
 * Template for the CDL Skills Testing in Dayton, Ohio | A1 CDL School page (generated from cdl-testing.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <!-- PLACEHOLDER CONTENT: test prices, practice rates, the cancellation policy and third-party testing status
         are sample details. Confirm A1 CDL School is an approved Ohio third-party CDL testing site and replace
         these with real details before launch. -->

    <section class="page-hero page-hero-photo hero-testing">
      <div class="container">
        <span class="rule"></span>
        <h1>CDL Testing</h1>
        <p>Ready to take your CDL test? Schedule your Class A or Class B skills test in our trucks or your own.</p>
        <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Schedule Your Test <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
      </div>
    </section>

    <section class="section section-intro">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Test with <span class="text-red">Confidence</span></h2>
          <p>A1 CDL School is a third-party CDL testing site offering Class A and Class B skills tests at our Dayton training yard. Test in our equipment or bring your own, whether you trained with us or somewhere else.</p>
        </div>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Testing Options &amp; <span class="text-red">Pricing</span></h2>
          <p>Choose the test you need for a Class A or Class B CDL. Prices depend on whether you use your own equipment or ours.</p>
        </div>
        <div class="cards">
          <article class="card card-featured reveal">
            <div class="card-tag">Most popular</div>
            <h3>Full Test</h3>
            <p class="card-desc">The complete CDL skills test for Class A or Class B.</p>
            <ul class="checklist small">
              <li>Pre-trip inspection</li>
              <li>Basic vehicle control (maneuvers)</li>
              <li>On-road driving test</li>
            </ul>
            <dl class="cost-list">
              <div>
                <dt>Your equipment</dt>
                <dd>$375</dd>
              </div>
              <div>
                <dt>Our equipment</dt>
                <dd>$450</dd>
              </div>
            </dl>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary">Schedule Test</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">Already passed pre-trip</div>
            <h3>Partial Test</h3>
            <p class="card-desc">For drivers who only need to complete maneuvers and the road test.</p>
            <ul class="checklist small">
              <li>Basic vehicle control (maneuvers)</li>
              <li>On-road driving test</li>
            </ul>
            <dl class="cost-list">
              <div>
                <dt>Your equipment</dt>
                <dd>$250</dd>
              </div>
              <div>
                <dt>Our equipment</dt>
                <dd>$300</dd>
              </div>
            </dl>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-outline-dark">Schedule Test</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">Road test only</div>
            <h3>Driving Only</h3>
            <p class="card-desc">For drivers who only need to complete the on-road driving test.</p>
            <ul class="checklist small">
              <li>On-road driving test</li>
            </ul>
            <dl class="cost-list">
              <div>
                <dt>Your equipment</dt>
                <dd>$125</dd>
              </div>
              <div>
                <dt>Our equipment</dt>
                <dd>$150</dd>
              </div>
            </dl>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-outline-dark">Schedule Test</a>
          </article>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Practice &amp; <span class="text-red">Policies</span></h2>
          <p>Get comfortable in the truck before test day, and know our rescheduling policy before you book.</p>
        </div>
        <div class="cards cards-2">
          <article class="card reveal">
            <div class="card-tag">Optional</div>
            <h3>Practice Sessions</h3>
            <p class="card-desc">Practice in our equipment with an instructor before your test. Practice time is not
              required to test with us.</p>
            <dl class="cost-list">
              <div>
                <dt>2 hours of practice</dt>
                <dd>$300</dd>
              </div>
              <div>
                <dt>4 hours of practice</dt>
                <dd>$600</dd>
              </div>
            </dl>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-outline-dark">Book Practice Time</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">Please note</div>
            <h3>Cancellation Policy</h3>
            <p class="card-desc">Plans change. Here's how cancellations and rescheduling work:</p>
            <dl class="cost-list policy-list">
              <div>
                <dt>72+ hours notice</dt>
                <dd>Full refund or move to a new date</dd>
              </div>
              <div>
                <dt>48 to 72 hours notice</dt>
                <dd>$100 non-refundable</dd>
              </div>
              <div>
                <dt>Less than 48 hours notice</dt>
                <dd>No refund</dd>
              </div>
            </dl>
          </article>
        </div>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>How to <span class="text-red">Schedule</span></h2>
          <p>Booking your CDL test takes just a few steps.</p>
        </div>
        <ol class="steps">
          <li class="step reveal">
            <span class="step-num">01</span>
            <h3>Contact Us</h3>
            <p>Fill out our form or call us to tell us which test you need.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">02</span>
            <h3>Pick Your Test &amp; Date</h3>
            <p>We'll go over your options, equipment, cost and available dates.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">03</span>
            <h3>Add Practice Time</h3>
            <p>Optional: book 2 or 4 hours of practice in our equipment before your test.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">04</span>
            <h3>Test Day</h3>
            <p>Arrive with your permit and documents, and we'll take it from there.</p>
          </li>
        </ol>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Need Training <span class="text-red">First?</span></h2>
          <p>Not ready to test yet? We'll get you there.</p>
        </div>
        <div class="cards">
          <article class="card reveal">
            <h3>CDL School Training</h3>
            <p class="card-desc">A complete Class A program for individuals, from permit prep to test day.</p>
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
            <p>Yes. Using our equipment is a good option if you don't have a properly registered, insured and test-ready commercial vehicle.</p>
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
            <p><a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>">Contact us</a> or call (937) 618-5304. We will go over your options, available dates, equipment, cost and what to bring on test day.</p>
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
          <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Schedule Your Test <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          <a href="tel:+19376185304" class="btn btn-outline btn-lg">Call (937) 618-5304</a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
