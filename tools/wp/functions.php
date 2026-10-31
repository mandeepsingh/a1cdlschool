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
 * Link for markup: home page sections become plain #anchors on the home page itself,
 * so the nav scroll highlighting in main.js keeps working.
 */
function a1cdl_link( $key, $fragment = '' ) {
	if ( 'index' === $key && $fragment && is_front_page() ) {
		return '#' . $fragment;
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

/* ---------- Contact form ---------- */

function a1cdl_contact_form_fields() {
	echo '<input type="hidden" name="action" value="a1cdl_contact" />';
	// Page to return to after sending (0 = home page)
	printf( '<input type="hidden" name="a1cdl_back" value="%d" />', is_front_page() ? 0 : (int) get_queried_object_id() );
	wp_nonce_field( 'a1cdl_contact', 'a1cdl_nonce', false );
	// Honeypot: hidden from people, bots tend to fill it in
	echo '<div style="position:absolute;left:-9999px" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off" /></label></div>';
}

function a1cdl_contact_status() {
	return isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
}

function a1cdl_contact_form_success_attr() {
	echo 'sent' === a1cdl_contact_status() ? '' : ' hidden';
}

function a1cdl_contact_form_error() {
	if ( 'error' === a1cdl_contact_status() ) {
		echo '<p class="form-error" role="alert">Sorry, your request could not be sent. Please call us at (937) 618-5304.</p>';
	}
}

function a1cdl_handle_contact() {
	$back_id = isset( $_POST['a1cdl_back'] ) ? absint( $_POST['a1cdl_back'] ) : 0;
	$back    = $back_id && get_permalink( $back_id ) ? get_permalink( $back_id ) : home_url( '/' );
	$done = function ( $status ) use ( $back ) {
		wp_safe_redirect( add_query_arg( 'contact', $status, $back ) . '#contact' );
		exit;
	};

	if ( ! empty( $_POST['website'] ) ) {
		$done( 'sent' ); // bot: pretend it worked
	}
	if ( ! isset( $_POST['a1cdl_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['a1cdl_nonce'] ) ), 'a1cdl_contact' ) ) {
		$done( 'error' );
	}

	$name    = sanitize_text_field( wp_unslash( isset( $_POST['name'] ) ? $_POST['name'] : '' ) );
	$phone   = sanitize_text_field( wp_unslash( isset( $_POST['phone'] ) ? $_POST['phone'] : '' ) );
	$email   = sanitize_email( wp_unslash( isset( $_POST['email'] ) ? $_POST['email'] : '' ) );
	$program = sanitize_text_field( wp_unslash( isset( $_POST['program'] ) ? $_POST['program'] : '' ) );
	$message = sanitize_textarea_field( wp_unslash( isset( $_POST['message'] ) ? $_POST['message'] : '' ) );

	// Same rules as the browser-side validation in main.js
	if ( strlen( $name ) < 2 || strlen( preg_replace( '/\D/', '', $phone ) ) < 10 || ! is_email( $email ) ) {
		$done( 'error' );
	}

	$to      = apply_filters( 'a1cdl_contact_recipient', get_option( 'admin_email' ) );
	$subject = sprintf( 'New information request from %s', $name );
	$body    = "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nProgram: {$program}\n\nMessage:\n{$message}\n";
	$headers = array( sprintf( 'Reply-To: %s <%s>', $name, $email ) );

	$done( wp_mail( $to, $subject, $body, $headers ) ? 'sent' : 'error' );
}
add_action( 'admin_post_a1cdl_contact', 'a1cdl_handle_contact' );
add_action( 'admin_post_nopriv_a1cdl_contact', 'a1cdl_handle_contact' );

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
