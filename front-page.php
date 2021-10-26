<?php get_header() ?>

<!--- Kids Section ---->
<div class="kids-section">
	<h1>Kids</h1>

	<p>Lorem ipsum dolor sit amet, consetetur sadipscing <br>
	elitr, sed diam nonumy eirmod tempor invidunt ut <br>
	labore et dolore magna aliquyam erat, sed diam <br>
	 voluptua. At vero eos et accusam et justo duo dolores</p>

	<div class="kids-button">
	 <button class="custom-btn btn-1"><a href="about">Learn More</a></button>
	</div>
</div>


<div class="teachers-section">
	<h1>Teachers</h1>

	<p>Lorem ipsum dolor sit amet, consetetur sadipscing <br>
	elitr, sed diam nonumy eirmod tempor invidunt ut <br>
	labore et dolore magna aliquyam erat, sed diam <br>
	 voluptua. At vero eos et accusam et justo duo dolores</p>

	<div class="teachers-button">
	 <button class="custom-btn btn-15"><a href="about">Learn More</a></button>
	</div>
</div>



<div id="hero">



<div class="hero-shadow"></div>

<div class="hero-text">
 <h6><?php the_field('hero_headline'); ?> </h6>
</div>

<div class="hero-subtext">
	<h1><?php the_field('hero_headline_1'); ?> <br>
 	<?php the_field('hero_headline_2'); ?>
	</h1>
</div>


	
<div class="hero-image">
 <?php

 $hero = get_field('hero_image');

 if ( $hero ): ?>

<style>
		#hero {
			background-image: url(<?php echo $hero; ?>);
            background-repeat: no-repeat;
           
		}
</style>

<?php endif; ?>

		
	</div>
</div>

<div class="worksSection">
	<div class="lights"> 
		<img src="http://localhost:10088/wp-content/uploads/2021/10/sparkleLights.png">
	</div>
</div>














<?php get_footer() ?>