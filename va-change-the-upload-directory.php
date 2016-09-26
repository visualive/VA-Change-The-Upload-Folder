<?php
/**
 * Plugin Name: VA Change The Update Directory
 * Plugin URI: https://www.visualive.jp/
 * Description: .
 * Author: KUCKLU
 * Version: 1.0.0
 * Author URI: https://www.visualive.jp/
 * Text Domain: va-change-the-upload-directory
 * Domain Path: /langs
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package    WordPress
 * @subpackage VA Change The Update Directory
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

add_filter( 'upload_dir', function ( $path ) {
	/**
	 * Honor the value of UPLOADS. This happens as long as ms-files rewriting is disabled.
	 * We also sometimes obey UPLOADS when rewriting is enabled -- see the next block.
	 */
	if ( defined( 'UPLOADS' ) && ! ( is_multisite() && get_site_option( 'ms_files_rewriting' ) ) ) {
		$upload_path     = get_option( 'upload_path', '' );
		$upload_url_path = get_option( 'upload_url_path', '' );

		if ( '' === $upload_path && '' === $upload_url_path ) {
			$upload_path     = trailingslashit( untrailingslashit( WP_CONTENT_DIR ) ) . untrailingslashit( UPLOADS );
			$upload_url_path = trailingslashit( untrailingslashit( WP_CONTENT_URL ) ) . untrailingslashit( UPLOADS );
			$path['basedir'] = $upload_path;
			$path['baseurl'] = $upload_url_path;

			if ( get_option( 'uploads_use_yearmonth_folders' ) ) {
				$path['path'] = $upload_path . $path['subdir'];
				$path['url']  = $upload_url_path . $path['subdir'];
			}

			update_option( 'upload_path', $upload_path );
			update_option( 'upload_url_path', $upload_url_path );
		}
	}

	return $path;
} );
