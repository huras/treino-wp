var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
},
spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};
jQuery('.phone_with_ddd').mask(SPMaskBehavior, spOptions);

jQuery(document).ready(function() {
    jQuery('#input-cidade, #input-estado').select2();
    jQuery('#select-marca, #select-modelo, #select-ano-modelo').select2();
});

jQuery(document).ready(function () {
    jQuery.getJSON(php_vars.estados_cidades_file_path, function (data) {
        
        var items = [];
        var options = '<option disabled selected value="">Qual o seu Estado</option>';

        jQuery.each(data, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });
        jQuery("#input-estado").html(options);

        jQuery("#input-estado").change(function () {

            var options_cidades = '';
            var str = "";

            jQuery("#input-estado option:selected").each(function () {
                str += jQuery(this).text();
            });

            jQuery.each(data, function (key, val) {
                if(val.nome == str) {
                    jQuery.each(val.cidades, function (key_city, val_city) {
                        options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                    });
                }
            });

            jQuery("#input-cidade").html(options_cidades);

        }).change();
    });

});