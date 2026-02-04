<?php
$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_parent' => 0,
    'post__not_in' => array(
        get_option('page_on_front'),
        get_option('wp_page_for_privacy_policy')
    ),
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$the_query = new WP_Query($args);
if ($the_query->have_posts()) :   
?>

<div class="container-fluid py-5" id="cards">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="row">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="col-lg-4 mx-auto">
                    <div class="card text-center card-modal-trigger" data-page-id="<?php echo get_the_ID(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>');">
                        <div class="overlay">
                            <?php echo '<p>'.wp_trim_words(get_the_excerpt(), 30, '...').'</p>'; ?>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#pageModal" data-page-id="<?php echo get_the_ID(); ?>">Saiba mais</button>
                        </div>
                        <h5 class="card-title"><?php the_title(); ?></h5>
                    </div>
                </div>
                <?php wp_reset_postdata();
                endwhile ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Pages -->
<div
    class="modal fade"
    id="pageModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="pageModalTitle"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pageModalTitle">
                    Carregando...
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Fechar"
                ><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body">
                <div class="text-center py-4">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Carregando...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>