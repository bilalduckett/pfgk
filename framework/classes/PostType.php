<?php

	/**
	 * Class PostType
	 */
	abstract class PostType {

		protected $postType = '';
		protected $postMetaPrefix = NULL;
		protected $postMetaOptions = [];
		protected $plugin_basename = '';

		/**
		 * PostType constructor.
		 */
		public function __construct() {
			add_action('init', [$this, 'registerPostType']);
			add_action('init', [$this, 'registerTaxonomies']);

			add_action('admin_init', [$this, 'adminInit']);
			add_action('admin_head', [$this, 'adminHead']);
			add_action('admin_menu', [$this, 'adminMenu'], 999);
			add_action('admin_print_scripts', [$this, 'adminScripts']);
			add_action('admin_print_styles', [$this, 'adminStyles']);

			add_action('save_post', [$this, 'savePostMetaData']);
		}

		/**
		 * Register the post type
		 */
		public function registerPostType() {
		}

		/**
		 * Register the taxonomies
		 */
		public function registerTaxonomies() {
		}

		/**
		 * Admin init hook
		 */
		public function adminInit() {
		}

		/**
		 * Admin head hook
		 */
		public function adminHead() {
		}

		/**
		 * Admin menu hook
		 */
		public function adminMenu() {
		}

		/**
		 * Enqueue/dequeue scripts for the admin views
		 */
		public function adminScripts() {
		}

		/**
		 * Enqueue/dequeue styles for the admin views
		 */
		public function adminStyles() {
		}

		/**
		 * Save the custom post type's meta data
		 *
		 * @return int The post's ID
		 */
		public function savePostMetaData($post_id) {
			global $post;

			if(isset($_POST['post_type']) && ($_POST['post_type'] == get_post_type($post_id))) {

				foreach($_POST as $k => $v) {

					update_post_meta($post_id, $k, $v);
				}
			}
		}

	}
