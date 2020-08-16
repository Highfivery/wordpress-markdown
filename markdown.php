<?php
/**
 * Markdown WordPress Plugin
 *
 * @package Markdown
 *
 * Plugin Name: Markdown
 * Description: Enable Markdown support for comments.
 * Plugin URI:  https://www.benmarshall.me/markdown/
 * Version:     1.0.0
 * Author:      Ben Marshall
 * Author URI:  https://www.benmarshall.me
 * Text Domain: markdown
 */

define( 'MARKDOWN', __FILE__ );

/**
 * Include required dependencies.
 */
require plugin_dir_path( MARKDOWN ) . 'vendor/autoload.php';

/**
 * Parse comment text.
 *
 * @since 1.0.0
 *
 * @param string $comment_text Text of the current comment.
 * @param WP_Comment|null $comment The comment object. Null if not found.
 * @return string The parsed comment.
 */
function markdown_comment_text( $comment_text, $comment = null ) {
  $Parsedown = new Parsedown();

  return $Parsedown->line( $comment_text );
}
add_filter( 'comment_text', 'markdown_comment_text', 10, 2 );
