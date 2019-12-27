<?php
/* Template Name: Our Story  */
$id = get_queried_object()->ID;
get_header();


?>
<main class="our-story--page">
    <section class="section sec-banner-top">
        <div class="container">
            <div class="cont-title">
                <h1 class="title-h1 sec-banner-top--title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.01s"><?php echo get_field('section_banner_top',$id)['title']; ?></h1>  
            </div>
        </div>
        <div class="banner-image">
            <img src="<?php echo get_field('section_banner_top',$id)['banner_image']?get_field('section_banner_top',$id)['banner_image']['url']:DF_IMAGE. '/noimage_1498x998.png'; ?>'" alt="banner-img">
        </div>
    </section>
    <section class="section sec-our-strory">
        <div class="container">
            <h4 class="title-h4 sec-our-strory--title wow fadeInUp"  data-wow-duration="1s"><?php echo get_field('section_our_story',$id)['title']; ?></h4>
            <div class="content">
                <div class="row">
                    <?php	
                        $descriptionGroup = get_field('section_our_story',$id)['description_group'];
                        $i = 0;
                        foreach($descriptionGroup as $item):
                            $i++;
                            $description = $item['description']?$item['description']:'';
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-row wow fadeInUp" data-wow-duration="2s" data-wow-delay="<?php echo ($i!==1)?($i/4).'s':"";?>">
                                <div class="col-content col-content-<?php echo $i;?>">
                                    <div class="description">
                                        <?php echo $description; ?>
                                    </div>
                                </div>
                            </div>
                        <?php   
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section sec-after-our-story">
        <div class="banner-image">
            <img src="<?php echo get_field('section_after_our_story',$id)['image_top']?get_field('section_after_our_story',$id)['image_top']['url']:DF_IMAGE. '/noimage.png'; ?>" alt="img-top">
        </div>
        <div class="container">
            <div class="content">
                <div class="row">
                <?php	
                    $descriptionGroup =  get_field('section_after_our_story',$id)['description_group'];
                    $i = 0;
                        foreach($descriptionGroup as $item):
                            $i++;
                            $description = $item['description']?$item['description']:'';
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-row wow fadeInUp" data-wow-duration="2s" data-wow-delay="<?php echo ($i!==1)?($i/4).'s':"";?>"">
                                <div class="col-content col-content-<?php echo $i;?>">
                                    <div class="description">
                                        <?php echo $description; ?>
                                    </div>
                                </div>
                            </div>
                        <?php   
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section sec-connections">
        <div class="container">
            <div class="cont-title">
                <h1 class="title-h1 sec-connections--title wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s"><?php echo get_field('section_connections',$id)['title']; ?></h1>
            </div>
            <div class="content">
                <div class="row">
                    <?php	
                        $descriptionGroup = get_field('section_connections',$id)['description_group'];
                        $i = 0;
                        foreach($descriptionGroup as $item):
                            $i++;
                            $description = $item['description']?$item['description']:'';
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-row wow fadeInUp" data-wow-duration="2s" data-wow-delay="<?php echo ($i!==0)?($i/2).'s':"";?>">
                                <div class="col-content col-content-<?php echo $i;?>">
                                    <div class="description">
                                        <?php echo $description; ?>
                                    </div>
                                </div>
                            </div>
                        <?php   
                        endforeach;
                    ?>
                </div>
                <div class="logo-content">
                    <div class="row">
                        <?php
                            $LogoGroup = get_field('section_connections',$id)['group_logo'];
                            $i = 0;
                            foreach($LogoGroup as $item):
                                $i++;
                                $Logo = $item['image_logo']?$item['logo_contact']['url']:DF_IMAGE. '/noimage.png';
                                ?>
                                <div class="col-lg-3 col-md-4 col-4 img-logo img-logo-<?php echo $i;?> wow fadeInUp" data-wow-duration="2s" data-wow-delay="<?php echo ($i!==1)?($i/4)."s":"";?>">
                                    <img src="<?php echo $Logo; ?>" alt="LOGO">
                                </div>
                            <?php   
                            endforeach;
                        ?>
                    </div>                   
                </div>
            </div>
        </div>
    </section>
    <!-- section testimonials -->
    <?php do_action( 'testimonial');?>
    <!-- ###section testimonials -->
    <section class="section sec-our-work-culture">
        <div class="col-header-banner">
            <img src="<?php echo get_field('section_our_work',$id)['image_top']?get_field('section_our_work',$id)['image_top']['url']:DF_IMAGE. '/noimage_1498x998.png'; ?>" alt="image-banner">
        </div>
        <div class="container">
            <div class="content">
                <div class="col-header">
                    <h4 class="title-h4 sec-our-work-culture--title wow fadeIn" data-wow-duration="2s"><?php  echo get_field('section_our_work',$id)['group_content']['title']; ?></h4>
                </div>
                <div class="col-body">
                    <div class="cont-text wow fadeInUp" data-wow-duration="3s">
                        <?php $SecOurWork = get_field('section_our_work',$id); ?>
                        <div class="description"><?php  echo $SecOurWork['group_content']['description']?$SecOurWork['group_content']['description']:""; ?></div>
                        <a href="<?php  echo $SecOurWork['group_content']['link_access']['url']; ?>" class="sec-link--learn-more-about-our-work wow fadeInUp" data-wow-duration="2s"data-wow-delay="1s">
                            <?php  echo $SecOurWork['group_content']['link_access']['title']; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section sec-advertisement">
        <div class="container">
        <?php $SecAvertisement = get_field('section_addvertisement',$id);?>
            <div class="col-content">
                <div class="description wow fadeInUp" data-wow-duration="2s"><?php echo $SecAvertisement['description_1'];?></div>
                <a href="<?php  echo $SecAvertisement['link_access']['url']; ?>" class="sec-link--learn-more wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">
                    <?php echo $SecAvertisement['link_access']['title']; ?>
                </a>
            </div>         
        </div>
        <div class="image-description">
            <img src="<?php echo $SecAvertisement['image_description']?$SecAvertisement['image_description']['url']:DF_IMAGE. '/noimage.png';?>" alt="image-description">
        </div>
        <div class="container">
            <div class="last-content ">
                <h4 class="title-h4 sec-advertisement--title wow fadeInUp" data-wow-duration="2s"><?php echo $SecAvertisement['title']?$SecAvertisement['title']:"";?></h4>
                <div class="description wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s"><?php echo $SecAvertisement['description_2']?$SecAvertisement['description_2']:"";?></div>
                <a href="<?php  echo $SecAvertisement['link_access_discover']['url']; ?>" class="sec-link-discover wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s"><?php echo $SecAvertisement['link_access_discover']['title']; ?></a>
            </div>  
        </div>
    </section>
</main>
<?php get_footer();