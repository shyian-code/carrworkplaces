<?php /* Template Name: Redirect */ 

$redirect = get_field('redirect'); 

wp_redirect($redirect);
exit; ?>