<?php

	/**
	 * Returns location to asset inside of theme folder
	 *
	 * @param string $path Path to asset
	 *
	 * @return string Full URL to the asset in the theme directory
	 */

	/**
	 * Link to asset
	 *
	 * @param $path
	 * @return string
	 */
	function asset($path) {
		if($path{0} !== '/') {
			$path = "/$path";
		}

		$path = preg_replace('/ /', '%20', $path);

		return get_bloginfo('template_directory') . "/assets$path";
	}

	/**
	 * Link to image
	 *
	 * @param $path
	 * @return string
	 */
	function image($path) {
		if($path{0} !== '/') {
			$path = "/$path";
		}

		return asset("images$path");
	}

	/**
	 * Link to svg
	 *
	 * @param $path
	 * @return string
	 */
	function svg($path) {
		if($path{0} !== '/') {
			$path = "/$path";
		}

		return asset("svg$path");
	}

	/**
	 * Perl regular expression replace all matches
	 *
	 * @param $find
	 * @param $replacement
	 * @param $s
	 *
	 * @return mixed
	 */
	function preg_replace_all($find, $replacement, $s) {
		while(preg_match($find, $s)) {
			$s = preg_replace($find, $replacement, $s);
		}

		return $s;
	}

	/**
	 * Return the specified post's thumbnail src
	 *
	 * @param int    $post_id
	 * @param string $size
	 *
	 * @return array|bool
	 */
	function get_post_thumbnail_src($post_id, $size = 'full') {
		$data = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);

		if(isset($data) && is_array($data)) {
			return $data[0];
			//return (Object)[
			//	'src'    => $data[0],
			//	'width'  => $data[1],
			//	'height' => $data[2],
			//];
		}
		else {
			return NULL;
		}
	}

	/**
	 * Find an attached image via URL
	 *
	 * @param string $url
	 * @param string $size
	 *
	 * @return string
	 */
	function wp_get_attached_image_by_url($url, $size = 'full') {
		global $wpdb;

		$file_path = str_replace(get_bloginfo('url') . '/wp-content/uploads/', '', $url);
		$attached  = $wpdb->get_row("SELECT meta_value FROM `wp_postmeta` WHERE meta_value LIKE '%$file_path%' AND meta_key='_wp_attachment_metadata'");
		$attached  = maybe_unserialize($attached->meta_value);
		if($size == 'full') {
			$thumb = $attached['file'];
		}
		else {
			$thumb = $attached['sizes'][$size]['file'];
		}

		$filename = preg_replace('/[0-9]{4}\/[0-9]{2}\//', '$1', $file_path);
		$path     = str_replace($filename, '', $url);

		if($path && $thumb) {
			return $path . $thumb;
		}
		else {
			return $url;
		}
	}

	/**
	 * Does precisely what it says.
	 * Strips the -320x140.ext out of the image url
	 *
	 * @param $url
	 *
	 * @return string
	 */
	function wp_strip_upload_dimensions($url) {
		$r = '';

		if($url) {
			// Strip absolute path
			$file_name = preg_replace('/^(.*?)\/wp-content\/uploads\//', '', $url);
			// Strip resolution
			$file_name = preg_replace('/-([0-9]+?)x([0-9]+?)\./', '.', $file_name);

			$r = site_url("wp-content/uploads/$file_name");
		}

		return $r;
	}

	/**
	 * Return the current URL
	 *
	 * @param string $append
	 *
	 * @return string
	 */
	function current_url($append = '') {
		return 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] . $append;
	}

	/**
	 * Limit paragraph based on character count, break at last word
	 *
	 * @param        $str
	 * @param int    $n
	 * @param string $end_char
	 *
	 * @return mixed|string
	 */
	function character_limiter($str, $n = 500, $end_char = '&#8230;') {
		if(strlen($str) < $n) {
			return $str;
		}

		$str = preg_replace("/\s+/", ' ', str_replace(["\r\n", "\r", "\n"], ' ', $str));

		if(strlen($str) <= $n) {
			return $str;
		}

		$out = "";
		foreach(explode(' ', trim($str)) as $val) {
			$out .= $val . ' ';

			if(strlen($out) >= $n) {
				$out = trim($out);

				return (strlen($out) == strlen($str)) ? $out : $out . $end_char;
			}
		}
	}

	/**
	 * Zipper two arrays together (even odds mix)
	 *
	 * @param $arrayFirst
	 * @param $arraySecond
	 * @return array
	 *
	 */
	function array_zipper($arrayFirst, $arraySecond) {
		if(!is_array($arrayFirst) || empty($arrayFirst)) {
			return $arraySecond;
		}
		else if(!is_array($arraySecond) || empty($arraySecond)) {
			return $arrayFirst;
		}
		else {
			for($i = 0; $i < count($arraySecond); $i++) {
				array_splice($arrayFirst, ($i * 2) + 1, 0, $arraySecond[$i]);
			}

			return $arrayFirst;
		}
	}

	/**
	 * Convert array to string of html attributes
	 *
	 * @param array|object $attr
	 * @return string
	 */
	function htmlattr($attr = []) {
		if(is_array($attr)) {
			return implode(' ', array_map(function ($key, $val) {
				return $key . '="' . htmlspecialchars($val) . '"';
			}, array_keys($attr), $attr));
		}
		else if(is_object($attr)) {
			$r = [];

			foreach($attr as $key => $val) {
				$r[] = $key . '="' . htmlspecialchars($val) . '"';
			}

			return implode(' ', $r);
		}
	}

	/**
	 * Convert a string to a slug
	 *
	 * @param        $title
	 * @param string $separator
	 * @return string
	 */
	function str_slug($title, $separator = '-') {
		// Convert all dashes/underscores into separator
		$flip = $separator == '-' ? '_' : '-';

		$title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

		// Remove all characters that are not the separator, letters, numbers, or whitespace.
		$title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title));

		// Replace all separator characters and whitespace by a single separator
		$title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

		return trim($title, $separator);
	}

	/**
	 * Echo out, if an conditional proves true
	 *
	 * @param        $condition
	 * @param        $echo
	 * @param string $else
	 */
	function echo_if($condition, $echo, $else = NULL) {
		if($condition) {
			echo $echo;
		}
		else if($else) {
			echo $else;
		}
	}

	/**
	 * Dump and die
	 *
	 * @param $var
	 */
	function dd($var) {
		var_dump($var);
		die();
	}

	/**
	 * Bootstrap pagination
	 *
	 * @param array $args
	 * @return bool
	 */
	function bootstrap_pagination($pages = '', $range = 2) {
		$showitems = ($range * 2) + 1;

		global $paged;
		if(empty($paged)) {
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}

		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}

		if(1 != $pages) {
			echo "
        <nav style='text-align: center;'>
           <ul class='pagination'>
             <li>";
			//              <a href=\"#\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>
			previous_posts_link('&laquo;');
			echo "</li>";
			if($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
				echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
			}
			if($paged > 1 && $showitems < $pages) {
				echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
			}

			for($i = 1; $i <= $pages; $i++) {
				if(1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					echo ($paged == $i) ? "<li class='active'><span class='current'>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
				}
			}

			if($paged < $pages && $showitems < $pages) {
				echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
			}
			if($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
				echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
			}
			echo "<li>";
			next_posts_link('&raquo;');
			echo "</li>
  </ul>
</nav>";
		}
	}

	/**
	 * Get a post's content by its ID
	 *
	 * @param $id
	 * @return mixed|string|void
	 */
	function get_content_by_id($id) {
		$content_post = get_post($id);
		$content      = $content_post->post_content;
		$content      = apply_filters('the_content', $content);
		$content      = str_replace(']]>', ']]&gt;', $content);

		return $content;
	}

	/**
	 * Convert all emails to links
	 *
	 * @param $text
	 * @return mixed
	 */
	function emailize($text) {
		$regex   = '/(\S+@\S+\.\S+)/';
		$replace = '<a href="mailto:$1">$1</a>';

		return preg_replace($regex, $replace, $text);
	}

  /**
   * Allow for SVG upload
   *
   */
  function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');
