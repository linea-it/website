/**
 * Created by Home Work on 03/08/2014.
 */
function handleErrorMessage(json) {
    $( "#messages").load( "messages/errorMessage.html", function() {
        $( "#error-message>strong" ).html( "Error!" );
        // Is json?
        if( typeof json == "object" ) {
            var errorTable =
                '<br/><br/>' +
                '<table class="alert-danger">' +
//                '<tr>' +
//                '   <th style="width: 100px;">' +
//                '       <strong>Type:</strong>' +
//                '   </th>' +
//                '   <td>' +
//                        json.type +
//                '   </td>' +
//                '</tr>' +
                '<tr>' +
                '   <th style="width: 100px;">' +
                '       <strong>Message:</strong>' +
                '   </th>' +
                '   <td>' +
                json.message +
                '   </td>' +
                '</tr>' +
//                '<tr>' +
//                '   <th>' +
//                '       <strong>File:</strong>' +
//                '   </th>' +
//                '   <td>' +
//                        json.file +
//                '   </td>' +
//                '</tr>' +
//                '<tr>' +
//                '   <th>' +
//                '       <strong>Line:</strong>' +
//                '   </th>' +
//                '   <td>' +
//                        json.line +
//                '   </td>' +
//                '</tr>' +
                '</table>';

            $( "#error-message>span" ).html( errorTable );
        } else {
            $( "#error-message>span" ).html( json );
        }
    } );
}

function handleWarnMessage(json) {
    $( "#warn-message>strong" ).html( "Warn:" );
    $( "#messages").load( "messages/warnMessage.html", function() {
        $( "#warn-message>span" ).html( json.message );
    } );
}

function handleSuccessMessage(json) {
    $( "#success-message>strong" ).html( "Success!" );
    $( "#messages").load( "messages/successMessage.html", function() {
        $( "#success-message>span" ).html( json.message );
    } );
}

function handleInfoMessage(json) {
    $( "#info-message>strong" ).html( "Info:" );
    $( "#messages").load( "messages/infoMessage.html", function() {
        $( "#info-message>span" ).html( json.message );
    } );
}