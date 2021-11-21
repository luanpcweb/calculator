
var display = [];

$(document).on("click", ".btn-calculator-numbers, .btn-calculator-operator", function(){

    let value = $(this).attr('id');

    switch (value) {
        case "plus":
            value = '+';
            break;
        case "minus":
            value = '-';
            break;
        case "times":
            value = '*';
            break;
        case "divided":
            value = '/';
            break;
        case "point":
            value = '.';
            break;
    }

    display.push(value);

    $("#display").val(display.join(''));
})
