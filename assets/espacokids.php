<div class="container-fluid bg-azul py-5 d-flex flex-column" id="kids">
    <div class="row my-auto">
        <div class="col-lg-12 my-auto">
        <a href="<?php echo get_permalink(get_page_by_path( 'espaco-kids' )); ?>"><h1 class="text-center my-auto">Espaço Kids</h1></a>
            <p class="text-center mt-3"><?php _e('Conheça a programação de atrações para a folia dos pequenos','meucarnaval2025') ?></p>
        </div>
        <script>
        jQuery(document).ready(function() {
            var text = jQuery('#kids h1').text();
            var letters = text.split('').map(function(letter) {
                return '<span class="letter">' + letter + '</span>';
            }).join('');
            jQuery('#kids h1').html(letters);
        });
        </script>
        <style>
            #kids h1 span:nth-last-child(2) {
                color: #E96730;
                z-index: 3
            }
            #kids h1 span:nth-last-child(3) {
                color: #00A6E1
            }
            #kids h1 span:nth-last-child(4) {
                color: #F29EC4
            }
        </style>
    </div>
</div>