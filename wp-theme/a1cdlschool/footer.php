<?php
/**
 * Site footer.
 *
 * @package A1CDLSchool
 */
?>
  <!-- ============ Footer ============ -->
  <footer class="site-footer">
    <div class="container footer-grid">
      <div class="footer-brand">
        <img src="<?php echo esc_url( a1cdl_asset( 'logo-white.png' ) ); ?>" alt="A1 CDL School" width="600" height="301" loading="lazy" />
        <p>Practical, hands-on CDL training that gets you road-ready and career-ready.</p>
      </div>
      <div>
        <h4>Explore</h4>
        <ul>
          <li><a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>">Contact</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'about' ) ); ?>">About Us</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'pricing' ) ); ?>">Pricing</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'cdl-testing' ) ); ?>">CDL Testing</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'cdl-school-training' ) ); ?>">CDL School Training</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>">Company Contract Training</a></li>
        </ul>
      </div>
      <div>
        <h4>Programs</h4>
        <ul>
          <li><a href="<?php echo esc_url( a1cdl_link( 'index', 'programs' ) ); ?>">Class A CDL Training</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'index', 'programs' ) ); ?>">Class B CDL Training</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'index', 'endorsements' ) ); ?>">Passenger Endorsement</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'index', 'endorsements' ) ); ?>">Tanker Endorsement</a></li>
          <li><a href="<?php echo esc_url( a1cdl_link( 'index', 'endorsements' ) ); ?>">Hazmat Endorsement</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li><a href="tel:+19376185304">(937) 618-5304</a></li>
          <li><a href="mailto:admin@a1cdlschool.com">admin@a1cdlschool.com</a></li>
          <li>2700 W National Rd<br />Dayton, OH 45414</li>
        </ul>
        <ul class="social social-footer" aria-label="Social media">
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
    <div class="container footer-bottom">
      <p>&copy; <span id="year"><?php echo esc_html( gmdate( 'Y' ) ); ?></span> A1 CDL School. All rights reserved.</p>
      <ul class="footer-legal">
        <li><a href="<?php echo esc_url( a1cdl_link( 'privacy' ) ); ?>">Privacy Policy</a></li>
        <li><a href="<?php echo esc_url( a1cdl_link( 'terms' ) ); ?>">Terms &amp; Conditions</a></li>
      </ul>
      <a href="#top" class="to-top">Back to top ↑</a>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>

</html>
