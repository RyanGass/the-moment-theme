<?php
// Variables
$page_id = get_queried_object_id(); // Get the actual page id, not the id of the first post in the loop
$show_hero = carbon_get_post_meta( $page_id, 'show_hero' );
$alignment = carbon_get_post_meta( $page_id, 'alignment' );
$heading = carbon_get_post_meta( $page_id, 'heading' );
$content = carbon_get_post_meta( $page_id, 'content' );
$button_text = carbon_get_post_meta( $page_id, 'button_text' );
$button_url = carbon_get_post_meta( $page_id, 'button_url' );
$right_image = carbon_get_post_meta( $page_id, 'right_image' );
$imageID = attachment_url_to_postid( $right_image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$bg_image = carbon_get_post_meta( $page_id, 'bg_image' );
$bg_overlay = carbon_get_post_meta( $page_id, 'use_bg_overlay');
$bg_theme = carbon_get_post_meta( $page_id, 'bg_theme');
$video_url = carbon_get_post_meta( $page_id, 'video_url');
$vimeo_id = carbon_get_post_meta( $page_id, 'vimeo_id');
$youtube_id = carbon_get_post_meta( $page_id, 'youtube_id');
$form_type = carbon_get_post_meta( $page_id, 'form_type');
$form_title = carbon_get_post_meta( $page_id, 'form_title');
$content_type = carbon_get_post_meta( $page_id, 'right_content_option');
$mkto_form_id = carbon_get_post_meta( $page_id, 'mkto-form-id');
$mkto_account_id = carbon_get_post_meta( $page_id, 'mkto-account-id');
$gf_form_id = carbon_get_post_meta( $page_id, 'gf-form-id');
$cf7_form_id = carbon_get_post_meta( $page_id, 'cf-7-form-id');

// Conditional Logic
if ($alignment == 'center' && $content_type == 'none' || is_category() || is_single() || is_home() || is_page_template('templates/page-chapters.php')) : 
    $mx_auto = 'mx-auto';
    $text_center = ' text-center';
    $items_center = ' items-center';
endif;

// BG Overlay
if ($bg_overlay == 'yes') { $use_overlay = ' overlay'; } else { $use_overlay = ''; }
// Text Color
if ($bg_theme == 'light') { $light_text = ' light-text'; } else { $light_text = ''; }
?>

<section id="banner" class="global-banner<?php echo $use_overlay . $light_text ?>">
    <div class="flex items-center w-11/12 mx-auto banner-area max-w-screen-2xl<?php if (isset($text_center)) { echo $text_center; } ?>">  
      <div id="banner-left" class="flex flex-col justify-center basis-full lg:basis-7/12<?php if (isset($items_center)) { echo $items_center; } ?>">    
          <h1 class="w-full <?php if(isset($mx_auto)) { echo $mx_auto; } ?>">
          <?php  
          if( is_category() ) : single_term_title();
          elseif ( is_search() ) : printf( esc_html__( 'Search Results for: %s', 'theme-name' ), get_search_query() );
          elseif ( is_404() ) : echo 'Hey hey, the page your looking for does not exist';
          elseif ( is_tag() ) : single_tag_title();
          elseif ( is_home() ) : echo 'Blog';
          elseif ( !empty($heading) && !is_single() ) : echo $heading; 
          else : the_title();
          endif;
          ?></h1>
          <?php if (is_single()) : $post_date = get_the_date('M j, Y') ?>
          <span id="post-date"><?php echo $post_date ?></span>
          <?php  endif; ?>
          <?php if ($content && !is_category()) : ?>
          <p class="w-fullmd:w-4/5 lg:w-3/5 description <?php if(isset($mx_auto)) { echo $mx_auto; } ?>"><?php echo $content ?></p>
          <?php endif; ?>
          <?php if ($button_url && !is_category()) : ?>
          <div class="flex items-center hero-buttons">
            <a href="<?php echo $button_url ?>" class="btn secondary<?php echo $light_text ?>"><?php echo $button_text ?></a> 
          </div>
          <?php endif; ?>
      </div>
      <?php if ($right_image) : ?>
        <div id="banner-right" class="items-center justify-end hidden text-right lg:flex h-fit lg:basis-6/12 ">
          <?php if ($content_type == 'image') : ?>
            <!-- Image -->
            <img src="<?php echo $right_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" class="float-right" />
          <?php endif; ?>

          <?php if ($content_type == 'video') : ?>
            <!-- Video -->
            <?php if ($video_url) : ?> 
              <div id="video-container" class="w-full hero-video"> 
                <div class="section-video">
                  <video class="responsive-iframe" controls>
                      <source src="<?php echo $video_url ?>" type="video/mp4">
                      Your browser does not support HTML video.
                  </video>
                </div>  
              </div>
            <?php endif; ?>

            <?php if ($vimeo_id) : ?> 
              <div id="video-container" class="w-full hero-video"> 
                <div class="section-video">
                  <iframe class="responsive-iframe" src="https://player.vimeo.com/video/<?php echo $vimeo_id ?>"></iframe>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if ($youtube_id) : ?>
              <div id="video-container" class="w-full hero-video"> 
                <div class="section-video">
                  <iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo $youtube_id ?>"></iframe>
                </div>
              </div>
            <?php endif; ?>

          <?php endif; ?>

          <?php if ($content_type == 'form') : ?>
            <!-- Form -->
            <?php if ($form_type == 'mkto') : ?>
                <div class="form-inner-wrapper w-11/12 mx-auto max-w-screen-2xl">
                    <h3 class="form-title"><?php echo $form_title ?></h3>
                    <script src="//<?php echo $mkto_account_id; ?>.mktoweb.com/js/forms2/js/forms2.min.js"></script> 
                    <form class="mktoForm" id="mktoForm_<?php echo $mkto_form_id; ?>"></form> <script>MktoForms2.loadForm("//<?php echo $mkto_account_id; ?>.mktoweb.com", "<?php echo $mkto_account_id; ?>", <?php echo $mkto_form_id; ?>);
                    </script>
                </div>
            <?php endif; ?>

            <?php if ($form_type == 'gravity') : ?>
                <div class="form-inner-wrapper w-11/12 mx-auto max-w-screen-2xl">
                    <h3 class="form-title"><?php echo $form_title ?></h3>
                    <?php echo do_shortcode('[gravityform id=" ' . $gf_form_id . ' " title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]') ?>
                </div>
            <?php endif; ?>

            <?php if ($form_type == 'cf7') : ?>
                <div class="form-inner-wrapper w-11/12 mx-auto max-w-screen-2xl">
                    <h3 class="form-title"><?php echo $form_title ?></h3>
                    <?php echo do_shortcode('[contact-form-7 id=" ' . $cf7_form_id . ' " title="Contact form 1"]') ?>
                </div>
            <?php endif; ?>

            <?php if ($form_type == 'embed') : ?>
                <div class="form-inner-wrapper w-11/12 mx-auto max-w-screen-2xl">
                    <h3 class="form-title"><?php echo $form_title ?></h3>
                    <?php echo $section['embed_code'] ?>
                </div>
            <?php endif; ?>

          <?php endif; ?>

        </div>
      <?php endif; ?>
    </div>
</section>

<?php if ($bg_image) : ?>
    <style>
    @media screen and (min-width: 64rem) {
        html #banner.global-banner {
            background: url(<?php echo $bg_image ?>) center no-repeat;
            background-size: cover;
        }
    }
    </style>
<?php endif; ?>