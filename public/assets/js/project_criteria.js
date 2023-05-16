$(function() {
    const criteria_elem = $(".criteria-elem").first();
    displayDelete();

    $('.businessContainer').on("click", function() {
        if ($('.form-add-criteria-container').hasClass("d-none")) {
            $('.form-add-criteria-container').removeClass("d-none");
        } else {
            const criteria_elem_clone = criteria_elem.clone();
            criteria_elem_clone.children("#delete").removeClass("d-none");
            criteria_elem_clone.appendTo($(".list-criteria"));
            displayDelete();
        }

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

    $(".criteria-elem").first().children("#delete").addClass("d-none")
})

function displayDelete() {
    $('.criteria-elem').on( "mouseenter", function() {
        $(this).children("#delete").removeClass("hide");
    }).on( "mouseleave", function() {
        $(this).children("#delete").addClass("hide");
    })

    $(".delete-icon").on("click", function() {
        $(this).parent().remove()
    });
}