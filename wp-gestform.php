<?php

/*
Plugin Name: WP GestForm
Description: This plugin retrieve data from a GestForm backend & displays it in WordPress. Data is retrieve using public API endpoints of the gestForm backend.
Version: 1.0
Author: Antoine ALEXANDRE
Author URI: https://www.antoinealexandre.eu
License: LGPLv3
*/

include_once("GestformConnector.php");

function gestformTrainings() {
	$connection = new GestformConnector("https://gestform.ei-bs.eu");
	return $connection->showTrainings();
}
add_shortcode( 'gestform_trainings', 'gestformTrainings' );