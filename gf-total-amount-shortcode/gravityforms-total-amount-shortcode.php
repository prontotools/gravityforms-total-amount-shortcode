<?php
/*
 * Plugin Name: Gravity Forms Total Amount Shortcode
 * Plugin URI: http://www.prontotools.io
 * Description: A simple shortcode that displays the “Total” filed value from any Gravity Form.
 * Version: 1.0.0
 * Author: Pronto Tools
 * Author URI: http://www.prontotools.io
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

function gravityforms_total_amount_shortcode( $atts ) {
    $defaults = array(
        'form_id'    => '',
        'start_date' => '',
        'end_date'   => '',
        'field_id'   => ''
    );

    $atts = shortcode_atts( $defaults, $atts );

    $start_date = null;
    $end_date   = null;
    $entries    = '';
    $total      = 0;


    if ( $atts['start_date'] ) {
        $start_date = date( 'Y-m-d', strtotime( $atts['start_date'] ) );
    }

    if ( $atts['end_date'] ) {
        $end_date = date( 'Y-m-d', strtotime( $atts['end_date'] ) );
    }

    $search_criteria = array();
    if ( $atts['form_id'] ) {
        if ( $start_date or $end_date ) {
            $search_criteria['start_date'] = $start_date;
            $search_criteria['end_date']   = $end_date;
        }
        $entries = GFAPI::get_entries( $atts['form_id'], $search_criteria );

        if ( $atts['field_id'] ) {
            foreach ( $entries as $entry ) {
                $total_field = $entry[ $atts['field_id'] ];
                $total += $total_field;
            }
        }
    }
    return $total;
}

add_shortcode( 'gravityform-total-amount', 'gravityforms_total_amount_shortcode' );
