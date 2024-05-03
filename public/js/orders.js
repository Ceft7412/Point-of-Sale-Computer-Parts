//Hide category and show subcategory
$('.item-category').on('click', function() {
    $('.category-group').hide();
    
    const categoryId = $(this).data('category-id');
    $(`#subcategory-order-${categoryId}`).css('display', 'flex');


    $.get()
});

//Show the category again
$('.back').on('click', function() {
    $('.subcategory-group').hide();
    $('.category-group').css('display', 'flex');
});


$('.proceed-button').on('click', function () {
    $('.o-modal-wrapper').show();
});






$(".num .item ").click(function () {
    var num = $(this).children().first().text();
    var inputVal = $("#input_numbers").val();
    $("#input_numbers").val(inputVal + num);
});

$(".backspace").click(function () {
    var inputVal = $("#input_numbers").val();
    $("#input_numbers").val(inputVal.slice(0, -1));
});






//clicking the item will put it into the right side bar order

$('.product-item').on('click', function () {


    const productItem = $(this);
    // getting the data of the product - name and the price
    const productName = productItem.find('.footer-product span').text();
    const productPrice = parseFloat(productItem.find('.header-product .price-product').text().replace('₱', ''));

    //creating the product item

    const orderItem = `
    <div class="rightbar-body-item">
        <div class="quantity-product">
            <i class="bi bi-chevron-up increase-quantity"></i>
            <input type="number" min="1" value="1" class="num-product-input">
            <i class="bi bi-chevron-down decrease-quantity"></i>
        </div>
        <div class="product-name">
            <span>${productName}</span>
        </div>
        <div class="product-price">
            <span>₱${productPrice.toFixed(2)}</span>
        </div>
        <div class="icon-remove remove-item">
            <i class="bi bi-x-circle-fill"></i>
        </div>
    </div>`;


    //adding the product item to the rightside bar

    $('.rightbar-body').append(orderItem);

    //updating the total price whenevr a new item is inserted 
    updateTotalPrice();

});


$('.rightbar-body').on('click', '.increase-quantity, .decrease-quantity', function () {
    const quantityInput = $(this).siblings('.num-product-input');
    let quantity = +quantityInput.val();
    if ($(this).hasClass('increase-quantity')) {
        quantity += 1;
    } else {
        if (quantity > 1) {
            quantity -= 1;
        }
    }
    quantityInput.val(quantity);
    updateTotalPrice();
});


$('.rightbar-body').on('click', '.remove-item', function(){
    $(this).closest('.rightbar-body-item').remove();
    updateTotalPrice();
});

function updateTotalPrice() {
    let totalPrice = 0;
    $('.rightbar-body-item').each(function () {
        const quantity = +$(this).find('.num-product-input').val();
        const price = parseFloat($(this).find('.product-price span').text().replace('₱', ''));
        totalPrice += quantity * price;
    });
    $('.value-total').text(`₱${totalPrice.toFixed(2)}`);
}
