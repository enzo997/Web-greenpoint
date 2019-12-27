<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<script>
var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
</script>
<body <?php body_class(); ?> >
<div id="page">
    <header id="header" class="header-section">  
        <div class="container">
            <?php 
                $header = get_field('header','option');
                if(is_page_template(array('templates/home.php', 'templates/work.php')) || is_404() || (is_page() && !is_page_template()))
                    $mainLogo = $header['main_logo']['logo_white']?$header['main_logo']['logo_white']['url']:DF_IMAGE. '/logo-white.png';
                else
                    $mainLogo = $header['main_logo']['logo_black']?$header['main_logo']['logo_black']['url']:DF_IMAGE. '/logo-black.png';
                $mainLogoActive = $header['main_logo']['logo_white']?$header['main_logo']['logo_white']['url']:DF_IMAGE. '/logo-white.png';
                $mainLogoFixed = $header['main_logo']['logo_black']?$header['main_logo']['logo_black']['url']:DF_IMAGE. '/logo-black.png';
                //mobile
                $mainLogoActiveMobile = $header['main_logo']['logo_mobile_white']?$header['main_logo']['logo_mobile_white']['url']:DF_IMAGE. '/logo-mobile-white.png';
            ?>
            <div class="main-menu-bar">
                <a href="<?php echo get_home_url();?>" class="home-logo-link">
                    <img src="<?php echo $mainLogo;?>" alt="greenpoint logo" class="main-logo">
                </a>
                <a href="<?php echo get_home_url();?>" class="home-logo-link-active">
                    <img src="<?php echo $mainLogoActive;?>" alt="greenpoint logo" class="main-logo-active">
                </a>
                <a href="<?php echo get_home_url();?>" class="home-logo-link-fixed">
                    <img src="<?php echo $mainLogoFixed;?>" alt="greenpoint logo" class="main-logo-active">
                </a>
                <a href="<?php echo get_home_url();?>" class="home-logo-mobile-link-active">
                    <img src="<?php echo $mainLogoActiveMobile;?>" alt="greenpoint logo" class="main-logo-active">
                </a>
                <button class="menu-button"></button>
            </div>
            <div class="menu-full">
                <div class="container">
                    <div class="top-content">
                        <div class="main-menu">
                        <?php 
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'header_menu', 
                                    'menu_class' => 'header-menu',
                                ) 
                            );
                        ?>
                        </div>
                        <?php 
                        if($subLogo = $header['sub_logo']):
                            if($subLink = $subLogo['link']):
                                $subLogoUrl = $subLogo['logo']?$subLogo['logo']['url']:DF_IMAGE. '/noimage.png';
                        ?>
                                <a href="<?php echo $subLink;?>" class="ss-logo-link">
                                    <img src="<?php echo $subLogoUrl;?>" alt="sub logo menu" class="ss-logo">
                                </a>
                        <?php 
                            endif;
                        endif;
                        ?>
                    </div>
                    <?php /*
                    <div class="bottom-menu">
                        <div class="col-left">
                        <?php 
                        if($botMenu = get_field('footer','option')['author']):
                            if($copyR = $botMenu['copyright']):
                            foreach ($copyR as $key => $value):
                                ?>
                                <h5 class="copy-right"><?php echo $value['content'];?></h5>
                                <?php
                            endforeach;
                            endif;
                            if($design = $botMenu['design']['content']):
                                ?>
                                <h5 class="design"><?php echo $design;?>
                                    <?php
                                    if($link = $botMenu['design']['link']['title']):
                                        $linkUrl = $botMenu['design']['link']['url']?$botMenu['design']['link']['url']:'#';
                                        ?>
                                        <a href="<?php echo $linkUrl;?> " class="link-design"><?php echo $link;?></a>
                                        <?php
                                    endif;
                                    ?>
                                </h5>
                                <?php
                            endif;
                        endif;
                        ?>  
                        </div>
                        <div class="col-right social-menu">
                        <?php
                        if($social = get_field('footer','option')['social_menu']):
                            if($in = $social['linked_in']):
                                ?>
                                <a href="<?php echo $in;?>" class="link-in"><i class="fab fa-linkedin"></i></a>
                                <?php
                            endif;
                            if($ins = $social['instagram']):
                            ?>
                                <a href="<?php echo $ins;?>" class="link-ins"><i class="fab fa-instagram"></i></a>
                            <?php
                            endif;
                        endif;
                        ?> 
                        </div>
                    </div>
                    */?>
                </div>
            </div>     
        </div>
    </header>
    <div id="content">


