
$(document).ready(function(){
// validade fields//
    $("#formsearch").validate({
        // Define as regras
        rules: {
            name: {
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
                required: true, minlength: 2
            },

            // Define as mensagens de erro para cada regra
            }
        })








 //confirmando validação dos campos para envio do email

    $("#submit").click(function(){

        if ($("#formsearch").valid()) {


            $.post("search_result.php", $("#formsearch").serialize(), function(data) {
                $("#idcadastro").html(data);
                alert('You are going to receive an email of Registration Confirmation.');

            });

            $('#formsearch').each (function(){
                this.reset();});


        }else{
            alert('You should input information in fields  mandatory!');
            return false;
        }

//tesntando


    });




});

