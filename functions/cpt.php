<?php 

//Add Custom Post Types and Custom Taxonomies

// Register Custom Listing Post Type
function listing_custom_post() {

	$labels = array(
		'name'                  => _x( 'Listings', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Listing', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Listings', 'text_domain' ),
		'name_admin_bar'        => __( 'Listings', 'text_domain' ),
		'archives'              => __( 'Listing Archives', 'text_domain' ),
		'attributes'            => __( 'Listing Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Listings', 'text_domain' ),
		'add_new_item'          => __( 'Add New Listing', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Listing', 'text_domain' ),
		'edit_item'             => __( 'Edit Listing', 'text_domain' ),
		'update_item'           => __( 'Update Listing', 'text_domain' ),
		'view_item'             => __( 'View Listing', 'text_domain' ),
		'view_items'            => __( 'View Listings', 'text_domain' ),
		'search_items'          => __( 'Search Listings', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Listing list', 'text_domain' ),
		'items_list_navigation' => __( 'Listing list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Listing list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Listing', 'text_domain' ),
		'description'           => __( 'Custom Post Types for Listings', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-location',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'listing', $args );

}
add_action( 'init', 'listing_custom_post', 0 );


// Register Custom Event Post Type
function event_custom_post() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Events', 'text_domain' ),
		'archives'              => __( 'Event Archives', 'text_domain' ),
		'attributes'            => __( 'Event Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Event', 'text_domain' ),
		'edit_item'             => __( 'Edit Event', 'text_domain' ),
		'update_item'           => __( 'Update Event', 'text_domain' ),
		'view_item'             => __( 'View Event', 'text_domain' ),
		'view_items'            => __( 'View Events', 'text_domain' ),
		'search_items'          => __( 'Search Events', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Event list', 'text_domain' ),
		'items_list_navigation' => __( 'Event list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Event list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Custom Post Types for Events', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'event_custom_post', 0 );

// Register Primary Section Custom Taxonomy
function primary_section() {

	$labels = array(
		'name'                       => _x( 'Primary Sections', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Primary Section', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Primary Section', 'text_domain' ),
		'all_items'                  => __( 'All Primary Sections', 'text_domain' ),
		'parent_item'                => __( 'Parent Primary Section', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Primary Section:', 'text_domain' ),
		'new_item_name'              => __( 'New Primary Section', 'text_domain' ),
		'add_new_item'               => __( 'Add New Primary Section', 'text_domain' ),
		'edit_item'                  => __( 'Edit Primary Section', 'text_domain' ),
		'update_item'                => __( 'Update Primary Section', 'text_domain' ),
		'view_item'                  => __( 'View Primary Section', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Primary Sections', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Primary Sections', 'text_domain' ),
		'search_items'               => __( 'Search Primary Sections', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Primary Sections', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'primary_section', array( 'listing', 'event' ), $args );

}
add_action( 'init', 'primary_section', 0 );

add_action('init', 'primary_section_register_meta');
        function primary_section_register_meta(){
            register_meta('term', 'color','' );
        }

add_action( 'primary_section_add_form_fields', 'primary_section_new_term_field' ); 
        function primary_section_new_term_field() { 
            wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?> 
            <div class="form-field primary-section-term-wrap"> <label for="primary-section-term">
                <?php _e( 'Color', 'primary_section' ); ?></label> 
                <input type="text" name="primary_section_term" id="primary-section-term" value="" class="primary-section-field" /> </div> 
            <!-- <div class="form-field location-term-wrap"> <label for="location-term">
                <?php _e( 'Address', 'location' ); ?></label> 
                <input type="text" name="location_term" id="location-term" value="" class="location-term-field" /> </div> 
            <div class="form-field location-term-wrap"> <label for="location-term">
                <?php _e( 'Phone', 'location' ); ?></label> 
                <input type="text" name="location_term" id="location-term" value="" class="location-term-field" /> </div>  -->

                <?php }

 add_action( 'primary_section_edit_form_fields', 'primary_section_edit_term_field' );

            function primary_section_edit_term_field( $term ) {

                //$default = '#ffffff';
                //$location_term = location_get_term( $term->term_id, true );

                $color = get_term_meta( $term->term_id, 'color', true );
                

               //if ( ! $location_term )
                    //$color = $default; ?>

                <tr class="form-field primary-section-term-wrap">
                    <th scope="row"><label for="primary-section-term"><?php _e( 'Color', 'primary_section' ); ?></label></th>
                    <td>
                        <?php wp_nonce_field( basename( __FILE__ ), 'primary_section_term_nonce' ); ?>
                        <input type="text" name="primary_section_term_color" id="primary-section-term-college" value="<?php echo esc_attr( $color ); ?>" class="location-field" />
                    </td>
                </tr>
               <!--  <tr class="form-field location-term-wrap">
                    <th scope="row"><label for="location-term"><?php _e( 'Address', 'location' ); ?></label></th>
                    <td>
                        <?php wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?>
                        <input type="text" name="location_term_address" id="location-term-address" value="<?php echo esc_attr( $address ); ?>" class="location-field" />
                    </td>
                </tr>
                <tr class="form-field location-term-wrap">
                    <th scope="row"><label for="location-term"><?php _e( 'Phone', 'location' ); ?></label></th>
                    <td>
                        <?php wp_nonce_field( basename( __FILE__ ), 'location_term_nonce' ); ?>
                        <input type="text" name="location_term_phone" id="location-term-phone" value="<?php echo esc_attr( $phone ); ?>" class="location-field" />
                    </td>
                </tr> -->
                <?php }

    add_action( 'edit_primary_section',   'primary_section_save_term_color' );
        add_action( 'create_primary_section', 'primary_section_save_term_color' );

        function primary_section_save_term_color($term_id) {

            if ( ! isset( $_POST['primary_section_term_nonce'] ) || ! wp_verify_nonce( $_POST['primary_section_term_nonce'], basename( __FILE__ ) ) )
                return;

            $old_term = get_term_meta( $term_id, 'color', true );
            $new_term = $_POST['primary_section_term_color'];

            if ( $old_term && '' === $new_term )
                delete_term_meta( $term_id, 'color' );

            else if ( $old_term !== $new_term )
                update_term_meta( $term_id, 'color', $new_term );

            // if ( $old_term && '' === $new_term )
            //     delete_term_meta( $term_id, 'address' );

            // else if ( $old_term !== $new_term )
            //     update_term_meta( $term_id, 'address', $new_term );
        }
?>