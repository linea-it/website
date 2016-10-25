/**
 * Created by Home Work on 03/08/2014.
 */

function loadErrorDialog(json, onCloseMsgHook) {
    $( "#messages" ).load("dialogs/errorDialog.html", function() {
        $( "#error-dialog .modal-title" ).html( text("dialogTitles", "error") );
        $( "#error-dialog .modal-body" ).append( '<div class="dialogMsg"><strong>Message: </strong><br/><span></span></div>' );
        $( "#error-dialog .modal-body" ).append( '<div class="dialogFile"><strong>File: </strong><span></span></div>' );
        $( "#error-dialog .modal-body" ).append( '<div class="dialogLine"><strong>Line: </strong><span></span></div>' );
        $( "#error-dialog .modal-body .dialogMsg span" ).html( json.message );
        $( "#error-dialog .modal-body .dialogFile span" ).html( json.file );
        $( "#error-dialog .modal-body .dialogLine span" ).html( json.line );

        $('#error-dialog').modal({keyboard: true, backdrop: 'static'});

        if(onCloseMsgHook) {
            $('#error-dialog').on('hidden.bs.modal', function () {
                onCloseMsgHook();
            });
        }
    } );
}

function loadWarnDialog(json, onCloseMsgHook) {
    $( "#messages" ).load( "dialogs/warnDialog.html", function() {
        $( "#warn-dialog .modal-title" ).html( text("dialogTitles", "warn") );
        $( "#warn-dialog .modal-body" ).html( json.message );

        $('#warn-dialog').modal({keyboard: true, backdrop: 'static'});

        if(onCloseMsgHook) {
            $('#warn-dialog').on('hidden.bs.modal', function () {
                onCloseMsgHook();
            });
        }
    } );
}

function loadSuccessDialog(json, onCloseMsgHook) {
    $( "#messages" ).load( "dialogs/successDialog.html", function() {
        $( "#success-dialog .modal-title" ).html( text("dialogTitles", "success") );
        $( "#success-dialog .modal-body" ).html( json.message );

        $('#success-dialog').modal({keyboard: true, backdrop: 'static'});

        if(onCloseMsgHook) {
            $('#success-dialog').on('hidden.bs.modal', function () {
                onCloseMsgHook();
            });
        }
    } );
}

function loadInfoDialog(json, onCloseMsgHook) {
    $( "#messages" ).load( "dialogs/infoDialog.html", function() {
        $( "#info-dialog .modal-title" ).html( text("dialogTitles", "info") );
        $( "#info-dialog .modal-body" ).html( json.message );

        $('#info-dialog').modal({keyboard: true, backdrop: 'static'});

        if(onCloseMsgHook) {
            $('#info-dialog').on('hidden.bs.modal', function () {
                onCloseMsgHook();
            });
        }
    } );
}

function loadConfirmDialog(json, onCloseMsgHook) {
    $( "#messages" ).load( "dialogs/confirmDialog.html", function() {
        $( "#confirm-dialog .modal-title" ).html( text("dialogTitles", "confirm") );
        $( "#confirm-dialog .modal-body" ).html( json.message );

        $('#confirm-dialog').modal({keyboard: true, backdrop: 'static'});

        if(onCloseMsgHook) {
            $('#confirm-dialog').on('hidden.bs.modal', function () {
                onCloseMsgHook();
            });
        }
    } );
}
