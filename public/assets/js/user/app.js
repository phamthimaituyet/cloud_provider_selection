$(document).ready(function() {
    $('.search-filters-filters_panel_component__filterHeader').click(function() {
        var index = $('.search-filters-filters_panel_component__filterHeader').index(this)
        $($('.search-filters-filters_panel_component__filterBody')[index]).toggleClass('d-none')
        if ($($('.search-filters-filters_panel_component__filterBody')[index]).hasClass('d-none')) {
            $(this).children('.search-filters-filters_panel_component__chevron').css('transform', 'rotate(-90deg)')
        } else {
            $(this).children('.search-filters-filters_panel_component__chevron').css('transform', 'rotate(90deg)')
        }
    })
});