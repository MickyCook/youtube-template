<?php
/*
 *
 *
 * Template Name: Media1
 *
 */
?>
<?php get_header(); ?>
<div class="container-bg">
	<div class="page-container-bg">
    	<div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                	<div class="page-overview">
                		<?php the_content(); ?>
                	</div>
					<div class="text-center"><!-- DO NOT REMOVE THIS WRAPPER! -->
						<?php if( have_rows('media') ) : while( have_rows('media') ) : the_row(); ?>
							<?php
							//This gets the ID from the string
							$url = get_sub_field('youtube_url');
							preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $code);
							?>
						<iframe class="hidden video-display" src="http://www.youtube.com/embed/<?php echo $code[1]; ?>?autoplay=0"></iframe>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<!-- Video Thumnails-->
					<div class="thumbnail-container clearfix"><!-- DO NOT REMOVE THIS WRAPPER! -->
						<?php if( have_rows('media') ) : while( have_rows('media') ) : the_row(); ?>
							<?php
							//This gets the ID from the string
							$url = get_sub_field('youtube_url');
							preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $code);
							//Now that we have the id lets pull the thumbnail image
							$thumbnail = "http://img.youtube.com/vi/".$code[1]."/0.jpg";
							//We need the title as well
							$content = file_get_contents("http://youtube.com/get_video_info?video_id=".$code[1]);
							parse_str($content, $ytarr);
							// Annd the title
							$title =  $ytarr['title'];
							?>
						<div class="col-md-6 single-thumbnail"><!-- individual thumb wrapper, do not remove-->
							<div class="thumbnail-wrapper clearfix">
								<div class="thumbnail-img-wrapper">
									<img class="video-thumbnail" src="<?php echo $thumbnail ?>" alt="">
								</div>
								<div class="content-wrapper">
									<p class="video-title"><?php echo $title; ?></p>
									<hr>
									<a class="video-toggle" href="#"><i class="fa fa-play-circle"></i>Play Video</a>
								</div>
							</div>
						</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
                </main><!-- .site-main -->
            </div><!-- .content-area -->
    	</div><!-- container -->
	</div><!-- page container bg -->
</div><!-- container bg -->
<?php get_footer(); ?>