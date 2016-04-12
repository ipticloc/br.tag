$(formIdentification + 'name').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    var ret = validateNamePerson(($(id).val()));
    if (!ret[0] && ($(id).val() != '')) {
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formIdentification + 'nis').focusout(function () {
    var id = '#' + $(this).attr("id");
    if (!validateNis($(id).val()) && ($(id).val() != '')) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});


var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
};
var spOptions = {    
    onKeyPress: function (val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    },
    placeholder: "(__) _____-____"
};

$(formIdentification + 'responsable_telephone').mask(SPMaskBehavior, spOptions);
$(formIdentification + 'responsable_telephone').focusout(function() {
    var id = '#' + $(this).attr("id");
    var phone = $(id).cleanVal();
    if (phone.length !== 11 && phone.length !== 10) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formIdentification + 'responsable_cpf').mask("000.000.000-00", {placeholder: "___.___.___-__"});
$(formIdentification + 'responsable_cpf').focusout(function () {
    var id = '#' + $(this).attr("id");
    if (!validateCpf($(id).cleanVal())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'cns').focusout(function () {
    var id = '#' + $(this).attr("id");
    if (!validateCns($(id).val())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

var date = new Date();
$(formIdentification + 'birthday').mask("00/00/0000", {placeholder: "dd/mm/aaaa"});
$(formIdentification + 'birthday').focusout(function () {
    var id = '#' + $(this).attr("id");
    var birthday = stringToDate($(formIdentification + 'birthday').val());


    if ((!validateDate($(formIdentification + 'birthday').val()) || !validateYear(birthday.year)) && ($(id).val() != '')) {
        //$(formIdentification + 'birthday').attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formIdentification + 'filiation').change(function () {
    $(formIdentification + 'filiation_1').attr("disabled", "disabled");
    $(formIdentification + 'filiation_2').attr("disabled", "disabled");

    if ($(formIdentification + 'filiation').val() == 1) {
        $(formIdentification + 'filiation_1').removeAttr("disabled");
        $(formIdentification + 'filiation_2').removeAttr("disabled");
    }
    else {
        $(formIdentification + 'filiation_1').val("");
        $(formIdentification + 'filiation_2').val("");
    }
});

$(formIdentification + 'filiation_1, '
        + formIdentification + 'filiation_2').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    var ret = validateNamePerson(($(id).val()));
    if (!ret[0]) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }

    if ($(formIdentification + 'filiation_1').val() == $(formIdentification + 'filiation_2').val()) {
        $(formIdentification + 'filiation_2').attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formIdentification + 'nationality').change(function () {
    var nationality = ".nationality-sensitive";
    var br = nationality + ".br";
    var nobr = nationality + ".no-br";
    $(nationality).attr("disabled", "disabled");
    if ($(this).val() == 3) {
        $(nobr).removeAttr("disabled");
        $(formIdentification + 'edcenso_nation_fk').val(null).trigger('change').select2('readonly', false);
        $(formIdentification + 'edcenso_uf_fk').val("");
        $(formIdentification + 'edcenso_city_fk').val("");
    } else if ($(this).val() == "") {
        $(formIdentification + 'edcenso_nation_fk').val(null).trigger('change').attr("disabled", "disabled");
        $(nationality).attr("disabled", "disabled");
    } else {
        $(formIdentification + 'edcenso_nation_fk').val(76).trigger('change').removeAttr("disabled").select2('readonly', true);
        $(br).removeAttr("disabled");
        $(formDocumentsAndAddress + 'civil_certification').trigger("change");
    }
});

var deficiency = formIdentification + "deficiency";                             //17

var dtBlind = formIdentification + 'deficiency_type_blindness';                 //18 
var dtLowVi = formIdentification + 'deficiency_type_low_vision';                //19
var dtDeafn = formIdentification + 'deficiency_type_deafness';                  //20
var dtDisab = formIdentification + 'deficiency_type_disability_hearing';        //21
var dtDeafB = formIdentification + 'deficiency_type_deafblindness';             //22
var dtPhisi = formIdentification + 'deficiency_type_phisical_disability';       //23
var dtIntel = formIdentification + 'deficiency_type_intelectual_disability';    //24
var dtMulti = formIdentification + 'deficiency_type_multiple_disabilities';     //25
var dtAutis = formIdentification + 'deficiency_type_autism';                    //26
var dtAspen = formIdentification + 'deficiency_type_aspenger_syndrome';         //27 
var dtRettS = formIdentification + 'deficiency_type_rett_syndrome';             //28
var dtChild = formIdentification + 'deficiency_type_childhood_disintegrative_disorder'; //29
var dtGifte = formIdentification + 'deficiency_type_gifted';                    //30
var allDeficiency = dtBlind + ',' + dtLowVi + ',' + dtDeafn + ',' + dtDisab + ',' + dtDeafB + ',' + dtGifte + ',' + dtPhisi + ',' +
        dtIntel + ',' + dtMulti + ',' + dtAutis + ',' + dtAspen + ',' + dtRettS + ',' + dtChild;
var defLessGifited = dtBlind + ',' + dtLowVi + ',' + dtDeafn + ',' + dtDisab + ',' + dtDeafB + ',' + dtPhisi + ',' +
        dtIntel + ',' + dtMulti + ',' + dtAutis + ',' + dtAspen + ',' + dtRettS + ',' + dtChild;

var rAidLec = formIdentification + 'resource_aid_lector';                       //31
var rAidTra = formIdentification + 'resource_aid_transcription';                //32
var rIntGui = formIdentification + 'resource_interpreter_guide';                //33
var rIntLib = formIdentification + 'resource_interpreter_libras';               //34
var rLipRea = formIdentification + 'resource_lip_reading';                      //35
var rZoom16 = formIdentification + 'resource_zoomed_test_16';                   //36
var rZoom20 = formIdentification + 'resource_zoomed_test_20';                   //37
var rZoom24 = formIdentification + 'resource_zoomed_test_24';                   //38
var rBraile = formIdentification + 'resource_braille_test';                     //39
var allResource = rAidLec + ',' + rAidTra + ',' + rIntGui + ',' + rIntLib + ',' + rLipRea + ',' + rZoom16 + ',' + rZoom20 + ',' + rZoom24 + ',' + rBraile;

var rNone = formIdentification + 'resource_none';                               //40

var defReadOnly;
var recReadOnly;

$(allDeficiency).click(function () {
    defReadOnly = $(this).attr('readonly') == 'readonly';
});
$(allResource).click(function () {
    recReadOnly = $(this).attr('readonly') == 'readonly';
});


$(allDeficiency).change(function () {
    if (defReadOnly) {
        $(this).attr('checked', false);
    }

    $(allDeficiency).attr('readonly', false);

    var unCheck = '';
    unCheck = dtLowVi + ',' + dtDeafn + ',' + dtDeafB;
    if ($(dtBlind).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtBlind + ',' + dtDeafB;
    if ($(dtLowVi).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtBlind + ',' + dtDisab + ',' + dtDeafB;
    if ($(dtDeafn).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtDeafn + "," + dtDeafB;
    if ($(dtDisab).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtBlind + "," + dtLowVi + "," + dtDeafn + "," + dtDisab;
    if ($(dtDeafB).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtGifte;
    if ($(dtIntel).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtAspen + "," + dtRettS + "," + dtChild;
    if ($(dtAutis).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtAutis + "," + dtRettS + "," + dtChild;
    if ($(dtAspen).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtAspen + "," + dtAutis + "," + dtChild;
    if ($(dtRettS).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtAspen + "," + dtRettS + "," + dtAutis;
    if ($(dtChild).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    unCheck = dtIntel;
    if ($(dtGifte).is(":checked")) {
        $(unCheck).attr('checked', false).attr('readonly', true);
    }

    var multi = $(dtBlind).is(':checked') && $(dtPhisi).is(':checked')
            || $(dtBlind).is(':checked') && $(dtIntel).is(':checked')
            || $(dtLowVi).is(':checked') && $(dtPhisi).is(':checked')
            || $(dtLowVi).is(':checked') && $(dtIntel).is(':checked')
            || $(dtDeafn).is(':checked') && $(dtPhisi).is(':checked')
            || $(dtDeafn).is(':checked') && $(dtIntel).is(':checked')
            || $(dtDisab).is(':checked') && $(dtPhisi).is(':checked')
            || $(dtDisab).is(':checked') && $(dtIntel).is(':checked')
            || $(dtDeafB).is(':checked') && $(dtPhisi).is(':checked')
            || $(dtDeafB).is(':checked') && $(dtIntel).is(':checked')
            || $(dtBlind).is(':checked') && $(dtDisab).is(':checked')
            || $(dtLowVi).is(':checked') && $(dtDeafn).is(':checked')
            || $(dtLowVi).is(':checked') && $(dtDisab).is(':checked')
            || $(dtPhisi).is(':checked') && $(dtIntel).is(':checked');
    $(dtMulti).attr('checked', multi);

    $(allResource).attr('readonly', true);

    if (!($(dtLowVi + ',' + dtBlind).is(':checked')) && $(dtGifte).is(':checked')) {
        $('#resource_null input').removeAttr('disabled');
        $('#resource_type input').attr('disabled', "disabled");
        $("#resource_type").hide();
    } else if (!($(allDeficiency).is(":checked"))) {
        $('#resource_null input').attr('disabled', "disabled");
        $('#resource_type input').removeAttr('disabled', "disabled");
        $("#resource_type").hide();
    } else {
        $('#resource_null input').attr('disabled', "disabled");
        $('#resource_type input').attr('checked', false).removeAttr('disabled');
        $('#resource_type ' + rNone).removeAttr('disabled');
        $("#resource_type").show();
    }

    var defType = dtBlind + ',' + dtLowVi + ',' + dtDeafB + ',' + dtPhisi + ',' + dtIntel + ',' + dtAutis + ',' + dtAspen + ',' + dtRettS + ',' + dtChild;
    $(rAidLec + ',' + rAidTra).attr('readonly', $(defType).is(':checked'));

    $(rIntGui).attr('readonly', $(dtDeafB).is(':checked'));

    defType = dtDeafn + ',' + dtDeafB + ',' + dtDisab;
    $(rIntLib + ',' + rLipRea).attr('readonly', $(defType).is(':checked'));

    defType = dtLowVi + ',' + dtDeafB;
    $(rZoom16 + ',' + rZoom20 + ',' + rZoom24).attr('readonly', $(defType).is(':checked'));

    defType = dtBlind + ',' + dtDeafB;
    $(rBraile).attr('readonly', $(defType).is(':checked'));
});

$('#resource_type input').change(function () {
    if (recReadOnly) {
        $(this).attr('checked', false);
    }

    var checked = !($(this).is(":checked"));
    $('#resource_type ' + rNone).attr('checked', checked);

    var rz16 = $('#resource_type ' + rZoom16);
    var rz20 = $('#resource_type ' + rZoom20);
    var rz24 = $('#resource_type ' + rZoom24);
    rz16.attr('readonly', false);
    rz20.attr('readonly', false);
    rz24.attr('readonly', false);

    if (rz16.is(':checked')) {
        $(rz20).attr('checked', false).attr('readonly', true);
        $(rz24).attr('checked', false).attr('readonly', true);
    }
    if (rz20.is(':checked')) {
        $(rz16).attr('checked', false).attr('readonly', true);
        $(rz24).attr('checked', false).attr('readonly', true);
    }
    if (rz24.is(':checked')) {
        $(rz16).attr('checked', false).attr('readonly', true);
        $(rz20).attr('checked', false).attr('readonly', true);
    }
});

$('#resource_type ' + rNone).change(function () {
    if (recReadOnly) {
        $(this).attr('checked', false);
    }

    if ($(this).is(':checked')) {
        $(allResource).attr('checked', false);
    }
});

$(deficiency).change(function () {
    if ($(this).is(":checked")) {
        $(allDeficiency).attr('checked', false).removeAttr('disabled');
        $("#deficiency_type").show();
    } else {
        $(allDeficiency).attr('disabled', "disabled");
        $(allResource).attr('disabled', "disabled");
        $("#deficiency_type").hide();
        $("#resource_type").hide();
    }
});

$(formDocumentsAndAddress + 'address').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    if (!validateStudentAddress($(id).val())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'number').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    if (!validateStudentAddressNumber($(id).val())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'complement').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    if (!validateStudentAddressComplement($(id).val())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'neighborhood').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    if (!validateStudentAddressNeighborhood($(id).val())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'cpf').mask("000.000.000-00", {placeholder: "___.___.___-__"});
$(formDocumentsAndAddress + 'cpf').focusout(function () {
    var id = '#' + $(this).attr("id");
    if (!validateCpf($(id).cleanVal())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'cep').mask("00000-000", {placeholder: "_____-___"});
$(formDocumentsAndAddress + 'cep').focusout(function () {
    var id = '#' + $(this).attr("id");
    if (!validateCEP($(id).cleanVal())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'rg_number').focusout(function () {
    var id = '#' + $(this).attr("id");
    $(id).val($(id).val().toUpperCase());
    if (!validateRG($(id).val())) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});

$(formDocumentsAndAddress + 'civil_certification').change(function () {

    var oldDocuments = $(formDocumentsAndAddress + 'civil_certification_type'
            + ', ' + formDocumentsAndAddress + 'civil_certification_term_number'
            + ', ' + formDocumentsAndAddress + 'civil_certification_sheet'
            + ', ' + formDocumentsAndAddress + 'civil_certification_book'
            + ', ' + formDocumentsAndAddress + 'civil_certification_date'
            + ', ' + formDocumentsAndAddress + 'notary_office_uf_fk'
            + ', ' + formDocumentsAndAddress + 'notary_office_city_fk'
            + ', ' + formDocumentsAndAddress + 'edcenso_notary_office_fk');

    var newDocument = $(formDocumentsAndAddress + 'civil_register_enrollment_number');


    if ($(this).val() == "") {
        oldDocuments.attr("disabled", "disabled").parent().parent().hide();
        newDocument.attr("disabled", "disabled").parent().parent().hide();
    }
    else {
        oldDocuments.removeAttr("disabled").parent().parent().show();
        newDocument.removeAttr("disabled").parent().parent().show();
        if ($(this).val() == 2) {
            oldDocuments.val("").attr("disabled", "disabled").parent().parent().hide();
        } else {
            newDocument.attr("disabled", "disabled").parent().parent().hide();
        }
    }
});

$(formDocumentsAndAddress + 'rg_number_expediction_date, ' + formDocumentsAndAddress + 'civil_certification_date').mask("99/99/9999");
$(formDocumentsAndAddress + 'rg_number_expediction_date, ' + formDocumentsAndAddress + 'civil_certification_date').focusout(function () {
    var id = '#' + $(this).attr("id");
    var documentDate = stringToDate($(id).val());
    var birthday = stringToDate($(formIdentification + 'birthday').val());
    if (!validateDate($(id).val()) || birthday.asianStr > documentDate.asianStr) {
        //$(id).attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});



$(formIdentification + 'responsable').on('change', function () {
    if ($(this).val() == 2) {
        $('#responsable_name').show();
    } else {
        $('#responsable_name').hide();
    }
});

$(formEnrollment + 'school_admission_date').mask("00/00/0000", {placeholder: "dd/mm/aaaa"});
$(formEnrollment + 'school_admission_date').focusout(function () {
    var id = '#' + $(this).attr("id");
    var school_admission_date = stringToDate($(formEnrollment + 'school_admission_date').val());


    if ((!validateDate($(formEnrollment + 'school_admission_date').val()) || !validateYear(school_admission_date.year)) && ($(id).val() != '')) {
        //$(formIdentification + 'birthday').attr('value', '');
        addError(id, "Campo não está dentro das regras.");
    } else {
        removeError(id);
    }
});