<?php

/**
 * DevSpark Tex/Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'devspark-text_image' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'devspark-text_image';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Block background type - color || gradient
$block_background = (get_field('text_image_background_type')) ? (get_field('text_image_background_type')) : false;

if($block_background) :
  switch ($block_background) :
    case 'color':
        $background_color = get_field('text_image_background_color');
        $background = ($background_color) ? 'background:'.$background_color.'' : 'background:#fff';
        break;
    case 'gradient':
        $background_gradient = get_field('text_image_background_color_gradient');
        $background_first_color = $background_gradient['first_gradient_color'] ? $background_gradient['first_gradient_color'] : '#fff';
        $background_second_color = $background_gradient['second_gradient_color'] ? $background_gradient['second_gradient_color'] : '#fff';
        $background_gradient_angle = $background_gradient['gradient_angle'] ? $background_gradient['gradient_angle'] : '90';
        $background = 'background:linear-gradient('.$background_gradient_angle.'deg,'.$background_first_color.'  0%, '.$background_second_color.' 100%)';
        break;
    default:
        $background = 'background:#fff';
        break;
  endswitch;
endif;

$block_layout = get_field('text_image_block_layout');
$block_breakpoint_class = (get_field('text_image_block_mobile_breakpoint')) ? get_field('text_image_block_mobile_breakpoint') : '';
$block_responsive_layout = (get_field('text_image_block_responsive_layout')) ? get_field('text_image_block_responsive_layout') : '';
?>
  <div style="<?php echo $background; ?>" class="container">
    <div class="container-narrow">
      <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className).' '.esc_attr($block_layout).' '.$block_breakpoint_class.' '.$block_responsive_layout ?> ">
        <div class="devspark-text_image-text">
          <?php if(get_field('text_image_title')) : ?>
            <h2 style = "<?php echo ( get_field('text_image_title_text_color'))  ? 'color:'.get_field('text_image_title_text_color').'' : '#020202'; ?>" class="devspark-title"><?php the_field('text_image_title'); ?></h2>
          <?php endif; ?>
          <?php if(get_field('text_image_description')) :?>
            <div style = "<?php echo ( get_field('text_image_description_text_color'))  ? 'color:'.get_field('text_image_description_text_color').'' : 'color:#4A4A4A'; ?>" class="devspark-description <?php echo ( get_field('text_image_description_text_color') !== '#4A4A4A')  ? 'custom-color' : ''; ?>"><?php the_field('text_image_description'); ?></div>
          <?php endif; ?>
          <?php 
            $cta_link = get_field('text_image_cta');
            $cta_background_color = (get_field('text_image_cta_background_color')) ? get_field('text_image_cta_background_color') : '#fff';
            $cta_text_color = get_field('text_image_cta_text_color') ? get_field('text_image_cta_text_color') : '#4A4A4A';
            if( $cta_link ): 
                $cta_link_url = $cta_link['url'];
                $cta_link_title = $cta_link['title'];
                $cta_link_target = $cta_link['target'] ? $link['target'] : '_self';
                ?>
                <a style="background-color:<?php echo $cta_background_color; ?>; color:<?php echo $cta_text_color; ?>" class="button cta-button" href="<?php echo esc_url( $cta_link_url ); ?>" target="<?php echo esc_attr( $cta_link_target ); ?>"><?php echo esc_html( $cta_link_title ); ?></a>
          <?php endif; ?>
        </div>
        <div class="devspark-text_image-image">
          <?php 
          $image = get_field('text_image_image');
          if($image) : ?>
            <div style="background-image: url(<?php echo $image['url'] ?>)" class="image"></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

     
