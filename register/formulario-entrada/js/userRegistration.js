/**
 * Created by Home Work on 02/08/2014.
 */
$(function() {

    $('#cpf').mask('999.999.999-99');
    $('#birth-date').mask('99/99/9999');

    var brazillianFieldset = $("#brazillian-fieldset");
    var nonBrazillianFieldset = $("#non-brazillian-fieldset");
    var nonBrazillianResidentFieldset = $("#non-brazillian-resident-fieldset");

    $("#brazillian").click(function() {
        brazillianFieldset.show();
        nonBrazillianFieldset.hide();
        nonBrazillianResidentFieldset.hide();
    });

    $("#non-brazillian").click(function() {
        brazillianFieldset.hide();
        nonBrazillianFieldset.show();
        nonBrazillianResidentFieldset.hide();
    });

    $("#non-brazillian-resident").click(function() {
        brazillianFieldset.hide();
        nonBrazillianFieldset.hide();
        nonBrazillianResidentFieldset.show();
    });

    var lineaUserFieldset = $("#linea-user-fieldset");

    $("#linea-email-yes").click(function() {
        lineaUserFieldset.show();
    });

    $("#linea-email-no").click(function() {
        lineaUserFieldset.hide();
    });

    $( "#registerForm" ).submit(function() {
        event.preventDefault();

        var onCloseSucessMsg = function() {
            location.reload();
        };

        doPost("../controllers/UserRegistrationController.php", "#registerForm", "json", { onCloseSuccessMsg: onCloseSucessMsg });
    });
});