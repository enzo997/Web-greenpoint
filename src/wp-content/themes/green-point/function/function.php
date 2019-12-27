<?php
function nt_create_post_type($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $icon = $args['menu_icon'];

    register_post_type($post_type, array(
        'labels' => array(
            'name' => __($name),
            'singular_name' => __($single),
            'add_new' => __('Add New '.$single),
            'add_new_item' => __('Add New '.$single),
            'edit_item' => __('Edit '.$single),
            'new_item' => __('New '.$single),
            'all_items' => __('All '.$name),
            'view_item' => __('View '.$single),
            'search_items' => __('Search '.$name),
            'not_found' => __('Not Found '.$single),
            'not_found_in_trash' => __('Not Found '.$single.' In Trash'),
            'parent_item_colon' => '',
            'menu_name' => __($name)
        ),
        'public' => true,
        'menu_icon' => $icon,
        'exclude_from_search' => false,
        'menu_position' => 6,
        'has_archive' => true,
        'taxonomies' => array($post_type),
        'rewrite' => array('slug' => $slug),
        'supports' => array('title', 'editor', 'excerpt', 'revisions', 'thumbnail', 'author')
    ));
}

function nt_create_taxonomy($args) {
    if(!is_array($args) || !$args['post_type'] || !$args['name'] || !$args['single'] || !$args['taxonomy'] || !$args['slug']) return;
    $post_type = $args['post_type'];
    $name = $args['name'];
    $single = $args['single'];
    $slug = $args['slug'];
    $taxonomy = $args['taxonomy'];

    $labels = array(
        'name' => __($name),
        'singular_name' => __($single),
        'search_items' => __('Search '.$name),
        'popular_items' => __('Popular '.$name),
        'all_items' => __('All '.$name),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit '.$single),
        'update_item' => __('Update '.$single),
        'add_new_item' => __('Add '.$single),
        'new_item_name' => __('New '.$single),
        'menu_name' => __($name),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug),
    );
    register_taxonomy($taxonomy, $post_type, $args);
}



function create_new_custom_post_type_and_taxonomy(){

    //Post type Testimonials

    $args = array(
        "post_type" => 'testimonials',
        "name" => "Testimonials",
        "single" => "Testimonials",
        "slug" => "testimonials",
        'menu_icon' => 'dashicons-admin-comments',
    );
    nt_create_post_type($args);


    //Post type Work

    $args = array(
        "post_type" => 'work',
        "name" => "Work",
        "single" => "Work",
        "slug" => "Works",
        'menu_icon' => 'dashicons-welcome-write-blog',
    );
    nt_create_post_type($args);

    $args = array(
        "post_type" => array('work'),
        "name" => "Categories",
        "single" => "Categories",
        "slug" => "categories_work",
        "taxonomy" => "categories_work",
    );
    nt_create_taxonomy($args);

    $args = array(
        "post_type" => array('work'),
        "name" => "Services",
        "single" => "Services",
        "slug" => "services_work",
        "taxonomy" => "services_work",
    );
    nt_create_taxonomy($args);

    $args = array(
        "post_type" => array('work'),
        "name" => "Collaborators",
        "single" => "Collaborators",
        "slug" => "collaborators_work",
        "taxonomy" => "collaborators_work",
    );
    nt_create_taxonomy($args);

    // Post type Post

    $args = array(
        "post_type" => array('post'),
        "name" => "Photography",
        "single" => "Photography",
        "slug" => "photography",
        "taxonomy" => "photography",
    );
    nt_create_taxonomy($args);

    $photography = get_taxonomy( 'photography' );     
    $photography->show_in_rest = true; 

    // Post type Memner
    $args = array(
        "post_type" => 'Member',
        "name" => "Member",
        "single" => "Member",
        "slug" => "member",
        'menu_icon' => 'dashicons-star-empty',
    );
    nt_create_post_type($args);
    
    $args = array(
        "post_type" => array('member'),
        "name" => "Categories",
        "single" => "Categories",
        "slug" => "categories_member",
        "taxonomy" => "categories_member",
    );
    nt_create_taxonomy($args);
    
}
add_action('init', 'create_new_custom_post_type_and_taxonomy');



// Add custom image size
add_filter('intermediate_image_sizes_advanced', 'hero_remove_default_image_sizes');
function hero_remove_default_image_sizes( $sizes) {
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	unset( $sizes['medium_large']);
	return $sizes;
}

add_action( 'after_setup_theme', 'pp_setup' );
function pp_setup() {
    load_theme_textdomain( 'pp' );
    add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'thumb-featured', 300, 201, true);
    // add_image_size( 'thumb-530x369', 530, 369, true);
    // add_image_size( 'thumb-561x374', 561, 374, true);
    // add_image_size( 'thumb-400x268', 400, 268, true);
    add_image_size( 'thumb-636x424', 636, 424, true);
}


function nt_posts_count($args, $all = true) {
    global $wpdb;
    if($all === true) {
        $args['posts_per_page'] = -1;
    }
    $args['count'] = 1;
    $the_query = new WP_Query( $args );
    $sql = "SELECT count(*) as count from (".str_replace("SQL_CALC_FOUND_ROWS ",'',$the_query->request).") as sub";
    $row = $wpdb->get_row( $sql );
    if($row){
        return $row->count;
    }
    return 0;
}

function nt_page_link($page = 1, $link='') {
    if(!$link) return;
    $newLink = '';
    $subLink = '';
    $pos =  strpos($link,'page');
    $pos = ($pos!==false)?$pos:strpos($link,'paged');
    if($pos!==false){
        $newLink = substr($link,0,$pos-1);
    }
    $newLink = $newLink?$newLink:$link;

    $page = is_numeric($page)?$page:1;

    $pos =  strpos($link,'/?');
    if($pos!==false){
        $newLink = substr($newLink,0,$pos);
        $subLink = substr($link,$pos);
    }
    if($page > 1 && is_archive()){
        $newLink .='/?page='.$page;
    }
    elseif($page > 1) {
        $newLink .='/page/'.$page;
    }
    $newLink .= $subLink;
    return $newLink;
}

function nt_pagination($args,$params = array(),$page='') {
    if(!$page) {
        global $wp;
        $current_url = home_url(add_query_arg(array(),$wp->request));
    }
    else {
        $current_url = $page;
    }
    $number = $args['posts_per_page'];
    $args['posts_per_page'] = -1;
    $all = nt_posts_count($args);
    if($all) {
        $percent = $all % $number;
        $number_p = ($percent)?(($all-$percent)/$number + 1):($all/$number);
        if($number_p>1){
            $display = wp_is_mobile()?3:5;
            if($display%2==0) {
                $display -= 1;
            }
            $paged = (isset($args['paged']) && $args['paged']>1)?$args['paged']:1;
            $data = ' data-link='.$current_url;
            if(is_array($params) && count($params)) {
                foreach ($params as $key=>$param){
                    $data.= ' data-'.$key.'="'.$param.'"';
                }
            }
            $number_plus = floor($display/2);
            ?>
            <ul class="nav_pagination">
                <?php 
                    $url = nt_page_link( 1,$current_url ); 
                    $prev = $paged>1?$paged-1:1; 
                    $url = nt_page_link( $prev,$current_url );
                ?>
                <?php
                    if($paged > $prev):
                        ?>
                        <li class="btn-prev">
                            <a <?php echo $data; ?> data-page="<?php echo $prev; ?>" href="<?php echo $url; ?>"><</a>
                        </li>
                        <?php
                    endif;
                ?>
                

                <?php 
                if($number_p < $display): 
                    for($i=1; $i<=$number_p;$i++):
                        $url = nt_page_link( $i,$current_url ); ?>
                        <li <?php echo ($i==$paged)?' class="active"':''; ?>><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php 
                    endfor; 
                elseif($paged > $number_p - $number_plus) :
                    for($i=$number_p-$display+1; $i<=$number_p;$i++): ?>
                        <?php $url = ($i==$paged)?'javascript:void(0)':nt_page_link( $i,$current_url ); ?>
                        <li <?php echo ($i==$paged)?' class="active"':''; ?>><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php 
                    endfor; 
                else: 
                    if($paged <= $number_plus): 
                        for($i=1; $i<=$display;$i++): ?>
                            <?php $url = ($i==$paged)?'javascript:void(0)':nt_page_link( $i,$current_url ); ?>
                            <li <?php echo ($i==$paged)?' class="active"':''; ?>><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                            <?php 
                        endfor; 
                    else: 
                        for($i=$paged-$number_plus; $i<$paged;$i++): 
                            $url = nt_page_link( $i,$current_url ); 
                                ?>
                            <li><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php endfor; ?>

                        <li class="active"><a <?php echo $data; ?> data-page="<?php echo $paged ?>" href="javascript:void(0)"><span><?php echo $i ?></span></a></li>

                        <?php for($i=$paged+1; $i<=$paged+$number_plus;$i++):
                            $url = nt_page_link( $i,$current_url ); ?>
                            <li><a <?php echo $data; ?> data-page="<?php echo $i ?>" href="<?php echo $url; ?>"><span><?php echo $i ?></span></a></li>
                        <?php endfor; 
                    endif; 
                endif; 
                $next = $paged < $number_p?$paged+1:$number_p; 
                $url = nt_page_link( $next,$current_url ); 
                ?>
                <?php if($paged < $next): ?>
                    <li class="btn-next">
                        <a <?php echo $data; ?> data-page="<?php echo $next; ?>" href="<?php echo $url; ?>">></a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php
        }
    }
}

// Add file media upload
function my_custom_mime_types( $mimes ) {
	
    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

// Add file post-thumbnails
add_theme_support( 'post-thumbnails' );

/*get link by slug */
function get_hr_link($name){
    if($link = get_permalink( get_page_by_path( $name ) ))
        return $link;
    return '#';
}










