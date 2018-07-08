$('#employeeoptions').on('show.bs.modal', function (event) {
    $("#delete_user").attr("href", "/home/delete/" + $(event.relatedTarget).data('id'));
    $("#payroll_user").attr("href", "/home/payroll/" + $(event.relatedTarget).data('id'));
    $("#logs_user").attr("href", "/home/logs/" + $(event.relatedTarget).data('id'));
});
