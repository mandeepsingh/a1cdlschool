<?php
/**
 * HTML email for a contact or schedule form request, in the site's colors.
 * Email apps ignore most CSS, so this uses tables and inline styles.
 *
 * Source: tools/wp/email-contact.php (copied into the theme's inc/ by tools/build_wp_theme.py).
 * Included by a1cdl_contact_email_html() with $name, $phone, $email, $message, $heading, $source,
 * $preheader and $details (label => plain text) set.
 *
 * @package A1CDLSchool
 */

$font = "font-family:Inter,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;";
$tel  = preg_replace( '/[^\d+]/', '', $phone );
$rows = array(
	'Name'    => esc_html( $name ),
	'Phone'   => '<a href="tel:' . esc_attr( $tel ) . '" style="color:#e31b23;text-decoration:none;">' . esc_html( $phone ) . '</a>',
	'Email'   => '<a href="mailto:' . esc_attr( $email ) . '" style="color:#e31b23;text-decoration:none;">' . esc_html( $email ) . '</a>',
);
foreach ( $details as $label => $value ) {
	$rows[ $label ] = esc_html( $value );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="color-scheme" content="light only" />
<title><?php echo esc_html( $heading ); ?></title>
</head>
<body style="margin:0;padding:0;background:#f5f6f8;">
<div style="display:none;max-height:0;overflow:hidden;opacity:0;"><?php echo esc_html( $preheader ); ?></div>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f5f6f8;">
<tr><td align="center" style="padding:32px 16px;">
	<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;background:#ffffff;border-radius:16px;overflow:hidden;border:1px solid #e5e7eb;">

		<tr><td style="background:#111318;padding:24px 32px;">
			<img src="<?php echo esc_url( a1cdl_asset( 'logo-white.png' ) ); ?>" width="140" height="70" alt="A1 CDL School" style="display:block;border:0;width:140px;height:auto;" />
		</td></tr>
		<tr><td style="background:#e31b23;height:4px;line-height:4px;font-size:0;">&nbsp;</td></tr>

		<tr><td style="padding:32px 32px 8px;<?php echo $font; ?>">
			<p style="margin:0 0 8px;font-size:13px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;color:#e31b23;"><?php echo esc_html( $heading ); ?></p>
			<h1 style="margin:0;font-size:26px;line-height:1.25;font-weight:800;color:#111318;"><?php echo esc_html( $name ); ?></h1>
			<p style="margin:8px 0 0;font-size:15px;line-height:1.5;color:#4a5160;">Sent from the <?php echo esc_html( $source ); ?> on <?php echo esc_html( wp_parse_url( home_url(), PHP_URL_HOST ) ); ?>.</p>
		</td></tr>

		<tr><td style="padding:24px 32px 8px;">
			<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f5f6f8;border-radius:10px;<?php echo $font; ?>">
				<?php foreach ( $rows as $label => $value ) : ?>
				<tr>
					<td width="110" valign="top" style="padding:14px 0 14px 20px;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#6b7280;border-bottom:1px solid #e5e7eb;"><?php echo esc_html( $label ); ?></td>
					<td valign="top" style="padding:14px 20px 14px 8px;font-size:16px;font-weight:600;color:#111318;border-bottom:1px solid #e5e7eb;"><?php echo $value; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped when $rows is built ?></td>
				</tr>
				<?php endforeach; ?>
				<tr>
					<td width="110" valign="top" style="padding:14px 0 16px 20px;font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#6b7280;">Message</td>
					<td valign="top" style="padding:14px 20px 16px 8px;font-size:16px;line-height:1.55;color:#111318;"><?php echo '' !== $message ? nl2br( esc_html( $message ) ) : '<span style="color:#6b7280;">No message</span>'; ?></td>
				</tr>
			</table>
		</td></tr>

		<tr><td style="padding:24px 32px 32px;<?php echo $font; ?>">
			<table role="presentation" cellpadding="0" cellspacing="0"><tr>
				<td style="border-radius:8px;background:#e31b23;">
					<a href="tel:<?php echo esc_attr( $tel ); ?>" style="display:inline-block;padding:13px 24px;font-size:15px;font-weight:700;color:#ffffff;text-decoration:none;">Call <?php echo esc_html( strtok( $name, ' ' ) ); ?></a>
				</td>
			</tr></table>
			<?php // No "Reply by email" button: a mailto: link always starts a new email. The Reply-To header makes the email app's own Reply answer the visitor in the same thread. ?>
			<p style="margin:16px 0 0;font-size:14px;line-height:1.5;color:#4a5160;">To answer by email, just hit Reply. It goes straight to <?php echo esc_html( strtok( $name, ' ' ) ); ?>.</p>
		</td></tr>

		<tr><td style="background:#111318;padding:20px 32px;<?php echo $font; ?>font-size:13px;line-height:1.6;color:#aab0bc;">
			<strong style="color:#ffffff;">A1 CDL School</strong> &middot; 2700 W National Rd, Dayton, OH 45414 &middot; (937) 618-5304
		</td></tr>

	</table>
</td></tr>
</table>
</body>
</html>
