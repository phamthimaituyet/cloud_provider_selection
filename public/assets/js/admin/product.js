const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const plus = $('.add-product-icon');
const minus = $('.remove-product-icon');

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

plus.onclick = addFormPrice;
minus.onclick = removeFormPrice;


