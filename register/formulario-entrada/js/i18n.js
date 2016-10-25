/**
 * Created by Home Work on 03/08/2014.
 */
$(function() {
    $.getJSON($( "#i18n" ).attr( "relativePath" ) + "/" + $( "#i18n" ).attr( "value" ) + ".json", function(json) {
        L = json;
    });
});

function text(arg1, arg2) {
    if(!L) {
        console.error("O json de linguagem não foi definido, lembre-se de que o script i18n.js deve ser carregado antes (mas depois do jquery)");
        return undefined;
    }

    if(arg2) {
        return L[arg1][arg2];
    } else {
        return L[arg1];
    }
}