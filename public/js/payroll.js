$('#update-log').on('show.bs.modal', function (event) {
    $(this).find('#time_in').val($(event.relatedTarget).data('time_in'))
    if ($(event.relatedTarget).data('time_out')) {
        $(this).find('#time_out').val($(event.relatedTarget).data('time_out'))
        $(this).find('#time_out').prop('disabled', false);
    } else {
        $(this).find('#time_out').prop('disabled', true);
    }
    $(this).find('#id').val($(event.relatedTarget).data('id'))
});

$('.delete_log').click(function () {
    if (confirm('Delete this log?')) {
        $.get("/payroll/delete/log/" + $(this).data('id'), function (data) {
            $('#log_' + data).remove();
        });
    }
});

$('.delete_payroll').click(function () {
    if (confirm('Delete this pay stub?')) {
        $.get("/payroll/delete/" + $(this).data('id'), function (data) {
            $('#paystub_' + data).remove();
        });
    }
});
