<?php
/*
Plugin Name: Publish Confirm
Description: Zusatzabfrage in WordPress beim Klick auf den Button "Veröffentlichen"
Author: Sergej M&uuml;ller
Author URI: http://wpcoder.de
Plugin URI: https://github.com/sergejmueller/Publish-Confirm
License: GPLv2 or later
Version: 0.0.1
*/

/*
Copyright (C)  2014-2014 Sergej Müller

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/


/* Quit */
defined('ABSPATH') OR exit;


/* Action! */
add_action(
    'admin_footer-post-new.php',
    'publish_confirm_embed'
);


/* Embed plugin js */
function publish_confirm_embed() {
    if ( ! wp_script_is('jquery', 'done') ) {
        return;
    } ?>

    <script>
        jQuery(document).ready(
            function($){
                $('#publish').on(
                    'click',
                    function(event) {
                        if ( ! confirm('Wirklich veröffentlichen?') ) {
                            event.preventDefault();
                        }
                    }
                );
            }
        );
    </script>
<?php }