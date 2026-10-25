<?php
/**
 * Template for the Company Contract CDL Training | A1 CDL School page (generated from company-contract-training.html).
 *
 * @package A1CDLSchool
 */

get_header();
?>

  <main id="main">
    <!-- PLACEHOLDER CONTENT: prices, hours, schedules and policies on this page are sample figures.
         Replace them with A1 CDL School's real program details before launch. -->

    <section class="page-hero page-hero-photo hero-company">
      <div class="container">
        <span class="rule"></span>
        <h1>Company Contract Training</h1>
        <p>Get your drivers trained and licensed on your schedule, with flexible CDL training packages for companies and owner-operators.</p>
        <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Register Drivers <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
      </div>
    </section>

    <section class="section section-intro">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Training Built Around <span class="text-red">Your Business</span></h2>
          <p>Whether you're a trucking company adding drivers, a construction or utility company that needs CDL holders, or an owner starting your own trucking company, we'll build a training plan that fits. The same training and pricing apply to companies and owner-operators.</p>
        </div>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Training <span class="text-red">Options</span></h2>
          <p>Train one driver or a whole group, at our training yard or on-site at your location.</p>
        </div>
        <div class="cards cards-2">
          <article class="card card-featured reveal">
            <div class="card-tag">Most popular</div>
            <h3>Class A CDL</h3>
            <p class="card-price"><small>Starting at</small>$4,650</p>
            <p class="card-desc">The usual choice for companies sending employees to get their Class A CDL.</p>
            <ul class="checklist small">
              <li>25 hours behind-the-wheel training</li>
              <li>40 hours online theory (ELDT)</li>
              <li>Permit test prep</li>
              <li>Manual or automatic equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary">Register Drivers</a>
          </article>

          <article class="card reveal">
            <div class="card-tag">Have a Class B?</div>
            <h3>Class B to Class A Upgrade</h3>
            <p class="card-price"><small>Starting at</small>$3,960</p>
            <p class="card-desc">For current Class B CDL holders moving up to a Class A license.</p>
            <ul class="checklist small">
              <li>20 hours behind-the-wheel training</li>
              <li>40 hours online theory (ELDT)</li>
              <li>4 individual sessions</li>
              <li>Automatic equipment</li>
              <li>CDL skills test included</li>
            </ul>
            <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-outline-dark">Register Drivers</a>
          </article>
        </div>
        <p class="programs-note reveal">The upgrade requires a current Class B CDL. Training or testing booked on its own
          includes an $85 enrollment fee for a drug screen and driving record (MVR) check. Contact us for a custom
          quote.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>How It <span class="text-red">Works</span></h2>
          <p>A clear path from day one to a CDL, with the company covering the cost of training.</p>
        </div>
        <ol class="steps steps-5">
          <li class="step reveal">
            <span class="step-num">01</span>
            <h3>Get a DOT Physical</h3>
            <p>Drivers get a DOT physical and medical examiner's certificate before training starts.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">02</span>
            <h3>Prep for the Permit</h3>
            <p>Permit prep gets drivers ready for the CDL knowledge tests.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">03</span>
            <h3>Pass the Permit Test</h3>
            <p>Drivers pass the knowledge tests at the BMV to get their Commercial Learner's Permit.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">04</span>
            <h3>Start CDL Training</h3>
            <p>Theory and behind-the-wheel training, scheduled around your drivers' work hours.</p>
          </li>
          <li class="step reveal">
            <span class="step-num">05</span>
            <h3>Take the Skills Test</h3>
            <p>Once our instructors sign off, drivers take the CDL skills test.</p>
          </li>
        </ol>
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
            <p class="venn-note">*Tuition must be paid by the company</p>
            <h4>What do you get?</h4>
            <ul>
              <li>Class A CDL training</li>
              <li>ELDT classroom theory</li>
              <li>Behind-the-wheel training</li>
              <li>Use of our equipment</li>
              <li>CDL skills test</li>
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
            <ul>
              <li>Class A or Class B CDL training</li>
              <li>ELDT classroom theory</li>
              <li>Permit test prep</li>
              <li>Behind-the-wheel training</li>
              <li>Use of our equipment</li>
              <li>CDL skills test</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="section bg-soft">
      <div class="container">
        <div class="section-head reveal">
          <span class="rule" aria-hidden="true"></span>
          <h2>Company Contract <span class="text-red">FAQs</span></h2>
          <p>Answers to the questions employers ask us most.</p>
        </div>
        <div class="faq reveal">
          <details>
            <summary>What is company contract training?</summary>
            <p>It's CDL training paid for by a company for an employee or future employee. It's a good fit for trucking companies, construction and utility companies, owner-operators, and anyone starting their own trucking company.</p>
          </details>
          <details>
            <summary>How does employer-sponsored training work?</summary>
            <p>The company enrolls the driver and pays for training. We schedule the training, guide the driver from permit to skills test, and keep you updated along the way.</p>
          </details>
          <details>
            <summary>How does the cost compare to a traditional CDL school?</summary>
            <p>Full-time CDL programs often cost $5,000 to $10,000 and require weeks of full-time attendance. Our company packages focus on the training your drivers need, so you pay less and they spend less time away from work.</p>
          </details>
          <details>
            <summary>Is the training ELDT compliant?</summary>
            <p>Yes. Our theory and behind-the-wheel training meet the FMCSA Entry-Level Driver Training (ELDT) requirements.</p>
          </details>
          <details>
            <summary>Can training fit around my drivers' work schedules?</summary>
            <p>Yes. Training is often scheduled in 4 to 5 hour blocks over several weeks, so drivers can keep working while they train.</p>
          </details>
          <details>
            <summary>Where does training take place?</summary>
            <p>At our training yard at 2700 W National Rd in Dayton, or on-site at your location.</p>
          </details>
          <details>
            <summary>Can you customize a package for our company?</summary>
            <p>Yes. We can build a package around your drivers' experience, the equipment they'll drive, and your schedule. Contact us for a custom quote.</p>
          </details>
        </div>
      </div>
    </section>

    <section class="cta-band">
      <div class="cta-bg" aria-hidden="true"></div>
      <div class="container cta-inner reveal">
        <div>
          <h2>Ready to Train Your Drivers?</h2>
          <p>Tell us how many drivers you need trained and when, and we'll put together a plan.</p>
        </div>
        <div class="cta-actions">
          <a href="<?php echo esc_url( a1cdl_link( 'contact' ) ); ?>" class="btn btn-primary btn-lg">Register Drivers <svg class="chev" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M9 6l6 6-6 6" />
              </svg></a>
          <a href="tel:+19376185304" class="btn btn-outline btn-lg">Call (937) 618-5304</a>
        </div>
      </div>
    </section>
  </main>

<?php
get_footer();
