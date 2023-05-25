$(function() {
    var provider = [];
    $('.provider').on('change', function() {    // thuc hien hanh dong checkbox
        if ($(this).is(":checked")) {           // neu checked thi them cac val vao mang
            provider.push($(this).val());
        } else {
            var index = provider.indexOf($(this).val());
            if (index > -1) {
                provider.splice(index, 1);
            }
        }


        $.ajax({
            type: 'GET',
            url: "/api/search",
            data: {
                "provider": provider
            }
        }).done(function(data) {
            $('.search-index_content__searchResultsBody').remove();
            $('.search-index_content__searchResults').append(data);
        }).fail(function(data) {
            console.log("Failed");  
        });
    })
})
