<?php

get_header();
?>

	<div class="error_404_page">
		<section class="section sec_error">
			<div class="container">
				<div class="content">
					<div class="notfound-404">
						<h3 class="title-h3 wow fadeInUp" data-wow-duration="s">Oops! Page not found</h3>
						<div class="wow wobble" data-wow-duration="1s" data-wow-delay="3s" style="height: 100%">
                            <h1 class="title-h1">
							    <span class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">4</span>
							    <span class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">0</span>
							    <span class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.5s">4</span>
						    </h1>
                        </div>
					</div>
					<h2 class="title-h2 wow fadeInUp" data-wow-duration="2s" data-wow-delay="2s">We are sorry, But the page you requested was not found.</h2>
					<a href="<?php echo home_url(); ?>" class="back-to-home-page wow fadeInUp" data-wow-duration="2s" data-wow-delay="2.5s">Back to home</a>
				</div>
			</div>
		</section>
	</div>
	<style>
		.error_404_page {padding-top: 300px;padding-bottom: 200px; }
		.error_404_page .content {	text-align: center; }
		.error_404_page .content .notfound-404 {position: relative;	height: 250px; }
		.error_404_page .content .notfound-404 .title-h3 {
			position: relative;
			font-size: 16px;
			font-weight: 700;
			text-transform: uppercase;
			color: white;
			margin: 0px;
			letter-spacing: 3px;
			padding-left: 6px; 
		}
		.error_404_page .content .notfound-404 .title-h1 {
			font-family: 'Montserrat', sans-serif;
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			font-size: 252px;
			font-weight: 900;
			margin: 0px;
			/* color: white; */
			color: #0b6260 ;
			text-transform: uppercase;
			letter-spacing: -62px;
			margin-left: -20px; 
		}
		.error_404_page .content .notfound-404 .title-h1 span {
			text-shadow: -8px 0px 0px #fff; 
		}
		.error_404_page .content .title-h2 {
			font-size: 20px;
			font-weight: 400;
			text-transform: uppercase;
			color: white;
			margin-top: 0px;
			margin-bottom: 25px;
			max-width: 590px;
			margin: auto; 
			margin-bottom: 30px;
		}
        .back-to-home-page {
            min-width: 111px;
            height: 42px ;
            background-color: #0b6260 ;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            line-height: 1.94;
            letter-spacing: 0.33px;
            color: #ffffff ;
            margin-bottom: 0 ;
            transition: all .3s ease-in-out;
            padding: 10px 20px;
        }
        .back-to-home-page:hover{
            color: #0b6260 ;
            background-color: white;
        }
		@media only screen and (max-width: 768px){
			.error_404_page {padding-top: 180px;padding-bottom: 120px;}
			.error_404_page .content .notfound-404 {height: 150px; }
			.error_404_page .content .notfound-404 .title-h3 {font-size: 14px; }
			.error_404_page .content .notfound-404 .title-h1 {font-size: 108px;	letter-spacing: -27px; }
			.error_404_page .content .notfound-404 .title-h1 span {	text-shadow: -4px 0px 0px #fff; }
			.error_404_page .content .title-h2 {font-size: 18px; }

		}

	</style>
<?php
get_footer();
