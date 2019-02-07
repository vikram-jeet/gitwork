<?php


get_header();

if(have_posts()) {

	while ( have_posts() ) {
		the_post();

		?>
        <div class="time-table-wrapper">
            <div class="container clear">
                <h1 class="section-title"> <?php echo get_the_title(); ?></h1>
				<?php the_content(); ?>
            </div>
        </div>

		<?php
	}


}

get_footer();

