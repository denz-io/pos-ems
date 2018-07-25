$(document).ready(function() {
    $('#items').DataTable();
    $('#users').DataTable();
    $('#users').DataTable();
    $('#stubs').DataTable();
});

$('.error-message').delay(4000).fadeOut(400);

if($('#datepicker').length > 0){
    $('#datepicker').datepicker({
	uiLibrary: 'bootstrap4'
    });
}

if($('#expirydate').length > 0){
    $("#expirydate").datepicker( {
	uiLibrary: 'bootstrap4'
    });
}


