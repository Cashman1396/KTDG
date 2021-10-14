<?php get_header() ?>



<div id="hero">

<div class="hero-text">
 <h2><?php the_field('hero_headline'); ?></h2>
</div>
<div class="hero-image">
 <?php

 $hero = get_field('hero_image');

 if ( $hero ): ?>

<style>
		#hero {
			background-image: url(<?php echo $hero; ?>);
            background-repeat: no-repeat;
            margin-left: 2%;
		}
</style>

<?php endif; ?>
</div>



    
</div>



</div>



</div>













<?php get_footer() ?>