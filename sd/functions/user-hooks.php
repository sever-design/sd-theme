<?php
/**
 * Extend the user contact methods to include Twitter, Facebook etc
 * In user Profile in backend (publica available)
 */
function as_additional_contactmethods( $contactmethods ) {
	// Add Twitter
	$contactmethods['twitter'] = 'Twitter';

	// Add LinkedIn
	$contactmethods['twitter'] = 'LinkedIn';

	//add Facebook
	$contactmethods['facebook'] = 'Facebook';

	//add Whatsapp
	$contactmethods['whatsapp'] = 'WhatsApp';

	//add Skype
	$contactmethods['skype'] = 'Skype';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'as_additional_contactmethods', 10, 1 );
