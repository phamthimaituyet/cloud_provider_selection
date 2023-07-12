$(function() {
    let check = false;
    searchProduct();
    // khoi tao options data
    let options = {
        key_word: '',
        category_name: '',
        provider_id: [],
        rating_value: 0,
        certificate: '',
        text: '',
    };

    //search input
    $('#search-input').on('input', function(e) {
        check = true;
        options.key_word = e.target.value;
        $('.clearIcon').removeClass('d-none');
    })

    $('.clearIcon').on('click', function() {
        $('#search-input').val('');

        searchProduct(options.key_word);
    });

    $('#search-button').on('click', function() {
        searchProduct(options);
    })

    //search category
    $('.search-filters-category_filter_component__child').on('click', function(e) {
        e.preventDefault();
        check = true;
        test(check);
        options.category_name = $(this).text();
        searchProduct(options);
    });

    //search provider
    $('.provider').on('change', function() {    // thuc hien hanh dong checkbox
        if ($(this).is(":checked")) {           // neu checked thi them cac val vao mang
            options.provider_id.push($(this).val());
        } else {
            var index = options.provider_id.indexOf($(this).val());
            if (index > -1) {
                options.provider_id.splice(index, 1);
            }
        }
        check = true;
        test(check);
        searchProduct(options);
    });

    // search rating
    $(".ratingRadio").on('click', function() {
        check = true;
        test(check);
        const radioValue = $(".ratingRadio:checked").val() ?? 0;
        if (radioValue) {
            options.rating_value = radioValue;
        }
        searchProduct(options);
    });

    // search certificate
    $(".select_certificate").on('change', function(e) {
        check = true;
        test(check);
        const certificate = e.target.value;
        if (certificate) {
            options.certificate = certificate;
        }
        searchProduct(options);
    });

    // search newest
    $(".tab-items").on('click', function(e) {
        e.preventDefault();
        $(".tab-items").removeClass("action");
        $(this).last().addClass("action");
        options.text = $(this).text();
        searchProduct(options);

    });

    let page_number = 1;
    $(document).on("click", "a.page-link", function(e) {
        e.preventDefault();
        if (this.hasAttribute('rel')) {
            const rel = $(this).attr('rel');
            if (rel === 'next') {
                page_number++;
            } else {
                page_number--;
            }
        } else {
            page_number = $(this).text();
        }

        searchProduct(options, page_number);
    });

    // カレンダーの値を変更すると、ページをリフレッシュする （ユーザ） Tim kiem cmt theo ngay
    // Day data len tren duong dan, userController se thuc hien lay data, tim kiem
    $('.datepicker_input').on('change', function(e) {
        window.location.href =  window.location.origin + window.location.pathname + "?date=" + e.target.value;
    })
})

function test(check) {
    if(check) {
        $('.clear_all').removeClass('d-none');
    }
}

function searchProduct(data = {}, page_number = null) {
    const link = !page_number ? '/api/search' : `/api/search?page=${page_number}`;
    $.ajax({
        type: 'GET',
        url: link,
        data: data
    }).done(function(data) {
        $('.search-index_content__searchResultsBody').remove();
        $('.search-index_content__searchResults').append(data);
    }).fail(function(data) {
        console.log("Failed");  
    });
}
