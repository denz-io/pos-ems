var id; 

$('#employeeoptions').on('show.bs.modal', function (event) {

    //set value to input in modal
    $("#profile").attr("src", "images/profile_pics/" + $(event.relatedTarget).data('profile'));
    $("#name").val($(event.relatedTarget).data('name'));
    $("#username").val($(event.relatedTarget).data('username'));
    $("#phone").val($(event.relatedTarget).data('phone'));
    $("#rate").val($(event.relatedTarget).data('rate'));
    $("#status").val($(event.relatedTarget).data('status'));
    $("#id").val($(event.relatedTarget).data('id'));
    $("#logs_user").attr('href',"/payroll/" + $(event.relatedTarget).data('id'));
    //set employee id for options
    id = $(event.relatedTarget).data('id');
});


function deleteUser() {
    if (confirm('Do you want to delete record?')) {
        window.location="/home/delete/" + id;
    }
}

function updateUser() {
    if (confirm('Do you want to update record?')) {
        $("#update-employee").submit();
    }
}

