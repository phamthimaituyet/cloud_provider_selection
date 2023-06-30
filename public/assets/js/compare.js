$(function() {
    $('#submit-compare').on('click', function() {
        const product_id1 = $('#inputGroupSelect01 option:selected').val();
        const product_id2 = $('#inputGroupSelect02 option:selected').val();

        if (product_id1 != 0 && product_id2 != 0) {
           compare(product_id1, product_id2); 
        }
        
    });

    $('.submit-compare-vendor').on('click', function (e) {
        e.preventDefault();
        const provider_id1 = $('.provider_id1').val();
        const provider_id2 = $('.provider_id2').val();

        compare(provider_id1, provider_id2);
        
    });

}) 

function compare(id1, id2) {
    const link = '/compare/product?id1=' + id1 + '&id2=' + id2;
    $.ajax({
        type: 'GET',
        url: link
    }).done(function(data) {
        $('#root-compare-component').html(data);  
    }).fail(function(data) {
        console.log('FAILED');  
    });
}
