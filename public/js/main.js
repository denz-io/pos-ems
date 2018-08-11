$(document).ready(function() {
    $('#items').DataTable({
        "scrollX": true
    });
    var item_modal = $('#items_modal').DataTable({
        "scrollX": true
    });

    $( "#pos-add-item" ).on('shown.bs.modal', function(){
        item_modal.columns.adjust().draw();
    });

    $('#users').DataTable({
        "scrollX": true
    });
    $('#logs-table').DataTable({
        "scrollX": true
    });
    $('#stubs').DataTable({
        "scrollX": true
    });
    $('#stubs').DataTable({
        "scrollX": true
    });
    $('#invoices_by_report').DataTable({
        "scrollX": true
    });
    $('#invoice_list').DataTable({
        "scrollX": true
    });
});

$('.error-message').delay(4000).fadeOut(400);

$('.success-message').delay(4000).fadeOut(400);

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

function printDiv(divName) {
  window.print();
}

