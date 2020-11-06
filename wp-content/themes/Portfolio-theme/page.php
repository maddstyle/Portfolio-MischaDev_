<?php $drex_options = get_option('drex'); ?>



         
		 <?php if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st2'){ ?> 
         <?php get_template_part('template-parts/page/one-page');?>
		 <?php }
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st3'){ ?> 
         <?php get_template_part('template-parts/page/full-page');?>
		 <?php }
		 
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st4'){ ?> 
         <?php get_template_part('template-parts/page/full-width');?>
		 <?php }
		 
		 else if(get_post_meta($post->ID,'rnr_wr_pagetype',true)=='st5'){ ?> 
         <?php get_template_part('template-parts/page/right-sidebar');?>
		 <?php }
		 
		 else  { ?>
		 <?php get_template_part('template-parts/page/default');?>
		 <?php }?>
       
      

 
<?php get_footer(); ?>	
