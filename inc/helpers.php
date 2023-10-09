<?php
/**
 * Output background image style
 *
 * @param array|string $img Image array or url
 * @param string $size Image size to retrieve
 * @param bool $echo Whether to output the the style tag or return it.
 *
 * @return string|void String when retrieving.
 */
function bg( $img = '', $size = '', $echo = true ) {

    if ( empty( $img ) ) {
        return false;
    }

    if ( is_array( $img ) ) {
        $url = $size ? $img['sizes'][$size] : $img['url'];
    } else {
        $url = $img;
    }

    $string = 'style="background-image: url(' . $url . ')"';

    if ( $echo ) {
        echo $string;
    } else {
        return $string;
    }
}

/**
 * Format phone number, trim all unnecessary characters
 *
 * @param string $string Phone number
 *
 * @return string Formatted phone number
 */
function sanitize_number( $string ) {
    return preg_replace( '/[^+\d]+/', '', $string );
}
