<?php
/* Template Name: Work page */

get_header();

?>

<?php if(isset($_POST["data"])){
    $data = $_POST["data"];
    echo '<input type="text" autocomplete="off" class="data-sort" value="'.$data.'">';
  }  
?>
<main class="work--page">
    <!-- banner -->
    <section class="banner-top">
        <?php
        if($banner = get_field('banner_top')):
            $image = $banner['image']?$banner['image']['url']:DF_IMAGE. '/noimage.png';
            $imageTitle = $banner['image']?$banner['image']['title']:'noimage';
        ?>
        <img src="<?php echo $image;?>" alt="<?php echo $imageTitle;?>" class="banner-image">
        <div class="banner-content">
            <div class="container">
                <h1 class="banner-title f_medium f-s-45 f-w-500 wow fadeInUp"><?php if($mainTitle = $banner['main_title']) echo $mainTitle;?></h1>
                <h3 class="banner-sub-title f-s-18 wow fadeInUp"><?php if($subTitle = $banner['sub_title']) echo $subTitle;?></h3>
            </div>
        </div>
        <?php
        endif;
        ?>
    </section>
    <!-- work post -->
    <section class="sec-work-post">
        <div class="container">
            <nav class="cat-bar">
            <?php
            $taxonomies = get_terms('categories_work');
            foreach($taxonomies as $key=>$item):
                ?>
                <button class="cat-button f-s-18 color-w" name='<?php echo $item->slug;?>' id="<?php echo $item->name;?>"><?php echo $item->name;?></button>
                <?php
            endforeach;
            wp_reset_postdata();
            ?>
            </nav>
            <div class="post-gr">
                <div class="load-ajax"><div class="load-content"></div></div>
                <div class="w-post-container row">
                <?php
                $args = array(
                    'post_type' => 'work',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'orderby'=>'date',
                    'order'=>'DESC',
                    
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
            </div>
        </div>
    </section>
        <!-- contact logo -->
    <section class="sec-contact-logo">
    <?php
    if($secContactIcon = get_field('sec_contact_icon')['sec_contact_icon']):
        echo '<div class="container">';
        echo '<h4 class="title f-s-18 wow fadeInUp">—Who we work with</h4>';
        echo '</div>';
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