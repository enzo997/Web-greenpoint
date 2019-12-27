<?php
/* Template Name: News page */

get_header();
?>
<main class="news--page color-b">
    <!-- banner top -->
    <section class="banner-top">
        <div class="container">
            <h1 class="title-h1 f_medium f-s-50 f-w-500 wow fadeInUp"><?php if($title = get_field('title')) echo $title;?></h1>
        </div>
    </section>
    <!-- section instagram -->
    <section class="sec-instagram">
        <div class="container">
            <h4 class="title-h4 f-s-18 wow fadeInUp">—Latest in Instagram</h4>
            <?php echo do_shortcode('[instagram-feed num=12 cols=4 showfollow=false showheader=fals]');?>
            <div class="slider-dots"></div>
        </div>
    </section>
    <!-- section latest post -->
    <section class="sec-post">
        <div class="container">
            <h4 class="title-h4 f-s-18 wow fadeInUp">—Latest Stories</h4>
            <?php
            //get post 
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby'=>'date',
                'order'=>'DESC',
                'paged'=> 1,
            );
            $posts = new WP_Query($args);
            $numPage = $posts->max_num_pages;
            ?>
            <div class="post-container row">
            <?php
            foreach ($posts->posts as $key => $post):
                // echo get_the_date( 'g:i a',$post->ID );
                $img = get_the_post_thumbnail_url( $post->ID )?get_the_post_thumbnail_url( $post->ID ):DF_IMAGE. '/noimage.png';
                $alt = get_the_post_thumbnail_url( $post->ID )?$post->post_title:'noimage';
                ?>
                <div class="post-member col-md-6">
                    <div class="image image-scroll">
                        <img src="<?php echo $img;?>" alt="<?php $alt;?>" class="post-image">
                    </div>
                    <h5 class="post-title f_medium f-s-20 f-w-500 wow fadeInUp"><?php echo $post->post_title;?></h5>
                    <div class="description f_g_w f-s-16 wow fadeInUp"><?php echo $post->post_excerpt;?></div>
                    <a href="<?php echo get_permalink($post->ID);?>" class="post-link f_p_medium f-s-14 f-w-500 wow fadeInUp">Read more</a>
                </div>
                <?php
            endforeach;
            wp_reset_postdata(  );
            wp_reset_query(  );
            ?>
            <input type="number" id="current-page" value='1'><!-- current page is displayed -->
            </div>
            <button class="load-more-mobile f_p_medium">Load more</button>
            <input type="number" id="max-page" value='<?php echo $numPage;?>'> <!-- max page can be displayed -->
            <nav class="nav-post-page">
                <button id='post-pre' class="post-pre f_p_medium f-s-14 f-w-500">Previous Page</button>
                <?php
                for ($i=1; $i <= $numPage ; $i++):
                    ?>
                    <button class="page-button f_p_medium f-s-14 f-w-500 <?php if($i == 1) echo 'active';?>" id="page-<?php echo $i;?>"><?php echo $i;?></button>
                    <?php
                    if($i != $numPage)
                        echo '<span class="f_p_medium f-s-14 f-w-500"> . </span>';
                endfor;
                ?>
                <button id='post-next' class="post-next f_p_medium f-s-14 f-w-500">Next Page</button>
            </nav>
        </div>
    </section>
</main>
<?php get_footer();