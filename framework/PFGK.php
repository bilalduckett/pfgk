<?php

	if(!class_exists('Timber')) {
		add_action('admin_notices', function () {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
		});

		return;
	}

	Timber::$dirname = ['assets/templates', 'assets/templates/modules', 'assets/svg'];

	class PFGK extends TimberSite {

		private static $headerType = 'light';

		/**
		 * Trinity constructor.
		 */
		function __construct() {
			add_theme_support('post-formats');
			add_theme_support('post-thumbnails');
			add_theme_support('menus');
			add_filter('timber_context', [$this, 'addToContext']);
			add_filter('get_twig', [$this, 'addToTwig']);
			add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
			add_action('wp_print_styles', [$this, 'enqueueStyles']);
			add_action('init', [$this, 'registerSidebars']);
      add_action( 'after_setup_theme', 'woocommerce_support' );
      function woocommerce_support() {
        add_theme_support( 'woocommerce' );
      }
      remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
			//add_action( 'admin_init', [$this, 'hideEditor'] );

//			require_once(__DIR__ . '/widgets/FooterSocialWidget.php');
//			require_once(__DIR__ . '/acf/acf-export.php');

			require_once(__DIR__ . '/classes/PostType.php');
//			require_once(__DIR__ . '/classes/Carousel.php');
//			require_once(__DIR__ . '/classes/Property.php');
//			require_once(__DIR__ . '/classes/Team.php');

			require_once(__DIR__ . '/helpers/Twig_Extension_Asset.php');

			parent::__construct();
		}

		/**
		 * Register taxonomies
		 */
		function registerTaxonomies() {
		}

		/**
		 * Register the sidebars with WP
		 */
		public function registerSidebars() {
			register_sidebar([
				'name'        => __('Footer Navigation', 'footer-widget-nav'),
				'id'          => 'footer-widget-nav',
				'description' => 'Footer at the bottom of every page',
			]);

			register_sidebar([
				'name'        => __('Footer Social', 'footer-widget-social'),
				'id'          => 'footer-widget-social',
				'description' => 'Footer at the bottom of every page',
			]);

			register_sidebar([
				'name'        => __('Footer Locations', 'footer-widget-locations'),
				'id'          => 'footer-widget-locations',
				'description' => 'Footer at the bottom of every page',
			]);
		}

		/**
		 * @param $context
		 * @return mixed
		 */
		function addToContext($context) {
			$context['menu']            = new TimberMenu('header-menu');
			$context['footerLocations'] = Timber::get_widgets('footer-widget-locations');
			$context['footerNav']       = Timber::get_widgets('footer-widget-nav');
			$context['footerSocial']    = Timber::get_widgets('footer-widget-social');
			$context['headerType']      = self::getHeaderType();

			$context['site'] = $this;

			return $context;
		}

		/**
		 * @param $twig
		 * @return mixed
		 */
		function addToTwig($twig) {
			$twig->addExtension(new Twig_Extension_StringLoader());
			$twig->addExtension(new Twig_Extension_Asset());

			return $twig;
		}

		/**
		 * Link to asset
		 *
		 * @param  string $url
		 *
		 * @return string
		 */
		public static function asset($url) {
			if($url{0} !== '/') {
				$url = "/$url";
			}

			return get_bloginfo('template_directory') . '/assets' . $url;
		}

		/**
		 * Enqueue js scripts for the site
		 *
		 * @return void
		 */
		public function enqueueScripts() {
			wp_enqueue_script('jquery');
//			wp_enqueue_script('owl', self::asset("node_modules/owl.carousel/dist/owl.carousel.min.js"), ['jquery'], '1.0.0', ' all');
//      wp_enqueue_script('headroom', self::asset("node_modules/headroom.js/dist/headroom.min.js"), ['jquery'], '1.0.0', ' all');
//      wp_enqueue_script('prettyPhoto', self::asset("js/vendor/jquery.prettyPhoto.js"), ['jquery'], '1.0.0', ' all');
//			wp_enqueue_script('navigo', self::asset("node_modules/navigo/lib/navigo.min.js"), ['jquery'], '1.0.0', ' all')\;
			wp_enqueue_script('app', self::asset("js/app.min.js"), ['jquery'], '1.0.0', ' all');
		}

		/**
		 * Enqueue css styles for the site
		 *
		 * @return void
		 */
		public function enqueueStyles() {
			wp_enqueue_style('app', self::asset("css/app.css"), NULL, '1.0.0', 'all');
		}

		/**
		 * Set the header to dark
		 *
		 * @return string
		 */
		public static function useDarkHeader() {
			return self::$headerType = 'dark';
		}

		/**
		 * Set the header to light
		 *
		 * @return string
		 */
		public static function useLightHeader() {
			return self::$headerType = 'light';
		}

		/**
		 * @return string
		 */
		public static function getHeaderType() {
			return self::$headerType;
		}

	}

	new PFGK();
