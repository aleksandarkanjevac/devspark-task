<?php

function devspark_acf_blocks_init(){
   if (function_exists('acf_register_block_type')) { 
      // Register a text/image block.
      acf_register_block_type(array(
         'name'              => 'text-image',
         'title'             => __('Text/Image Block'),
         'description'       => __('Text/Image Block element.'),
         'render_template'   => 'template-parts/blocks/text-image.php',
         'category'          => 'devspark',
         'icon'              => 'superhero',
         'keywords'          => ['image', 'text']
      ));
   }
}

add_action('acf/init', 'devspark_acf_blocks_init');