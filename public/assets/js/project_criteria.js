$(function() {
    // displayDelete();
    multiple();

    // add questions
    $('.add-question').on("click", function() {
        const question_elem_clone = $(".form-question").first().clone();
        $(question_elem_clone).find('#mondai').val('');
        $(question_elem_clone).find('select').attr('name', "criteria_id[" + $(".form-question").length + "][]")
        question_elem_clone.appendTo($(".question-component"));
        multiple();
        // displayDelete();
    })
})

 // khoi tao thu vien chon multiple
function multiple() {
    $('.form-select').each(function(index) {
        $(this).select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $( his).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
            selectionCssClass: 'select2--small',
            dropdownCssClass: 'select2--small',
        });

        if (index !== 0 && index === $('.form-select').length - 1) {
            $(this).parent().find(".select2-container--bootstrap-5").last().remove();
        }
    })
}

// Thuc hien delete phan tu
function displayDelete() {
    $('.criteria-elem').on( "mouseenter", function() {
        $(this).find("#delete").removeClass("hide");
    }).on( "mouseleave", function() {
        $(this).find("#delete").addClass("hide");
    })

    $(".delete-icon").on("click", function() {
        $(this).closest('.criteria-elem').remove()
    });
}
