<?php
//testimonial hook
add_action('testimonial','testimonial_callback');
function testimonial_callback(){
    ?>
    <section class="sec-tt">
        <div class="container">
            <div class="sec-content">
                <h4 class="title f-s-18 wow fadeInUp" data-wow-duration="3s">—Testimonials</h4>
                <?php
                $args = array(
                    'post_type' => 'testimonials',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby'=>'date',
                    'order'=>'DESC'
                );
                $ttPost = get_posts($args);
                if(!empty($ttPost)):
                    echo '<div class="tt-slider">';
                    foreach ($ttPost as $key => $value):
                    ?>
                        <div class="slider-member">
                            <div class="slider-content wow fadeInUp" >
                                <div class="description f_bold f-s-30 f-w-b"><?php echo $value->post_content;?></div>
                                <h4 class="sub-title f-s-18 wow fadeInUp"><?php echo $value->post_title;?></h4>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    echo '</div>';
                endif;
                wp_reset_postdata();
                ?>
                <div class="slick-custom wow fadeInUp">
                    <div class="slider-arrows banner-arrows">
                        <button class="pre"><i class="fas fa-angle-left"></i></button>
                        <button class="next"><i class="fas fa-angle-right"></i></button>
                    </div>
                    <div class="slider-dots">
                        <span class="c-dots"></span>
                    </div>
                </div>
                <div class="slider-dots-mobile">01 / 05</div>
            </div>
        </div>
    </section>
    <?php
}

//contact icon
function contact_icon($secIcon){
    ?>
    <div class="container">
        <div class="logo-container">
            <div class="row">
            <?php
            foreach($secIcon as $key => $item):
                $icon = $item['url'];
                $alt = $item['title'];
                ?>
                <div class="icon-item col-lg-2 col-md-3 col-4 wow fadeInUp" data-wow-delay="<?php echo $key*0.15 . 's';?>">
                    <img src="<?php echo $icon;?>" alt="<?php echo $alt;?>" class="icon-img">
                </div>
                <?php
            endforeach;
            ?>
            </div>
        </div>
    </div>
    <?php
}

//get work article
function get_work_article($thisPost){
    $id = $thisPost->ID;
    $title = $thisPost->post_title;
    $image = get_the_post_thumbnail_url($id)?get_the_post_thumbnail_url($id):DF_IMAGE. '/noimage.png';
    $logo = get_field('icon_contact',$id)?get_field('icon_contact',$id)['url']:DF_IMAGE. '/noimage.png';
    $link = get_permalink($id);
    ?>
    <article class="work-post wow fadeInUp">
        <img src="<?php echo $image;?>" alt="<?php echo $title;?>" class="w-post-image">
        <img src="<?php echo $logo;?>" alt="<?php echo $title;?>" class="w-post-logo">
        <div class="w-post-content">
            <h3 class="w-post-title f_bold f-s-45 f-w-b"><?php echo $title;?></h3>
            <a href="<?php echo $link;?>" class="w-post-link">View</a>
        </div>
    </article>
    <?php
}

// ajax new 
add_action('wp_ajax_display_post_by_page', 'display_post_by_page'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_display_post_by_page', 'display_post_by_page');
function display_post_by_page(){
    $page = isset($_POST['page'])?$_POST['page']:'';
    //get post 
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby'=>'date',
        'order'=>'DESC',
        'paged'=> $page,
    );
    $posts = new WP_Query($args);
    foreach ($posts->posts as $key => $post):
        // echo get_the_date( 'g:i a',$post->ID );
        $img = get_the_post_thumbnail_url( $post->ID )?get_the_post_thumbnail_url( $post->ID ):DF_IMAGE. '/noimage.png';
        $alt = get_the_post_thumbnail_url( $post->ID )?$post->post_title:'noimage';
        ?>
        <div class="post-member col-md-6">
            <div class="image">
                <img src="<?php echo $img;?>" alt="<?php $alt;?>" class="post-image">
            </div>
            <h5 class="post-title f_medium f-s-20 f-w-500"><?php echo $post->post_title;?></h5>
            <p class="description f_g_w f-s-16"><?php echo $post->post_excerpt;?></p>
            <a href="<?php echo get_permalink($post->ID);?>" class="post-link f_p_medium f-s-14 f-w-500">Read more</a>
        </div>
        <?php
    endforeach;
    wp_reset_postdata(  );
    wp_reset_query(  );
    ?>
    <input type="number" id="current-page" value='<?php echo $page;?>'><!-- current page is displayed -->
    <?php

    exit;
}

// ajax work 
add_action('wp_ajax_fill_by_cat', 'fill_by_cat'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_fill_by_cat', 'fill_by_cat');
function fill_by_cat(){
    $taxonomy = isset($_POST['cat'])?$_POST['cat']:'';
    ?>
    <div class="w-post-container row">
        <?php
        $args = array(
            'post_type' => 'work',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby'=>'date',
            'order'=>'DESC',
            'categories_work'=>$taxonomy,
            
        );
        $posts = get_posts($args);
        foreach ($posts as $key => $value):
            ?>
            <div class="col-md-6 post-member">
            <?php
                get_work_article($value);
            ?>
            </div>
            <?php
        endforeach;
        ?>
    </div>
    <?php
    //category content
    $term = get_term_by('slug',$taxonomy,'categories_work');;
    if($addCt = get_field('add_content',$term)):
        $titleImg = $addCt['title_image']?$addCt['title_image']['url']: DF_IMAGE. '/noimage.png';
        $titleAlt = $addCt['title_image']?$addCt['title_image']['title']: 'noimage';
        $img = $addCt['image']?$addCt['image']['url']: DF_IMAGE. '/noimage.png';
        $alt = $addCt['image']?$addCt['image']['title']: 'noimage';
    ?>
    <div class="cat-add-content">
        <?php
        if($title = $addCt['subtitle'])
            echo '<h4 class="title-h4 f-s-18">'.$title.'</h4>';
        ?>
        <div class="cat-content">
            <div class="col-left">
                <img src="<?php echo $titleImg;?>" alt="<?php echo $titleAlt;?>" class="title-image">
                <?php
                if($description = $addCt['description'])
                    echo '<p class="description f_g_w f-s-21">'.$description.'</p>';
                if($link = $addCt['link'])
                    echo '<a href="'.$link['url'].'" class="link f_p_medium f-s-14 f-w-500">'.$link['title'].'</a>';
                ?>
            </div>
            <div class="col-right">
                <img src="<?php echo $img;?>" alt="<?php echo $alt;?>" class="image">
            </div>
        </div>
    </div>
    <?php
    endif;

    exit;
}