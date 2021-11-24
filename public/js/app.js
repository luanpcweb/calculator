
var display = [];
var state = true;
var stateForSum = false;

$(document).on("click", ".btn-calculator-numbers, .btn-calculator-operator", function(){

    let value = $(this).attr('id');
    let printer = $("#display");

    if (validators(display, value) === false) {
        printer.val(display.join(''));
        return;
    }

    if (value === 'reset') {
        clear(printer);
        return;
    }

    switch (value) {
        case "plus":
            value = '+';
            state = false;
            break;
        case "minus":
            value = '-';
            state = false;
            break;
        case "times":
            value = '*';
            state = false;
            break;
        case "divided":
            value = '/';
            state = false;
            break;
        case "point":
            value = '.';
            state = true;
            break;
        case "MOD":
            value = 'MOD';
            state = false;
    }

    if (state === true ) {

        if (display.length > 0) {
            let lastValue = display[display.length - 1]
            display[display.length - 1] = lastValue + value;
        } else {
            display.push(value);
        }

    } else {
        display.push(value);
    }

    if (!isOperator(value)) {
        state = true;
    }

    printer.val(display.join(''));
});

function isOperator(value) {
    let operators = ['+', '-', '/', '*', 'MOD', 'plus', 'minus', 'times', 'divided'];
    return operators.includes(value);
}

function validators(display, currentValue) {

    if (display.length === 0) {
        return true;
    }

    let lastValue = display[display.length - 1];

    if (isOperator(lastValue) && isOperator(currentValue) ) {
        return false;
    }

    if (isOperator(lastValue) && (currentValue == '.' || currentValue == 'point') ) {
        return false;
    }
}

function clear(element)
{
    element.val('0');
    display = [];
}

$(document).on("click", "#equals", function(){

    let operation = display;

    if (operation.length <= 1 || isOperator(operation[display.length - 1])) {
        return;
    }

    $.ajax({
        type: "POST",
        url: '/calculate',
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        data: { operation: operation },
        success: function(result){

            $("#display").val(result.result);
            display = [];
            display[0] = result.result;

            if (result.bonus == 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: jqXHR.responseJSON.msg
                })
            }

        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            $("#display").val('ERRO');
            display = [];
            display[0] = 'ERRO';
        }
    });

});
