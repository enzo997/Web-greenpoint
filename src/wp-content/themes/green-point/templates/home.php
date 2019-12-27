<?php
/* Template Name: Homepage */

get_header();
?>
<main class="home--page">
    <!-- banner -->
    <section class="sec-banner">
    <?php if($banner = get_field('banner_top')):
    ?>
        <div class="banner-slider">
        <?php
        if($bannerSl = $banner['banner_slider']):
            foreach ($bannerSl as $key => $value):
                $image = $value['url'];
                $imageAlt = $value['title'];
                ?>
                <div class="banner-image">
                    <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>">
                </div>
                <?php
            endforeach;
        endif;
        ?>
        </div>
        <div class="slider-arrows banner-arrows">
            <button class="pre"><i class="fas fa-angle-left"></i></button>
            <button class="next"><i class="fas fa-angle-right"></i></button>
        </div>
        <div class="slider-dots">
            <span class="c-dots"></span>
        </div>
        <div class="banner-content">
            <?php if($title = $banner['banner_title']):?>
            <div class="container">
                <a href="#sec-welcome" class="button-scroll-mobile"></a>
                <h1 class="banner-title f_medium f-s-45 f-w-500 wow fadeInUp"><?php if($mainTitle = $title['main_title']) echo $mainTitle;?></h1>
                <h3 class="banner-sub-title f-s-18 wow fadeInUp"><?php if($subTitle = $title['sub_title']) echo $subTitle;?></h3>
            </div>
            <?php endif;?>
        </div>
    <?php
    endif;
    ?>
    </section>
    <!-- welcome -->
    <section id='sec-welcome' class="sec-welcome">
        <div class="container">
        <?php
        if($secWelcome = get_field('sec_welcome')):
            if($title = $secWelcome['title'])
                echo '<h3 class="title-h3 f-s-18 wow fadeInUp">'.$title.'</h3>';
            if($description = $secWelcome['description'])
                echo '<div class="description f-s-45 wow fadeInUp">'.$description.'</div>';
        endif;
        ?>
        </div>
    </section>
    <!-- our-work -->
    <section class="sec-our-work">
        <div class="container">
            <?php
            if($title = get_field('sec_out_work')['title'])
                echo '<h3 class="title-h3 f-s-18 color-b wow fadeInUp">'.$title.'</h3>';
            $args = array(
                'post_type' => 'work',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby'=>'date',
                'order'=>'DESC'
            );
            $posts = get_posts($args);
            // echo '<pre>';
            // var_dump($posts);
            // echo '</pre>';
            $post1 = $posts[0]?$posts[0]:NULL;
            $post2 = $posts[1]?$posts[1]:NULL;
            $post3 = $posts[2]?$posts[2]:NULL;
            $post4 = $posts[3]?$posts[3]:NULL;

            $secOW = get_field('sec_out_work');
            ?>
            <div class="work-1">
            <?php 
            if($post1):
                $img = get_the_post_thumbnail_url($post1->ID)?get_the_post_thumbnail_url($post1->ID):DF_IMAGE. '/noimage.png';
                $link = get_post_permalink($post1->ID);
                $title = $post1->post_title;
                ?>
                <article class="work-1-content work-content">
                    <?php ?>
                    <div class="image image-scroll">
                        <img src="<? echo $img;?>" alt="<?php echo $title;?>" class="post-1-img">
                    </div>
                    <h4 class="title-h4 f_bold f-s-20 f-w-b  color-b wow fadeInUp"><?php echo $title;?></h4>
                    <a href="<?php echo $link;?>" class="work-link f_p_medium f-s-14 f-w-500 color-b wow fadeInUp">View</a>
                </article>
            <?php
            endif;
            ?>
            </div>
            <div class="work-2 row">
                <div class="col-text">
                    <div class="des-content">
                    <?php
                    if($content1 = $secOW['first_content']):
                        if($description = $content1['description'])
                            echo '<div class="description f_medium f-s-20 f-w-500  color-b wow fadeInUp">'.$description.'</div>';
                        if($link = $content1['link']['title']){
                            $linkUrl = $content1['link']['url']?$content1['link']['url']:'#';
                            echo '<a href="'.$linkUrl.'" class="link f_p_medium f-s-14 f-w-500  color-b wow fadeInUp">'.$link.'</a>';
                        }
                    endif;
                    ?>
                    </div>
                </div>
                <div class="col-post work-content">
                <?php 
                if($post2):
                    $img = get_the_post_thumbnail_url($post2->ID)?get_the_post_thumbnail_url($post2->ID):DF_IMAGE. '/noimage.png';
                    $link = get_post_permalink($post2->ID);
                    $title = $post2->post_title;
                    ?>
                    <article class="work-2-content work-content">
                        <?php ?>
                        <div class="image image-scroll">
                            <img src="<? echo $img;?>" alt="<?php echo $title;?>" class="post-2-img">
                        </div>
                        <h4 class="title-h4 f_bold f-s-20 f-w-b  color-b wow fadeInUp"><?php echo $title;?></h4>
                        <a href="<?php echo $link;?>" class="work-link f_p_medium f-s-14 f-w-500 color-b wow fadeInUp">View</a>
                    </article>
                <?php
                endif;
                ?>
                </div>
            </div>
            <div class="work-3">
            <?php 
            if($post3):
                $img = get_the_post_thumbnail_url($post3->ID)?get_the_post_thumbnail_url($post3->ID):DF_IMAGE. '/noimage.png';
                $link = get_post_permalink($post3->ID);
                $title = $post3->post_title;
                ?>
                <article class="work-3-content work-content">
                    <?php ?>
                    <div class="image image-scroll">
                        <img src="<? echo $img;?>" alt="<?php echo $title;?>" class="post-1 -img">
                    </div>
                    <h4 class="title-h4 f_bold f-s-20 f-w-b  color-b wow fadeInUp"><?php echo $title;?></h4>
                    <a href="<?php echo $link;?>" class="work-link f_p_medium f-s-14 f-w-500 color-b wow fadeInUp">View</a>
                </article>
            <?php
            endif;
            ?>
            </div>
            <div class="work-4 row">
                <div class="col-lg-8 col-post">
                <?php 
                if($post4):
                    $img = get_the_post_thumbnail_url($post4->ID)?get_the_post_thumbnail_url($post4->ID):DF_IMAGE. '/noimage.png';
                    $link = get_post_permalink($post4->ID);
                    $title = $post4->post_title;
                    ?>
                    <article class="work-4-content work-content">
                        <?php ?>
                        <div class="image image-scroll">
                            <img src="<? echo $img;?>" alt="<?php echo $title;?>" class="post-1 -img">
                        </div>
                        <h4 class="title-h4 f_bold f-s-20 f-w-b color-b wow fadeInUp wow fadeInUp"><?php echo $title;?></h4>
                        <a href="<?php echo $link;?>" class="work-link f_p_medium f-s-14 f-w-500 color-b wow fadeInUp wow fadeInUp">View</a>
                    </article>
                <?php
                endif;
                ?>
                </div>
                <div class="col-lg-4 col-text">
                    <div class="des-content">
                    <?php
                    if($content1 = $secOW['second_content']):
                        if($description = $content1['description'])
                            echo '<div class="description f_medium f-s-20 f-w-500  color-b wow fadeInUp">'.$description.'</div>';
                        if($link = $content1['link']['title']){
                            $linkUrl = $content1['link']['url']?$content1['link']['url']:'#';
                            echo '<a href="'.$linkUrl.'" class="link f_p_medium f-s-14 f-w-500  color-b wow fadeInUp">'.$link.'</a>';
                        }
                    endif;
                    ?>
                    </div>
                </div>
            </div>
            <div class="button-bar">
                <a href="<?php echo get_hr_link('work');?>" class="link-to-work f_p_medium f-s-22 f-w-500 color-b wow fadeInUp">View all work</a>
            </div>
        </div>
    </section>
    <!-- testimonial -->
    <?php do_action( 'testimonial');?>
    <!-- who we work -->
    <section class="sec-www">
    <?php
    if($secWww = get_field('sec_www')):
    ?>
        <div class="container">
            <?php
            if($title = $secWww['title'])
                echo '<h3 class="title f-s-18">'.$title.'</h3>';
            ?>
            <div class="row">
            <?php
            foreach($secWww['content'] as $key=>$item):
                $image = $item['image']?$item['image']['url']:DF_IMAGE. '/noimage.png';
                $imageTitle = $item['image']['title'];
                $title = $item['title'];
            ?>
                <div class="content-member col-lg-4 col-md-6">
                    <div class="image image-scroll">
                        <img src="<?php echo $image;?>" alt="<?php echo $imageTitle ;?>" class="ct-img">
                    </div>
                    <?php if($title) echo '<h3 class="ct-title f_bold f-s-30 f-w-b wow fadeInUp">'.$title.'</h3>';?>
                    <form action="<?php echo get_hr_link('work');?>" method="post">
                    <input name='data' type="text" value='<?php echo $title;?>'>
                    <button type="submit" class="f_p_medium f-s-14 f-w-500 wow fadeInUp" >View</button>
                    </form>
                </div>
            <?php
            endforeach;
            ?>
            </div>
        </div>
    <?php
    endif;
    ?>
    </section>
    <!-- contact logo -->
    <section class="sec-contact-logo">
    <?php

    if($secContactIcon = get_field('sec_contact_icon')):
        
        $display = $secContactIcon['display'];
        if($display == 1)
            $secIcon = get_field('sec_icon','option');
        else
            $secIcon = $secContactIcon['custom']['sec_icon'];
        contact_icon($secIcon);
    endif;
    ?>
    </section>
</main>
<?php get_footer();