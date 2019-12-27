<?php
/* Template Name: Services */

get_header();
?>
<main class="services--page">
    <!-- baner top -->
    <?php 
    if($banner = get_field('banner_top')):
        $image = $banner['image']?$banner['image']['url']:DF_IMAGE. '/noimage.png';
        $imageAlt = $banner['image']?$banner['image']['title']:DF_IMAGE. 'noimage';
    ?>
    <section class="banner-top">
        <div class="container">
            <h1 class="title-h1 f_medium f-s-50 f-w-500 color-b wow fadeInUp"><?php if($title = $banner['title']) echo $title;?></h1>
        </div>
        <div class="banner-image image-scroll">
            <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="baner-img">
        </div>
    </section>
    <?php
    endif;    
    ?>
    <!-- sec service -->
    <?php
    if($secService = get_field('sec_our_services')):
    ?>
    <section class="sec-service">
        <div class="container">
            <?php
            if($title = $secService['title'])
                echo '<h3 class="title f-s-18 wow fadeInUp">'.$title.'</h3>';
            if($desList = $secService['description_list']):
                $des1 = array();
                $des2 = array();
                foreach($desList as $key=>$value)
                    if($key < 2)
                        array_push($des1,$value);
                    else
                        array_push($des2,$value);
            endif;
            //sv des1
            if(count($des1)!=0):
                ?>
                <div class="description-row1">
                <?php
                foreach ($des1 as $key => $item)
                    if($description = $item['description'])
                        echo '<div class="description f_g_w f-s-21 wow fadeInUp">'.$description.'</div>';
                ?>
                </div>
                <?php
            endif;
            //sv image
            $image = $secService['image']?$secService['image']['url']:DF_IMAGE. '/noimage.png';
            $imageAlt = $secService['image']?$secService['image']['title']:'noimage';
            ?>
            <div class="sv-image image-scroll">
                <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="sv-img">
            </div>
            <?php
            //sv des2
            if(count($des2)!=0):
                ?>
                <div class="description-row2">
                <?php
                foreach ($des2 as $key => $item)
                    if($description = $item['description'])
                        echo '<div class="description f_g_w f-s-21 wow fadeInUp">'.$description.'</div>';
                ?>
                </div>
                <?php
            endif;
            ?>
        </div>
    </section>
    <?php
    endif;
    ?>
    <!-- sec content -->
    <?php
    if($secAdd = get_field('sec_content')):
    $count = count($secAdd);
    foreach($secAdd as $mKey=>$secContent):
        ?>
        <section class="sec-content color-b <?php if($mKey == 0) echo 'first';  if($mKey == $count-1) echo 'last';?>">
            <div class="container">
                <?php
                if($title = $secContent['title'])
                    echo '<h4 class="title f_bold f-s-45 f-w-b wow fadeInUp">'.$title.'</h4>';
                if($subTitle = $secContent['sub_title'])
                    echo '<h5 class="sub-title f_medium f-s-20 f-w-500 wow fadeInUp">'.$subTitle.'</h5>';
                ?>
                <div class="content-row">
                <?php
                if($contentList = $secContent['content_list'])
                foreach($contentList as $item):
                    $image = $item['image']?$item['image']['url']:DF_IMAGE. '/noimage.png';
                    $imageAlt = $item['image']?$item['image']['title']:'noimage';
                    ?>
                    <div class="content-item">
                        <div class="text-content">
                            <h6 class="ct-title f_medium f-s-16 f-w-500 wow fadeInUp"><?php if($title = $item['title']) echo $title;?></h6>
                            <div class="ct-description f_g_w f-s-16 wow fadeInUp" data-wow-delay="0.2s"><?php if($description = $item['description']) echo $description;?></div>
                        </div>
                        <div class="ct-image image-scroll">
                            <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="ct-img">
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
                </div>
            </div>
        </section>
        <?php
    endforeach;
    endif;
    ?>
    <!-- sec add content -->
    <?php
    if($secAdd = get_field('add_content')):
    ?>
    <section class="sec-add">
        <div class="container">
            <div class="add-content">
                <div class="col-text">
                    <?php
                    $titleImage = $secAdd['title_image']?$secAdd['title_image']['url']: DF_IMAGE. '/noimage.png';
                    $titleImageAlt = $secAdd['title_image']?$secAdd['title_image']['title']:'noimage';
                    $image = $secAdd['image']?$secAdd['image']['url']: DF_IMAGE. '/noimage.png';
                    $imageAlt = $secAdd['image']?$secAdd['image']['title']:'noimage';
                    ?>
                    <div class="title-image wow fadeInUp">
                        <img src="<?php echo $titleImage;?>" alt="<?php echo $titleImageAlt;?>" class="title-img">
                    </div>
                    <?php
                    if($description = $secAdd['description'])
                        echo '<div class="description f_g_w f-s-21 wow fadeInUp">'.$description.'</div>';
                    if($link = $secAdd['link']['title']):
                        $linkUrl = $secAdd['link']['url']?$secAdd['link']['url']:"#";
                        echo '<a href="'.$linkUrl.'" class="link f_p_medium f-s-14 f-w-500 wow fadeInUp">'.$link.'</a>';
                    endif;
                    ?>
                </div>
                <div class="col-image">
                    <div class="image image-scroll">
                        <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    endif;
    ?>
</main>
<?php get_footer();