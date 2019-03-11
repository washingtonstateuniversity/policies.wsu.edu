<?php
/*
 * Set up the content type of policies
 */
include( __DIR__ . '/includes/wsu-content-type-policy.php' );

class WSU_PRF_Theme {
	/**
	 * Setup the hooks used in the theme.
	 */
	public function __construct() {

		add_filter( 'wp_check_filetype_and_ext', array( $this, 'allow_filemaker_extensions' ), 10, 4 );
	}

	public function allow_filemaker_extensions( $types, $file, $filename, $mimes ) {

		// Recognized filemaker extensions
		$extensions = array( '.fp7', '.fp5', '.fmp12' );

		// Loop through all the extensions
		foreach ( $extensions as $extension ) {

			// Check if extension is used
			if ( false !== strpos( $filename, $extension ) ) {

				// remove . from extension string
				$ext = str_replace( '.', '', $extension );

				$types['ext'] = $ext;

				$types['type'] = 'application/x-filemaker';

			} // End if

		} // End foreach
		
		return $types;

	}
	
}
new WSU_PRF_Theme();