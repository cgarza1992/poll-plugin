<?php

namespace PollPlugin;

// Define the custom post type class
class Poll_Setup {
    // Define the constructor
    public function __construct() {
        add_action( 'init', array( $this, 'register_poll_custom_post_type' ) );
        add_action( 'cmb2_admin_init', [ $this, 'my_plugin_register_poll_metabox' ] );
        add_action('rest_api_init', [ $this, 'poll_rest_fields' ] );

    }

    // Register custom post type
    public function register_poll_custom_post_type() {
        $labels = array(
            'name' => 'Polls',
            'singular_name' => 'Poll',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Poll',
            'edit_item' => 'Edit Polls',
            'new_item' => 'New Poll',
            'view_item' => 'View Polls',
            'search_items' => 'Search Polls',
            'not_found' => 'No poll custom post types found',
            'not_found_in_trash' => 'No poll custom post types found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Polls',
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-post',
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'rewrite' => array( 'slug' => 'poll' ),
            'capability_type' => 'post',
            'menu_position' => 5,
            'show_in_rest' => true,

        );

        register_post_type( 'polls', $args );
    }

    function my_plugin_register_poll_metabox() {

        $cmb = new_cmb2_box( array(
            'id'           => 'poll_metabox',
            'title'        => __( 'Poll Settings', 'PollPlugin' ),
            'object_types' => array( 'polls' ),
            'context'      => 'normal',
            'priority'     => 'high',
        ) );

        $cmb->add_field( array(
            'name'    => __( 'Poll Question', 'PollPlugin' ),
            'id'      => 'poll_question',
            'type'    => 'text',
        ) );

        $options = $cmb->add_field( array(
            'name' => __( 'Poll Options', 'PollPlugin' ),
            'id'   => 'poll_options',
            'type' => 'group',
            'options' => array(
                'group_title'   => __( 'Option {#}', 'PollPlugin' ),
                'add_button'    => __( 'Add Another Option', 'PollPlugin' ),
                'remove_button' => __( 'Remove Option', 'PollPlugin' ),
                'sortable'      => true,
            ),
        ) );

        $cmb->add_group_field( $options, array(
            'name' => __( 'Option Label', 'PollPlugin' ),
            'id'   => 'option_label',
            'type' => 'text',
        ) );

        $cmb->add_group_field( $options, array(
            'name' => __( 'Option Value', 'PollPlugin' ),
            'id'   => 'option_value',
            'type' => 'text_small',
        ) );
    }

    // Register custom REST API fields for custom post type
    function poll_rest_fields() {
        register_rest_field('polls', 'poll_question', array(
            'get_callback' => [ $this, 'get_poll_question' ],
            'schema' => array(
                'description' => 'The poll question for this post.',
                'type' => 'string',
            ),
        ));
        
        register_rest_field('polls', 'poll_options', array(
            'get_callback' => [ $this, 'get_poll_options' ],
            'schema' => array(
                'description' => 'The poll options for this post.',
                'type' => 'array',
                'items' => array(
                    'type' => 'string',
                ),
            ),
        ));
    }

    // Get the value of the "poll_question" CMB2 field
    function get_poll_question($post) {
        return get_post_meta($post['id'], 'poll_question', true);
    }

    // Get the value of the "poll_options" CMB2 field
    function get_poll_options($post) {
        return get_post_meta($post['id'], 'poll_options', true);
    }
}
