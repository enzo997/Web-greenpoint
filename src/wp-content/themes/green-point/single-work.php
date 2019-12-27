<?php
get_header();
$post = get_queried_object();

?>
    <main class="single---work" id="single---work">
        <!-- banner top -->
        <?php
        if($banner = get_field('banner_top')):
            $image = $banner['image']?$banner['image']['url']:DF_IMAGE. '/noimage.png';
            $imageAlt = $banner['image']?$banner['image']['title']:'noimage';
        ?>
        <section class="banner-top">
            <div class="container">
                <?php 
                if($title = $banner['title'])
                    echo '<h1 class="title-h1 f_medium f-s-50 f-w-500 color-b wow fadeInUp">'.$title.'</h1>';
                ?>
            </div>
            <div class="image image-scroll">
                <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="banner-image">
            </div>
        </section>
        <?php
        endif;
        ?>
        <!-- sec tip -->
        <?php
        if($secTip = get_field('sec_tipple')):
        ?>
        <section class="sec-tip">
            <div class="container">
                <?php
                if($title = $secTip['title'])
                    echo '<h4 class="title-h4 f-s-18 wow fadeInUp">'.$title.'</h4>';   
                ?>
                <div class="row">
                    <div class="description f_medium f-s-34 f-w-500 wow fadeInUp"><?php if($description = $secTip['description']) echo $description;?></div>
                    <div class="tax-list f-s-18">
                        <?php
                        //cat
                        if($cats = get_the_terms($post->ID,'categories_work')):
                        ?>
                            <div class="category">
                                <h5 class="title-h5 f-w-b wow fadeInUp">Category</h5>
                                <ul class="cat-list">
                                    <?php
                                    foreach($cats as $key=>$cat)
                                        echo '<li class="wow fadeInUp" data-wow-delay="'.($key+1)*0.5 .'s">—<span>'.$cat->name.'</span></li>';
                                    ?>
                                </ul>
                            </div>
                        <?php
                        endif;
                        //services
                        if($sers = get_the_terms($post->ID,'services_work')):
                        ?>
                            <div class="services">
                                <h5 class="title-h5 f-w-b wow fadeInUp">Services</h5>
                                <ul class="ser-list">
                                    <?php
                                    foreach($sers as $key=>$ser)
                                        echo '<li class="wow fadeInUp" data-wow-delay="'.($key+1)*0.5 .'s">—<span>'.$ser->name.'</span></li>';
                                    ?>
                                </ul>
                            </div>
                        <?php
                        endif;
                        //collab
                        if($cols = get_the_terms($post->ID,'collaborators_work')):
                        ?>                        
                            <div class="collab">
                                <h5 class="title-h5 f-w-b wow fadeInUp">Collaborators</h5>
                                <ul class="collab-list">
                                    <?php
                                    foreach($cols as $key=>$col)
                                        echo '<li class="wow fadeInUp" data-wow-delay="'.($key+1)*0.5 .'s">—<span>'.$col->name.'</span></li>';
                                    ?>
                                </ul>
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
        endif;
        ?>
        <!-- sec content 1 -->
        <?php
        if($secContent1 = get_field('sec_content_1')):
            $image = $secContent1['image']?$secContent1['image']['url']:DF_IMAGE. '/noimage.png';
            $imageAlt = $secContent1['image']?$secContent1['image']['title']:'noimage';
        ?>
        <section class="sec-content1">
            <div class="container">
                <?php
                if($description = $secContent1['description'])
                    echo '<div class="description f_g_w f-s-16 color-b wow fadeInUp">'.$description.'</div>';
                ?>
                <div class="image image-scroll">
                    <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="big-image">
                </div>
            </div>
        </section>
        <?php
        endif;
        ?>
        <!-- sec content 2 -->
        <?php
        if($secContent2 = get_field('sec_content_2')):
        ?>
        <section class="sec-content2">
            <div class="container">
                <div class="content">
                    <?php
                    if($title = $secContent2['title'] )
                        echo '<h4 class="title-h4 f_medium f-s-20 f-w-500 color-b wow fadeInUp">'.$title.'</h4>';
                    if($description = $secContent2['description'])
                        echo '<div class="description f_g_w f-s-16 color-b wow fadeInUp">'.$description.'</div>';
                    ?>
                </div>
                <div class="row two-image">
                    <?php
                    if($twoImage = $secContent2['two_image'])
                        for ($i=0; $i < 2; $i++) { 
                            $image = $twoImage[$i]?$twoImage[$i]['url']:DF_IMAGE. '/noimage.png';
                            $imageAlt = $twoImage[$i]?$twoImage[$i]['title']:'noimage';
                            echo '<div class ="image"><div class="image-scroll"><img src="'.$image.'" alt="'.$imageAlt.'" class="image'.$i.'"></div></div>';
                        }
                    ?>
                </div>
            </div>
        </section>
        <?php
        endif;
        ?>
        <!-- sec content 3 -->
        <?php
        if($secContent3 = get_field('sec_content_3')):
            $image = $secContent3['image']?$secContent3['image']['url']:DF_IMAGE. '/noimage.png';
            $imageAlt = $secContent3['image']?$secContent3['image']['title']:'noimage';
        ?>
        <section class="sec-content3">
            <div class="image image-scroll">
                <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="big-image">
            </div>
            <div class="container">
                <?php
                if($title = $secContent3['title'])
                    echo '<h4 class="title-h f_medium f-s-20 f-w-500 wow fadeInUp">'.$title.'</h4>';
                if($description = $secContent3['description'])
                    echo '<div class="description row f_g_w f-s-16 wow fadeInUp">'.$description.'</div>';
                ?>  
            </div>
        </section>
        <?php
        endif;
        ?>
        <!-- sec slider -->
        <?php
        if($secSlider = get_field('sec_slider')):
            $image = $secSlider['image']?$secSlider['image']['url']:DF_IMAGE. '/noimage.png';
            $imageAlt = $secSlider['image']?$secSlider['image']['title']:'noimage';
        ?>
        <section class="sec-slider color-b">
            <div class="container">
                <div class="image image-scroll">
                    <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="big-image">
                </div>
                <?php
                if($slider = $secSlider['slider_content']):
                ?>
                <div class="slider">
                    <div class="slider-container">
                    <?php
                    foreach($slider as $key=>$item):
                    ?>
                        <div class="slider-member">
                            <div class="slider-content">
                                <h4 class="title-h4 f_medium f-s-20 f-w-500 wow fadeInUp">
                                    <?php if($title = $item['title']) echo $title;?>
                                </h4>
                                <div class="description f-s-16 wow fadeInUp">
                                    <?php if($description = $item['description']) echo $description;?>
                                </div>
                                <div class="info f-s-12 wow fadeInUp">
                                    <?php
                                    if($client = $item['client'])
                                        echo '<h6 class="client f-w-b">Client: <span class="f-w-n">'.$client.'</span> </h6>';
                                    if($web = $item['website'])
                                        echo '<h6 class="web f-w-b">Website: <span class="f-w-n">'.$web.'</span> </h6>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    </div>
                    <div class="slick-custom">
                        <div class="slider-arrows banner-arrows">
                            <button class="pre"><i class="fas fa-angle-left"></i></button>
                            <button class="next"><i class="fas fa-angle-right"></i></button>
                        </div>
                        <div class="slider-dots">
                            <span class="c-dots"></span>
                        </div>
                    </div>
                </div>
                <?php
                endif;
                ?>
            </div>
        </section>
        <?php
        endif;
        ?>
        <!-- sec results -->
        <?php
        if($secResult = get_field('sec_results')):
        ?>
        <section class="sec-result color-b ">
            <div class="container">
                <?php
                if($title = $secResult['title'])
                    echo '<h4 class="title-h4 f_medium f-s-20 f-w-500 wow fadeInUp">'.$title.'</h4>';
                ?>
                <div class="row list-content">
                    <?php
                    if($contents = $secResult['result_content']):
                    foreach ($contents as $key => $content):
                        $image = $content['image']?$content['image']['url']:DF_IMAGE. '/noimage.png';
                        $imageAlt = $content['image']?$content['image']['title']:'noimage';
                    ?>
                        <div class="content col-4">
                            <img src="<?php echo $image;?>" alt="<?php echo $imageAlt;?>" class="content-image">
                            <?php
                            if($title = $content['title'])
                                echo ' <h5 class="content-title f_medium f-s-20 f-w-500 wow fadeInUp">'.$title.'</h5>';
                            if($description = $content['description'])
                                echo '<p class="content-description f_g_w f-s-16 wow fadeInUp">'.$description.'</p>';
                            ?>
                        </div>
                        <?php
                    endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <?php endif;?>
        <!-- sec post -->
        <section class="sec-other-post">
            <div class="container">
                <h4 class="title-h4 f-s-18">—Other Case Studies</h4>
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
                        <div class="post-member col-lg-6 col-12">
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
<?php
get_footer();