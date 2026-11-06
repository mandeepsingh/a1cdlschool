<?php
/**
 * A1 CDL School theme functions.
 *
 * Source: tools/wp/functions.php (copied into the theme by tools/build_wp_theme.py).
 *
 * @package A1CDLSchool
 */

define( 'A1CDL_VERSION', '1.0.0' );

/**
 * Site pages: theme key => page slug and title. Each has a page-{slug}.php template.
 */
function a1cdl_pages() {
	return array(
		'about'                     => array( 'about', 'About Us' ),
		'contact'                   => array( 'contact', 'Contact' ),
		'pricing'                   => array( 'pricing', 'Pricing' ),
		'cdl-testing'               => array( 'cdl-testing', 'CDL Testing' ),
		'cdl-school-training'       => array( 'cdl-school-training', 'CDL School Training' ),
		'company-contract-training' => array( 'company-contract-training', 'Company Contract Training' ),
		'privacy'                   => array( 'privacy-policy', 'Privacy Policy' ),
		'terms'                     => array( 'terms', 'Terms & Conditions' ),
	);
}

/* ---------- Setup and assets ---------- */

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'script', 'style', 'search-form', 'gallery', 'caption' ) );
	}
);

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_style( 'a1cdl-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap', array(), null );
		// Version by file time so browsers pick up changes right away
		$ver = function ( $file ) {
			return (string) filemtime( get_theme_file_path( $file ) );
		};
		wp_enqueue_style( 'a1cdl-main', get_theme_file_uri( 'css/styles.css' ), array( 'a1cdl-fonts' ), $ver( 'css/styles.css' ) );
		wp_enqueue_style( 'a1cdl-theme', get_stylesheet_uri(), array( 'a1cdl-main' ), $ver( 'style.css' ) );
		wp_enqueue_script( 'a1cdl-main', get_theme_file_uri( 'js/main.js' ), array(), $ver( 'js/main.js' ), true );
	}
);

add_filter(
	'wp_resource_hints',
	function ( $urls, $relation ) {
		if ( 'preconnect' === $relation ) {
			$urls[] = 'https://fonts.googleapis.com';
			$urls[] = array(
				'href'        => 'https://fonts.gstatic.com',
				'crossorigin' => 'anonymous',
			);
		}
		return $urls;
	},
	10,
	2
);

// Theme favicons, unless a Site Icon is set in the Customizer
add_action(
	'wp_head',
	function () {
		if ( has_site_icon() ) {
			return;
		}
		printf( '<link rel="icon" href="%s" type="image/png" sizes="32x32" />' . "\n", esc_url( a1cdl_asset( 'favicon-32.png' ) ) );
		printf( '<link rel="apple-touch-icon" href="%s" />' . "\n", esc_url( a1cdl_asset( 'apple-touch-icon.png' ) ) );
	}
);

/* ---------- URL helpers ---------- */

function a1cdl_asset( $path ) {
	return get_theme_file_uri( 'assets/' . $path );
}

/**
 * Absolute URL for a site page by theme key ('index' is the home page).
 */
function a1cdl_url( $key, $fragment = '' ) {
	static $cache = array();
	if ( ! isset( $cache[ $key ] ) ) {
		$pages = a1cdl_pages();
		$url   = home_url( '/' );
		if ( isset( $pages[ $key ] ) ) {
			$page = get_page_by_path( $pages[ $key ][0] );
			$url  = $page ? get_permalink( $page ) : home_url( '/' . $pages[ $key ][0] . '/' );
		}
		$cache[ $key ] = $url;
	}
	return $cache[ $key ] . ( $fragment ? '#' . $fragment : '' );
}

/**
 * Link for markup: home page links become plain #anchors on the home page itself,
 * so the nav scroll highlighting in main.js keeps working. A link to the home page
 * with no section becomes #home, which main.js scrolls to without changing the URL.
 */
function a1cdl_link( $key, $fragment = '' ) {
	if ( 'index' === $key && is_front_page() ) {
		return '#' . ( $fragment ? $fragment : 'home' );
	}
	return a1cdl_url( $key, $fragment );
}

/**
 * Theme key of the current page: 'home', '404', a key from a1cdl_pages(), or ''.
 */
function a1cdl_page_key() {
	if ( is_front_page() ) {
		return 'home';
	}
	if ( is_404() ) {
		return '404';
	}
	foreach ( a1cdl_pages() as $key => $page ) {
		if ( is_page( $page[0] ) ) {
			return $key;
		}
	}
	return '';
}

/* ---------- Navigation ---------- */

/**
 * Prints the active-state attributes for a main nav link.
 */
function a1cdl_nav_attrs( $key ) {
	$current  = a1cdl_page_key();
	$training = array( 'company-contract-training', 'cdl-school-training' );

	if ( 'training' === $key ) {
		$active = in_array( $current, $training, true );
		echo $active ? ' class="active"' : '';
		return;
	}
	if ( in_array( $key, $training, true ) ) {
		echo $key === $current ? ' aria-current="page"' : '';
		return;
	}
	if ( ( 'home' === $key && 'home' === $current ) || $key === $current ) {
		echo ' class="active" aria-current="page"';
	}
}

/**
 * "Get Started" goes to the form on the home and contact pages, otherwise to the contact page.
 */
function a1cdl_cta_url() {
	return in_array( a1cdl_page_key(), array( 'home', 'contact' ), true ) ? '#contact' : a1cdl_url( 'contact' );
}

/* ---------- SEO (skipped when an SEO plugin manages these) ---------- */

function a1cdl_has_seo_plugin() {
	return defined( 'WPSEO_VERSION' ) || class_exists( 'RankMath' ) || defined( 'AIOSEO_VERSION' ) || defined( 'SEOPRESS_VERSION' );
}

function a1cdl_head_key() {
	$key = a1cdl_page_key();
	return 'home' === $key ? 'index' : $key;
}

add_filter(
	'pre_get_document_title',
	function ( $title ) {
		if ( a1cdl_has_seo_plugin() ) {
			return $title;
		}
		$titles = require get_theme_file_path( 'inc/titles.php' );
		$key    = a1cdl_head_key();
		return isset( $titles[ $key ] ) ? $titles[ $key ] : $title;
	}
);

add_action(
	'wp_head',
	function () {
		if ( a1cdl_has_seo_plugin() ) {
			return;
		}
		$key  = a1cdl_head_key();
		$file = get_theme_file_path( 'inc/head/' . $key . '.php' );
		if ( $key && file_exists( $file ) ) {
			include $file;
		}
	},
	1
);

/*
 * /llms.txt from the static site's file, with its .html links pointed at the WordPress pages.
 * WordPress core already serves /robots.txt and /wp-sitemap.xml.
 */
add_action(
	'parse_request',
	function ( $wp ) {
		if ( 'llms.txt' !== $wp->request ) {
			return;
		}
		$text = file_get_contents( get_theme_file_path( 'llms.txt' ) );
		$text = preg_replace_callback(
			'#https://a1cdlschool\.com/([\w-]*)(?:\.html)?#',
			function ( $m ) {
				return a1cdl_url( $m[1] ? $m[1] : 'index' );
			},
			$text
		);
		status_header( 200 );
		header( 'Content-Type: text/plain; charset=utf-8' );
		echo $text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- plain text file
		exit;
	}
);

/*
 * The site is pages only, with no blog: keep the sitemap to pages, and send blog archives
 * (author, category, tag, date) to the home page. This also stops the admin username from
 * showing up in the sitemap and in /?author=1 redirects.
 */
add_filter(
	'wp_sitemaps_add_provider',
	function ( $provider, $name ) {
		return in_array( $name, array( 'users', 'taxonomies' ), true ) ? false : $provider;
	},
	10,
	2
);

add_filter(
	'wp_sitemaps_post_types',
	function ( $post_types ) {
		unset( $post_types['post'] );
		return $post_types;
	}
);

add_action(
	'template_redirect',
	function () {
		if ( is_author() || is_category() || is_tag() || is_date() ) {
			wp_safe_redirect( home_url( '/' ), 301 );
			exit;
		}
	},
	1 // before redirect_canonical, which would send /?author=1 to /author/{username}/
);

// Hide the user list from the public REST API (the block editor still gets it when logged in)
add_filter(
	'rest_endpoints',
	function ( $endpoints ) {
		if ( ! is_user_logged_in() ) {
			unset( $endpoints['/wp/v2/users'], $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
		}
		return $endpoints;
	}
);

/* ---------- Contact and schedule forms ---------- */

function a1cdl_contact_form_fields( $action = 'a1cdl_contact' ) {
	printf( '<input type="hidden" name="action" value="%s" />', esc_attr( $action ) );
	// Page to return to after sending (0 = home page)
	printf( '<input type="hidden" name="a1cdl_back" value="%d" />', is_front_page() ? 0 : (int) get_queried_object_id() );
	wp_nonce_field( $action, 'a1cdl_nonce', false );
	// Honeypot: hidden from people, bots tend to fill it in
	echo '<div style="position:absolute;left:-9999px" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off" /></label></div>';
}

function a1cdl_contact_status() {
	return isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
}

function a1cdl_contact_form_success_attr() {
	echo 'sent' === a1cdl_contact_status() ? '' : ' hidden';
}

// Always printed, hidden unless needed, so main.js can show it after a background send
function a1cdl_contact_form_error() {
	printf(
		'<p class="form-error" role="alert"%s>Sorry, your request could not be sent. Please call us at (937) 618-5304.</p>',
		'error' === a1cdl_contact_status() ? '' : ' hidden'
	);
}

/**
 * Finish a form request and exit: a status for a background send from main.js,
 * otherwise a redirect back to the form.
 */
function a1cdl_form_done( $status, $fragment ) {
	if ( ! empty( $_POST['a1cdl_ajax'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing -- nonce is checked before sending
		wp_send_json( array( 'status' => $status ) );
	}
	$back_id = isset( $_POST['a1cdl_back'] ) ? absint( $_POST['a1cdl_back'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing
	$back    = $back_id && get_permalink( $back_id ) ? get_permalink( $back_id ) : home_url( '/' );
	wp_safe_redirect( add_query_arg( 'contact', $status, $back ) . '#' . $fragment );
	exit;
}

function a1cdl_form_value( $key ) {
	return sanitize_text_field( wp_unslash( isset( $_POST[ $key ] ) ? $_POST[ $key ] : '' ) ); // phpcs:ignore WordPress.Security.NonceVerification.Missing,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- nonce is checked by a1cdl_read_form
}

/**
 * Spam and nonce checks, then the fields both forms share. Finishes the request if any of them fail.
 * The name, phone and email rules match the browser-side validation in main.js.
 */
function a1cdl_read_form( $action, $fragment ) {
	if ( ! empty( $_POST['website'] ) ) {
		a1cdl_form_done( 'sent', $fragment ); // bot: pretend it worked
	}
	if ( ! isset( $_POST['a1cdl_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['a1cdl_nonce'] ) ), $action ) ) {
		a1cdl_form_done( 'error', $fragment );
	}

	$name  = a1cdl_form_value( 'name' );
	$phone = a1cdl_form_value( 'phone' );
	$email = sanitize_email( wp_unslash( isset( $_POST['email'] ) ? $_POST['email'] : '' ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	if ( strlen( $name ) < 2 || strlen( preg_replace( '/\D/', '', $phone ) ) < 10 || ! is_email( $email ) ) {
		a1cdl_form_done( 'error', $fragment );
	}

	$message = sanitize_textarea_field( wp_unslash( isset( $_POST['message'] ) ? $_POST['message'] : '' ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	return compact( 'name', 'phone', 'email', 'message' );
}

/**
 * Send a branded HTML email, with a plain text version for email apps that don't show HTML.
 *
 * @param string $to      Recipient.
 * @param string $subject Subject line.
 * @param array  $fields  From a1cdl_read_form().
 * @param array  $content 'heading', 'source', 'preheader', and 'details' (label => plain text).
 * @return bool Whether the email was sent.
 */
function a1cdl_send_form_email( $to, $subject, $fields, $content ) {
	$text = "Name: {$fields['name']}\nPhone: {$fields['phone']}\nEmail: {$fields['email']}\n";
	foreach ( $content['details'] as $label => $value ) {
		$text .= "{$label}: {$value}\n";
	}
	$text .= "\nMessage:\n{$fields['message']}\n";

	// Reply-To makes the email app's Reply answer the visitor. wp_mail() splits this header on commas
	// and a stray < > " or @ can confuse it, so take those out of the name (as a1de-bookings does).
	$reply_name = trim( preg_replace( '/\s+/', ' ', str_replace( array( ',', ';', ':', '<', '>', '"', '@' ), ' ', $fields['name'] ) ) );
	$headers    = array( sprintf( 'Reply-To: %s <%s>', $reply_name, $fields['email'] ), 'Content-Type: text/html; charset=UTF-8' );
	$alt_body = function ( $phpmailer ) use ( $text ) {
		$phpmailer->AltBody = $text; // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
	};
	add_action( 'phpmailer_init', $alt_body );
	$sent = wp_mail( $to, $subject, a1cdl_contact_email_html( array_merge( $fields, $content ) ), $headers );
	remove_action( 'phpmailer_init', $alt_body );
	return $sent;
}

function a1cdl_contact_email_html( $fields ) {
	extract( $fields ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract -- template variables
	ob_start();
	include get_theme_file_path( 'inc/email-contact.php' );
	return ob_get_clean();
}

function a1cdl_handle_contact() {
	$fields  = a1cdl_read_form( 'a1cdl_contact', 'contact' );
	$program = a1cdl_form_value( 'program' );

	$sent = a1cdl_send_form_email(
		apply_filters( 'a1cdl_contact_recipient', get_option( 'admin_email' ) ),
		sprintf( 'Information Request from %s', $fields['name'] ),
		$fields,
		array(
			'heading'   => 'Information Request',
			'source'    => 'contact form',
			'preheader' => sprintf( '%s is interested in %s. Call %s.', $fields['name'], $program ? $program : 'CDL training', $fields['phone'] ),
			'details'   => array( 'Program' => $program ? $program : 'Not given' ),
		)
	);
	a1cdl_form_done( $sent ? 'sent' : 'error', 'contact' );
}
add_action( 'admin_post_a1cdl_contact', 'a1cdl_handle_contact' );
add_action( 'admin_post_nopriv_a1cdl_contact', 'a1cdl_handle_contact' );

function a1cdl_handle_schedule() {
	$fields = a1cdl_read_form( 'a1cdl_schedule', 'schedule' );

	// Every dropdown must be one of the choices on the page. Generated from the form by tools/build_wp_theme.py.
	$options = include get_theme_file_path( 'inc/schedule-options.php' );
	$choices = array();
	foreach ( $options as $key => $allowed ) {
		$choices[ $key ] = a1cdl_form_value( $key );
		if ( ! isset( $allowed[ $choices[ $key ] ] ) ) {
			a1cdl_form_done( 'error', 'schedule' );
		}
	}
	$service = $choices['service'];
	$time    = $choices['preferred_time'];

	// The total always comes from these prices, never from the browser
	$rental = 'CDL test only' !== $service ? $options['cdl_class'][ $choices['cdl_class'] ] : 0;
	$total  = $options['test'][ $choices['test'] ] + $options['practice'][ $choices['practice'] ] + $rental;

	// Same rule as main.js: a real date that hasn't passed. One day of leeway for visitors in other time zones.
	$raw_date = a1cdl_form_value( 'preferred_date' );
	$date     = DateTime::createFromFormat( '!Y-m-d', $raw_date );
	if ( ! $date || $date->format( 'Y-m-d' ) !== $raw_date || $raw_date < wp_date( 'Y-m-d', time() - DAY_IN_SECONDS ) ) {
		a1cdl_form_done( 'error', 'schedule' );
	}

	$details = array(
		'Service' => $service,
		'Class'   => $choices['cdl_class'],
		'Test'    => $choices['test'],
	);
	if ( $rental > 0 ) {
		$details['Truck rental'] = '$' . number_format( $rental );
	}
	if ( $options['practice'][ $choices['practice'] ] > 0 ) {
		$details['Practice'] = $choices['practice'];
	}
	$details['Estimated total'] = '$' . number_format( $total );
	$details['Preferred day']  = $date->format( 'l, F j, Y' );
	$details['Preferred time'] = $time;

	$sent = a1cdl_send_form_email(
		apply_filters( 'a1cdl_contact_recipient', get_option( 'admin_email' ) ),
		sprintf( 'Appointment Request from %s', $fields['name'] ),
		$fields,
		array(
			'heading'   => 'Appointment Request',
			'source'    => 'CDL Testing schedule form',
			'preheader' => sprintf( '%s requested %s, %s. Call %s.', $fields['name'], $details['Preferred day'], $time, $fields['phone'] ),
			'details'   => $details,
		)
	);
	a1cdl_form_done( $sent ? 'sent' : 'error', 'schedule' );
}
add_action( 'admin_post_a1cdl_schedule', 'a1cdl_handle_schedule' );
add_action( 'admin_post_nopriv_a1cdl_schedule', 'a1cdl_handle_schedule' );

/* ---------- First-time setup ---------- */

/**
 * On activation, create any missing pages and use the Home page as the front page.
 */
add_action(
	'after_switch_theme',
	function () {
		$pages            = a1cdl_pages();
		$pages['__home'] = array( 'home', 'Home' );

		foreach ( $pages as $key => $page ) {
			$existing = get_page_by_path( $page[0] );
			if ( $existing ) {
				if ( 'publish' !== $existing->post_status ) {
					wp_update_post(
						array(
							'ID'          => $existing->ID,
							'post_status' => 'publish',
						)
					);
				}
				$id = $existing->ID;
			} else {
				$id = wp_insert_post(
					array(
						'post_type'   => 'page',
						'post_status' => 'publish',
						'post_name'   => $page[0],
						'post_title'  => $page[1],
					)
				);
			}
			if ( '__home' === $key && $id && ! is_wp_error( $id ) ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $id );
			}
		}
	}
);
