<?php
/* Template Name: Spaceshaping page */
$id = get_queried_object()->ID;
get_header();
?>
<div class="s-logo-top">
    <?php
    $imgB = get_field('sec-banner-top')['logo']?get_field('sec-banner-top')['logo']['url']:DF_IMAGE. '/logo_s_black.png';
    $imgW = get_field('sec-banner-top')['logo_1']?get_field('sec-banner-top')['logo_1']['url']:DF_IMAGE. '/logo_s_white.png';
    ?>
    <div class="container">
        <div class="logo-content">
            <img src="<?php echo $imgB;?>" alt="logo" class="logo-black">
            <img src="<?php echo $imgW;?>" alt="logo" class="logo-white">
        </div>
    </div>
</div>
<main class="spaceshaping--page">
    <!-- sec-banner-top -->
    <section class="sec-banner-top">
        <div class="sec-banner-top--background-content ">
            <div class="container">
                <div class="group-content">
                    <div class="col-content-left">
                        <div class="col-cont">
                            <div class="description-bold wow fadeInUp" data-wow-duration="1.5s">
                                <?php echo get_field('sec-banner-top',$id)['content_group']['content_description']['description_bold']; ?>
                            </div>
                            <div class="description wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <?php echo get_field('sec-banner-top',$id)['content_group']['content_description']['description']?get_field('sec-banner-top',$id)['content_group']['content_description']['description']:""; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-content-right">
                        <div class="col-cont">
                                <?php if( $banner_bn = get_field('sec-banner-top',$id)['content_group']):
                                            $image_bn = $banner_bn['image_circle']?$banner_top['image_circle']['url']:DF_IMAGE. '/noimage_1498x998.png';
                                    endif;
                                ?>
                            <img src="<?php echo $image_bn; ?>" alt="image-circle--banner-top">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">  
            <div class="logo-content">
                <div class="row">
                    <?php	
                        $LogoGroup = get_field('sec-banner-top',$id)['group_logo'] ;
                        $i = 0;
                        foreach($LogoGroup as $item):
                            $i++;
                            $Logo = $item['logo_contact']?$item['logo_contact']['url']:DF_IMAGE. '/noimage.png';
                            ?>
                            
                            <div class="col-lg-2 col-4  col-img-logo col-img-logo-<?php echo $i;?>  wow fadeInUp" data-wow-duration="1.5s" data-wow-offset="100" data-wow-delay="<?php echo ($i!==1)?($i/6).'s':""; ?>" data-wow-offset="0">
                                <img src="<?php echo $Logo; ?>" alt="Logo-contact">
                            </div>
                        <?php   
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- sec go into spaceshaping -->
    <section class="sec-go-into-spaceShaping">
        <div class="sec-background--img">
            <img src="<?php echo get_field('sec-go-into-spaceshaping',$id)['background_image']?get_field('sec-go-into-spaceshaping',$id)['background_image']['url']:DF_IMAGE. '/noimage_1498x998.png'; ?>" alt="image-background-spaceshaping">
        </div>
        <div class="container">
            <h4 class="title-h4 sec-go-into-spaceShaping-title wow fadeInUp" data-wow-duration="1s">
                <?php echo get_field('sec-go-into-spaceshaping',$id)['title']['span_1']; ?>
                <span><?php echo get_field('sec-go-into-spaceshaping',$id)['title']['span_2']; ?></span>
                
            </h4>
            <div class="content-group">
                <div class="col-content">
                    <div class="row">
                        <?php	
                            $GroupGoInto = get_field('sec-go-into-spaceshaping',$id)['group_content_go_into_spaceshapin'] ;
                            // $i = 0;
                            foreach($GroupGoInto as $i => $item):
                                $i++;
                                $contentGroup = $item['content_group'];
                                $Imgcircle = $contentGroup['img_circle']?$contentGroup['img_circle']['url']:DF_IMAGE. '/noimage.png';
                                $Title = $contentGroup['title'];
                                $description = $contentGroup['description']?$contentGroup['description']:"";
                                ?>
                                <div class="col-lg-4 col-md-3 col-content col-content-<?php echo $i;?> wow fadeInUp" data-wow-delay="<?php echo ($i!==1)?($i-1).'s':""; ?>" data-wow-duration="3s" data-wow-offset="-200">
                                    <div class="cont-img">
                                        <img src="<?php echo $Imgcircle; ?>" alt="image-description-go-into-spaceshaping">
                                    </div>
                                    <div class="cont-ti-des">
                                        <h5 class="title-h5"><?php echo $Title; ?></h5>
                                        <div class="description">
                                            <?php echo $description;?>
                                        </div>
                                    </div>
                                </div>
                            <?php   
                            endforeach;
                        ?>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- section post work -->
    <section class="SpaceSphaping-case--post-work sec-other-post">
        <div class="container">
            <h4 class="title-h4 f-s-18 wow fadeInUp" data-wow-duration="2s" data-wow-offset="100"><?php echo get_field('title-post-work');?></h4>
            <div class="row post-container">
                <?php
                $args = array(
                    'post_type' => 'work',
                    'post_status' => 'publish',
                    'posts_per_page' => 2,
                    'orderby'=>'date',
                    'order'=>'DESC'
                );
                $posts = get_posts($args);
                foreach ($posts as $key => $item):
                ?>
                    <div class="post-member col-md-6  wow fadeInUp" data-wow-duration="3s" data-wow-delay="<?php echo ($i!==1)?($key/2).'s':""; ?>" data-wow-offset="-100">
                        <?php
                        get_work_article($item);
                        ?>
                    </div>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer();