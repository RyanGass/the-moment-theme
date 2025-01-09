<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;


add_action( 'carbon_fields_register_fields', 'theme_custom_blocks' );
function theme_custom_blocks() {
    Block::make( __( 'Block Template' ) )
    ->add_fields( array(
        Field::make('text', 'block_field', 'Field Label'), // add block fields
    ) )
    ->set_category( 'custom_blocks', __( 'Custom Blocks' ), 'block' ) // section where block will display
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) { // block HTML
        ?>
        
        <section id="feature-block-container" <?php if ($fields['section_bg_image']) { echo 'style="background-image:url('. $fields['section_bg_image'] .')"'; } else {echo 'nope';}; ?>>
        <p><?php echo esc_html( $fields['block_field'] ); ?></p>
        </section>

        <?php
    } );

    Block::make( __( 'Video Embed' ) )
	->add_fields( array(
        Field::make( 'separator', 'video_embed_heading', 'Video Embed' ),
        Field::make('radio_image', 'section_style', 'Choose Style')
            ->add_options(array(
                'style-one' => '/wp-content/uploads/2023/12/video-block.png',
            )),
        Field::make( 'file', 'video_url', 'Video URL' )
        ->set_value_type( 'url' ),
        Field::make( 'image', 'video_screenshot_url', __( 'Video Screenshot' ) )
        ->set_value_type( 'url' ),
	) )
    ->set_category( 'custom_blocks', __( 'Custom Blocks' ), 'block' )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		$video_url = $fields['video_url'];
        $video_img = $fields['video_screenshot_url'];   
        ?>
        <style>
            .video-container {
                border: 10px solid #fff;
                border-radius: 1vw;
                box-shadow: 0 0 15px #aaa;
                overflow: hidden;
                position: relative;
            }

            .video {
            width: 680px;
            }

            .play-button-wrapper {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
            }

            .play-button {
            
            opacity: 0.95;
            }

            .play-button:before {
           
            }

            .paused {
                opacity: 0;
            }

        </style>
        <section id="video-embed-container">
            
            <div class="video-container">
                <video class="video" id="video" loop controls poster="<?php echo $video_img; ?>">
                <source src="<?php echo $video_url; ?>" type="video/mp4">
                Your browser does not support the video tag.
                </video>
                <div class="play-button-wrapper" onclick="playPause()">
                    <span id="pb-inner-wrapper" class="inner-wrapper">
                        <span id="play-button" class="play-button triangle"></span>
                    </span>
                </div>
            </div>

        </section>
        <script>
            var video = document.getElementById("video");

            function playPause() {
                console.log('clicked');
                var el = document.getElementById("play-button");
                var pb = document.getElementById('pb-inner-wrapper');
                if (video.paused) {
                    console.log('play');
                    video.play();
                    el.className ="play-button triangle paused";
                    pb.className = "paused inner-wrapper";
                } else {
                    console.log('pause');
                    video.pause();
                    el.className = "play-button triangle";
                    pb.className = "inner-wrapper";
                }
            }

            video.addEventListener("click", playPause, false);
        </script>

		<?php
	} );
}

