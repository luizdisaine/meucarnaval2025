<?php
get_header(); // Include the header.php file

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
    <?php endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer(); // Include the footer.php file
?>