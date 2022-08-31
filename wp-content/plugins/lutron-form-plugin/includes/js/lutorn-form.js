class LutronForm {

    constructor(options){
        this.step1_ID = options?.step1;
        this.step2_ID = options?.step2;
        this.step1 = document.querySelector(this.step1_ID);
        this.step2 = document.querySelector(this.step2_ID);
    }

    goToStep2(){
        if(this.fieldsPassValidationStep1() || true){
            jQuery(this.step1).toggle();
            jQuery(this.step2).toggle();
        }
    }

    goToStep1(){
        jQuery(this.step1).toggle();
        jQuery(this.step2).toggle();
    }

    fieldsPassValidationStep1(){
        var fields = [
            {
                selector: '#input-name',
                validation: (value) => {
                    if(value == '') return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#input-email',
                validation: (value) => {
                    if(value == '') return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#input-phone',
                validation: (value) => {
                    if(!value) return {status: false, msg: 'Campo obrigatório'};
                    if(![16, 14].includes(value.length)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#input-estado',
                validation: (value) => {
                    if(value == '' || (!value && value != 0)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#input-cidade',
                validation: (value) => {
                    if(value == '' || (!value && value != 0)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
        ];

        return this.smartValidate(fields);
    }

    fieldsPassValidationStep2(){
        var fields = [
            {
                selector: '[name=tipoVeiculo]',
                validationSelector: 'tipoVeiculo-validation',
                getValue: (field) => {
                    return jQuery(field.selector+':checked').val();
                },
                validation: (value) => {
                    debugger
                    if(value == '' || (!value && value != 0)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#select-marca',
                validationSelector: 'select-marca-validation',
                validation: (value) => {
                    if(value == '' || (!value && value != 0)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#select-modelo',
                validationSelector: 'select-modelo-validation',
                validation: (value) => {
                    if(value == '' || (!value && value != 0)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            },
            {
                selector: '#select-ano-modelo',
                validationSelector: 'select-ano-validation',
                validation: (value) => {
                    if(value == '' || (!value && value != 0)) return {status: false, msg: 'Campo obrigatório'};
                    return {status: true, msg: ''};
                }
            }
        ];

        return this.smartValidate(fields);
    }

    smartValidate(fields){
        var retorno = true;
        for(const field of fields){
            const input = jQuery(field.selector);
            console.log(field);
            const validation = field.validation(
                field.getValue ? field.getValue(field) : input.val()
            );

            if(validation.status != true){
                jQuery(field.selector).addClass('is-invalid');
                jQuery(field.selector).removeClass('is-valid');
                if(jQuery(field.selector).is('select'))
                    jQuery(`[aria-controls=select2-${field.selector.replace('#', '')}-container]`).css('border', '#dc3545 1px solid');

                if(field.validationSelector){
                    jQuery(`${field.validationSelector}`).html(validation.msg);
                    jQuery(`${field.validationSelector}`).addClass('invalid-feedback');
                    jQuery(`${field.validationSelector}`).removeClass('valid-feedback');
                } else {
                    jQuery(`${field.selector}-validation`).html(validation.msg);
                    jQuery(`${field.selector}-validation`).addClass('invalid-feedback');
                    jQuery(`${field.selector}-validation`).removeClass('valid-feedback');
                }
            } else {
                jQuery(field.selector).addClass('is-valid');
                jQuery(field.selector).removeClass('is-invalid');
                if(jQuery(field.selector).is('select'))
                    jQuery(`[aria-controls=select2-${field.selector.replace('#', '')}-container]`).css('border', '#198754 1px solid');

                if(field.validationSelector){
                    jQuery(`${field.validationSelector}`).html(validation.msg);
                    jQuery(`${field.validationSelector}`).addClass('valid-feedback');
                    jQuery(`${field.validationSelector}`).removeClass('invalid-feedback');
                } else {
                    jQuery(`${field.selector}-validation`).html(validation.msg);
                    jQuery(`${field.selector}-validation`).addClass('valid-feedback');
                    jQuery(`${field.selector}-validation`).removeClass('invalid-feedback');
                }
            }
            retorno = retorno && validation.status;
        }

        return retorno;
    }

    sendRequest(data){
        debugger
    }

    submit(){
        const dataForm1 = new FormData(this.step1);
        const dataForm2 = new FormData(this.step2);

        const value1 = Object.fromEntries(dataForm1.entries());
        const value2 = Object.fromEntries(dataForm2.entries());

        const data = {...value1, ...value2};

        if (this.fieldsPassValidationStep2()){
            this.sendRequest(data);
        }
    }
}

const lutronForm = new LutronForm({
    step1: '#form-step-1',
    step2: '#form-step-2',
});