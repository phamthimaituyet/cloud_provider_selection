$(function() {
    $('.form-select').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $( his).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small'
    });
})
