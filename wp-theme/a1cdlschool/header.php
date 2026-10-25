<?php
/**
 * Site header: top bar and main navigation.
 *
 * @package A1CDLSchool
 */
?><!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a class="skip-link" href="#main">Skip to content</a>

  <!-- ============ Top bar ============ -->
  <div class="topbar" id="top">
    <div class="container topbar-inner">
      <div class="topbar-contact">
        <a href="tel:+19376185304">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2" />
          </svg>
          (937) 618-5304
        </a>
        <a href="mailto:admin@a1cdlschool.com" class="topbar-email">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <rect x="3" y="5" width="18" height="14" rx="2" />
            <path d="M3 7l9 6 9-6" />
          </svg>
          admin@a1cdlschool.com
        </a>
      </div>
      <ul class="social" aria-label="Social media">
        <li><a href="https://www.facebook.com/profile.php?id=61554712478374" aria-label="Facebook" target="_blank"
            rel="noopener"><svg viewBox="0 0 24 24" aria-hidden="true">
              <path class="fill"
                d="M14 8h3V4h-3c-2.8 0-4.5 1.8-4.5 4.6V11H7v4h2.5v9h4v-9h3l.5-4h-3.5V9c0-.6.4-1 1-1z" />
            </svg></a></li>
        <li><a href="https://www.instagram.com/a1cdltraining/" aria-label="Instagram" target="_blank"
            rel="noopener"><svg viewBox="0 0 24 24" aria-hidden="true">
              <rect x="3" y="3" width="18" height="18" rx="5" />
              <circle cx="12" cy="12" r="4" />
              <circle class="fill" cx="17.3" cy="6.7" r="1.1" />
            </svg></a></li>
        <li><a href="https://www.tiktok.com/@a1cdltraining" aria-label="TikTok" target="_blank" rel="noopener"><svg
              viewBox="0 0 24 24" aria-hidden="true">
              <path class="fill"
                d="M16.6 3c.4 2.3 1.8 3.8 4.1 4v3.2c-1.5.1-2.9-.4-4.1-1.2v6.3c0 3.6-2.5 5.9-5.6 5.9a5.6 5.6 0 01-5.6-5.6c0-3.4 2.8-5.9 6.4-5.5v3.3c-1.6-.4-3.1.5-3.1 2.2 0 1.3 1 2.3 2.3 2.3 1.4 0 2.4-.9 2.4-2.9V3h3.2z" />
            </svg></a></li>
      </ul>
    </div>
  </div>

  <!-- ============ Header ============ -->
  <header class="site-header">
    <div class="container header-inner">
      <a href="<?php echo esc_url( a1cdl_link( 'index', 'home' ) ); ?>" class="brand" aria-label="A1 CDL School home">
        <img src="<?php echo esc_url( a1cdl_asset( 'logo-white.png' ) ); ?>" alt="A1 CDL School" width="600" height="301" />
      </a>

      <nav class="main-nav" id="main-nav" aria-label="Primary">
        <ul>
          <li><a href="<?php echo esc_url( a1cdl_link( 'index', 'home' ) ); ?>"<?php a1cdl_nav_attrs( 'home' ); ?>>Home</a></li>
          <li class="has-sub">
            <a href="<?php echo esc_url( a1cdl_link( 'index', 'training' ) ); ?>"<?php a1cdl_nav_attrs( 'training' ); ?>>CDL Training <svg class="caret" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M6 9l6 6 6-6" />
              </svg></a>
            <ul class="sub-nav">
              <li><a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>"<?php a1cdl_nav_attrs( 'company-contract-training' ); ?>>Company Contract Training</a></li>
              <li><a href="<?php echo esc_url( a1cdl_link( 'cdl-school-training' ) ); ?>"<?php a1cdl_nav_attrs( 'cdl-school-training' ); ?>>CDL School Training</a></li>
            </ul>
          </li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'cdl-testing' ) ); ?>"<?php a1cdl_nav_attrs( 'cdl-testing' ); ?>>CDL Testing</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'pricing' ) ); ?>"<?php a1cdl_nav_attrs( 'pricing' ); ?>>Pricing</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'about' ) ); ?>"<?php a1cdl_nav_attrs( 'about' ); ?>>About Us</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>"<?php a1cdl_nav_attrs( 'contact' ); ?>>Contact</a></li>
        </ul>
        <a href="<?php echo esc_url( a1cdl_cta_url() ); ?>" class="btn btn-primary nav-cta">Get Started <svg class="chev" viewBox="0 0 24 24"
            aria-hidden="true">
            <path d="M9 6l6 6-6 6" />
          </svg></a>
      </nav>

      <a href="<?php echo esc_url( a1cdl_cta_url() ); ?>" class="btn btn-primary header-cta">Get Started <svg class="chev" viewBox="0 0 24 24"
          aria-hidden="true">
          <path d="M9 6l6 6-6 6" />
        </svg></a>

      <button class="nav-toggle" aria-controls="main-nav" aria-expanded="false" aria-label="Open menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

