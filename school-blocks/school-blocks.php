<?php

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function school_blocks_school_blocks_block_init()
{
	register_block_type(__DIR__ . '/build/copyright');
	register_block_type(__DIR__ . '/build/school-address');
	register_block_type(__DIR__ . '/build/aos-block');
}
add_action('init', 'school_blocks_school_blocks_block_init');

/**
 * Registers the custom fields for some blocks.
 *
 * @see https://developer.wordpress.org/reference/functions/register_post_meta/
 */
function school_register_custom_fields()
{
	register_post_meta(
		'page',
		'school_email',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
	register_post_meta(
		'page',
		'school_address',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
}
add_action('init', 'school_register_custom_fields');
