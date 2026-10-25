<?php
/**
 * Template for the Page Not Found | A1 CDL School page (generated from 404.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <section class="page-hero not-found">
      <div class="container">
        <span class="rule"></span>
        <h1>Page Not Found</h1>
        <p>Sorry, we couldn't find that page. It may have moved, or the link may be wrong.</p>
        <div class="not-found-actions">
          <a href="<?php echo esc_url( a1cdl_link( 'index' ) ); ?>" class="btn btn-primary btn-lg">Back to Home</a>
          <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-outline btn-lg">Contact Us</a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
