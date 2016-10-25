/**
 * Created by Home Work on 10/08/2014.
 */
$(function() {
    handleLanguageSelection();
});

function handleLanguageSelection() {
    var lang = $( "#i18n" ).attr( "value" );
    var brFlag = $( "#br-flag" );
    var usFlag = $( "#us-flag" );

    if(lang === "pt_BR") {
        brFlag.removeClass( "br-flag-deselected" ).addClass( "br-flag" );
        usFlag.removeClass( "us-flag" ).addClass( "us-flag-deselected" );
    } else if(lang === "en_US") {
        usFlag.removeClass( "us-flag-deselected" ).addClass( "us-flag" );
        brFlag.removeClass( "br-flag" ).addClass( "br-flag-deselected" );
    }
}

function doPost(url, form, type, onCloseMsgHooks) {

    if(!type) type = "json";

    $.post(url, $(form).serialize(), type)
        .done(function (returnObject) {
            if (returnObject.status === "error") {
                console.debug("Error: ");
                console.debug(returnObject);
                loadErrorDialog(returnObject, onCloseMsgHooks.onCloseErrorMsg);
            } else if (returnObject.status === "warn") {
                console.debug("Warn: ");
                console.debug(returnObject);
                loadWarnDialog(returnObject, onCloseMsgHooks.onCloseWarnMsg);
            } else if (returnObject.status === "info") {
                console.debug("Info: ");
                console.debug(returnObject);
                loadInfoDialog(returnObject, onCloseMsgHooks.onCloseInfoMsg);
            } else if (returnObject.status === "success") {
                console.debug("Sucess: ");
                console.debug(returnObject);
                loadSuccessDialog(returnObject, onCloseMsgHooks.onCloseSuccessMsg);
            } else {
                console.debug("Unknown status: ");
                console.debug(returnObject);
                loadErrorDialog(returnObject, onCloseMsgHooks.onCloseErrorMsg);
            };
        })
        .fail(function (returnObject) {
            console.debug("Fail: ");
            console.debug(returnObject.responseText);
            loadErrorDialog(jQuery.parseJSON(returnObject.responseText), onCloseMsgHooks.onCloseErrorMsg);
        });


}
