<?php
  /**
   * User: bilalduckett
   * Date: 5/15/2017
   * Time: 4:57 PM
   * @package    WordPress
   * @subpackage Prime Focus Goalkeeping
   * Template Name: Home
   */

  $context           = Timber::get_context();
//  $context['splash'] = Timber::get_posts('post_type=splash');
  $context['post'] = Timber::get_post();

  $allPosts = Timber::get_posts('post_type=post');
  $context['posts'] = array_slice($allPosts, 0, 4);

  $templates = ['template-home.twig'];

  Timber::render($templates, $context);
