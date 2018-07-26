$('.delete_report').click(function() {
    if(confirm('Delete this report?')) {
        window.location.href = "/report/delete/" + $(this).data('id');
    }
});
