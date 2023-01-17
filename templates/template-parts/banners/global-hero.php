<?php
// Variables
$page_id = get_queried_object_id(); // Get the actual page id, not the id of the first post in the loop
$show_hero = carbon_get_post_meta( $page_id, 'show_hero' );
$alignment = carbon_get_post_meta( $page_id, 'alignment' );
$heading = carbon_get_post_meta( $page_id, 'heading' );
$content = carbon_get_post_meta( $page_id, 'content' );
$button_text = carbon_get_post_meta( $page_id, 'button_text' );
$button_url = carbon_get_post_meta( $page_id, 'button_url' );
$show_right_image = carbon_get_post_meta( $page_id, 'show_right_image' );
$right_image = carbon_get_post_meta( $page_id, 'right_image' );
$imageID = attachment_url_to_postid( $right_image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$bg_image = carbon_get_post_meta( $page_id, 'bg_image' );
$bg_overlay = carbon_get_post_meta( $page_id, 'use_bg_overlay');
$bg_theme = carbon_get_post_meta( $page_id, 'bg_theme');

// Conditional Logic
if ($alignment == 'center' && $show_right_image == 'no' || is_category() || is_single() || is_page_template('templates/page-chapters.php')) : 
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
          elseif ( !empty($heading) && !is_single() ) : echo $heading; 
          else : the_title();
          endif;
          ?></h1>
          <?php if (is_page_template('templates/page-chapters.php')) : ?>
            <div id="social-sharing-inner" class="social-sharing-wrapper lg:block" style="position: relative; top: 0px;">
              <p>SHARE THIS</p>
              <div class="flex lg:block social-icon-wrapper">
                <a class="share_facebook" title="facebook" target="popup" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Facebook Share','width=600,height=400')"><img src="/wp-content/uploads/2022/10/facebook-f.svg" /></a>
                <a class="share_twitter" title="twitter" target="popup" onclick="window.open('https://twitter.com/home?status=The Future of an On-the-Go Workforce That Utilizes Plumbing Dispatch Software+<?php the_permalink(); ?>','Twitter Share','width=600,height=400')"><img src="/wp-content/uploads/2022/10/twitter.svg" /></a>
                <a class="share_linkedin" title="linkedin" target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>','LinkedIn Share','width=600,height=400')"><img src="/wp-content/uploads/2022/10/linkedin-in.svg" /></a>
              </div>
            </div>
          <?php endif; ?>
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
      <div id="banner-right" class="items-center justify-end hidden text-right lg:flex h-fit lg:basis-6/12 ">
      <?php if ($right_image) : ?>  
      <img src="<?php echo $right_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" class="float-right" />
      <?php endif; ?>
      </div>
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