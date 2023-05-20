$(function() {
    const criteria_elem = $(".criteria-elem").first();      // lay ra phan tu dau tien
    displayDelete();

    $('.btn-outline-primary').on("click", function() {
        if ($('.form-add-criteria-container').hasClass("d-none")) {
            $('.form-add-criteria-container').removeClass("d-none");
        } else {
            const criteria_elem_clone = criteria_elem.clone();  // khi co 1 phan tu tro nen copy phan tu dau tien va nhan ban
            criteria_elem_clone.find("#delete").removeClass("d-none");
            criteria_elem_clone.find('#note').val('');
            criteria_elem_clone.find(".form-select").attr('name', "criteria_id[" + $(".criteria-elem").length + "][]")
            criteria_elem_clone.appendTo($(".list-criteria"));
            displayDelete();
        }

        // khoi tao thu vien chon multiple
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
    })

    $(".criteria-elem").first().find("#delete").addClass("d-none")
})

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
