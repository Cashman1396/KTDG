<?php get_header() ?>

<!--- Kids Section ---->
<div class="kids-section">
	<h1>Kids</h1>

	<p>Lorem ipsum dolor sit amet, consetetur sadipscing <br>
	elitr, sed diam nonumy eirmod tempor invidunt ut <br>
	labore et dolore magna aliquyam erat, sed diam <br>
	 voluptua. At vero eos et accusam et justo duo dolores</p>

	<div class="kids-button">
	<a href="kids"><button class="custom-btn btn-1">Learn More</button></a>
	</div>
</div>


<div class="teachers-section">
	<h1>Teachers</h1>

	<p>Lorem ipsum dolor sit amet, consetetur sadipscing <br>
	elitr, sed diam nonumy eirmod tempor invidunt ut <br>
	labore et dolore magna aliquyam erat, sed diam <br>
	 voluptua. At vero eos et accusam et justo duo dolores</p>

	<div class="teachers-button">
	<a href="teachers"><button class="custom-btn btn-15">Learn More</button></a>
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
		<img src="http://localhost:10088/wp-content/uploads/2021/10/sparksatks-1.png">
	</div>

	<h3>How It Works</h3>

	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam <br> 
	erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est <br> Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et <br> dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no</p>


	<div class="worksButton">
	<button class="custom-btn btn-14"><a href="about">Learn More</a></button>
	</div>
</div>

<div class="Matters"> 

	<div class="matterHeader">
		<h3>Why It Matters</h3>
	</div> 


	<div class="water-can">
		<img src="http://localhost:10088/wp-content/uploads/2021/10/water-can.png">
	</div>

	<div class="waterCan-text">
		<p>Instills good values <br>
			at a young age</p>
	</div>


	<div class="community">
		<img src="http://localhost:10088/wp-content/uploads/2021/10/7-cups.png">
	</div>

	<div class="communityText">
		<p>Teaches responsibility <br>
		within the community</p>
	</div> 

	<div class="goodness">
		<img src="http://localhost:10088/wp-content/uploads/2021/10/graduate.png">
	</div>

	<div class="goodness">
		<img src="http://localhost:10088/wp-content/uploads/2021/10/graduate.png">
	</div>

	<div class="goodnessText">
		<p>Tracks extracurricular activity <br>
			for college applications</p>
	</div>

	<div class="service">
		<img src="http://localhost:10088/wp-content/uploads/2021/10/doctors.png">
	</div>

	<div class="serviceText">
		<p>Builds community <br>
		  service resume </p>
	</div>


</div>

<div class="Contact">
		<img class="ktdgLogo" src="http://localhost:10088/wp-content/uploads/2021/11/ktdg-logo.png">	
		
		<div class="contactHeading">
			<h6>
				Contact
			</h6>
	</div> 


		<div class="Email">
			<img class="Mail" src="http://localhost:10088/wp-content/uploads/2021/11/Icon-material-email.png">
			<p>info@kidsthatdogood.com</p>
			
		</div>

		<div class="Connect">
			<h6>Connect</h6>

			<img class="connectIcon" src="http://localhost:10088/wp-content/uploads/2021/11/connectIcons.png">
			
	   </div>

	   <div class="Inform">
		   <h6>Information</h6>

		   <p>Terms and Conditions <br>
			Privacy Policy</p>
	   </div>

	   <div class="Tax">
		   <p class="numKids">Kids That Do Good is a <span class="numBold">501C3</span></p>
		   <p class="numTax">Tax ID# <span class="numBold">45-5182066.</span></p>
	   </div>
		
	</div>



<?php get_footer() ?>