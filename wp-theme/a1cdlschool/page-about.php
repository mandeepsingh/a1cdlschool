<?php
/**
 * Template for the About Us | A1 CDL School in Dayton, Ohio page (generated from about.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <section class="page-hero page-hero-photo hero-about">
      <div class="container">
        <span class="rule"></span>
        <h1>About Us</h1>
        <p>Practical, hands-on CDL training that gets you road-ready and career-ready.</p>
      </div>
    </section>

    <!-- ============ About ============ -->
    <section class="section about">
      <div class="container split">
        <div class="split-text reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Built for the <span class="text-red">Road Ahead</span></h2>
          <p class="lead">At A1 CDL School, we provide practical, hands-on CDL training to help you build real skills
            and gain the confidence you need to succeed. Our experienced instructors are committed to your success,
            offering the guidance and support you need every step of the way.</p>
          <a href="<?php echo esc_url( a1cdl_link( 'index', 'training' ) ); ?>" class="btn btn-dark">How Training Works <svg class="chev" viewBox="0 0 24 24"
              aria-hidden="true">
              <path d="M9 6l6 6-6 6" />
            </svg></a>
        </div>
        <div class="split-media reveal">
          <img src="<?php echo esc_url( a1cdl_asset( 'truck-inspection.jpg' ) ); ?>"
            alt="CDL student performing a pre-trip tire inspection with a clipboard" width="1000" height="545"
            loading="lazy" />
        </div>
      </div>
    </section>

    <section class="cta-band">
      <div class="cta-bg" aria-hidden="true"></div>
      <div class="container cta-inner reveal">
        <div>
          <h2>Ready to Hit the Road?</h2>
          <p>Classes fill up fast. Reserve your spot and start your new career in weeks, not years.</p>
        </div>
        <div class="cta-actions">
          <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Enroll Today <svg class="chev" viewBox="0 0 24 24"
              aria-hidden="true">
              <path d="M9 6l6 6-6 6" />
            </svg></a>
          <a href="tel:+19376185304" class="btn btn-outline btn-lg">Call (937) 618-5304</a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
