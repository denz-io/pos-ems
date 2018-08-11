var item_id; 
var amount = [];
var collection = [];

$('.add-item-btn').on( 'click',function () {

    item_id = $(this).data('id');

    $.ajax({
        type: 'GET',
        url: '/pos-getitem/' + item_id,
        success: function (item) {
            if (item) {
              setTable(item);  
            } else {
              alert('This item is out of stock');
            }
        },
        error: function (data) {}
    });
});

function setTable(item) {
    let quantity = $('#qty-input-' + item_id).val();

    let updated_stock = +$('#stock_'+ item_id).text() - quantity;

    let item_qty_price = quantity * item['retail_price'];
    collectionCheck(quantity, item)
    if (quantity <= item['stock']) {
        if (updated_stock >= 0) {
            $('#stock_'+ item_id).text(updated_stock)
            calcAmount(quantity, item);
            setItems(quantity, item);
            $('.tbl-pos').append(`<tr style="cursor:pointer;"><td>${item['name']}</td><td>${item['retail_price']}</td><td>${quantity}</td><td>${item_qty_price}</td></tr>`);
        } else {
            alert('This item is no longer available for this transaction.');
        }
    } else {
        alert('Inventory is not enough.');
    }
}

function setItems(quantity, item) {
    collection.push({'id' : item['id'], 'qty' : quantity});
    $('#item').val(JSON.stringify(collection));
}

function collectionCheck(quantity, item) {
    collection.forEach(function (data) {
        if (data['qty'] ) {
        }
    })
}

function calcAmount(quantity, item) {
    let original = +item['original_price'] * +quantity; 
    let retail = +item['retail_price'] *+quantity; 

    $('#amount_total').val(parseFloat(+$('#amount_total').val() + +retail).toFixed(2));
    $('#profit').val(parseFloat(+$('#profit').val() + (retail - original)).toFixed(2));
    $('#amount_vat').val(parseFloat(+$('#amount_total').val() * (0.12 / 1.12)).toFixed(2));
    $('#amount_due').val(parseFloat(+$('#amount_total').val() + +$('#amount_vat').val()).toFixed(2));
}

$('#given_amount').keyup(function (e) {
    if(+$(this).val() >= +$('#amount_due').val()) {
	$('#change').val(parseFloat(+$(this).val() - +$('#amount_due').val()).toFixed(2));
    } else {
	$('#change').val(0);
    }
});

function saveTransaction() {
    if($('#given_amount').val() > 0 && $('#change').val() > 0) {
        if (confirm('Customers Change is: ' + $('#change').val() + '. Finish Transation?'))  {
            $( "#pos_form" ).submit();
        }
    } else {
       alert('This transaction cannot be completed.'); 
    }
}

function refresh() {
    location.reload();
}

