<?php class L {
const yes = 'Yes';
const no = 'No';
const selectOne = 'Select One';
const dialogTitles_error = 'Error!';
const dialogTitles_warn = 'Warn:';
const dialogTitles_success = 'Success!';
const dialogTitles_info = 'Info:';
const dialogTitles_confirm = 'Confirm:';
const registrationForm_name = 'Name';
const registrationForm_birthDate = 'Birth date';
const registrationForm_nationality = 'Nationality';
const registrationForm_cpf = 'CPF';
const registrationForm_rg = 'RG';
const registrationForm_org = 'Organ of Consultation';
const registrationForm_uf = 'UF';
const registrationForm_passport = 'Passport';
const registrationForm_brazillian = 'Brazillian';
const registrationForm_nonBrazillian = 'Non-Brazillian';
const registrationForm_nonBrazillianResident = 'Non-Brazillian resident';
const registrationForm_street = 'Street';
const registrationForm_city = 'City';
const registrationForm_zipCode = 'Zip Code';
const registrationForm_state = 'State';
const registrationForm_country = 'Country';
const registrationForm_telephone1 = 'Telephone 1';
const registrationForm_telephone2 = 'Telephone 2';
const registrationForm_institution = 'Institution';
const registrationForm_position = 'Position';
const registrationForm_administrative = 'Administrative';
const registrationForm_intern = 'Intern';
const registrationForm_iT = 'IT';
const registrationForm_mscStudent = 'MSC student';
const registrationForm_phdStudent = 'PhD student';
const registrationForm_postDoc = 'Post-doc';
const registrationForm_scientist = 'Scientist';
const registrationForm_undergraduateStudent = 'Undergraduate student';
const registrationForm_lineaEmail = 'Would you like to get an Linea E-Mail?';
const registrationForm_lineaUser = 'User';
const registrationForm_gmail = 'GMail';
const registrationForm_contactEmail = 'Contact E-Mail';
const userDao_insertSuccess = 'User successfully registered.';
const userDao_insertFail = 'User registration failed.';
public static function __callStatic($string, $args) {
vprintf(constant("self::" . $string), $args);
}
}