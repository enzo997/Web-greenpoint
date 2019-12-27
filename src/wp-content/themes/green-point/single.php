<?php
get_header();
$post = get_queried_object();
$id = get_queried_object()->ID;

?>
    <main class="single---page" id="single---page">
        <section class="section banner-top">
            <?php
                $banner_top = get_field('banner_top');
            ?>
            <div class="container">
                <h1 class="h1-title wow fadeInUp" data-wow-duration="3s"><?php echo  $banner_top['title']; ?></h1>
            </div>
            <div class ="col-bg">
                <?php
                if($banner = get_field('banner_top')):
                    $image = $banner['image']?$banner['image']['url']:DF_IMAGE. '/1489.png';
                    $imageTitle = $banner['image']?$banner['image']['title']:'1489.png';
                ?>
                <img class="banner-top--image" src="<? echo $image; ?>" alt="<? echo $imageTitle; ?>">
                <?php
                endif;
                ?>
            </div>

        </section>
        <?
            $sections = get_field('content');
        ?>
        <section class="section content-top">
            <div class="container">
                <div class="row">
                    <?php
                        if($sections){
                            foreach($sections as $section){
                                if ($section["acf_fc_layout"] == "content"){
                                    ?>
                                        <div class="get-f col-lg-3 col-md-3 col-sm-12">
                                            <div class="get-main">
                                                <div class="date wow fadeInUp" data-wow-duration="2s">
                                                    <h5 class="h5-title">Date</h5>
                                                    <h6 class="time"><?echo get_the_date( 'd/m/Y', $post->ID );?></h6>
                                                </div>
                                                <div class="write wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
                                                    <h5 class="author">Wrtten by</h5>
                                                    <h6 class="wrtten"><?php echo ucwords(get_the_author_meta( 'nickname' , $post->post_author )); ?></h6>
                                                </div>
                                                <div class="photography wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">
                                                    <h5 class="h5-title">Photography By</h5>
                                                    <div class="photo">
                                                        <?php
                                                            $args = array(
                                                                'type'      => 'post',
                                                                'orderby' => 'name',
                                                                'child_of'  => 0,
                                                                'parent'    => ''
                                                            );
                                                            $taxonomy = get_the_terms($post->ID,'photography');
                                                            if(!empty($taxonomy)){
                                                                foreach ( $taxonomy as $category ) {
                                                            ?>
                                                                    <?php echo $category->name ; ?>
                                                                    <?php 
                                                                } 
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="get-mobi">
                                                <div class="row">
                                                    <div class="date col-sm-3 col-3">
                                                        <h5 class="h5-title ">Date</h5>
                                                        <h6 class="time"><?echo get_the_date( 'd/m/Y', $post->ID );?></h6>
                                                    </div>
                                                    <div class="write col-sm-4 col-4">
                                                        <h5 class="author ">Wrtten by</h5>
                                                        <h6 class="wrtten"><?php echo ucwords(get_the_author_meta( 'nickname' , $post->post_author )); ?></h6>
                                                    </div>
                                                    <div class="photography col-sm-5 col-5">
                                                        <h5 class="h5-title">Photography By</h5>
                                                        <div class="photo">
                                                            <?php
                                                                $args = array(
                                                                    'type'      => 'post',
                                                                    'orderby' => 'name',
                                                                    'child_of'  => 0,
                                                                    'parent'    => ''
                                                                );
                                                                $taxonomy = get_the_terms($post->ID,'photography');
                                                                if(!empty($taxonomy)){
                                                                    foreach ( $taxonomy as $category ) {
                                                                ?>
                                                                        <?php echo $category->name ; ?>
                                                                        <?php 
                                                                    } 
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="description col-lg-9 col-md-9 col-sm-12 wow fadeInUp" data-wow-duration="2.5s" data-wow-delay="0.5s">
                                            <?php echo $section['description']? $section['description']:""; ?>
                                        </div>
                                    <?php

                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </section>

        <section class="section doub-image">
            <div class="container">
                <?
                    if($sections){
                        foreach($sections as $section){
                            if ($section["acf_fc_layout"] == "gallery"){
                                ?>
                                    <div class="gallery">
                                        <div class="row">
                                            <?php
                                                $count = count($section['gallery']);
                                                $delay=0;
                                                foreach($section['gallery'] as $i=> $image){
                                                    //$img = $image['url']?$image['url']:THEM_URI .'/assets/images/default/noimage_636x424.png';
                                                    if ($count == 1){
                                                    ?>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInUp" data-wow-duration="2.5s" data-wow-delay="<?php echo ($i!==0)?($i+0.2).'s':"1s";?>">
                                                        <?php
                                                    } else{
                                                    ?>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 wow slideInUp" data-wow-duration="2.5s" data-wow-delay="<?php echo ($i!==0)?($i+0.2).'s':"1s";?>">
                                                        <?php
                                                    }
                                                    echo '<div class="div-image"><img style="width:100%;" src="'.$image['url'].'" alt="'.$image['alt'].'">';
                                                    echo '</img> </div> </div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
        </section>
        <?
            $sections = get_field('content');
        ?>
        <section class="section content-bot">
            <div class="container">
                <div class="content-bot--col">
                    <?php
                        if($sections){
                            foreach($sections as $section){
                                if ($section["acf_fc_layout"] == "content"){
                                    ?>
                        
                                        <div class="description wow fadeInUp" data-wow-duration="2.5s" data-wow-delay="0.1s">
                                            <?php echo $section['description']? $section['description']:""; ?>
                                        </div>
                                    <?php
                                }
                            }
                        }
                    ?>
                </div>   
            </div>
        </section>
                    
        <?php 
            $news = get_field('news');
        ?>
        
        <section class="section stories">
            <div class="container"> 
                <div class="post">
                    <?php
                        if($sections){
                            foreach($sections as $section){
                                if ($section["acf_fc_layout"] == "title"){
                                    ?>
                                    <?php
                                }
                            }
                        }
                    ?>
                    <h4 class="title-h4 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s"><?php echo get_field('title-post-new-single',$id);?></h4>
                    <div class="row">
                        <?php
                            $categories = get_the_category(get_the_ID());
                            if ($categories){
                                $category_ids = array();
                                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                                $args=array(
                                    'category__in' => $category_ids,
                                    'post__not_in' => array(get_the_ID()),
                                    'posts_per_page' => 2,
                                    'orderby'=>'date',
                                    'order'=>'DESC',
                                );
                                if (get_posts($args) == NULL){
                                    $args=array(
                                        'post__not_in' => array(get_the_ID()),
                                        'posts_per_page' => 2,
                                        'orderby'=>'date',
                                        'order'=>'DESC',
                                    );
                                }
                            }
                            $my_query = get_posts($args);
                            foreach($my_query as $i=>$post){
                                $img = get_the_post_thumbnail_url( $post->ID )?get_the_post_thumbnail_url( $post->ID ):DF_IMAGE. '/noimage.png';
                                $alt = get_the_post_thumbnail_url( $post->ID )?$post->post_title:'noimage';
                                ?>
                                <div class="list col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-duration="2.5s" data-wow-delay="<?php echo ($i!==0)?($i).'s':"0.5s";?>">
                                    <div class="image">
                                    <a href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title;?>">
                                            <img src="<?php echo $img;?>" alt="<?php $alt;?>" class="post-image">
                                    </a>
                                    </div>
                                    <h5 class="h5-title post-title f_medium f-s-20 f-w-500 wow fadeInUp" data-wow-duration="3s" data-wow-duration="0.5s"><a href="<?php echo get_permalink($post->ID); ?>" ><?php echo $post->post_title;?></a></h5>
                                    <div class="description f_g_w f-s-16"><?php echo $post->post_excerpt;?></div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();