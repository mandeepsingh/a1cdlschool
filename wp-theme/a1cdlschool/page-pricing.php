<?php
/**
 * Template for the CDL Training &amp; Testing Prices | A1 CDL School page (generated from pricing.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <!-- Prices come from the client's pricing update. The $165 full test price is pending client confirmation.
         Keep these in sync with the program and testing pages. -->

    <section class="page-hero page-hero-photo">
      <div class="container">
        <span class="rule"></span>
        <h1>Pricing</h1>
        <p>Clear, upfront pricing for CDL training, endorsements and testing.</p>
        <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Request a Quote <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>CDL Training <span class="text-red">Programs</span></h2>
          <p>Whether you are paying for yourself or your company is sponsoring you, there is a program that fits.</p>
        </div>
        <h3 class="sub-head reveal">CDL School <span class="text-red">(Individuals)</span></h3>
        <div class="cards cards-2">
          <article class="card card-featured reveal">
            <div class="card-tag">For individuals</div>
            <h3>Class A CDL Program</h3>
            <p class="card-price"><small>Total tuition, no extra fees</small>$5,800</p>
            <p class="card-desc">Our complete Class A CDL school program, from theory to test day.</p>
            <ul class="checklist small">
              <li>44 hours behind-the-wheel</li>
              <li>40 hours theory, online or in class</li>
              <li>Manual or automatic equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'cdl-school-training' ) ); ?>" class="btn btn-primary">View Program</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">For individuals</div>
            <h3>Class B CDL Program</h3>
            <p class="card-price"><small>Total tuition, no extra fees</small>$4,500</p>
            <p class="card-desc">Our complete Class B CDL school program, from theory to test day.</p>
            <ul class="checklist small">
              <li>28 hours behind-the-wheel</li>
              <li>40 hours theory, online or in class</li>
              <li>Includes our equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'cdl-school-training' ) ); ?>" class="btn btn-outline-dark">View Program</a>
          </article>
        </div>

        <h3 class="sub-head reveal">Company Contract <span class="text-red">Training</span></h3>
        <div class="cards">
          <article class="card reveal">
            <div class="card-tag">For companies</div>
            <h3>Company Class A CDL</h3>
            <p class="card-price"><small>Starting at</small>$4,200</p>
            <p class="card-desc">Flexible Class A training for companies and owner-operators.</p>
            <ul class="checklist small">
              <li>25 hours behind-the-wheel</li>
              <li>Online theory training</li>
              <li>Includes our equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>" class="btn btn-outline-dark">View Program</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">For companies</div>
            <h3>Company Class B CDL</h3>
            <p class="card-price"><small>Starting at</small>$3,000</p>
            <p class="card-desc">Flexible Class B training for companies and owner-operators.</p>
            <ul class="checklist small">
              <li>20 hours behind-the-wheel</li>
              <li>Online theory training</li>
              <li>Includes our equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>" class="btn btn-outline-dark">View Program</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">Have a Class B?</div>
            <h3>Class B to Class A Upgrade</h3>
            <p class="card-price"><small>Starting at</small>$3,500</p>
            <p class="card-desc">For current Class B CDL holders moving up to a Class A license.</p>
            <ul class="checklist small">
              <li>20 hours behind-the-wheel</li>
              <li>Online theory training</li>
              <li>Includes our equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'company-contract-training' ) ); ?>" class="btn btn-outline-dark">View Program</a>
          </article>
        </div>

        <h3 class="sub-head reveal">Endorsements</h3>
        <div class="cards endorsements">
          <article class="card endorse reveal">
            <span class="endorse-code" aria-hidden="true">P</span>
            <h4>Passenger Endorsement</h4>
            <p>Drive buses and other vehicles designed to carry 16 or more people, including the driver.</p>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="text-link" data-program="Passenger Endorsement">Request info <svg class="chev"
                viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          </article>
          <article class="card endorse reveal">
            <span class="endorse-code" aria-hidden="true">N</span>
            <h4>Tanker Endorsement</h4>
            <p>Haul liquids and gases in bulk tanks, and learn to handle liquid surge safely.</p>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="text-link" data-program="Tanker Endorsement">Request info <svg class="chev"
                viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          </article>
          <article class="card endorse reveal">
            <span class="endorse-code" aria-hidden="true">H</span>
            <h4>Hazmat Endorsement</h4>
            <p>Transport placarded hazardous materials, one of the best-paying specialties in trucking.</p>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="text-link" data-program="Hazmat Endorsement">Request info <svg class="chev"
                viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          </article>
        </div>
        <p class="programs-note reveal">Contact us for endorsement pricing. We can customize any training package to
          your needs and skill level.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>CDL Testing <span class="text-red">Prices</span></h2>
          <p>Class A or Class B skills testing in A1 Truck Rental equipment.</p>
        </div>
        <div class="table-wrap reveal">
          <table class="price-table">
            <thead>
              <tr>
                <th scope="col">Test</th>
                <th scope="col">Includes</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Full Test</th>
                <td>Pre-trip inspection, maneuvers, road test</td>
                <td>$165</td>
              </tr>
              <tr>
                <th scope="row">Partial Test</th>
                <td>Maneuvers, road test</td>
                <td>$135</td>
              </tr>
              <tr>
                <th scope="row">Driving Only</th>
                <td>Road test</td>
                <td>$85</td>
              </tr>
              <tr>
                <th scope="row">Practice: 1 Hour</th>
                <td>Optional road and range practice</td>
                <td>$500</td>
              </tr>
              <tr>
                <th scope="row">Practice: 3 Hours</th>
                <td>Optional practice: 1 hour road, 2 hours range</td>
                <td>$1,200</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="programs-note reveal">See our <a href="<?php echo esc_url( a1cdl_link( 'cdl-testing' ) ); ?>">CDL Testing</a> page for test details and
          our cancellation policy.</p>
      </div>
    </section>

    <!-- ============ Compare ============ -->
    <section class="section compare" id="compare">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Company Contract vs. <span class="text-red">CDL School</span></h2>
          <p>Whether your employer is paying or you're investing in yourself, you get the same instructors and the
            same hands-on training.</p>
        </div>

        <div class="venn reveal">
          <svg class="venn-shapes" viewBox="0 0 1000 600" aria-hidden="true">
            <defs>
              <linearGradient id="venn-dark" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0" stop-color="#2a2f38" />
                <stop offset="1" stop-color="#111318" />
              </linearGradient>
              <linearGradient id="venn-red" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0" stop-color="#e31b23" />
                <stop offset="1" stop-color="#a50f16" />
              </linearGradient>
              <path id="venn-arc-left" d="M125 157 A250 250 0 0 1 416 65" />
              <path id="venn-arc-right" d="M584 65 A250 250 0 0 1 875 157" />
            </defs>
            <circle cx="330" cy="300" r="290" fill="url(#venn-dark)" />
            <circle cx="670" cy="300" r="290" fill="url(#venn-dark)" />
            <path d="M500 65 A290 290 0 0 1 500 535 A290 290 0 0 1 500 65z" fill="url(#venn-red)" />
            <text class="venn-arc-text">
              <textPath href="#venn-arc-left" startOffset="50%" text-anchor="middle">Company Contract</textPath>
            </text>
            <text class="venn-arc-text">
              <textPath href="#venn-arc-right" startOffset="50%" text-anchor="middle">CDL School</textPath>
            </text>
          </svg>
          <svg class="venn-shapes-v" viewBox="0 0 600 960" aria-hidden="true">
            <defs>
              <linearGradient id="venn-dark-v" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0" stop-color="#2a2f38" />
                <stop offset="1" stop-color="#111318" />
              </linearGradient>
              <linearGradient id="venn-red-v" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0" stop-color="#a50f16" />
                <stop offset=".5" stop-color="#e31b23" />
                <stop offset="1" stop-color="#a50f16" />
              </linearGradient>
              <path id="venn-arc-top" d="M95 157 A250 250 0 0 1 505 157" />
              <path id="venn-arc-bottom" d="M85 830 A262 262 0 0 0 515 830" />
            </defs>
            <circle cx="300" cy="300" r="290" fill="url(#venn-dark-v)" />
            <circle cx="300" cy="680" r="290" fill="url(#venn-dark-v)" />
            <path d="M81 490 A290 290 0 0 0 519 490 A290 290 0 0 0 81 490z" fill="url(#venn-red-v)" />
            <text class="venn-arc-text">
              <textPath href="#venn-arc-top" startOffset="50%" text-anchor="middle">Company Contract</textPath>
            </text>
            <text class="venn-arc-text">
              <textPath href="#venn-arc-bottom" startOffset="50%" text-anchor="middle">CDL School</textPath>
            </text>
          </svg>

          <div class="venn-part venn-left">
            <h3>Company Contract</h3>
            <h4>Who is it for?</h4>
            <p>Drivers whose employer or future employer is paying for their training.</p>
            <h4>What do you get?</h4>
            <h5>Class A CDL</h5>
            <ul>
              <li>25 hrs behind the wheel</li>
              <li>Online theory</li>
              <li>Cost: <strong>$4,200</strong></li>
            </ul>
            <h5>Class B CDL</h5>
            <ul>
              <li>20 hrs behind the wheel</li>
              <li>Online theory</li>
              <li>Cost: <strong>$3,000</strong></li>
            </ul>
          </div>

          <div class="venn-part venn-center">
            <h3>What does everyone get?</h3>
            <ul>
              <li>Hands-on training</li>
              <li>Experienced instructors</li>
              <li>Flexible scheduling</li>
              <li>Real equipment</li>
              <li>Career-focused support</li>
            </ul>
          </div>

          <div class="venn-part venn-right">
            <h3>CDL School</h3>
            <h4>Who is it for?</h4>
            <p>Individuals paying for their own training.</p>
            <h4>What do you get?</h4>
            <h5>Class A CDL</h5>
            <ul>
              <li>44 hrs behind the wheel</li>
              <li>40 hrs online/in-class theory</li>
              <li>Cost: <strong>$5,800</strong></li>
            </ul>
            <h5>Class B CDL</h5>
            <ul>
              <li>28 hrs behind the wheel</li>
              <li>40 hrs online/in-class theory</li>
              <li>Cost: <strong>$4,500</strong></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Help Paying for <span class="text-red">Training</span></h2>
          <p>You may qualify for help paying for CDL training, such as WIOA funding through your local OhioMeansJobs center. Contact us and we will help you find out what is available.</p>
        </div>
        <p class="programs-note reveal"><a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-dark">Ask About Funding <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a></p>
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
          <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Enroll Today <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          <a href="tel:+19376185304" class="btn btn-outline btn-lg">Call (937) 618-5304</a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
