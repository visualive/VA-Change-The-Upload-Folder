<?php
/**
 * Plugin Name: VA Change The Update folder
 * Plugin URI: https://www.visualive.jp/
 * Description: .
 * Author: KUCKLU
 * Version: 1.0.0
 * Author URI: https://www.visualive.jp/
 * Text Domain: va-store-functions
 * Domain Path: /langs
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package    WordPress
 * @subpackage VA Store Functions
 * @author     KUCKLU <kuck1u@visualive.jp>
 *             Copyright (C) 2016 KUCKLU & VisuAlive.
 *             This program is free software; you can redistribute it and/or modify
 *             it under the terms of the GNU General Public License as published by
 *             the Free Software Foundation; either version 2 of the License, or
 *             (at your option) any later version.
 *             This program is distributed in the hope that it will be useful,
 *             but WITHOUT ANY WARRANTY; without even the implied warranty of
 *             MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU General Public License for more details.
 *             You should have received a copy of the GNU General Public License along
 *             with this program; if not, write to the Free Software Foundation, Inc.,
 *             51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *             It is also available through the world-wide-web at this URL:
 *             http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( defined( 'UPLOADS' ) && ! ( is_multisite() && get_site_option( 'ms_files_rewriting' ) ) ) {
    add_filter( 'upload_dir', function ( $paths ) {
        $paths['path'] = $paths['basedir'] = WP_CONTENT_DIR . '/' . UPLOADS;
        $paths['url']  = $paths['baseurl'] = WP_CONTENT_URL . '/' . UPLOADS;

        return $paths;
    } );
}
