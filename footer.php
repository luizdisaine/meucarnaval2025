<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package MeuCarnaval2025
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="row">
                        <div class="site-info col-lg-6 text-start mx-auto">
                            <a href="https://itabirito.mg.gov.br"><?php echo date('Y'); ?>&copy; Prefeitura de Itabirito. Todos os direitos reservados</a>
                        </div>
                        <div class="col-lg-6">
                            <a href="https://itabirito.mg.gov.br" title="Prefeitura de Itabirito" class="d-flex"><img src="<?php echo get_template_directory_uri(  ).'/img/brasao-novo.webp'; ?>" class="w-50 ms-auto"></a>
                        </div>
                    </div>
                </div>
                <!-- .site-info -->
            </div>
        </div>
    </footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>