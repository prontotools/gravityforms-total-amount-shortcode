<?php
require_once WP_PLUGIN_DIR . '/gf-total-amount-shortcode/gravityforms-total-amount-shortcode.php';

// class GFAPI {
//     public $entries;
// }

class GFAPI {
    static function get_entries( $form_id, $search_criteria ) {
        $entries = array(
            array(
                'form_id'    => '13',
                18           => '121',
                'date_created' => '2017-07-18'
            ),
            array(
                'form_id' => '10',
                18        => '100',
                'date_created' => '2017-07-19'
            ),
            array(
                'form_id' => '13',
                18        => '5',
                'date_created' => '2017-07-20'
            ),
            array(
                'form_id' => '13',
                1         => '5',
                'date_created' => '2017-07-21'
            ),
        );

        // $start_date = date( 'Y-m-d', strtotime( $search_criteria['start_date'] ) );
        // $end_date = date( 'Y-m-d', strtotime( $search_criteria['end_date'] ) );
        // var_dump($start_date);
        // var_dump($end_date);

        // $search_criteria = array(
        //     'start_date' => '2017-07-18',
        //     'end_date'   => '2017-07-18'
        // );

        $results = array();
        $results_with_date = array();
        $results_without_date = array();
        
        foreach ( $entries as $entry ) {
            if ( $entry['form_id'] == $form_id ) {
                if ( ( $search_criteria['start_date'] <= $entry['date_created'] ) and ( $entry['date_created'] <= $search_criteria['end_date'] ) )  {
                    array_push( $results, $entry );
                }
                // else {
                //     array_push( $results, $entry );
                // }
            }
            
        }
        return $results;
    }
}

class GravityFormsTotalAmountShortcodeTest extends WP_UnitTestCase {
    function setUp() {
        parent::setUp();
    }

    function tearDown() {
        parent::tearDown();
    }

    function test_gravityform_total_amount_shortcode_is_registered_to_shortcode_handler() {
        global $shortcode_tags;

        $this->assertTrue( array_key_exists(
            'gravityform-total-amount',
            $shortcode_tags
        ) );
        $expected = 'gravityforms_total_amount_shortcode';
        $this->assertEquals( $expected, $shortcode_tags['gravityform-total-amount'] );
    }

    function test_add_shortcode_with_form_id_and_field_id_should_return_correct_data() {
        $expected = '126';
        $actual = do_shortcode('[gravityform-total-amount form_id="13" field_id="18"]');
        $this->assertEquals( $expected, $actual );
    }

    function test_add_shortcode_with_form_id_and_field_id_and_search_criteria_should_return_correct_data() {
        $expected = '121';
        $actual = do_shortcode('[gravityform-total-amount form_id="13" field_id="18" start_date="2017-07-18" end_date="2017-07-19"]');
        $this->assertEquals( $expected, $actual );
    }

    function test_add_shortcode_with_form_id_and_field_id_and_only_start_date_should_return_correct_data() {
        $expected = '126';
        $actual = do_shortcode('[gravityform-total-amount form_id="13" field_id="18" start_date="2017-07-18"]');
        $this->assertEquals( $expected, $actual );
    }
}
