jQuery('.nacional').on('mouseover',function(f){
    var id = jQuery(this).attr('id');
    $container = jQuery('.modal');
    $container.removeAttr('id').attr('id','modal' + id);
    jQuery.ajax({
        url: ajax_post.ajaxurl,
        type: 'POST',
        data: { 
            'action':'get_atracao',
            'id': id
        },
        datatype: JSON
    }).done(function(response){
        var atracao = jQuery.parseJSON(response);
        var title = atracao['title'];
        var content = atracao['content'];
        jQuery('.modal-title').empty().html(title);
        jQuery('.modal-body').empty().html(content)

    }).fail(function(){
        alert('Nope');
    })
})

// Handle page modal loading
jQuery(document).ready(function($) {
    $('#pageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pageId = button.data('page-id');
        var modal = $(this);
        
        // Reset modal content
        modal.find('.modal-title').html('Carregando...');
        modal.find('.modal-body').html('<div class="text-center py-4"><div class="spinner-border" role="status"><span class="visually-hidden">Carregando...</span></div></div>');
        
        // Load content via AJAX
        $.ajax({
            url: ajax_post.ajaxurl,
            type: 'POST',
            data: { 
                'action': 'get_page_content',
                'id': pageId
            },
            dataType: 'json'
        }).done(function(response){
            if (response.success) {
                modal.find('.modal-title').html(response.data.title);
                modal.find('.modal-body').html(response.data.content);
            } else {
                modal.find('.modal-title').html('Erro');
                modal.find('.modal-body').html('<p class="text-danger">Não foi possível carregar o conteúdo.</p>');
            }
        }).fail(function(){
            modal.find('.modal-title').html('Erro');
            modal.find('.modal-body').html('<p class="text-danger">Ocorreu um erro ao carregar o conteúdo.</p>');
        });
    });
});