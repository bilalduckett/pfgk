<?php
  /**
   * Main functions file
   */

  // Requires
//	require_once(__DIR__ . '/vendor/autoload.php');
  require_once(__DIR__ . '/framework/helpers/helpers.php');

  // Setup Timber
  $timber          = new \Timber\Timber();
  Timber::$dirname = [
      'assets/templates',
      'assets/svg',
  ];

  // Include main class
  require_once(__DIR__ . '/framework/PFGK.php');
