<?php
/* Template Name: Contact page */

get_header();
global $post;
?>
<main class="contact--page">
    <section class="section sec-banner-top ">
        <div class="container">
            <div class="sec-banner-top--cont">
                <?php 
                $banner = get_field('banner_top'); 
                $title = $banner['title']?$banner['title']:$post->post_title;
                ?>
                <h1 class="sec-banner-top--title title-h1 f_regular wow fadeInUp" data-wow-duration="2s"><?php echo $title; ?></h1>
                <?php 
                    if(!empty($address = $banner['address'])) 
                        echo '<div class="sec-banner-top--address wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">'.$address.'</div>';
                ?>
            </div>
        </div>
    </section>
    <?php $form = get_field('form'); ?>
    <section class="section sec-form">
        <div class="container">
            <?php 
            if(!empty($title = $form['title'])) 
                echo '<h2 class="sec-form--title title-h2 wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">'.$title.'</h2>';
            if(!empty($form_id = $form['form_name']))
                echo do_shortcode('[formidable id='.$form_id.']');
            else
                echo '<div calss="no-form">Update form</div>';
            ?>  
        </div>
    </section>
</main>
<?php get_footer();