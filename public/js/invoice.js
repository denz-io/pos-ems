$('.delete_invoice').click(function() {
    if(confirm('Delete this Invoice?')) {
        window.location.href = "/invoices/delete/" + $(this).data('id');
    }
});
