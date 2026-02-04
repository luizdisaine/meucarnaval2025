<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0CG89LD3V4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0CG89LD3V4');
</script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php if (is_front_page()) { ?>  
<script>
        jQuery(document).ready(function(){
            startConfetti();
        });
    </script>
<?php } ?>
<canvas id="#confetti-canvas" class="position-absolute"></canvas>
<div class="clouds um"><img src="<?php echo get_template_directory_uri(); ?>/img/cloud1.svg"></div>
<div class="clouds dois"><img src="<?php echo get_template_directory_uri(); ?>/img/cloud1.svg"></div>
<div class="clouds tres"><img src="<?php echo get_template_directory_uri(); ?>/img/cloud2.svg"></div>
<div class="clouds quatro"><img src="<?php echo get_template_directory_uri(); ?>/img/cloud2.svg"></div>
<div class="clouds cinco"><img src="<?php echo get_template_directory_uri(); ?>/img/cloud1.svg"></div>
<div class="clouds seis"><img src="<?php echo get_template_directory_uri(); ?>/img/cloud2.svg"></div>

<?php 
// Calculate time until Feb 11 2026, 9PM
$target_date = strtotime('2026-02-11 21:00:00');
$current_date = time();
$time_diff = $target_date - $current_date;

if ($time_diff > 0) {
    echo do_shortcode('[ycd_countdown id="192"]');
}
?>


<div class="container-fluid" id="header">
    <div class="row">
        <div class="col-lg-10 mx-auto h-100 d-flex flex-column justify-content-center">
            <?php the_custom_logo(); ?>
            <a href="#atracoes" class="down"><i class="fa-solid fa-caret-down"></i></a>
        </div>
    </div>
    <?php if (wp_is_mobile()) { ?>
        <nav class="navbar navbar-expand-sm mobile">
<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_principal" aria-controls="collapse_principal"
    aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa-solid fa-bars"></i>
  </button>
    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'menu_id' => 'mobile',
                'theme_location' => 'principal', 
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'collapse_principal',
                'menu_class' => 'navbar-nav me-auto my-auto mobile menu',
                'link_class' => 'nav-link'
            )
        );
    ?>
</nav>
    <?php } ?>
</div>