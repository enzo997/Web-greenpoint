<?php
/* Template Name: Team Culture */

get_header();
?>
<main class="team-culture--page">
    <div class="content" id="team-culture">
        <?php 
        if( $banner_top = get_field('banner_top')):
            $image_bn = $banner_top['image']?$banner_top['image']['url']:DF_IMAGE. '/noimage_1498x998.png';
            // echo '<pre>';
            // var_dump($banner_top );
            // echo '</pre>';
        endif;
        ?>
        <section class="section banner-top">
            <div class="container">
                <h1 class="h1-title wow fadeInUp"><?php echo $banner_top['title']; ?></h1>
            </div>
            <div class = "cont-image-banner-top">
                <img class="banner-top--bg" src="<?php echo $image_bn; ?>" alt="image-bn">
            </div>
        </section>
        <?php 
            $our_team = get_field('our_team');
            // echo '<pre>';
            // var_dump($banner_top );
            // echo '</pre>';
        ?>
        <section class="section our-team">
            <div class="container">
                <h4 class="h4-title wow fadeInUp" data-wow-duration="1s"><? echo $our_team['title']; ?></h4>
                <div class="content">
                    <div class="row">
                    <?php	
                        $descriptionGroup = get_field('our_team',$id)['description_group'] ;
                        foreach($descriptionGroup as  $i=>$item):
                            $i++;
                            // var_dump($i);
                            $descriptionRepeater = $item['description'];
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 description-cont <?php echo ($i%2==0)?('description-chan'):('description-le');?> 
                            wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100" data-wow-delay="<?php echo ($i!==1)?($i/6).'s':""; ?>" >
                                <?php echo $descriptionRepeater;?>
                            </div>
                        <?php   
                        endforeach;
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            $our_core = get_field('our_core');
            // echo '<pre>';
            // var_dump($banner_top );
            // echo '</pre>';
        ?>
        <section class="section our-core">
            <div class="container">
                <div class="content">
                    <h4 class="h4-title wow fadeInUp" data-wow-duration="1s"><? echo $our_core['title'];?></h4>
                    <div class="our-core--list">
                        <div class="row">
                            <?php 
                                foreach($our_core['content'] as $i=>$our):
                            ?>
                                <div class="post col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="<?php echo ($i!==0)?($i/4).'s':""; ?>">
                                    <h5 class="h5-title"><?php echo $our['title']; ?></h5>
                                    <div class="description description-sec-our-core"><?php echo $our['description']; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>       
        </section>
        <?php 
            $member = get_field('member');
            // echo '<pre>';
            // var_dump($banner_top );
            // echo '</pre>';
        ?>
        <section class="section member">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-left wow fadeInUp" data-wow-duration="1s" data-wow-offset="0" data-wow-delay="0.2s">
                        <h4 class="h4-title">
                            <?php echo $member['title']; ?>
                        </h4>
                    </div>
                    <div class="member-post col-right col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="post-main">
                            <div class="row">
                                <?php
                                    $args = array(
                                        "post_type" => 'Member',
                                        'orderby'    => 'date',
                                        'post_status' => 'publish',
                                        "posts_per_page" => 4,
                                        'order'    => 'DESC',
                                        "paged"=>$paged,
                                    );
                                    $posts = get_posts($args);
                                    foreach($posts as $key=>$post){   
                                        $content = get_field('content',$post->ID); 
                                        $img = get_the_post_thumbnail_url( $post->ID )?get_the_post_thumbnail_url( $post->ID ):DF_IMAGE. '/noimage.png';                   
                                        ?>
                                            <div class="content wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo ($key!==0)?($key-0.2).'s':"0.2s"; ?>">
                                                <div class="post-box" >
                                                    <div class="cont-image">
                                                        <img src="<? echo $content['image']?$content['image']['url']:$img; ?>" alt="<? echo $content['image']['url']; ?>" class="post-image">   
                                                    </div>                                       
                                                    <div data-toggle="collapse"  data-target="<?php echo '#member' .$key ;?>" class="collap-button">
                                                        <h5 class="h5-title wow fadeInUp" data-wow-duration="1s"><? echo $content['title']; ?></h5>
                                                        <div class="box-btn wow fadeInUp" data-wow-duration="1s">
                                                            <button class="btn-show">+</button>
                                                        </div>
                                                    </div>    
                                                    <h5 class="h5-name wow fadeInUp" data-wow-duration="1s"><? echo $content['name']; ?></h5>
                                                    <div class="member-description collapse" id='<?php echo 'member'. $key;?>'><? echo $content['description']; ?></div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                ?>
                            </div>
                        </div>                      
                    </div>
                </div>
            </div>    
        </section>
        <?php 
            $banner_bot = get_field('banner_bot');
            // echo '<pre>';
            // var_dump($banner_bot);
            // echo '</pre>';
        ?>  
        <section class="section banner-bot">
            <div class="container">
                <div class="cont-image-bn image-scroll">
                    <img class="banner-bot--bg " src="<?php echo $banner_bot['image']?$banner_bot['image']['url']:DF_IMAGE. '/noimage_1498x998.png'; ?>" alt="<?php echo $banner_bot['image']['url']; ?>">
                </div>
                <div class="content">
                    <h5 class="h5-title wow fadeInUp" data-wow-duration="1s" data-wow-offset="0" ><? echo $banner_bot['content']['title']; ?></h5>
                    <div class="description wow fadeInUp" data-wow-duration="1s" data-wow-offset="0" data-wow-delay="0.2s"><? echo $banner_bot['content']['description']; ?></div>
                </div>
            </div>
        </section>
        <?
            $amazing = get_field('amazing');
        ?>
        <section class="section amazing">
            <div class="container">
                <h2 class="h2-title wow fadeInUp" data-wow-duration="1s" data-wow-offset="0"><? echo $amazing['title']; ?></h2>
                <div class="description wow fadeInUp" data-wow-duration="1s" data-wow-offset="0" data-wow-delay="0.5s">
                    <?php echo $amazing['description']; ?>
                </div> 
            </div>
        </section>
    </div>
</main>
<?php get_footer();