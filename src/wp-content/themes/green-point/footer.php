</div>
<footer id="site-footer">
    <div class="container footer-section">
        <div class="super-title">
            <div class="container">
                <div class="content">
                <?php
                if($select = get_field('st_display')):
                    if($select != 3):
                        if($select == 2)
                            $supertitle = get_field('st_custom')['super_title'];
                        else
                            $supertitle = get_field('footer','option')['super_title'];
                        if($subTitle = $supertitle['sub_title']['title'])
                            echo '<a href="'.$supertitle['sub_title']['url'].'" class="sub-title wow fadeInUp">'.$subTitle.'</a>';
                        if($title = $supertitle['title'])
                            echo '<h2 class="title wow fadeInUp">'.$title.'</h2>';
                        if($addLink = $supertitle['add_link']['title'])
                            echo '<a href="'.$supertitle['add_link']['url'].'" class="add-link wow fadeInUp">'.$addLink.'</a>';
                    endif;
                endif;
                ?>
                </div>
            </div>
        </div>
        <div class="footer-main">
            <?php
            if($footer = get_field('footer','option')):
                $logo = $footer['footer_logo']['logo']?$footer['footer_logo']['logo']['url']:DF_IMAGE. '/footer-logo.png';
            ?>
                <div class="row row-top">
                    <div class="col-md-6 col-left">
                        <a href="<?php echo get_home_url();?>" class="home-logo-link">
                            <img src="<?php echo $logo;?>" alt="greenpoint logo" class="footer-logo">
                        </a>
                    </div>
                    <div class="col-md-6 col-right">
                        <?php
                        if($title = $footer['title_menu']):
                        ?>
                            <h3 class="f-title-menu"><?php echo $title;?></h3>
                        <?php
                        endif;
                        //menu-footer
                            wp_nav_menu( 
                                array( 
                                    'theme_location' => 'footer_menu', 
                                    'menu_class' => 'footer-menu',
                                ) 
                            );
                        ?>
                    </div>
                </div>
                <div class="row row-bot">
                    <div class="col-md-6 col-left">
                    <?php 
                    if($botMenu = $footer['author']):
                        if($copyR = $botMenu['copyright']):
                        foreach ($copyR as $key => $value):
                            ?>
                            <h5 class="copy-right wow fadeInUp"><?php echo $value['content'];?></h5>
                            <?php
                        endforeach;
                        endif;
                        if($design = $botMenu['design']['content']):
                            ?>
                            <h5 class="design wow fadeInUp"><?php echo $design;?>
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
                    <div class="col-md-6 col-right">
                        <div class="adress-list">
                            <?php
                            if($adressList = $footer['adress']):
                                foreach ($adressList as $key => $value):
                                ?>
                                    <h5 class="adress wow fadeInUp"><?php if($adress = $value['content']) echo $adress;?></h5>
                                <?php
                                endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="social-menu">
                        <?php
                        if($social = $footer['social_menu']):
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
                </div>
            <?php 
            endif;
            ?>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>