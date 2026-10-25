<?php
/**
 * Fallback template.
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <section class="page-hero">
      <div class="container">
        <span class="rule"></span>
        <h1><?php the_title(); ?></h1>
      </div>
    </section>

    <section class="legal">
      <div class="container legal-body">
        <?php the_content(); ?>
      </div>
    </section>
    <?php endwhile; ?>
  </main>

<?php
get_footer();
