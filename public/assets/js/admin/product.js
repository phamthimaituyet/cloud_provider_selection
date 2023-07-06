const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const plus = $('.add-product-icon');
const minus = $('.remove-product-icon');
const plus_certificate = $('.add-certificate-icon');
const minus_certificate = $('.remove-certificate-icon');

function addFormPrice() {
    const formPrices = $$('#price');
    const formPrice = formPrices[formPrices.length - 1];
    const clone = formPrice.cloneNode(true);
    clone.querySelector('#inputType').value = '';
    clone.querySelector('#inputPrice').value = '';
    const type = formPrice.querySelector('#inputType').value;
    const price = formPrice.querySelector('#inputPrice').value;

    if(type && price){
        $('.parent-price').appendChild(clone);
    }

}

function removeFormPrice() {
    const formPrices = $$('#price');
    const formPrice = formPrices[formPrices.length - 1];

    if (formPrices.length > 1) {
        formPrice.remove();
    }
}

function addFormCertificate() {
    const inputCertificate = $('#inputCertificate');
    // Clone element
    const clone = inputCertificate.cloneNode(true);
    clone.value = '';
    // Add element to parent element
    $('#prod_certificate').appendChild(clone);
}

function removeFormCertificate() {
    const inputCertificates = $$('#inputCertificate');

    if (inputCertificates.length > 1) {
        inputCertificates[inputCertificates.length - 1].remove();
    }
}

if (plus) {
    plus.onclick = addFormPrice;
}

if (minus) {
    minus.onclick = removeFormPrice;
}

plus_certificate.onclick = addFormCertificate;
minus_certificate.onclick = removeFormCertificate;
