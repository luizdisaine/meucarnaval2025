<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id=""
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Modal title
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Fechar"
                ></button>
            </div>
            <div class="modal-body">Body</div>
        </div>
    </div>
</div>

<div class="container-fluid py-5" id="atracoes">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="row">
                <?php
                    $args2 = array(
                        'post_type' => 'atracao',
                        'posts_per_page' => -1,
                        'meta_key' => '_atracao_featured',
                        'meta_value' => '1',
                        'meta_compare' => '!=',
                        'orderby' => 'date',
                        'order' => 'ASC'
                    );
                    $lista = new WP_Query($args2);
                    if ($lista->have_posts()) {
                        echo '<h2 class="mb-3 title-local">'.__('Atrações').'</h2>';
                        echo '<ul class="atracoesLista">';
                        while($lista->have_posts()) {$lista->the_post();
                            if(!empty($post->post_content)) {
                            echo '<li><a href="'.get_permalink().'" class="local tooltip" data-tooltip-content="#'.$post->post_name.'">'.get_the_title().'</a></li>';
                        } else {
                            echo '<li><a href="'.get_permalink().'" class="local">'.get_the_title().'</a></li>';
                        }
                            
                            wp_reset_postdata(  );
                        }
                        echo '</ul>'; ?>
                        <div class="tooltip_templates">
                            <?php while($lista->have_posts()) {$lista->the_post();
                                if(!empty($post->post_content)) {
                                echo '<span id="'.$post->post_name.'" class="d-flex flex-row justify-content-start"><div class="w-25 me-2"><img src="'.get_the_post_thumbnail_url($post->ID,'thumbnail').'" class="w-100"></div><div class="w-75">'.get_the_content().'</div></span>';
                                }
                                wp_reset_postdata(  );
                            } ?>
                        </div>
                        <script>
        jQuery(document).ready(function() {
            jQuery('.local').on('click',function(e){
                e.preventDefault();
            });
            jQuery('.tooltip').tooltipster({
                maxWidth: 400
            });
        });
    </script>
                    <?php }
                ?>
            </div>
        </div>
    </div>
</div>