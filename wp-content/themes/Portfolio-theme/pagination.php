<?php
function drex_pagination($pages = '', $range = 2)
{ 
 $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
        echo "
		<div class='clear'></div><div class='col-md-12 mt-5'>
		    
               <ul class='pagination float-right'>";
          echo "<li class='page-item'><a aria-label='Previous' class='page-link c-btn  inverse' href='".get_pagenum_link(1)."'><span>Previous</span></a></li>";
         
        for ($i=1; $i <= $pages; $i++)
        {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo esc_attr(($paged == $i))? "<li class='page-item'><a class='page-link c-btn  inverse active'><span>".$i."</span></a></li>":"<li class='page-item'><a class='page-link c-btn  inverse' href='".get_pagenum_link($i)."'><span>".$i."</span></a></li>";
             }
        }

        echo "<li class='page-item'><a aria-label='Next' class='page-link c-btn  inverse' href='".get_pagenum_link($pages)."'><span>Next</span></a></li>";

        echo "</ul></div><div class='clear'></div><div class='inner-divider'></div>\n";
     }
}
?>