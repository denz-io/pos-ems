$('#update-item').on('show.bs.modal', function (event) {
    $(this).find('#name').val($(event.relatedTarget).data('name'))
    $(this).find('#desc').val($(event.relatedTarget).data('desc'))
    $(this).find('#sold').val($(event.relatedTarget).data('sold'))
    $(this).find('#retail_price').val($(event.relatedTarget).data('retail_price'))
    $(this).find('#original_price').val($(event.relatedTarget).data('original_price'))
    $(this).find('#stock').val($(event.relatedTarget).data('stock'))
    $(this).find('#id').val($(event.relatedTarget).data('id'))
});

$('#showmoreinventory').on('show.bs.modal', function (event) {
    $(this).find('#name').val($(event.relatedTarget).data('name'))
    $(this).find('#desc').val($(event.relatedTarget).data('desc'))
    $(this).find('#sold').val($(event.relatedTarget).data('sold'))
    $(this).find('#retail_price').val($(event.relatedTarget).data('retail_price'))
    $(this).find('#original_price').val($(event.relatedTarget).data('original_price'))
    $(this).find('#stock').val($(event.relatedTarget).data('stock'))
    $(this).find('#id').val($(event.relatedTarget).data('id'))
});

$('.delete').on('click', function(event) {
    if (confirm('Are you sure you want to delete this?')) {
        window.location.href = "/inventory/" + $(this).data('id');
    }
});





