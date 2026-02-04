<?php
function create_atracao_post_type() {
    $labels = array(
        'name'               => _x('Atrações', 'post type general name', 'carnaval2025'),
        'singular_name'      => _x('Atração', 'post type singular name', 'carnaval2025'),
        'menu_name'          => _x('Atrações', 'admin menu', 'carnaval2025'),
        'name_admin_bar'     => _x('Atração', 'add new on admin bar', 'carnaval2025'),
        'add_new'            => _x('Adicionar Nova', 'atração', 'carnaval2025'),
        'add_new_item'       => __('Adicionar Nova Atração', 'carnaval2025'),
        'new_item'           => __('Nova Atração', 'carnaval2025'),
        'edit_item'          => __('Editar Atração', 'carnaval2025'),
        'view_item'          => __('Ver Atração', 'carnaval2025'),
        'all_items'          => __('Todas as Atrações', 'carnaval2025'),
        'search_items'       => __('Procurar Atrações', 'carnaval2025'),
        'parent_item_colon'  => __('Atrações Pai:', 'carnaval2025'),
        'not_found'          => __('Nenhuma atração encontrada.', 'carnaval2025'),
        'not_found_in_trash' => __('Nenhuma atração encontrada no lixo.', 'carnaval2025')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_rest'       => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'atracao'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('atracao', $args);
}

add_action('init', 'create_atracao_post_type');


function add_atracao_custom_fields() {
    add_meta_box(
        'atracao_featured',
        __('Atração em Destaque', 'carnaval2025'),
        'atracao_featured_callback',
        'atracao',
        'side',
        'high'
    );
}

function atracao_featured_callback($post) {
    wp_nonce_field('save_atracao_featured', 'atracao_featured_nonce');
    $value = get_post_meta($post->ID, '_atracao_featured', true);
    ?>
    <label for="atracao_featured">
        <input type="checkbox" id="atracao_featured" name="atracao_featured" value="1" <?php checked($value, '1'); ?> />
        <?php _e('Marcar como destaque', 'carnaval2025'); ?>
    </label>
    <?php
}

function save_atracao_custom_fields($post_id) {
    if (!isset($_POST['atracao_featured_nonce']) || !wp_verify_nonce($_POST['atracao_featured_nonce'], 'save_atracao_featured')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['post_type']) && 'atracao' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    $is_featured = isset($_POST['atracao_featured']) ? '1' : '';
    update_post_meta($post_id, '_atracao_featured', $is_featured);
}

add_action('add_meta_boxes', 'add_atracao_custom_fields');
add_action('save_post', 'save_atracao_custom_fields');

?>