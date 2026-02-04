<?php
get_header(); // Include the header.php file
?>
    <script>
        jQuery(document).ready(function(){
            startConfetti();
        });
    </script>
<canvas id="#confetti-canvas" class="position-absolute"></canvas>

<div class="container-fluid" id="header">
    <div class="logo">
        <?php the_custom_logo(); ?>
    </div>
    <div class="row">
        <div class="col-lg-4" id="acurui_hd"><h4><a href="#acurui">Acuruí</a></h4></div>
        <div class="col-lg-4" id="itabirito_hd"><h3><a href="#reinaldo">Itabirito</a></h3></div>
        <div class="col-lg-4" id="sgbacao_hd"><h4><a href="#bacao">São Gonçalo do Bação</a></h4></div>
    </div>
</div>
<div class="container-fluid bg-roxo" id="reinaldo">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto py-5">
                <?php
                $page_id = 11;
                $page_data = get_page($page_id);
                $page_thumbnail = get_the_post_thumbnail($page_id, 'full');
                ?>
                <div class="overlay">
                    <?php echo $page_thumbnail; ?>
                </div>
                    <h2><?php echo $page_data->post_title; ?></h2>
                    <div><?php echo apply_filters('the_content', $page_data->post_content); ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-vermelho" id="programacao">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-9 mx-auto py-5">
                <?php
                $page_id = 10;
                $page_data = get_page($page_id);
                ?>

                <h2><?php echo $page_data->post_title; ?></h2>
                <div><?php echo apply_filters('the_content', $page_data->post_content); ?></div>
            </div>
        </div>
    </div>
</div>
<?php


get_footer(); // Include the footer.php file
?>