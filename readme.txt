=== Gravity Forms Total Amount Shortcode ===
Contributors: prontotools, sandsine
Tags: gravityforms, total, amount, count, shortcode, form, field 
Requires at least: 4.0
Tested up to: 4.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple shortcode that displays the “Total” filed value from any Gravity Form.

== Description ==

Introduce a shortcode that generates a total field value.

**Parameters**
* `form_id`
* `field_id`
* `start_date`
* `end_date`

**Examples:**
* `[gravityform-total-amount]`
* `[gravityform-total-amount form_id="14"]`
* `[gravityform-total-amount form_id="14" field_id="18"]`
* `[gravityform-total-amount form_id="14" field_id="18" stat_date="2017-07-18"]`
* `[gravityform-total-amount form_id="14" field_id="18" stat_date="2017-07-18" end_date="2017-07-20"]`


== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the Wordpress plugin screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Include the shortcode anywhere on your website: `[gravityform-total-amount form_id="14" field_id="18" stat_date="2017-07-18" end_date="2017-07-20"]` 


== Changelog ==

= 1.0.0 =
* First release!
