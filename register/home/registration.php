<?php
require_once("../infra/I18nHandler.php");
require_once("../persistance/DBConnection.php");

header('Content-Type: text/html; charset=utf-8');
?>

<html>
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<div id="messages"></div>
<input id="i18n" type="hidden" relativePath="../i18n" value="<?php echo $_SESSION["lang"]; ?>" />
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!--a href="registration.php?lang=pt_BR" id="br-flag" class="br-flag" ></a>
        <a href="registration.php?lang=en_US" id="us-flag" class="us-flag-deselected" ></a-->
        <a href="http://www.linea.gov.br" style="font-size:23px;color:#777777;float: right;">LIneA</a>
    </div>
</nav>
<div class="container" style="margin-top: 100px;">
        <div class="panel panel-default">
            <div class="page-header">
                <h3>User Registration</h3>
            </div>
            <div class="container-fluid">
            <div class="form-group" >
                <label for="searchBar" style="font-family: sans-serif;margin-bottom:50px;margin-top:30px;">Please, select your nationality:</label>
            </div>
            <div class="position" >

                <button class="btn btn-lg"  data-toggle="modal" data-target=".bs-example-modal-lg"  style="display:inline;margin-left:50px;">Brazillian(Brasileiro)</button>

                <button class="btn btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg"  style="display:inline;margin-left:60px;">Foreign(Estrangeiro)</button>
                <button class="btn btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg" style="display:inline;margin-left:60px;">Foreign Resident(Residente Estrangeiro no Brasil)</button>


            </div>

            <div   style="margin-bottom:10px;text-align:right;margin-top:500px;">For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> of LIneA
            </div>


            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <br>
                <form id="registerForm" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="name"><?php echo L::registrationForm_name; ?></label>
                        <div class="col-sm-10">
                            <input id="name" name="name" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="birth-date"><?php echo L::registrationForm_birthDate; ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">dd/MM/yyyy</span>
                                <input id="birth-date" name="birth-date" class="form-control" placeholder="" type="text" requ="false">
                            </div>
                        </div>
                    </div>

                    <!--div class="form-group">
                        <label class="col-sm-2 control-label" for="nationality"><?php echo L::registrationForm_nationality; ?></label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="nationality" id="brazillian" value="brazillian">
                                <php echo L::registrationForm_brazillian; ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nationality" id="non-brazillian" value="nonBrazillian">
                                <php echo L::registrationForm_nonBrazillian; ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="nationality" id="non-brazillian-resident" value="nonBrazillianResident">
                                <php echo L::registrationForm_nonBrazillianResident; ?>
                            </label>
                        </div>
                    </div-->

                    <div id="brazillian-fieldset" class="form-group hidden-default">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <div class="panel panel-default" style="width: 600px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="cpf"><?php echo L::registrationForm_cpf; ?></label>
                                        <div class="col-sm-10">
                                            <input id="cpf" name="cpf" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="rg"><?php echo L::registrationForm_rg; ?></label>
                                        <div class="col-sm-10">
                                            <input id="rg" name="rg" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="org"><?php echo L::registrationForm_org; ?></label>
                                        <div class="col-sm-10">
                                            <input id="org" name="org" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="uf"><?php echo L::registrationForm_uf; ?></label>
                                        <div class="col-sm-10">
                                            <input id="uf" name="uf" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="non-brazillian-fieldset" class="form-group hidden-default">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <div class="panel panel-default" style="width: 600px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="passport"><?php echo L::registrationForm_passport; ?></label>
                                        <div class="col-sm-10">
                                            <input id="passport" name="passport" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div  id="non-brazillian-resident-fieldset" class="form-group hidden-default">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <div class="panel panel-default" style="width: 600px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="resident-passport"><?php echo L::registrationForm_passport; ?></label>
                                        <div class="col-sm-10">
                                            <input id="resident-passport" name="resident-passport" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="resident-cpf"><?php echo L::registrationForm_cpf; ?></label>
                                        <div class="col-sm-10">
                                            <input id="resident-cpf" name="resident-cpf" type="text" placeholder="" class="form-control" requ="false" style="width: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="street"><?php echo L::registrationForm_street; ?></label>
                        <div class="col-sm-10">
                            <input id="street" name="street" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="city"><?php echo L::registrationForm_city; ?></label>
                        <div class="col-sm-10">
                            <input id="city" name="city" type="text" placeholder="" class="form-control" requ="false">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="zip-code"><?php echo L::registrationForm_zipCode; ?></label>
                        <div class="col-sm-10">
                            <input id="zip-code" name="zip-code" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="state"><?php echo L::registrationForm_state; ?></label>
                        <div class="col-sm-10">
                            <input id="state" name="state" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="country"><?php echo L::registrationForm_country; ?></label>
                        <div class="col-sm-10">
                            <input id="country" name="country" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="telephone-1"><?php echo L::registrationForm_telephone1; ?></label>
                        <div class="col-sm-10">
                            <input id="telephone-1" name="telephone-1" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="telephone-2"><?php echo L::registrationForm_telephone2; ?></label>
                        <div class="col-sm-10">
                            <input id="telephone-2" name="telephone-2" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="institution"><?php echo L::registrationForm_institution; ?></label>
                        <div class="col-sm-10">
                            <input id="institution" name="institution" type="text" placeholder="" class="form-control" requ="false">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="position"><?php echo L::registrationForm_position; ?></label>
                        <div class="col-sm-10">
                            <select id="position" name="position" class="form-control">
                                <option><?php echo L::selectOne; ?></option>
                                <option><?php echo L::registrationForm_administrative; ?></option>
                                <option><?php echo L::registrationForm_intern; ?></option>
                                <option><?php echo L::registrationForm_iT; ?></option>
                                <option><?php echo L::registrationForm_mscStudent; ?></option>
                                <option><?php echo L::registrationForm_phdStudent; ?></option>
                                <option><?php echo L::registrationForm_postDoc; ?></option>
                                <option><?php echo L::registrationForm_scientist; ?></option>
                                <option><?php echo L::registrationForm_undergraduateStudent; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="linea-email"><?php echo L::registrationForm_lineaEmail; ?></label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="linea-email" id="linea-email-yes" value="yes">
                                <?php echo L::yes; ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="linea-email" id="linea-email-no" value="no">
                                <?php echo L::no; ?>
                            </label>
                        </div>
                    </div>

                    <div id="linea-user-fieldset" class="form-group hidden-default">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <div class="panel panel-default" style="width: 600px;">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="linea-user"><?php echo L::registrationForm_lineaUser; ?></label>
                                        <div class="col-sm-10" style="width: 200px;">
                                            <div class="input-group">
                                                <input id="linea-user" name="linea-user" type="text" placeholder="" class="form-control" style="width: inherit;" requ="false">
                                                <span class="input-group-addon">@linea.gov.br</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="gmail"><?php echo L::registrationForm_gmail; ?></label>
                        <div class="col-sm-10">
                            <input id="gmail" name="gmail" type="text" placeholder="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="contact-email"><?php echo L::registrationForm_contactEmail; ?></label>
                        <div class="col-sm-10">
                            <input id="contact-email" name="contact-email" type="text" placeholder="" class="form-control">
                        </div>
                    </div>

                    <br/>

                   

                    <br/>

                    <!--div class="input" style="float: right; margin: 20px;">
                        For other information contact the <a href="http://www.linea.gov.br/contato/" target="_blank">Help desk</a> of LIneA
                    </div-->
                </form>
            <div class="modal-footer">
               <div class="form-group">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <div style="width: 600px;">
                                  <button id="submit" type="button" name="submit" class="btn btn-primary" value="submit" >Save changes</button>
                                <button id="submitRegistrationForm" class="btn btn-success">Submit</button>
                                
                                <button id="cancelRegistrationForm" type="button" name="cancel" class="btn btn-inverse" style="float: right;" data-dismiss="modal">Cancel</button>
                                 
                            </div>
                        </div>
                    </div>
                    <br>
        </div>
    </div>
</body>
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.mask.min.js"></script>
<script src="../js/i18n.js"></script>
<script src="../js/dialogs.js"></script>
<script src="../js/utils.js"></script>
<script src="../js/userRegistration.js"></script>
</html>