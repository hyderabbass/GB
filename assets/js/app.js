$(document).ready(function () {


    //  Issue #13 - Hyder - 30 June 2014 - Datepicker issue
    jQuery("body").on("click", ".booh", function (event) {
        $(this).datepicker({showOn: 'focus', autoclose: true, dateFormat: 'yy-mm-dd'}).focus();
    });


    $("#dob").datepicker({
        format: "mm/dd/yyyy",
        autoclose: true
    });


    jQuery("body").on("click", ".due_datex", function (event) {
        $(this).datepicker({showOn: 'focus', autoclose: true, dateFormat: 'yy-mm-dd'}).focus();
    });









});