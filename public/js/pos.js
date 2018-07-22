var add_table = false;
var request_items = '';
var stock;
var purchased = 0;
var profit = 0;

//Set table data to items to be purchased
$('.add-item-btn').on( 'click',function () {

    var table_data = [];

    //get data from table row and place into array
    $('.item' + $(this).data('id') + ' td' ).each(function(index) {
        if (index < 5 && index != 2) {
            table_data.push($(this).text());
        }
        if (index == 3) {
            stock = this;
        }
        if (index == 5) {
            table_data.push($(this.firstChild).val());
        }

        if (index == 6) {
            table_data.push($(this).text());
        }
    });
    
    //Make sure that stock and purchases are correct values
    if ( parseInt($(stock).text()) >=  parseInt(table_data[4]) && parseInt(table_data[4]) != 0) {

        $(stock).text(parseInt($(stock).text()) - parseInt(table_data[4]));
        table_data[2] = $(stock).text(); 
        table_data[5] =  parseInt(table_data[5]) * parseInt(table_data[4]);
        table_data[6] =  parseInt(table_data[3]) * parseInt(table_data[4]);
        profit = parseInt(table_data[5]) + profit;
        purchased = table_data[6] + purchased;
        add_table = true;

        //Concatinate array into an array string so that it can be saved into database
        request_items = request_items + ( request_items == '' ? '' : ';') + table_data.toString();  

        console.log(request_items);

        $('#item').val( request_items );

        //Add data to invoice table if data matches what is needed 
        if (add_table) {
            $('.tbl-pos tr:last').after('<tr><td>' + table_data[1] + '</td><td>' + table_data[3] + '</td><td>' + table_data[4] + '</td><td>' + table_data[6] + '</td></tr>');
        }
        calculateTransactions();

    } else {

        alert('Invalid Transaction!');
    }
});

$('#given_amount').keypress(function (e) {
    if (e.which == 13) {
        if($(this).val() >= $(amount_due).val() && $(this).val() > 0) {
            calculateTransactions();
            if(confirm('Customers Change is: ' + $('#change').val())) {
                saveTransaction();
            }
        } else {
            alert('Please enter a valid amount.');
        }
    }
});

function saveTransaction() {
     $( "#pos_form" ).submit();
}

function calculateTransactions() {
    if (purchased) {
        $('#amount_total').val(purchased);
        $('#profit').val(purchased - profit );
        $('#amount_vat').val(money_multiply(purchased, 0.12));
        $('#amount_due').val(purchased + money_multiply(purchased, 0.12));
        if($('#given_amount').val() >= purchased && $('#given_amount').val() > 0) {
            $('#change').val((parseInt($('#given_amount').val()) - (purchased + money_multiply(purchased, 0.12))).toFixed(2));
        }
    }

}

//round decimal suited for currency
function money_multiply(a, b) {
    var log_10 = function (c) { return Math.log(c) / Math.log(10); },
        ten_e  = function (d) { return Math.pow(10, d); },
        pow_10 = -Math.floor(Math.min(log_10(a), log_10(b))) + 1;
    return ((a * ten_e(pow_10)) * (b * ten_e(pow_10))) / ten_e(pow_10 * 2);
}
