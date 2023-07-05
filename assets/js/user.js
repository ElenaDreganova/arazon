$(document).ready(function () {

    $("#user-orders").click(function () { // задаем функцию при нажатиии на элемент <button>
        $("#form-favorites").addClass('vis-n');
        $("#form-settings").addClass('vis-n');
        $("#form-orders").removeClass('vis-n');
    });
    $("#user-favorites").click(function () { // задаем функцию при нажатиии на элемент <button>
        $("#form-orders").addClass('vis-n');
        $("#form-settings").addClass('vis-n');
        $("#form-favorites").removeClass('vis-n');
    });
    
    $("#user-settings").click(function () { // задаем функцию при нажатиии на элемент <button>
        $("#form-settings").removeClass('vis-n');
        $("#form-orders").addClass('vis-n');
        $("#form-favorites").addClass('vis-n');

    });

    


});

